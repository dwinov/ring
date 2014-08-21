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

    public static function uploadImage($file, $folder)
    {
        $file_image = CUploadedFile::getInstanceByName('myimage');

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

    public static function compareMonth($monthArr)
    {
        $newArr = array();
        for($i = 0; $i < count($monthArr); $i++)
        {
            switch($monthArr[$i])
            {
                case 'Jan':
                    array_push($newArr, 1);
                    break;
                case 'Feb':
                    array_push($newArr, 2);
                    break;
                case 'Mar':
                    array_push($newArr, 3);
                    break;
                case 'Apr':
                    array_push($newArr, 4);
                    break;
                case 'Mei':
                    array_push($newArr, 5);
                    break;
                case 'Jun':
                    array_push($newArr, 6);
                    break;
                case 'Jul':
                    array_push($newArr, 7);
                    break;
                case 'Aug':
                    array_push($newArr, 8);
                    break;
                case 'Sep':
                    array_push($newArr, 9);
                    break;
                case 'Okt':
                    array_push($newArr, 10);
                    break;
                case 'Nov':
                    array_push($newArr, 11);
                    break;
                case 'Dec':
                    array_push($newArr, 12);
                    break;
            }
        }

        sort($newArr);

        $result = array();
        for($i = 0; $i < count($newArr); $i++)
        {
            switch($newArr[$i])
            {
                case 1:
                    array_push($result, 'Jan');
                    break;
                case 2:
                    array_push($result, 'Feb');
                    break;
                case 3:
                    array_push($result, 'Mar');
                    break;
                case 4:
                    array_push($result, 'Apr');
                    break;
                case 5:
                    array_push($result, 'Mei');
                    break;
                case 6:
                    array_push($result, 'Jun');
                    break;
                case 7:
                    array_push($result, 'Jul');
                    break;
                case 8:
                    array_push($result, 'Aug');
                    break;
                case 9:
                    array_push($result, 'Sep');
                    break;
                case 10:
                    array_push($result, 'Okt');
                    break;
                case 11:
                    array_push($result, 'Nov');
                    break;
                case 12:
                    array_push($result, 'Dec');
                    break;
            }
        }

        return $result;
    }

    public static function decodeImage()
    {

    }
}