<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/8/14
 * Time: 11:36 AM
 */

class Member extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Company the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{member}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'User' => array(self::BELONGS_TO, 'User','com_usr_id'),
            'City' => array(self::BELONGS_TO, 'City','com_city_id'),
            'Country' => array(self::BELONGS_TO, 'Country','com_country_id'),
            'Region' => array(self::BELONGS_TO, 'Region','com_region_id'),
            'Membership' => array(self::HAS_MANY, 'MembershipHistory','meh_pk_id'),
        );
    }

    public function insertMember($data, $user_id)
    {
        $model = new Member;

        if(isset($data['Member']['mem_gender'])){
            if($data['Member']['mem_gender'] == 'on')
            {
                $data['Member']['mem_gender'] = 1;
            }else{
                $data['Member']['mem_gender'] = $data['Member']['mem_gender'];
            }
        }else{
            $data['Member']['mem_gender'] = 0;
        }

        $model->attributes = $data;
        $model->mem_user_id = $user_id;
        $model->mem_first_name = $data['Member']['mem_first_name'];
        $model->mem_last_name = $data['Member']['mem_last_name'];
        $model->mem_screen_name = $data['Member']['mem_first_name'] . " " . $data['Member']['mem_last_name'];
        $model->mem_email = $data['User']['usr_email'];
        $model->mem_birthdate = strtotime($data['Member']['mem_birthdate']);
        $model->mem_gender = $data['Member']['mem_gender'];
        $model->mem_phone = $data['Member']['mem_phone'];

        return ($model->save()) ? true : false;
    }

    public function getMemberById($id)
    {
        $model = Member::model()->findByPk($id);
        if($model === null)
            throw new CHttpException(404,'The requested page does not exist!.');
        return $model;
    }

    public function updateMember($data)
    {
        $model = $this->getMemberById($data['Member']['mem_id']);

        $model->attributes = $data['Member'];
        $model->mem_first_name = $data['Member']['mem_first_name'];
        $model->mem_last_name = $data['Member']['mem_last_name'];
        $model->mem_screen_name = $data['Member']['mem_first_name'] . " " . $data['Member']['mem_last_name'];
        $model->mem_email = $data['User']['usr_email'];
        $model->mem_birthdate = strtotime($data['Member']['mem_birthdate']);
        $model->mem_gender = $data['Member']['mem_gender'];
        $model->mem_phone = $data['Member']['mem_phone'];

        return ($model->save()) ? true : false;
    }

    public function getAllMember($filter)
    {
        $attr = array();
        $where = array('and');

        $where[] = 'u.usr_type_id=:type_id';
        $attr[':type_id'] = 4;

        if(!empty($filter['umur'])){
            $umurArr = explode(' - ', $filter['umur']);
            $where[] = "DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), FROM_UNIXTIME(m.mem_birthdate))), '%Y')+0 BETWEEN :start AND :end";
            $attr[':start'] = $umurArr[0];
            $attr[':end'] = $umurArr[1];
        }

        if(isset($filter['gender']) &&  $filter['gender'] != 2){
            $gender = $filter['gender'];
            $where[] = 'm.mem_gender=:gender';
            $attr[':gender'] = $gender;
        }

        if(!empty($filter['region']))
        {
            $regArr = explode(',', $filter['region']);
            for($x = 0; $x < count($regArr); $x++)
            {
                $where[] = 'm.mem_reg_id=:region'.$x;
                $attr[':region'.$x] = $regArr[$x];
            }
        }

        if(!empty($filter['interest']))
        {
            $intArr = explode(',', $filter['interest']);
            for($x = 0; $x < count($intArr); $x++)
            {
                $where[] = 'mi.mint_int_id=:interest'.$x;
                $attr[':interest'.$x] = $intArr[$x];
            }
        }

        $data = Yii::app()->db->createCommand()
            ->from('tbl_member AS m')
            ->leftJoin('tbl_user AS u', 'm.mem_user_id = u.usr_id')
            ->leftJoin('tbl_mem_int as mi', 'mem_id = mi.mint_mem_id')
            ->where($where, $attr)
        ;

        $result = $data->queryAll();
        $members = array();
        foreach($result as $res)
        {
            array_push($members, $res['mem_id']);
        }

        return array(
            'members_id' => implode(',', $members),
            'total_target' => count($result),
        );
    }
}