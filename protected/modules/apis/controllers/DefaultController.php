<?php

class DefaultController extends ParentController
{
    public $layout = "";

	public function actionIndex()
	{
        $user = User::model()->find('usr_email=:email', array(':email' => $_POST['username']));
        if($user != null && md5($_POST['password']) == $user->usr_password)
        {
            $token = Helper::generateToken();
            $user->usr_token = $token;
            $user->save();
            $result = array('result' => true, 'value' => $token);
            $this->sendAjaxResponseString($result);
        }else{
            $result = array('result' => false, 'value' => "Login Butut");
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