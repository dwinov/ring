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

    public static function decodeImage()
    {

    }
}