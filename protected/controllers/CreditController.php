<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/16/14
 * Time: 5:28 PM
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
                'actions' => array('index','create', 'update', 'delete', 'payment'),
                'users' => array('@'),
                'expression' => 'Yii::app()->user->roleid == 2'
            ),
            array(
                'deny',
                'users' => array('*')
            ),
        );
    }

    public function actionIndex()
    {
        $model_eo = new Eo();
        $eo = $model_eo->getEoByUserId(Yii::app()->user->usrid);

        $this->render('index', array(
            'eo_id' => $eo['eo_id']
        ));
    }

    public function actionCreate()
    {
        if(isset($_POST['Credit']))
        {
            $model = new Credit();

            $credit = $model->getCreditByEoId($_POST['Credit']['crt_eo_id']);

            if(empty($credit))
            {
                if($model->insertData($_POST))
                {
                    $this->redirect(array('credit/index'));
                }else{
                    $this->redirect(array('credit/index'));
                }
            }else{
                if($model->updateData($_POST))
                {
                    $this->redirect(array('credit/index'));
                }else{
                    $this->redirect(array('credit/index'));
                }
            }
        }
    }

    public function actionPayment()
    {
        if(isset($_POST['Credit']))
        {
            $total = ($_POST['Credit']['crt_credit'] / 1000) * 100000;
            $this->render('payment', array(
                'payment' => $total,
                'eo_id' => $_POST['Credit']['crt_eo_id']
            ));
        }

        $this->redirect(array('credit/index'));
    }
}