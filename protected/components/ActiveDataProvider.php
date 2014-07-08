<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 6/29/14
 * Time: 3:34 PM
 */

class ActiveDataProvider extends CActiveDataProvider implements AjaxResponseInterface
{
    public function getResponseData()
    {
        $result = array();

        foreach($this->getData() as $record)
        {
            $result[] = $record->getAttributes();
        }

        return $result;
    }

    public function getErrors()
    {
        return [];
    }
} 