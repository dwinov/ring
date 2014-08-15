<?php

class SiteController extends Controller
{
    public $layout = 'layout';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $this->layout = false;
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
        $this->redirect(Yii::app()->createUrl('site/login'));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
        $this->layout = false;
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate($model->attributes) && $model->login())
            {
                switch(Yii::app()->user->roleid)
                {
                    case 1:
                        $this->redirect(Yii::app()->createUrl('dashboard/index'));
                        break;
                    case 2:
                        $this->redirect(Yii::app()->createUrl('member/index'));
                        break;
                    case 3:
                        $this->redirect(Yii::app()->createUrl('member/index'));
                        break;
                }
            }
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function actionForgot()
    {
        $this->layout = false;

        if(isset($_POST['email']))
        {
            $model = User::model()->findByAttributes(array('usr_email' => $_POST['email']));
            if($model)
            {
                if (empty($model->usr_validation_key)) {
                    $model->usr_validation_key=md5($model->usr_email);
                    $model->save();
                }

                $_POST['validation_key'] = $model->usr_validation_key;

                if(Helper::sendEmail('forgotpassword', $model, 'Forgot Password Ring Pro'))
                {
                    $this->redirect(Yii::app()->homeUrl);
                }else{
                    $this->redirect(Yii::app()->homeUrl);
                }
            }
        }

        $this->render('forgot');
    }

    public function actionResetPassword($v)
    {
        $this->layout=false;
        $model=User::model()->findByAttributes(array('usr_validation_key'=>$v));
        if($model){
            $this->render('resetpassword',array('model'=>$model));
        }else{
            $this->redirect(array('site/login'));
        }
    }

    public function actionChangePassword()
    {
        $this->layout=false;
        if (isset($_POST['validation_key'])) {
            if ($_POST['password_baru']===$_POST['password_baru_retype']) {
                $model=User::model()->findByAttributes(array('usr_validation_key'=>$_POST['validation_key']));
                if ($model) {
                    $model->usr_password=md5($_POST['password_baru']);
                    $model->usr_validation_key = "";
                    if($model->save()){
//                        Yii::app()->user->setFlash('success', "Password has been reset. Please use your new password to login!");
                        $this->redirect(array('site/login'));
                    }else{
//                        Yii::app()->user->setFlash('error', "Failed password reset. Please try again!");
                        $this->redirect(array('site/login'));
                    }
                } else {
                    $result=0;
//                    Yii::app()->user->setFlash('error', "Failed to reset your password!");
                }
            } else {
//                Yii::app()->user->setFlash('error', "Retype new password doesnt match!");
            }
        } else {
            $result=0;
//            Yii::app()->user->setFlash('error', "Failed to reset your password!");
        }
        $this->render('resetpassword',array('model'=>$model));
    }
}