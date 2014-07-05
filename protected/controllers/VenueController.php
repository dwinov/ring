<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 1:53 PM
 */

class VenueController extends Controller
{
    public $layout = '//layouts/ring';

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

            if($model->insertData($_POST))
            {
                $this->redirect(array('venue/index'));
            }else{
                $this->redirect(array('venue/index'));
            }

        }
        $this->render('create');
    }

    public function actionUpdate($id)
    {
        $model = new Venue();

        if(isset($_POST['Venue']))
        {
            if($model->updateData($_POST))
            {
                $this->redirect(array('venue/index'));
            }else{
                $this->redirect(array('venue/index'));
            }
        }

        $data = $model->getVenueById($id);

        $this->render('update', array(
            'model' => $data,
        ));
    }

    public function actionDelete($id)
    {
        $model = new Venue();
        $model->getVenueById($id)->delete();
    }
}