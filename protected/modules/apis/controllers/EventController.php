<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/14/14
 * Time: 3:00 PM
 */

class EventController extends ParentController
{
    public $layout = "";
    public $model;

    public function __construct()
    {
        $this->model = new Event();
    }

    public function actionIndex()
    {
        if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
        {
            $result = $this->model->getAllEvent();
            $this->sendAjaxResponse($result);
        }else{
            $result = array('result' => false, 'value' => "Token is lost");
            $this->sendAjaxResponseString($result);
        }
    }

    public function actionView()
    {
        if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
        {
            $result = $this->model->getEventByIdAPI($_POST['evt_id']);
            $this->sendAjaxResponse($result);
        }else{
            $result = array('result' => false, 'value' => "Token is lost");
            $this->sendAjaxResponseString($result);
        }
    }
}