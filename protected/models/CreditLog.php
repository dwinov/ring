<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/16/14
 * Time: 6:10 PM
 */

class CreditLog extends CActiveRecord
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
        return '{{credit_log}}';
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

    public function getCreditByEoId($id)
    {
        $data = Yii::app()->db->createCommand()
            ->from('tbl_credit')
            ->where('tkt_eo_id=:id', array(':id' => $id))
        ;

        $result = $data->queryAll();
        return (count($result) > 0) ? $result : null;
    }

    public function insertData($input)
    {
        $model = new CreditLog;

        $model->clog_eo_id = $input['eo_id'];
        $model->clog_credit = $input['credit'];
        $model->clog_date = strtotime(date('d-m-Y H:i:s'));
        $model->clog_status = $input['status'];
        $model->clog_create_at = strtotime(date('d-m-Y H:i:s'));

        return ($model->save()) ? true : false;
    }
}