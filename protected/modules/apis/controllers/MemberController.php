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
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $objArr = (array)$obj;

        $user = new User();
        $member = new Member();

        $user_id = $user->insertUser($objArr['User']);

        if($user_id != null)
        {
            if($member->insertMember($objArr, $user_id))
            {
                $login = new LoginForm();

                $login->username = $objArr['User']['usr_email'];
                $login->password = $objArr['User']['usr_password'];

                if($login->validate($login->attributes) && $login->login())
                {
                    $token = Helper::generateToken();
                    $user->usr_token = $token;
                    $user->save();
                    $result = array('result' => true, 'value' => $token);
                    $this->sendAjaxResponse(null, $result);
                }
                else
                {
                    $result = array('result' => false, 'value' => null);
                    $this->sendAjaxResponse(null, $result);
                }
            }
            else
            {
                $result = array('result' => false, 'value' => null);
                $this->sendAjaxResponse(null, $result);
            }
        }
        else
        {
            $result = array('result' => false, 'value' => null);
            $this->sendAjaxResponse(null, $result);
        }

    }

    public function actionUpdate()
    {
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $objArr = (array)$obj;

        $model = new Member();

        if($model->updateMember($objArr))
        {
            $result = array('result' => true);
            $this->sendAjaxResponse(null, $result);
        }else{
            $result = array('result' => false);
            $this->sendAjaxResponse(null, $result);
        }
    }
}