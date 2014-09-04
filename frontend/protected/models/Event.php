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

    public function getEventById($id)
    {
        $data = Yii::app()->db->createCommand()
            ->select('e.evt_id,
                        e.evt_name,
                        FROM_UNIXTIME(e.evt_start_date, "%a") as evt_day,
                        FROM_UNIXTIME(e.evt_start_date, "%d") as evt_date,
                        FROM_UNIXTIME(e.evt_start_date, "%b") as evt_month,
                        FROM_UNIXTIME(e.evt_start_date, "%Y") as evt_year,
                        FROM_UNIXTIME(e.evt_start_date, "%H:%i") as evt_hour,
                        e.evt_description,
                        e.evt_photo,
                        eo.eo_name,
                        eo.eo_photo,
                        v.vn_name,
                        v.vn_address')
            ->from('tbl_event e')
            ->join('tbl_eo eo', 'e.evt_owner_id = eo.eo_id')
            ->join('tbl_venue v', 'e.evt_venue_id = v.vn_id')
            ->where('e.evt_id=:evt_id', array(':evt_id' => $id))
        ;

        $result = $data->queryRow();

        return $result;
    }

    public function getAllEvent()
    {
        $data = Yii::app()->db->createCommand()
            ->select('e.evt_id,
                        e.evt_name,
                        FROM_UNIXTIME(e.evt_start_date, "%a") as evt_day,
                        FROM_UNIXTIME(e.evt_start_date, "%d") as evt_date,
                        FROM_UNIXTIME(e.evt_start_date, "%b") as evt_month,
                        FROM_UNIXTIME(e.evt_start_date, "%Y") as evt_year,
                        FROM_UNIXTIME(e.evt_start_date, "%H:%i") as evt_hour,
                        e.evt_description,
                        e.evt_photo,
                        eo.eo_name,
                        eo.eo_photo,
                        v.vn_name,
                        v.vn_address')
            ->from('tbl_event e')
            ->join('tbl_eo eo', 'e.evt_owner_id = eo.eo_id')
            ->join('tbl_venue v', 'e.evt_venue_id = v.vn_id')
        ;

        $result = $data->queryAll();

        return $result;
    }

    public function getAllEventForMember()
    {
        $data = Yii::app()->db->createCommand()
            ->select('e.evt_id,
                        e.evt_name,
                        FROM_UNIXTIME(e.evt_start_date, "%d") as evt_date,
                        FROM_UNIXTIME(e.evt_start_date, "%a") as evt_day,
                        FROM_UNIXTIME(e.evt_start_date, "%b") as evt_month,
                        FROM_UNIXTIME(e.evt_start_date, "%Y") as evt_year,
                        FROM_UNIXTIME(e.evt_start_date, "%H:%i") as evt_hour,
                        e.evt_description,
                        e.evt_photo,
                        e.evt_ticketing,
                        eo.eo_name,
                        eo.eo_photo,
                        v.vn_name,
                        v.vn_address')
            ->from('tbl_event e')
            ->join('tbl_eo eo', 'e.evt_owner_id = eo.eo_id')
            ->join('tbl_venue v', 'e.evt_venue_id = v.vn_id')
            ->order('e.evt_start_date DESC')
        ;

        $result = $data->queryAll();

        $model_gallery = new GalleryEvent();
        foreach($result as $key => $rest)
        {
            $gallery = $model_gallery->getAllData($rest['evt_id']);
            $result[$key]['evt_gallery'] = $gallery;
        }

        return $result;
    }

    public function getEventsByEo($eo_id)
    {
        $data = Yii::app()->db->createCommand()
            ->select('e.evt_id,
                        e.evt_name,
                        v.vn_name,
                        FROM_UNIXTIME(e.evt_start_date, "%d-%b-%Y") as evt_date,
                        FROM_UNIXTIME(e.evt_start_date, "%H:%i") as evt_hour')
            ->from('tbl_event e')
            ->join('tbl_venue v', 'e.evt_venue_id = v.vn_id')
            ->where('evt_owner_id=:eo_id', array(':eo_id' => $eo_id))
        ;

        return $data->queryAll();
    }

    public function getOtherEvents($id)
    {
        $data = Yii::app()->db->createCommand()
            ->select('e.evt_id,
                        e.evt_name,
                        FROM_UNIXTIME(e.evt_start_date, "%a") as evt_day,
                        FROM_UNIXTIME(e.evt_start_date, "%d") as evt_date,
                        FROM_UNIXTIME(e.evt_start_date, "%b") as evt_month,
                        FROM_UNIXTIME(e.evt_start_date, "%Y") as evt_year,
                        FROM_UNIXTIME(e.evt_start_date, "%H:%i") as evt_hour,
                        e.evt_description,
                        e.evt_photo,
                        eo.eo_name,
                        eo.eo_photo,
                        v.vn_name,
                        v.vn_address')
            ->from('tbl_event e')
            ->join('tbl_eo eo', 'e.evt_owner_id = eo.eo_id')
            ->join('tbl_venue v', 'e.evt_venue_id = v.vn_id')
            ->where('e.evt_id!=:evt_id', array(':evt_id' => $id))
        ;

        $result = $data->queryAll();

        return $result;
    }
}