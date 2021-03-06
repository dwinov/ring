<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/8/14
 * Time: 9:20 PM
 */

class Helper
{
    public static function generateToken()
    {
        $length = 10;
        $characters = '!@#$%^&*()_1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return md5($randomString);
    }

    public static function uploadImage($file, $folder, $myimage = 'myimage')
    {
        $file_image = CUploadedFile::getInstanceByName($myimage);

        $filename = md5($file_image->name);
        $type = explode('.', $file_image->name);
        $pathImage = Yii::getPathOfAlias('webroot') . '/images/upload/' . $folder . '/' . $filename . '.' . end($type);

        if(self::checkDirectories($folder) == true)
        {
            if($file_image->saveAs($pathImage))
            {
                return '/images/upload/' . $folder . '/' . $filename . '.' . end($type);
            }else{
                return null;
            }
        }else{
            return null;
        }
    }

    public static function updateImage($folder, $oldImage)
    {
        $file_image = CUploadedFile::getInstanceByName('myimage');

        $filename = md5($file_image->name);
        $type = explode('.', $file_image->name);
        $pathImage = Yii::getPathOfAlias('webroot') . '/images/upload/' . $folder . '/' . $filename . '.' . end($type);

        if(self::checkDirectories($folder) == true)
        {
            if($file_image->saveAs($pathImage))
            {
                self::deleteImage($oldImage);
                return '/images/upload/' . $folder . '/' . $filename . '.' . end($type);
            }else{
                return null;
            }
        }else{
            return null;
        }
    }

    public static function deleteImage($image)
    {
        if(!empty($image))
        {
            if(file_exists(Yii::getPathOfAlias('webroot') . $image))
            {
                unlink(Yii::getPathOfAlias('webroot') . $image);
            }
        }
    }

    public static function checkDirectories($dirname)
    {
        if(!file_exists(Yii::getPathOfAlias('webroot') . '/images/upload/'))
        {
            if(mkdir(Yii::getPathOfAlias('webroot') . '/images/upload', 0777, true))
            {
                if(!file_exists(Yii::getPathOfAlias('webroot') . '/images/upload' . '/' . $dirname . '/'))
                {
                    mkdir(Yii::getPathOfAlias('webroot') . '/images/upload' . '/' . $dirname . '/', 0777, true);
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            if(!file_exists(Yii::getPathOfAlias('webroot') . '/images/upload' . '/' . $dirname . '/'))
            {
                mkdir(Yii::getPathOfAlias('webroot') . '/images/upload' . '/' . $dirname . '/', 0777, true);
                return true;
            }else{
                return true;
            }
        }
    }

    public static function sendEmail($view, $model, $subject)
    {
        $message = new YiiMailMessage;
        $message->view = $view;
        $sid = 1;
        $criteria = new CDbCriteria();
        $criteria->condition = "studentID=".$sid."";
        $message->subject = $subject;
        $message->setBody(array('data', $model), 'text/html');
        $message->addTo($model->usr_email);
        $message->from = 'web.ringpro@gmail.com';

        if (Yii::app()->mail->send($message)){
            return true;
        }else{
            return false;
        }
    }

    public static function convertModelToArray($models) {
        if (is_array($models))
            $arrayMode = TRUE;
        else {
            $models = array($models);
            $arrayMode = FALSE;
        }

        $result = array();
        foreach ($models as $model) {
            $attributes = $model->getAttributes();
            $relations = array();
            foreach ($model->relations() as $key => $related) {
                if ($model->hasRelated($key)) {
                    $relations[$key] = convertModelToArray($model->$key);
                }
            }
            $all = array_merge($attributes, $relations);

            if ($arrayMode)
                array_push($result, $all);
            else
                $result = $all;
        }
        return $result;
    }

    public static function decodeImage()
    {

    }
}