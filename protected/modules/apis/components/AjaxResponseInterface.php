<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/13/14
 * Time: 2:31 PM
 */

interface AjaxResponseInterface{
    public function getResponseData();

    public function getErrors();
}