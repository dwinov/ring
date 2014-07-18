<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 1:53 PM
 */

class VenueController extends Controller
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
                'actions' => array('index','create', 'update', 'delete', 'uploader', 'delgal'),
                'users' => array('@'),
                'expression' => 'Yii::app()->user->roleid == 1 || Yii::app()->user->roleid == 3'
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
            $model = new Venue();
            $data = $model->getAllData($_GET);
            echo CJavaScript::jsonEncode($data);
            Yii::app()->end();
        }

        $this->render('index');
    }

    public function actionCreate()
    {
        if(isset($_POST['Venue']))
        {
            $model = new Venue();

            if($model->insertData($_POST, $_FILES))
            {
                if(Yii::app()->user->roleid == 3)
                {
                    $this->redirect(array('member/index'));
                }else{
                    $this->redirect(array('venue/index'));
                }
            }else{
                if(Yii::app()->user->roleid == 3)
                {
                    $this->redirect(array('member/index'));
                }else{
                    $this->redirect(array('venue/index'));
                }
            }

        }
        $this->render('create');
    }

    public function actionUpdate()
    {
        $model = new Venue();

        if(isset($_POST['Venue']))
        {
            if($model->updateData($_POST, $_FILES))
            {
                if(Yii::app()->user->roleid == 3)
                {
                    $this->redirect(array('member/index'));
                }else{
                    $this->redirect(array('venue/index'));
                }
            }else{
                if(Yii::app()->user->roleid == 3)
                {
                    $this->redirect(array('member/index'));
                }else{
                    $this->redirect(array('venue/index'));
                }
            }
        }

        $data = $model->getVenueById($_REQUEST['id']);

        $this->render('update', array(
            'model' => $data,
        ));
    }

    public function actionDelete($id)
    {
        $model = new Venue();
        $model->getVenueById($id)->delete();
    }

    public function actionUploader()
    {
        $model = new GalleryVenue();

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
        $model = new GalleryVenue();
        $model->getById($_POST['id'])->delete();
    }
}