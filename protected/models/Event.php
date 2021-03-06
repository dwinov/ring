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
            ->select(
                'e.evt_id,
                e.evt_name,
                eo.eo_name,
                v.vn_name,
                FROM_UNIXTIME(e.evt_start_date, "%d-%m-%Y") as evt_start_date,
                e.evt_ticketing,
                SUM(t.tkt_total) as tkt_total,
                t.tkt_sold
                ')
            ->from('tbl_event e')
            ->leftJoin('tbl_eo eo', 'e.evt_owner_id = eo.eo_id')
            ->leftJoin('tbl_venue v', 'e.evt_venue_id = v.vn_id')
            ->leftJoin('tbl_ticket t', 'e.evt_id = t.tkt_evt_id')
            ->group('e.evt_id,e.evt_name,eo.eo_name,v.vn_name,evt_start_date,e.evt_ticketing');
        ;

        $attr = array();
        $where = array('and');

        if(Yii::app()->user->roleid == 2)
        {
            $eo = Eo::model()->find('eo_user_id=:user_id', array(':user_id' => Yii::app()->user->usrid));
            $where[] = 'evt_owner_id=:eo_id';
            $attr[':eo_id'] = $eo->eo_id;
            $where[] = 'evt_role_id=:role_id';
            $attr[':role_id'] = Yii::app()->user->roleid;
        }elseif(Yii::app()->user->roleid == 3){
            $venue = Venue::model()->find('vn_user_id=:user_id', array(':user_id' => Yii::app()->user->usrid));
            $where[] = 'evt_owner_id=:vn_id';
            $attr[':vn_id'] = $venue->vn_id;
            $where[] = 'evt_role_id=:role_id';
            $attr[':role_id'] = Yii::app()->user->roleid;
        }

        $allData = count($data->queryAll());

        //search specific record
        if(!empty($filter['sSearch'])){
            $search = $filter['sSearch'];
            $where[] = 'evt_name LIKE :name OR
                        eo_name LIEK :name OR
                        vn_name LIKE :name OR
                        FROM_UNIXTIME(e.evt_start_date, "%d-%m-%Y") = :name';
            $attr[':name'] = "'%$search%'";
        }

        $data = Yii::app()->db->createCommand()
            ->select(
                'e.evt_id,
                e.evt_name,
                eo.eo_name,
                v.vn_name,
                FROM_UNIXTIME(e.evt_start_date, "%d-%m-%Y") as evt_start_date,
                e.evt_ticketing,
                SUM(t.tkt_total) as tkt_total,
                t.tkt_sold
                ')
            ->from('tbl_event e')
            ->leftJoin('tbl_eo eo', 'e.evt_owner_id = eo.eo_id')
            ->leftJoin('tbl_venue v', 'e.evt_venue_id = v.vn_id')
            ->leftJoin('tbl_ticket t', 'e.evt_id = t.tkt_evt_id')
            ->where($where, $attr)
            ->group('e.evt_id,e.evt_name,eo.eo_name,v.vn_name,evt_start_date,e.evt_ticketing')
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
                ->where('evt_owner_id=:eo_id', array(':eo_id' => $eo->eo_id))
            ;
        }

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

    public function getEventByIdAPI($id)
    {
        $data = Yii::app()->db->createCommand()
            ->from('tbl_event')
            ->where('evt_id=:id', array(':id' => $id))
        ;

        $result = $data->queryRow();
        $result['evt_date'] = date('d-m-Y', $result['evt_start_date']);

        return $result;
    }

    public function insertData($input, $file)
    {
        $model = new Event;
        $model->attributes = $input['Event'];
        $model->evt_name = $input['Event']['evt_name'];
        $model->evt_owner_id = $input['Event']['evt_owner_id'];
        $model->evt_role_id = $input['Event']['evt_role_id'];
        $model->evt_venue_id = $input['Event']['evt_venue_id'];
        $model->evt_start_date = strtotime($input['Event']['evt_start_date']);
        $model->evt_end_date = strtotime($input['Event']['evt_end_date']);
        $model->evt_ticketing = $input['Event']['evt_ticketing'];
        $model->evt_description = $input['Event']['evt_description'];
        $model->evt_create_at = strtotime(date('d-m-Y H:i:s'));
        $model->evt_photo = (count($file) != 0) ? Helper::uploadImage($file, 'event') : null;

        if($model->save())
        {
            if($input['Event']['evt_ticketing'] == true)
            {
                if(count($input['tkt_type']) > 0)
                {
                    $ticket = new Ticket();
                    for($x = 0; $x < count($input['tkt_type']); $x++)
                    {
                        $result = $ticket->insertData($input['tkt_type'][$x], $input['tkt_price'][$x], $input['tkt_total'][$x], $model->evt_id);
                        if($result == false)
                            return false;
                    }
                    $model->evt_photo_event = (count($file) != 0) ? Helper::uploadImage($file, 'event', 'tiketpic') : null;
                    $model->save();
                    return true;
                }else{
                    return true;
                }
            }else{
                return true;
            }
        }else{
            return false;
        }
    }

    public function updateData($input, $file)
    {
        $model = $this->getEventById($input['Event']['evt_id']);

        $model->evt_name = $input['Event']['evt_name'];
        $model->evt_venue_id = $input['Event']['evt_venue_id'];
        $model->evt_role_id = $input['Event']['evt_role_id'];
        $model->evt_start_date = strtotime($input['Event']['evt_start_date']);
        $model->evt_end_date = strtotime($input['Event']['evt_end_date']);
        $model->evt_ticketing = $input['Event']['evt_ticketing'];
        $model->evt_description = $input['Event']['evt_description'];
        $model->evt_photo = (count($file) != 0) ? Helper::updateImage('event', $model->evt_photo) : $model->evt_photo;

        if($model->save())
        {
            if($input['Event']['evt_ticketing'] == true && count($input['tkt_type']) > 0)
            {
                $ticket = new Ticket();
                Ticket::model()->deleteAll('tkt_evt_id=:evt_id', array(':evt_id' => $input['Event']['evt_id']));
                for($x = 0; $x < count($input['tkt_type']); $x++)
                {
                    if($input['tkt_type'][$x] != null || $input['tkt_type'][$x] != '')
                    {
                        $result = $ticket->insertData($input['tkt_type'][$x], $input['tkt_price'][$x], $input['tkt_total'][$x], $model->evt_id);
                        if($result == false)
                            return false;
                    }
                }

                return true;
            }else{
                return true;
            }
        }else{
            return false;
        }

//        return ($model->save()) ? true : false;
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

    public function getOtherEvents($filter)
    {
        if($filter['end'] == null || empty($filter['end']) || $filter['end'] == '')
        {
            $data = Yii::app()->db->createCommand()
                ->select('e.evt_id, e.evt_name, eo.eo_name, v.vn_name, FROM_UNIXTIME(e.evt_start_date, "%d-%m-%Y") as evt_start_date')
                ->from('tbl_event e')
                ->leftJoin('tbl_eo eo', 'e.evt_owner_id = eo.eo_id')
                ->leftJoin('tbl_venue v', 'e.evt_venue_id = v.vn_id')
                ->where('FROM_UNIXTIME(e.evt_start_date, "%d-%b-%Y")=:start', array(':start' => date("d-m-Y", $filter['start'])))
            ;
        }else{
            $data = Yii::app()->db->createCommand()
                ->select('e.evt_id, e.evt_name, eo.eo_name, v.vn_name, FROM_UNIXTIME(e.evt_start_date, "%d-%m-%Y") as evt_start_date')
                ->from('tbl_event e')
                ->leftJoin('tbl_eo eo', 'e.evt_owner_id = eo.eo_id')
                ->leftJoin('tbl_venue v', 'e.evt_venue_id = v.vn_id')
                ->where('FROM_UNIXTIME(e.evt_start_date, "%d-%b-%Y")>=:start AND FROM_UNIXTIME(e.evt_start_date, "%d-%b-%Y")<=:end',
                    array(':start' => date("d-m-Y", $filter['start']), ':end' => date("d-m-Y", $filter['end'])))
            ;
        }

        $allData = count($data->queryAll());

        if($filter['end'] == null || empty($filter['end']) || $filter['end'] == '')
        {
            $data = Yii::app()->db->createCommand()
                ->select('e.evt_id, e.evt_name, eo.eo_name, v.vn_name, FROM_UNIXTIME(e.evt_start_date, "%d-%m-%Y") as evt_start_date')
                ->from('tbl_event e')
                ->leftJoin('tbl_eo eo', 'e.evt_owner_id = eo.eo_id')
                ->leftJoin('tbl_venue v', 'e.evt_venue_id = v.vn_id')
                ->where('FROM_UNIXTIME(e.evt_start_date, "%d-%b-%Y")=:start', array(':start' => date("d-m-Y", $filter['start'])))
            ;
        }else{
            $data = Yii::app()->db->createCommand()
                ->select('e.evt_id, e.evt_name, eo.eo_name, v.vn_name, FROM_UNIXTIME(e.evt_start_date, "%d-%m-%Y") as evt_start_date')
                ->from('tbl_event e')
                ->leftJoin('tbl_eo eo', 'e.evt_owner_id = eo.eo_id')
                ->leftJoin('tbl_venue v', 'e.evt_venue_id = v.vn_id')
                ->where('FROM_UNIXTIME(e.evt_start_date, "%d-%b-%Y")>=:start AND FROM_UNIXTIME(e.evt_start_date, "%d-%b-%Y")<=:end',
                    array(':start' => date("d-m-Y", $filter['start']), ':end' => date("d-m-Y", $filter['end'])))
            ;
        }

        $filteredData = count($data->queryAll());
        $data = $data->offset($filter['iDisplayStart'])->limit($filter['iDisplayLength']);

        return array(
            "sEcho" => $filter['sEcho'],
            'aaData' => $data->queryAll(),
            'iTotalRecords' => $allData,
            'iTotalDisplayRecords' => $filteredData
        );
    }

    public function getEventsForGraph()
    {
        if(Yii::app()->user->roleid == 2)
        {
            $eo = new Eo();
            $data_eo = $eo->getEoByUserId(Yii::app()->user->usrid);
            $data = Yii::app()->db->createCommand()
                ->select('
            FROM_UNIXTIME(evt_start_date, "%m") as int_month,
            FROM_UNIXTIME(evt_start_date, "%b") as evt_month,
            COUNT(evt_id) as total')
                ->from('tbl_event')
                ->where('FROM_UNIXTIME(evt_start_date, "%b") IS NOT NULL')
                ->andWhere('evt_owner_id=:owner', array(':owner' => $data_eo['eo_id']))
                ->andWhere('evt_role_id=:role', array(':role' => Yii::app()->user->roleid))
                ->group('evt_month')
                ->order('int_month ASC')
            ;
        }elseif(Yii::app()->user->roleid == 3)
        {
            $venue = new Venue();
            $data_venue = $venue->getVenueByUserId(Yii::app()->user->usrid);
            $data = Yii::app()->db->createCommand()
                ->select('
            FROM_UNIXTIME(evt_start_date, "%m") as int_month,
            FROM_UNIXTIME(evt_start_date, "%b") as evt_month,
            COUNT(evt_id) as total')
                ->from('tbl_event')
                ->where('FROM_UNIXTIME(evt_start_date, "%b") IS NOT NULL')
                ->andWhere('evt_owner_id=:owner', array(':owner' => $data_venue['vn_id']))
                ->andWhere('evt_role_id=:role', array(':role' => Yii::app()->user->roleid))
                ->group('evt_month')
                ->order('int_month ASC')
            ;
        }

        return $data->queryAll();
    }

    public function getLongLat($evt_id)
    {
        $data = Yii::app()->db->createCommand()
            ->select('
                v.vn_longitude,
                v.vn_latitude')
            ->from('tbl_event e')
            ->leftJoin('tbl_venue v', 'e.evt_venue_id = v.vn_id')
            ->where('e.evt_id=:evt_id', array(':evt_id' => $evt_id))
        ;

        $result = $data->queryRow();
        return $result;
    }

    public function getEventByVenueId($vn_id, $count = false)
    {
        $data = Yii::app()->db->createCommand()
            ->select('evt_id')
            ->from('tbl_event')
            ->where('evt_venue_id=:vn_id', array(':vn_id' => $vn_id))
        ;

        $result = ($count == false) ? $data->queryAll() : count($data->queryAll());

        return $result;
    }
}