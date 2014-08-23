<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/22/14
 * Time: 2:52 PM
 */

class FriendController extends ParentController
{
    public $layout = false;
    public $model;

    public function __construct()
    {
        $this->model = new Friend();
    }

    public function actionIndex()
    {
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
            {
                $result = $this->model->getAllVenue();
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

    public function actionInvite()
    {
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            $user = User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN']));
            if($user)
            {
                $model_member = new Member();
                $member = $model_member->getMemberByUserId($user->usr_id);
                $friendArr = explode(',', $_POST['friends_id']);
                for($i = 0; $i < count($friendArr); $i++)
                {
                    if($this->model->insertData($member['mem_id'], $friendArr[$i], 'pending'))
                    {
                        $result = array('result' => true, 'value' => "Friends Has Been Infited.");
                    }else{
                        $result = array('result' => false, 'value' => "Failed to infited Friends, please try again.");
                    }
                }
                $this->sendAjaxResponseString($result);
            }else{
                $result = array('result' => false, 'value' => "Token is expaired");
                $this->sendAjaxResponseString($result);
            }
        }else{
            $result = array('result' => false, 'value' => "Token is lost");
            $this->sendAjaxResponseString($result);
        }
    }

    public function actionResponse()
    {
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            $user = User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN']));
            if($user)
            {
                $model_member = new Member();
                $member = $model_member->getMemberByUserId($user->usr_id);
                $status = ($_POST['status_id'] == 1) ? "accept" : "decline";

                $friendArr = explode(',', $_POST['friends_id']);
                for($i = 0; $i < count($friendArr); $i++)
                {
                    $this->model->updateData($member['mem_id'], $friendArr[$i], $status);
                }
                $result = array('result' => true, 'value' => "Success.");
                $this->sendAjaxResponseString($result);
            }else{
                $result = array('result' => false, 'value' => "Token is expaired");
                $this->sendAjaxResponseString($result);
            }
        }else{
            $result = array('result' => false, 'value' => "Token is lost");
            $this->sendAjaxResponseString($result);
        }
    }

    public function actionInvitation()
    {
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            $user = User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN']));
            if($user)
            {
                $model_member = new Member();
                $member = $model_member->getMemberByUserId($user->usr_id);
                $result = $this->model->getInvitataion($member['mem_id']);
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