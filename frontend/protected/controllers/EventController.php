<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 9/5/14
 * Time: 2:57 AM
 */

class EventController extends Controller
{
    public $layout = 'layout';

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions' => array('index', 'error'),
                'users' => array('@'),
                'expression' => 'Yii::app()->user->roleid == 4'
            ),
            array(
                'deny',
                'users' => array('*')
            ),
        );
    }

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

    public function actionIndex()
    {
        $model_event = new Event();
        $event = $model_event->getEventById($_GET['id']);
        $other = $model_event->getOtherEvents($_GET['id']);

        $this->render('index', array(
            'event' => $event,
            'other' => $other
        ));
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
}