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
            //model
            echo CJavaScript::jsonEnconde();
            Yii::app()->end();
        }

        $this->render('index');
    }
}