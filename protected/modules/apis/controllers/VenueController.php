<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/14/14
 * Time: 3:16 PM
 */

class VenueController extends ParentController
{
    public $layout = false;
    public $model;

    public function __construct()
    {
        $this->model = new Venue();
    }

    public function actionIndex()
    {
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
            {
                $event = new Event();
                $result = $this->model->getAllVenueMobile();

                foreach($result as $key => $rest)
                {
                    $result[$key]['number_of_events'] = $event->getEventByVenueId($rest['vn_id'], true);
                }

                $this->sendAjaxResponse($result);
            }else{
                $result = array('result' => false, 'value' => "Token is expaired");
                $this->sendAjaxResponseString($result);
            }
        }else{
            $result = array('result' => false, 'value' => "Token is lost");
            $this->sendAjaxResponseString($result);
        }
    }

    public function actionDdlist()
    {
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
            {
                $venue = Venue::model()->findAll();
                $result = array();
                foreach($venue as $vn)
                {
                    $tamp = array();
                    $tamp['vn_id'] = $vn->vn_id;
                    $tamp['vn_name'] = $vn->vn_name;
                    array_push($result, $tamp);
                }
                $this->sendAjaxResponse($result);
            }else{
                $result = array('result' => false, 'value' => "Token is expaired");
                $this->sendAjaxResponseString($result);
            }
        }else{
            $result = array('result' => false, 'value' => "Token is lost");
            $this->sendAjaxResponseString($result);
        }
    }

    public function actionView()
    {
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
            {
                $event = new Event();
                $result = $this->model->getVenueByIdMobile($_GET['vn_id']);
                $result['list_events'] = $event->getEventByVenueId($_GET['vn_id']);
                $this->sendAjaxResponse($result);
            }else{
                $result = array('result' => false, 'value' => "Token is expaired");
                $this->sendAjaxResponseString($result);
            }
        }else{
            $result = array('result' => false, 'value' => "Token is lost");
            $this->sendAjaxResponseString($result);
        }
    }
}