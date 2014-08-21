<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 1:55 PM
 */

class Venue extends CActiveRecord
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
        return '{{venue}}';
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
        $attr = array();
        $where = array('and');

        if(Yii::app()->user->roleid == 3)
        {
            $where[] = 'vn_user_id=:user_id';
            $attr[':user_id'] = Yii::app()->user->usrid;
        }

        $data = Yii::app()->db->createCommand()
            ->from('tbl_venue')
            ->where($where, $attr)
        ;

        $allData = count($data->queryAll());

        //search specific record
        if(!empty($filter['sSearch'])){
            $search = $filter['sSearch'];
            $where[] = 'vn_name LIKE :name OR vn_address LIKE :name OR vn_email LIKE :name';
            $attr[':name'] = "'%$search%'";
        }

        $data = Yii::app()->db->createCommand()
            ->from('tbl_venue')
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

    public function getVenueById($id)
    {
        $model = Venue::model()->findByPk($id);
        if($model === null)
            throw new CHttpException(404,'The requested page does not exist!.');
        return $model;
    }

    public function getAllVenue()
    {
        $data = Yii::app()->db->createCommand()->from('tbl_venue');

        $result = $data->queryAll();
        return $result;
    }

    public function getEventByIdAPI($id)
    {
        $data = Yii::app()->db->createCommand()
            ->from('tbl_venue')
            ->where('vn_id=:id', array(':id' => $id))
        ;

        $result = $data->queryRow();
        return $result;
    }

    public function getVenueByUserId($user_id)
    {
        $data = Yii::app()->db->createCommand()
            ->from('tbl_venue')
            ->where('vn_user_id=:user_id', array(':user_id' => $user_id))
        ;

        $result = $data->queryRow();
        return $result;
    }

    public function insertData($input, $file)
    {
        $model = new Venue;
        $model->attributes = $input['Venue'];
        $model->vn_user_id = $input['Venue']['vn_user_id'];
        $model->vn_name = $input['Venue']['vn_name'];
        $model->vn_address = $input['Venue']['vn_address'];
        $model->vn_phone = $input['Venue']['vn_phone'];
        $model->vn_fax = $input['Venue']['vn_fax'];
        $model->vn_email = $input['Venue']['vn_email'];
        $model->vn_website = $input['Venue']['vn_website'];
        $model->vn_description = $input['Venue']['vn_description'];
        $model->vn_longitude = $input['Venue']['vn_longitude'];
        $model->vn_latitude = $input['Venue']['vn_latitude'];
        $model->vn_photo = (count($file) != 0) ? Helper::uploadImage($file, 'venue') : null;

        return ($model->save()) ? true : false;
    }

    public function updateData($input, $file)
    {
        $model = $this->getVenueById($input['Venue']['vn_id']);

        $model->vn_name = $input['Venue']['vn_name'];
        $model->vn_address = $input['Venue']['vn_address'];
        $model->vn_phone = $input['Venue']['vn_phone'];
        $model->vn_fax = $input['Venue']['vn_fax'];
        $model->vn_email = $input['Venue']['vn_email'];
        $model->vn_website = $input['Venue']['vn_website'];
        $model->vn_description = $input['Venue']['vn_description'];
        $model->vn_longitude = $input['Venue']['vn_longitude'];
        $model->vn_latitude = $input['Venue']['vn_latitude'];
        $model->vn_photo = (count($file) != 0) ? Helper::updateImage('venue', $model->vn_photo) : $model->vn_photo;

        return ($model->save()) ? true : false;
    }

    public function autocompleteVenue()
    {
        $data = Yii::app()->db->createCommand()
            ->select('vn_id, vn_name')
            ->from('tbl_venue')
//            ->where(array('like', 'vn_name', "%" . $filter . "%"))
        ;

        return $data->queryAll();
    }
}