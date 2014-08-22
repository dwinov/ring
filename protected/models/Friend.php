<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/22/14
 * Time: 2:00 PM
 */

class Friend extends CActiveRecord
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
        return '{{friend}}';
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

    public function insertData($own_id, $friend_id, $status = 'pending')
    {
        $model = new Friend;
        $model->fr_own_id = $own_id;
        $model->fr_friend_id = $friend_id;

        if($status == 'pending')
        {
            $model->fr_pending = 1;
            $model->fr_decline = 2;
            $model->fr_accept = 2;
        }elseif($status == 'accept')
        {
            $model->fr_pending = 0;
            $model->fr_decline = 0;
            $model->fr_accept = 1;
        }

        $model->fr_create_at = strtotime(date('d-m-Y H:i:s'));

        return ($model->save()) ? true : false;
    }

    public function updateData($own_id, $friend, $status = 'accept')
    {
        $model = $this->getFriendById($friend);

        if($status == 'accept')
        {
            $model->fr_pending = 0;
            $model->fr_decline = 0;
            $model->fr_accept = 1;

            if($model->save())
            {
                return ($this->insertData($own_id, $friend, 'accept')) ? true : false;
            }else{
                return false;
            }
        }elseif($status == 'decline')
        {
            $model->fr_pending = 0;
            $model->fr_decline = 1;
            $model->fr_accept = 0;

            return ($model->save()) ? true : false;
        }
    }

    public function getInvitataion($id)
    {
        $data = Yii::app()->db->createCommand()
            ->select('
                m.mem_id,
                m.mem_photo,
                m.mem_screen_name,
                FROM_UNIXTIME(m.mem_create_at, "%d-%m-%Y") as mem_create_at,
                CASE WHEN ()')
            ->from('tbl_friend f')
            ->join('tbl_member m', 'f.fr_own_id = m.mem_id')
            ->where('f.fr_friend_id=:mem_id', array(':mem_id' => $id))
        ;

        $result = $data->queryAll();
        return $result;
    }

    public function getFriendById($id)
    {
        $model = Friend::model()->find('fr_own_id=:own_id', $id);
        if($model === null)
            throw new CHttpException(404,'The requested page does not exist!.');
        return $model;
    }
}