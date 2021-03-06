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

    public function getAllData($filter)
    {
        $data = Yii::app()->db->createCommand()
            ->from('tbl_member')
        ;

        $attr = array();
        $where = array('and');

        $allData = count($data->queryAll());

        //search specific record
        if(!empty($filter['sSearch'])){
            $search = $filter['sSearch'];
            $where[] = 'eo_screen_name LIKE :name OR eo_email LIKE :name';
            $attr[':name'] = "'%$search%'";
        }

        $data = Yii::app()->db->createCommand()
            ->from('tbl_member')
            ->where($where, $attr)
        ;

        $filteredData = count($data->queryAll());
        $data = $data->offset($filter['iDisplayStart'])->limit($filter['iDisplayLength']);

        return array(
            "sEcho" => $filter['sEcho'],
            'aaData' => $data->queryAll(),
            'iTotalRecords' => $allData,
            'iTotalDisplayRecords' => $filteredData
        );
    }

    public function getMemberForGraph()
    {
        $data = Yii::app()->db->createCommand()
            ->select('
            FROM_UNIXTIME(mem_create_at, "%m") as int_month,
            FROM_UNIXTIME(mem_create_at, "%b") as mem_month,
            COUNT(mem_id) as total')
            ->from('tbl_member')
            ->where('FROM_UNIXTIME(mem_create_at, "%b") IS NOT NULL')
            ->group('mem_month')
            ->order('int_month ASC')
        ;

        return $data->queryAll();
    }
}