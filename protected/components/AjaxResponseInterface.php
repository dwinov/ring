<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 6/29/14
 * Time: 3:30 PM
 */

interface AjaxResponseInterface{
    public function getResponseData();

    public function getErrors();
}