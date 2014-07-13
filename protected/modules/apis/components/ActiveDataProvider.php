<?php

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