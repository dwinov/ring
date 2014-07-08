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
        $model = Member::model()->find('mem_user_id=:user_id', array(':user_id' => Yii::app()->user->usrid));
        $eo = Eo::model()->find('eo_user_id=:user_id', array(':user_id' => Yii::app()->user->usrid));
        $venue = Venue::model()->find('vn_user_id=:user_id', array(':user_id' => Yii::app()->user->usrid));
        $this->render('index', array(
            'model' => $model,
            'eo' => $eo,
            'venue' => $venue
        ));
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
                        $this->redirect(Yii::app()->createUrl('member/index'));
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

    public function actionUpdate()
    {
        if(isset($_POST['Member']))
        {
            $model = new Member();

            if($model->updateMember($_POST))
                $this->redirect(Yii::app()->createUrl('member/index'));
        }
    }
}