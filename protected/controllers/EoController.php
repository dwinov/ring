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
                'actions' => array('index','create', 'update', 'delete', 'client', 'uploader', 'delgal', 'detail'),
                'users' => array('@'),
                'expression' => 'Yii::app()->user->roleid == 1 || Yii::app()->user->roleid == 2'
            ),
            array(
                'allow',
                'actions' => array('index', 'detail'),
                'users' => array('@'),
                'expression' => 'Yii::app()->user->roleid == 3'
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

    public function actionUploader()
    {
        $model = new GalleryEO();

        if(count($_FILES) != 0)
        {
            $model->insertData($_GET['id'], $_FILES);
            Yii::app()->end();
        }

        $this->render('uploader', array(
            'model' => $model->getAllData($_GET['id'])
        ));
    }

    public function actionDelgal()
    {
        $model = new GalleryEO();
        $model->getById($_POST['id'])->delete();
    }

    public function actionDetail()
    {
        $model = new Eo();
        $model_glr_eo = new GalleryEO();
        $event = new Event();

        $eo = $model->getEoById($_GET['id']);
        $glr = $model_glr_eo->getAllData($eo->eo_id);
        $evt = $event->getEventsByEo($eo->eo_id);

        $this->render('detail', array(
            'model' => $eo,
            'glr_eo' => $glr,
            'event' => $evt
        ));

    }
}