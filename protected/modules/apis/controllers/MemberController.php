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
        $member = new Member();

        if(!empty($_POST['User']['usr_email']) && !empty($_POST['User']['usr_password']))
        {
            $user = User::model()->find('usr_email=:email', array(':email' => $_POST['User']['usr_email']));

            if(!isset($user))
            {
                $user = new User();
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
                            $result = array();
                            $result['usr_id'] = $user->usr_id;
                            $result['usr_type_id'] = $user->usr_type_id;
                            $result['usr_token'] = $user->usr_token;
                            $this->sendAjaxResponse($result);
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
            }else{
                $result = array('result' => false, 'value' => "Email already exist.");
                $this->sendAjaxResponseString($result);
            }
        }else{
            $result = array('result' => false, 'value' => "Email and Password cannot be empty.");
            $this->sendAjaxResponseString($result);
        }
    }

    public function actionUpdate()
    {
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            $user = User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN']));
            if($user)
            {

                $model = new Member();
                $member = $model->getMemberByUserId($user->usr_id);

                $data = array();
                $data['Member'] = array();

                $data['Member']['mem_id'] = $member['mem_id'];
                $data['Member']['mem_location'] = $_POST['mem_location'];
                $data['Member']['mem_birthdate'] = $_POST['mem_birthdate'];
                $data['Member']['mem_gender'] = $_POST['mem_gender'];
                $data['Member']['mem_phone'] = $_POST['mem_phone'];

                if($model->updateMember($data, $_FILES))
                {
                    $result = array('result' => true, 'value' => "profile has been updated.");
                    $this->sendAjaxResponseString($result);
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