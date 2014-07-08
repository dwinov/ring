<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/8/14
 * Time: 11:11 AM
 */

class MemberController extends Controller
{
    public $layout = '//layouts/main';

    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionRegister()
    {
        if(isset($_POST['Member']) && isset($_POST['User']) && $_POST['tnc'] == 1)
        {
            $user = new User();
            $member = new Member();

            $user_id = $user->insertUser($_POST['User']);

            if($user_id != null)
            {
                if($member->insertMember($_POST, $user_id))
                {
                    $login = new LoginForm();

                    $login->username = $_POST['User']['usr_email'];
                    $login->password = $_POST['User']['usr_password'];

                    if($login->validate($login->attributes) && $login->login())
                    {
                        $this->redirect(Yii::app()->createUrl('eo/index'));
                    }
                    else
                    {
                        $this->redirect(Yii::app()->createUrl('site/login'));
                    }
                }
                else
                {
                    $this->redirect(Yii::app()->createUrl('site/login'));
                }
            }
            else
            {
                $this->redirect(Yii::app()->createUrl('site/login'));
            }
        }
        else
        {
            $this->redirect(Yii::app()->createUrl('site/login'));
        }
    }
}