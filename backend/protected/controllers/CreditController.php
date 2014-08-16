<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/16/14
 * Time: 7:12 PM
 */

class CreditController extends Controller
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
                'actions' => array('index','create'),
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
        $model = CreditBroadcast::model()->findByPk(1);

        if(empty($model))
        {
            $this->render('index');
        }else{
            $this->render('index', array(
                'model' => $model
            ));
        }
    }

    public function actionCreate()
    {
        if(isset($_POST['Cb']))
        {
            $model = new CreditBroadcast();

            if($model->insertData($_POST))
            {
                $this->redirect(array('credit/index'));
            }else{
                $this->redirect(array('credit/index'));
            }
        }
    }

    public function actionUpdate()
    {
        if(isset($_POST['Cb']))
        {
            $model = new CreditBroadcast();

            if($model->updateData($_POST))
            {
                $this->redirect(array('credit/index'));
            }else{
                $this->redirect(array('credit/index'));
            }
        }
    }
}