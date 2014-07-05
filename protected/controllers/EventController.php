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