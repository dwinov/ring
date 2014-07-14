<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 2:52 PM
 */

class Event extends CActiveRecord
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
        return '{{event}}';
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

    public function getAllData($filter)
    {
        $data = Yii::app()->db->createCommand()
            ->select('e.evt_id, e.evt_name, eo.eo_name, v.vn_name, e.evt_tiket_price, e.evt_date')
            ->from('tbl_event e')
            ->join('tbl_eo eo', 'e.evt_owner_id = eo.eo_id')
            ->join('tbl_venue v', 'e.evt_venue_id = v.vn_id')
        ;

        $attr = array();
        $where = array('and');

        $allData = count($data->queryAll());

        //search specific record
        if(!empty($filter['sSearch'])){
            $search = $filter['sSearch'];
            $where[] = 'evt_name LIKE :name OR
                        eo_name LIEK :name OR
                        vn_name LIKE :name OR
                        evt_tiket_price = :name OR
                        evt_date = :name';
            $attr[':name'] = "'%$search%'";
        }

        $data = Yii::app()->db->createCommand()
            ->select('e.evt_id, e.evt_name, eo.eo_name, v.vn_name, e.evt_tiket_price, e.evt_date')
            ->from('tbl_event e')
            ->join('tbl_eo eo', 'e.evt_owner_id = eo.eo_id')
            ->join('tbl_venue v', 'e.evt_venue_id = v.vn_id')
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

    public function getEventById($id)
    {
        $model = Event::model()->findByPk($id);
        if($model === null)
            throw new CHttpException(404,'The requested page does not exist!.');
        return $model;
    }

    public function getAllEvent()
    {
        $data = Yii::app()->db->createCommand()->from('tbl_event');

        $result = $data->queryAll();
        return $result;
    }

    public function getEventByIdAPI($id)
    {
        $data = Yii::app()->db->createCommand()
            ->from('tbl_event')
            ->where('evt_id=:id', array(':id' => $id))
        ;

        $result = $data->queryRow();
        $result['evt_date'] = date('d-m-Y', $result['evt_date']);

        return $result;
    }

    public function insertData($input)
    {
        $model = new Event;
        $model->attributes = $input['Event'];
        $model->evt_name = $input['Event']['evt_name'];
        $model->evt_venue_id = $input['Event']['evt_venue_id'];
        $model->evt_date = strtotime($input['Event']['evt_date']);
        $model->evt_time = strtotime($input['Event']['evt_time']);
        $model->evt_tiket_price = $input['Event']['evt_tiket_price'];
        $model->evt_total_tiket = $input['Event']['evt_total_tiket'];
        $model->evt_description = $input['Event']['evt_description'];

        return ($model->save()) ? true : false;
    }

    public function updateData($input)
    {
        $model = $this->getEventById($input['Event']['evt_id']);

        $model->evt_name = $input['Event']['evt_name'];
        $model->evt_venue_id = $input['Event']['evt_venue_id'];
        $model->evt_date = strtotime($input['Event']['evt_date']);
        $model->evt_time = strtotime($input['Event']['evt_time']);
        $model->evt_tiket_price = $input['Event']['evt_tiket_price'];
        $model->evt_total_tiket = $input['Event']['evt_total_tiket'];
        $model->evt_description = $input['Event']['evt_description'];

        return ($model->save()) ? true : false;
    }
}