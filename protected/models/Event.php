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
            ->select('e.evt_id, e.evt_name, eo.eo_name, v.vn_name, e.evt_tiket_price, FROM_UNIXTIME(e.evt_date, "%d-%m-%Y") as evt_date')
            ->from('tbl_event e')
            ->join('tbl_eo eo', 'e.evt_owner_id = eo.eo_id')
            ->join('tbl_venue v', 'e.evt_venue_id = v.vn_id')
        ;

        $attr = array();
        $where = array('and');

        if(Yii::app()->user->roleid ==2)
        {
            $eo = Eo::model()->find('eo_user_id=:user_id', array(':user_id' => Yii::app()->user->usrid));
            $where[] = 'evt_owner_id=:eo_id';
            $attr[':eo_id'] = $eo->eo_id;
        }

        $allData = count($data->queryAll());

        //search specific record
        if(!empty($filter['sSearch'])){
            $search = $filter['sSearch'];
            $where[] = 'evt_name LIKE :name OR
                        eo_name LIEK :name OR
                        vn_name LIKE :name OR
                        evt_tiket_price = :name OR
                        FROM_UNIXTIME(e.evt_date, "%d-%m-%Y") = :name';
            $attr[':name'] = "'%$search%'";
        }

        $data = Yii::app()->db->createCommand()
            ->select('e.evt_id, e.evt_name, eo.eo_name, v.vn_name, e.evt_tiket_price, FROM_UNIXTIME(e.evt_date, "%d-%m-%Y") as evt_date')
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

    public function getAllEvent($ringPro = false, $token = null)
    {
        if($ringPro == false && $token == null)
        {
            $data = Yii::app()->db->createCommand()->from('tbl_event');
        }else{
            $user = User::model()->find('usr_token=:token', array(':token' => $token));
            $eo = Eo::model()->find('eo_user_id=:usr_id', array(':usr_id' => $user->usr_id));
            $data = Yii::app()->db->createCommand()
                ->select('e.evt_id,
                        e.evt_name,
                        v.vn_name,
                        FROM_UNIXTIME(e.evt_date, "%a") as evt_day,
                        FROM_UNIXTIME(e.evt_date, "%d") as evt_date,
                        FROM_UNIXTIME(e.evt_date, "%b") as evt_month,
                        FROM_UNIXTIME(e.evt_date, "%Y") as evt_year,
                        FROM_UNIXTIME(e.evt_date, "%H:%i") as evt_hour,
                        e.evt_description')
                ->from('tbl_event e')
                ->join('tbl_venue v', 'e.evt_venue_id = v.vn_id')
                ->where('evt_owner_id=:eo_id', array(':eo_id' => $eo->eo_id))
            ;
        }

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

    public function insertData($input, $file)
    {
        $model = new Event;
        $model->attributes = $input['Event'];
        $model->evt_name = $input['Event']['evt_name'];
        $model->evt_owner_id = $input['Event']['evt_owner_id'];
        $model->evt_venue_id = $input['Event']['evt_venue_id'];
        $model->evt_date = strtotime($input['Event']['evt_date']);
        $model->evt_time = strtotime($input['Event']['evt_time']);
        $model->evt_tiket_price = $input['Event']['evt_tiket_price'];
        $model->evt_total_tiket = $input['Event']['evt_total_tiket'];
        $model->evt_description = $input['Event']['evt_description'];
        $model->evt_photo = (count($file) != 0) ? Helper::uploadImage($file, 'event') : null;

        return ($model->save()) ? true : false;
    }

    public function updateData($input, $file)
    {
        $model = $this->getEventById($input['Event']['evt_id']);

        $model->evt_name = $input['Event']['evt_name'];
        $model->evt_venue_id = $input['Event']['evt_venue_id'];
        $model->evt_date = strtotime($input['Event']['evt_date']);
        $model->evt_time = strtotime($input['Event']['evt_time']);
        $model->evt_tiket_price = $input['Event']['evt_tiket_price'];
        $model->evt_total_tiket = $input['Event']['evt_total_tiket'];
        $model->evt_description = $input['Event']['evt_description'];
        $model->evt_photo = (count($file) != 0) ? Helper::updateImage('event', $model->evt_photo) : $model->evt_photo;

        return ($model->save()) ? true : false;
    }

    public function getEventsByEo($eo_id)
    {
        $data = Yii::app()->db->createCommand()
            ->select('e.evt_id,
                        e.evt_name,
                        v.vn_name,
                        FROM_UNIXTIME(e.evt_date, "%d-%b-%Y") as evt_date,
                        FROM_UNIXTIME(e.evt_date, "%H:%i") as evt_hour')
            ->from('tbl_event e')
            ->join('tbl_venue v', 'e.evt_venue_id = v.vn_id')
            ->where('evt_owner_id=:eo_id', array(':eo_id' => $eo_id))
        ;

        return $data->queryAll();
    }
}