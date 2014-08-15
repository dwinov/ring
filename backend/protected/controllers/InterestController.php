<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/15/14
 * Time: 2:32 PM
 */

class InterestController extends Controller
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
                'actions' => array('index','create', 'update', 'delete'),
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
        if(Yii::app()->request->isAjaxRequest)
        {
            $model = new Interest();
            $data = $model->getAllData($_GET);
            echo CJavaScript::jsonEncode($data);
            Yii::app()->end();
        }

        $this->render('index');
    }

    public function actionCreate()
    {
        if(isset($_POST['Interest']))
        {
            $model = new Interest();

            if($model->insertData($_POST))
            {
                $this->redirect(array('interest/index'));
            }else{
                $this->redirect(array('interest/create/'));
            }

        }
        $this->render('create');
    }

    public function actionUpdate($id)
    {
        $model = new Interest();

        if(isset($_POST['Interest']))
        {
            if($model->updateData($_POST))
            {
                $this->redirect(array('interest/index'));
            }else{
                $this->redirect(array('interest/update/' . $id));
            }
        }

        $data = $model->getInterestById($id);

        $this->render('update', array(
            'model' => $data
        ));
    }

    public function actionDelete($id)
    {
        $model = new Interest();
        $model->getInterestById($id)->delete();
    }
}