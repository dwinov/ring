<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/18/14
 * Time: 6:19 PM
 */

class GalleryEO extends CActiveRecord
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
        return '{{gallery_eo}}';
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
        $eo = Eo::model()->find('eo_user_id=:user_id', array('user_id' => Yii::app()->user->usrid));
        $data = Yii::app()->db->createCommand()
            ->from('tbl_gallery_eo')
            ->where('glr_owner_id=:eo_id', array('eo_id' => $eo->eo_id))
        ;

        return $data->queryAll();
    }

    public function insertData($input, $file)
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
        $model->eo_photo = Helper::uploadImage($file, 'eo');

        return ($model->save()) ? true : false;
    }

    public function updateData($input, $file)
    {
        $model = $this->getEoById($input['Eo']['eo_id']);

        $model->eo_name = $input['Eo']['eo_name'];
        $model->eo_address = $input['Eo']['eo_address'];
        $model->eo_phone = $input['Eo']['eo_phone'];
        $model->eo_fax = $input['Eo']['eo_fax'];
        $model->eo_email = $input['Eo']['eo_email'];
        $model->eo_website = $input['Eo']['eo_website'];
        $model->eo_description = $input['Eo']['eo_description'];
        $model->eo_photo = Helper::updateImage('eo', $model->eo_photo);

        return ($model->save()) ? true : false;
    }
}