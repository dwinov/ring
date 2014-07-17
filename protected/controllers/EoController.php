<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/4/14
 * Time: 12:45 PM
 */

class EoController extends Controller
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
                'actions' => array('index','create', 'update', 'delete', 'client'),
                'users' => array('@'),
                'expression' => 'Yii::app()->user->roleid == 1 || Yii::app()->user->roleid == 2'
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
            $model = new Eo();
            $data = $model->getAllData($_GET);
            echo CJavaScript::jsonEncode($data);
            Yii::app()->end();
        }

        $this->render('index');
    }

    public function actionCreate()
    {
        if(isset($_POST['Eo']))
        {
            $model = new Eo();

            if($model->insertData($_POST, $_FILES))
            {
                $this->redirect(array('eo/index'));
            }else{
                $this->redirect(array('eo/index'));
            }

        }
        $this->render('create');
    }

    public function actionUpdate($id)
    {
        $model = new Eo();

        if(isset($_POST['Eo']))
        {
            if($model->updateData($_POST, $_FILES))
            {
                $this->redirect(array('eo/index'));
            }else{
                $this->redirect(array('eo/index'));
            }
        }

        $data = $model->getEoById($id);

        $this->render('update', array(
            'model' => $data,
        ));
    }

    public function actionClient()
    {
        $model = new Eo();

        if(isset($_POST['Eo']))
        {
            if(!isset($_POST['Eo']['eo_id']))
            {
                if($model->insertData($_POST, $_FILES))
                {
                    $this->redirect(array('member/index'));
                }else{
                    $this->redirect(array('member/index'));
                }
            }else{
                if($model->updateData($_POST, $_FILES))
                {
                    $this->redirect(array('member/index'));
                }else{
                    $this->redirect(array('member/index'));
                }
            }
        }else{
            $this->redirect(array('member/index'));
        }
    }

    public function actionDelete($id)
    {
        $model = new Eo();
        $model->getEoById($id)->delete();
    }
}