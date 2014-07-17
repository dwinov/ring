<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/14/14
 * Time: 3:16 PM
 */

class VenueController extends ParentController
{
    public $layout = "";
    public $model;

    public function __construct()
    {
        $this->model = new Venue();
    }

    public function actionIndex()
    {
        if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
        {
            $result = $this->model->getAllVenue();
            $this->sendAjaxResponse($result);
        }else{
            $result = array('result' => false, 'value' => "Token is lost");
            $this->sendAjaxResponseString($result);
        }
    }

    public function actionDdlist()
    {
        if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
        {
            $venue = Venue::model()->findAll();
            $result = CHtml::listData($venue, 'vn_id', 'vn_name');
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
            $result = $this->model->getEventByIdAPI($_POST['vn_id']);
            $this->sendAjaxResponse($result);
        }else{
            $result = array('result' => false, 'value' => "Token is lost");
            $this->sendAjaxResponseString($result);
        }

        $json = file_get_contents('php://input');
        $obj = json_decode($json);

        $result = $this->model->getVenueById($obj->id);
        $this->sendAjaxResponse($result);
    }
}