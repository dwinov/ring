<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/19/14
 * Time: 1:05 AM
 */

class GalleryVenue extends CActiveRecord
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
        return '{{gallery_venue}}';
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

    public function getAllData($id)
    {
        $data = Yii::app()->db->createCommand()
            ->from('tbl_gallery_venue')
            ->where('glr_vn_owner_id=:vn_id', array('vn_id' => $id))
        ;

        return $data->queryAll();
    }

    public function insertData($id, $file)
    {
        $model = new GalleryVenue;
        $model->glr_vn_owner_id = $id;
        $model->glr_vn_name = Helper::uploadImage($file, 'gallery_venue');
        $model->glr_vn_date = strtotime(date("d-m-Y H:i:s"));

        return ($model->save()) ? true : false;
    }

    public function getById($id)
    {
        $model = GalleryVenue::model()->findByPk($id);
        if($model === null)
            throw new CHttpException(404,'The requested page does not exist!.');
        return $model;
    }
}