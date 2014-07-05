<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 2:51 PM
 */

class EventController extends Controller
{
    public $layout = '//layouts/ring';

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
            $model = new Event();
            $data = $model->getAllData($_GET);
            echo CJavaScript::jsonEncode($data);
            Yii::app()->end();
        }

        $this->render('index');
    }

    public function actionCreate()
    {
        if(isset($_POST['Event']))
        {
            $model = new Event();

            if($model->insertData($_POST))
            {
                $this->redirect(array('event/index'));
            }else{
                $this->redirect(array('event/index'));
            }

        }

        $venue = Venue::model()->findAll();

        $this->render('create', array(
            'venue_list' => CHtml::listData($venue, 'vn_id', 'vn_name')
        ));
    }

    public function actionUpdate($id)
    {
        $model = new Event();

        if(isset($_POST['Event']))
        {
            if($model->updateData($_POST))
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

    public function actionDelete($id)
    {
        $model = new Event();
        $model->getEventById($id)->delete();
    }
}