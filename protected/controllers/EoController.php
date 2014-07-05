<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/4/14
 * Time: 12:45 PM
 */

class EoController extends Controller
{
    public $layout = '//layouts/ring';

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

            if($model->insertData($_POST))
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
            if($model->updateData($_POST))
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

    public function actionDelete($id)
    {
        $model = new Eo();
        $model->getEoById($id)->delete();
    }
}