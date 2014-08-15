<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/13/14
 * Time: 3:39 PM
 */

class MemberController extends ParentController
{
    public $layout = "";

    public function actionIndex()
    {
        $user = new User();
        $member = new Member();

        $user_id = $user->insertUser($_POST['User']);

        if($user_id != null)
        {
            if($member->insertMember($_POST, $user_id))
            {
                $user = User::model()->find('usr_email=:email', array(':email' => $_POST['User']['usr_email']));

                if($user != null && md5($_POST['User']['usr_password']) == $user->usr_password)
                {
                    $token = Helper::generateToken();
                    $user->usr_token = $token;
                    $user->save();
                    $result = array('result' => true, 'value' => $token);
                    $this->sendAjaxResponseString($result);
                }
                else
                {
                    $result = array('result' => false, 'value' => "Failed to Auto Login.");
                    $this->sendAjaxResponseString($result);
                }
            }
            else
            {
                $result = array('result' => false, 'value' => "Failed to save data member.");
                $this->sendAjaxResponseString($result);
            }
        }
        else
        {
            $result = array('result' => false, 'value' => "Failed to save data user.");
            $this->sendAjaxResponseString($result);
        }

    }

    public function actionUpdate()
    {
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
            {
                $model = new Member();

                if($model->updateMember($_POST))
                {
                    $result = array('result' => true);
                    $this->sendAjaxResponse(null, $result);
                }else{
                    $result = array('result' => false, 'value' => "update data failed");
                    $this->sendAjaxResponseString($result);
                }
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