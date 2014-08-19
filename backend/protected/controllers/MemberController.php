<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/8/14
 * Time: 11:11 AM
 */

class MemberController extends Controller
{
    public $layout = '//layouts/layout';

    public function actionIndex()
    {
        if(Yii::app()->request->isAjaxRequest)
        {
            $model = new Member();
            $data = $model->getAllData($_GET);
            echo CJavaScript::jsonEncode($data);
            Yii::app()->end();
        }

        $this->render('index');
    }

    public function actionCreate()
    {
        if(isset($_POST['Member']))
        {
            $model = new Member();
            $user = new User();

            $_POST['User']['usr_email'] = $_POST['Member']['mem_email'];
            $_POST['User']['usr_type_id'] = 4;

//            echo "<pre>";
//            print_r($_POST);
//            echo "</pre>";
//            exit;

//            if($user->insertUser())
        }

        $model = Member::model()->find('mem_user_id=:user_id', array(':user_id' => Yii::app()->user->usrid));
        $eo = Eo::model()->find('eo_user_id=:user_id', array(':user_id' => Yii::app()->user->usrid));
        $venue = Venue::model()->find('vn_user_id=:user_id', array(':user_id' => Yii::app()->user->usrid));
        $list_venue = Venue::model()->findAll();
        $interest = Interest::model()->findAll();

        $this->render('create', array(
            'model' => $model,
            'eo' => $eo,
            'venue' => $venue,
            'list_venue' => CHtml::listData($list_venue, 'vn_id', 'vn_name'),
            'interest' => $interest
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
        $model = new Member();

        if(isset($_POST['Member']))
        {
            if($model->updateMember($_POST))
                $this->redirect(Yii::app()->createUrl('member/index'));
        }

        $data = $model->getMemberById($_REQUEST['id']);

        $this->render('update', array(
            'model' => $data,
        ));
    }
}