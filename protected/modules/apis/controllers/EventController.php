<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/14/14
 * Time: 3:00 PM
 */

class EventController extends ParentController
{
    public $layout = false;
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
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
            {
                $result = $this->model->getAllEventForMember();
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

    /**
     * this is for ring pro
     */
    public function actionList()
    {
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
            {
                $result = $this->model->getAllEvent(true, $_SERVER['HTTP_TOKEN']);
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

    public function actionCreate()
    {
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
            {
                $user = User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN']));
                $eo = Eo::model()->find('eo_user_id=:usr_id', array(':usr_id' => $user->usr_id));
                $_POST['evt_owner_id'] = $eo->eo_id;
				$event = array();
				$event['Event'] = array();
				$event['Event'] = $_POST;
				
				if($event['Event']['evt_ticketing'] == 'true')
				{
					$event['Event']['evt_ticketing'] = true;
				}elseif($event['Event']['evt_ticketing'] == 'false')
				{
					$event['Event']['evt_ticketing'] = false;
				}
				
                if($this->model->insertData($event, $_FILES) == true)
                {
                    $result = array('result' => true, 'value' => Yii::app()->db->getLastInsertId());
                    $this->sendAjaxResponseString($result);
                }else{
                    $result = array('result' => false, 'value' => "Saving Failed");
                    $this->sendAjaxResponseString($result);
                }
            }else{
                $result = array('result' => false, 'value' => "The token is expaired");
                $this->sendAjaxResponseString($result);
            }
        }else{
            $result = array('result' => false, 'value' => "The token is lost");
            $this->sendAjaxResponseString($result);
        }
    }

    public function actionView()
    {
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
            {
                $result = $this->model->getEventByIdAPI($_POST['evt_id']);
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

    public function actionGallery()
    {
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
            {
                if(count($_FILES) != 0)
                {
                    $model_gallery = new GalleryEvent();
                    if($model_gallery->insertData($_POST['event_id'], $_FILES))
                    {
                        $result = array('result' => true, 'value' => "Event has been saved.");
                        $this->sendAjaxResponseString($result);
                    }else{
                        $result = array('result' => false, 'value' => "Saving Failed");
                        $this->sendAjaxResponseString($result);
                    }
                }else{
                    $result = array('result' => false, 'value' => "No Image has been sent.");
                    $this->sendAjaxResponseString($result);
                }
            }else{
                $result = array('result' => false, 'value' => "The token is expaired");
                $this->sendAjaxResponseString($result);
            }
        }else{
            $result = array('result' => false, 'value' => "The token is lost");
            $this->sendAjaxResponseString($result);
        }
    }
}