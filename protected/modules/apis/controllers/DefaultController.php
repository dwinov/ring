<?php

class DefaultController extends ParentController
{
    public $layout = "";

	public function actionIndex()
	{
        $user = User::model()->find('usr_email=:email', array(':email' => $_POST['username']));
        if($user != null && md5($_POST['password']) == $user->usr_password)
        {
            $member = new Eo();
            $token = Helper::generateToken();
            $user->usr_token = $token;
            $user->save();
            $result = $member->getEoByUserId($user->usr_id);
            $result['usr_id'] = $user->usr_id;
            $result['usr_type_id'] = $user->usr_type_id;
            $result['usr_token'] = $user->usr_token;
            $this->sendAjaxResponse($result);
        }else{
            $result = array('result' => false, 'value' => "Login Failed");
            $this->sendAjaxResponseString($result);
        }
	}

    public function actionLogin()
    {
        $user = User::model()->find('usr_email=:email', array(':email' => $_POST['username']));
        if($user != null && md5($_POST['password']) == $user->usr_password)
        {
            $member = new Member();
            $token = Helper::generateToken();
            $user->usr_token = $token;
            $user->save();
            $mem = $member->getMemberByUserId($user->usr_id);
            $result = array();
            $result['usr_id'] = $user->usr_id;
            $result['usr_type_id'] = $user->usr_type_id;
            $result['usr_token'] = $user->usr_token;
            $result['mem_gender'] = $mem['mem_gender'];
            $result['mem_photo'] = $mem['mem_photo'];
            $result['mem_phone'] = $mem['mem_phone'];
            $result['mem_location'] = $mem['mem_location'];
            $result['mem_screen_name'] = $mem['mem_screen_name'];
            $result['mem_about_me'] = ($mem['mem_about_me'] != null) ? $mem['mem_about_me'] : 'Hi, my name is '.$mem['mem_screen_name'];
            $result['mem_birthdate'] = date('d-m-Y', $mem['mem_birthdate']);
            $this->sendAjaxResponse($result);
        }else{
            $result = array('result' => false, 'value' => "Login Failed");
            $this->sendAjaxResponseString($result);
        }
    }

    public function actionLogout()
    {
        $model = User::model()->find('usr_token=:token', array(':token' => $_POST['token']));
        $model->usr_token = null;
        $model->save();
        $result = array('result' => true, 'value' => null);
        $this->sendAjaxResponseString($result);
    }
}