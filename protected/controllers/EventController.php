<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 2:51 PM
 */

class EventController extends Controller
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
                'actions' => array('index','create', 'update', 'delete', 'uploader', 'delgal', 'detail'),
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
            $model = new Event();
            $data = $model->getAllData($_GET);
            echo CJavaScript::jsonEncode($data);
            Yii::app()->end();
        }

        $this->render('index');
    }

    public function actionCreate($id)
    {
        if(isset($_POST['Event']))
        {
            $model = new Event();

            if($model->insertData($_POST, $_FILES))
            {
                $this->redirect(array('event/index'));
            }else{
                $this->redirect(array('event/index'));
            }

        }

        $venue = Venue::model()->findAll();

        $this->render('create', array(
            'venue_list' => CHtml::listData($venue, 'vn_id', 'vn_name'),
            'eo_id' => $id
        ));
    }

    public function actionUpdate($id)
    {
        $model = new Event();

        if(isset($_POST['Event']))
        {
            if($model->updateData($_POST, $_FILES))
            {
                $this->redirect(array('event/index'));
            }else{
                $this->redirect(array('event/index'));
            }
        }

        $data = $model->getEventById($id);
        $venue = Venue::model()->findAll();

        $this->render('update', array(
            'model' => $data,
            'venue_list' => CHtml::listData($venue, 'vn_id', 'vn_name')
        ));
    }

    public function actionClient()
    {
        if(isset($_POST['Event']))
        {
            $model = new Event();

            if($model->insertData($_POST, $_FILES))
            {
                $this->redirect(array('member/index'));
            }else{
                $this->redirect(array('member/index'));
            }

        }
    }

    public function actionDelete($id)
    {
        $model = new Event();
        $model->getEventById($id)->delete();
    }

    public function actionUploader()
    {
        $model = new GalleryEvent();

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
        $model = new GalleryEvent();
        $model->getById($_POST['id'])->delete();
    }

    public function actionDetail()
    {
        $model = new Event();
        $model_eo = new Eo();
        $model_venue = new Venue();
        $model_glr_event = new GalleryEvent();

        $event = $model->getEventById($_GET['id']);
        $eo = $model_eo->getEoById($event->evt_owner_id);
        $venue = $model_venue->getVenueById($event->evt_venue_id);
        $glr = $model_glr_event->getAllData($event->evt_id);

        $this->render('detail', array(
            'model' => $event,
            'eo' => $eo,
            'venue' => $venue,
            'glr_event' => $glr,
        ));
    }
}