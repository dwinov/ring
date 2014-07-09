<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/4/14
 * Time: 1:31 PM
 */
class Eo extends CActiveRecord
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
        return '{{eo}}';
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
            ->from('tbl_eo')
        ;

        $attr = array();
        $where = array('and');

        $allData = count($data->queryAll());

        //search specific record
        if(!empty($filter['sSearch'])){
            $search = $filter['sSearch'];
            $where[] = 'eo_name LIKE :name OR eo_address LIEK :name OR eo_email LIKE :name';
            $attr[':name'] = "'%$search%'";
        }

        $data = Yii::app()->db->createCommand()
            ->from('tbl_eo')
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

    public function getEoById($id)
    {
        $model = Eo::model()->findByPk($id);
        if($model === null)
            throw new CHttpException(404,'The requested page does not exist!.');
        return $model;
    }

    public function insertData($input)
    {
        $model = new Eo;
        $model->attributes = $input['Eo'];
        $model->eo_user_id = (isset($input['Eo']['eo_user_id'])) ? $input['Eo']['eo_user_id'] : Yii::app()->user->usrid;
        $model->eo_name = $input['Eo']['eo_name'];
        $model->eo_address = $input['Eo']['eo_address'];
        $model->eo_phone = $input['Eo']['eo_phone'];
        $model->eo_fax = $input['Eo']['eo_fax'];
        $model->eo_email = $input['Eo']['eo_email'];
        $model->eo_website = $input['Eo']['eo_website'];
        $model->eo_description = $input['Eo']['eo_description'];

        return ($model->save()) ? true : false;
    }

    public function updateData($input)
    {
        $model = $this->getEoById($input['Eo']['eo_id']);

        $model->eo_name = $input['Eo']['eo_name'];
        $model->eo_address = $input['Eo']['eo_address'];
        $model->eo_phone = $input['Eo']['eo_phone'];
        $model->eo_fax = $input['Eo']['eo_fax'];
        $model->eo_email = $input['Eo']['eo_email'];
        $model->eo_website = $input['Eo']['eo_website'];
        $model->eo_description = $input['Eo']['eo_description'];

        return ($model->save()) ? true : false;
    }
}