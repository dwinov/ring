<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/15/14
 * Time: 1:41 PM
 */

class Interest extends CActiveRecord
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
        return '{{interest}}';
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
            ->from('tbl_interest')
        ;

        $attr = array();
        $where = array('and');

        $allData = count($data->queryAll());

        //search specific record
        if(!empty($filter['sSearch'])){
            $search = $filter['sSearch'];
            $where[] = 'int_name LIKE :name';
            $attr[':name'] = "'%$search%'";
        }

        $data = Yii::app()->db->createCommand()
            ->from('tbl_interest')
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

    public function insertData($input)
    {
        $model = new Interest;
        $model->attributes = $input['Interest'];
        $model->int_name = $input['Interest']['int_name'];
        $model->int_create_at = strtotime(date('d-m-Y H:i:s'));

        return ($model->save()) ? true : false;
    }

    public function updateData($input)
    {
        $model = $this->getInterestById($input['Interest']['int_id']);

        $model->int_name = $input['Interest']['int_name'];

        return ($model->save()) ? true : false;
    }

    public function getInterestById($id)
    {
        $model = Interest::model()->findByPk($id);
        if($model === null)
            throw new CHttpException(404,'The requested page does not exist!.');
        return $model;
    }
}