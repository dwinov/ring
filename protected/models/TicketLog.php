<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/26/14
 * Time: 11:59 PM
 */

class TicketLog extends CActiveRecord
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
        return '{{ticket}}';
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

    public function getTicketByEvtId($id)
    {
        $data = Yii::app()->db->createCommand()
            ->from('tbl_ticket')
            ->where('tkt_evt_id=:id', array(':id' => $id))
        ;

        $result = $data->queryAll();
        return (count($result) > 0) ? $result : null;
    }

    public function insertData($input)
    {
        $model = new TicketLog;

        $model->tl_mem_id = $input['mem_id'];
        $model->tl_evt_id = $input['evt_id'];
        $model->tl_tkt_id = $input['tkt_id'];
        $model->tl_quantity = $input['tkt_qty'];

        return ($model->save()) ? true : false;
    }

    public function BuyTickets($tiket, $evt)
    {
        $data = Ticket::model()->find('tkt_id=:tkt_id AND tkt_evt_id=:evt_id', array(':tkt_id' => $tiket, ':evt_id' => $evt));

        $data->tkt_sold = '';
        $data->tkt_total = $data->tkt_total - 1;

        $data->save();
    }
}