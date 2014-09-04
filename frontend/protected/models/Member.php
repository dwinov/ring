<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/25/14
 * Time: 5:40 PM
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
        return array();
    }

    public function insertMember($data, $user_id)
    {
        $model = new Member;

        $model->mem_user_id = $user_id;
        $model->mem_first_name = (isset($data['Member']['mem_first_name'])) ? $data['Member']['mem_first_name'] : null;
        $model->mem_last_name = (isset($data['Member']['mem_last_name'])) ? $data['Member']['mem_last_name'] : null;
        $model->mem_email = $data['User']['usr_email'];
        $model->mem_birthdate = (isset($data['Member']['mem_birthdate'])) ? strtotime($data['Member']['mem_birthdate']) : null;
        $model->mem_gender = (isset($data['Member']['mem_gender'])) ? $data['Member']['mem_gender'] : 2;
        $model->mem_phone = (isset($data['Member']['mem_phone'])) ? $data['Member']['mem_phone'] : null;
//        $model->mem_pm = null;
        $model->mem_create_at = strtotime(date('d-m-Y H:i'));

        return ($model->save()) ? true : false;
    }

    public function updateMember($data)
    {
        $model = Member::model()->findByPk($data->mem_id);

        $model->mem_first_name = (isset($data->mem_first_name)) ? $data->mem_first_name : $model->mem_first_name;
        $model->mem_last_name = (isset($data->mem_last_name)) ? $data->mem_last_name : $model->mem_last_name;
        $model->mem_about = (isset($data->mem_phone)) ? $data->mem_phone : $model->mem_phone;
//        $model->mem_photo = (isset($data->mem_gender)) ? $data->mem_gender : $model->mem_gender;

        return ($model->save()) ? true : false;
    }

    public function updateMemberApi($data, $mem_id)
    {
        $model = Member::model()->findByPk($mem_id);

        $model->mem_first_name = (isset($data['firstname'])) ? $data['firstname'] : $model->mem_first_name;
        $model->mem_last_name = (isset($data['lastname'])) ? $data['lastname'] : $model->mem_last_name;
        $model->mem_about = (isset($data['aboutme'])) ? $data['aboutme'] : $model->mem_about;
//        $model->mem_photo = (isset($data->mem_gender)) ? $data->mem_gender : $model->mem_gender;

        return ($model->save()) ? true : false;
    }

    public function getMemberByUserId($id)
    {
        $data = Yii::app()->db->createCommand()
            ->from('tbl_member')
            ->where('mem_user_id=:user_id', array(':user_id' => $id))
        ;

        $result = $data->queryRow();
        return $result;
    }

    public function getAllMember($user_id)
    {
        $data = Yii::app()->db->createCommand()
            ->from('tbl_member')
            ->where('mem_user_id!=:user_id', array(':user_id' => $user_id))
        ;

        return $data->queryAll();
    }

    public function uploadPhoto($file, $user_id)
    {
        $model = Member::model()->find('mem_user_id=:user_id', array(':user_id' => $user_id));

        $model->mem_photo = ($model->mem_gender != null) ? Helper::updateImage('member', $model->mem_gender) : Helper::uploadImage($file, 'member');

        return ($model->save()) ? true : false;
    }
}