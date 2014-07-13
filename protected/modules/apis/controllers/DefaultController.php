<?php

class DefaultController extends ParentController
{
    public $layout = "";

	public function actionIndex()
	{
        $json = file_get_contents('php://input');
        $obj = json_decode($json);

        $user = User::model()->find('usr_email=:email', array(':email' => $obj->username));
        if($user != null && $user->validate($obj->password))
        {
            $token = Helper::generateToken();
            $user->usr_token = $token;
            $user->save();
            $result = array('result' => true, 'value' => $token);
            $this->sendAjaxResponse(null, $result);
        }else{
            $result = array('result' => true, 'value' => "Login Butut");
            $this->sendAjaxResponse(null, $result);
        }
	}

    public function actionLogout()
    {
        $json = file_get_contents('php://input');
        $obj = json_decode($json);

        $model = User::model()->find('usr_token=:token', array(':token' => $obj->token));
        $model->usr_token = null;
        $model->save();
        $result = array('result' => false, 'value' => null);
        $this->sendAjaxResponse(null, $result);
    }
}