<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/15/14
 * Time: 4:42 PM
 */

class RegionController extends Controller
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
            $model = new Region();
            $data = $model->getAllData($_GET);
            echo CJavaScript::jsonEncode($data);
            Yii::app()->end();
        }

        $this->render('index');
    }

    public function actionCreate()
    {
        if(isset($_POST['Region']))
        {
            $model = new Region();

            if($model->insertData($_POST))
            {
                $this->redirect(array('region/index'));
            }else{
                $this->redirect(array('region/create'));
            }

        }
        $this->render('create');
    }

    public function actionUpdate($id)
    {
        $model = new Region();

        if(isset($_POST['Region']))
        {
            if($model->updateData($_POST))
            {
                $this->redirect(array('region/index'));
            }else{
                $this->redirect(array('region/update/' . $id));
            }
        }

        $data = $model->getRegionById($id);

        $this->render('update', array(
            'model' => $data
        ));
    }

    public function actionDelete($id)
    {
        $model = new Region();
        $model->getRegionById($id)->delete();
    }
}