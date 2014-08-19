<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/11/14
 * Time: 2:42 PM
 */

class DashboardController extends Controller
{
    public $layout = '//layouts/layout';

    /**
     * @return array action filters
     */
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
                'actions' => array('index'),
                'users' => array('@'),
                'expression' => 'Yii::app()->user->roleid == 1'
            ),
            array(
                'deny',
                'users' => array('*')
            ),
        );
    }

    public function actionIndex()
    {
        $model_member = new Member();
        $model_event = new Event();
        $this->render('index');
    }
}