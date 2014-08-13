<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/13/14
 * Time: 3:27 PM
 */

class BroadcastController extends Controller
{
    public $layout = '//layouts/layout';

    public function actionIndex()
    {
        if(Yii::app()->request->isAjaxRequest)
        {
            $model = new Member();
            $data = $model->getAllMember($_GET);
            echo CJavaScript::jsonEncode($data);
            Yii::app()->end();
        }

        $this->render('index');
    }
}