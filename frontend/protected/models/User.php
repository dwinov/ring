<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/25/14
 * Time: 5:38 PM
 */

class User extends CActiveRecord
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
        return '{{user}}';
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

    /**
     * Generates a new validation key (additional security for cookie)
     */
    public function regenerateValidationKey()
    {
        $this->saveAttributes(array(
            'usr_validation_key' => md5(mt_rand() . mt_rand() . mt_rand()),
            'usr_login_attempts' =>0
        ));
    }

    public function getLevel($id) {
        $level=array('1'=>'Admin','2'=>'EO','3'=>'Venue');
        return $level[$id];
    }

    public function insertUser($data)
    {
        $model = new User;

        $model->usr_username = $data['usr_email'];
        $model->usr_password = md5($data['usr_password']);
        $model->usr_email = $data['usr_email'];
        $model->usr_type_id = $data['usr_type_id'];
        $model->usr_created_date = strtotime(date('d-m-Y H:i:s'));

        return ($model->save()) ? $model->usr_id : null;
    }
}