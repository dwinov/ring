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

    /**
     * this is for ring
     */
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

    /**
     * this is for ring pro
     */
    public function actionList()
    {
        if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
        {
            $result = $this->model->getAllEvent(true, $_SERVER['HTTP_TOKEN']);
            $this->sendAjaxResponse($result);
        }else{
            $result = array('result' => false, 'value' => "Token is lost");
            $this->sendAjaxResponseString($result);
        }
    }

    public function actionCreate()
    {
        if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
        {
            $user = User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN']));
            $eo = Eo::model()->find('eo_user_id=:usr_id', array(':usr_id' => $user->usr_id));
            $_POST['Event']['evt_owner_id'] = $eo->eo_id;
            $this->model->insertData($_POST, $_FILES);
            $result = array('result' => true, 'value' => "Event has been saved.");
            $this->sendAjaxResponseString($result);
        }else{
            $result = array('result' => false, 'value' => "Saving Failed");
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