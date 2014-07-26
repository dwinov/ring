<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/13/14
 * Time: 2:32 PM
 */

class ParentController extends Controller
{
    public function filters()
    {
        return array(
            'postOnly + create',
            'postOnly + update',
            'deleteOnly + delete',
        );
    }

    public function sendAjaxResponse($model)
    {
        header('Content-type: application/json', true, 200);

        echo json_encode([
            'result' => (is_array($model) != 0) ? true : false,
            'value' => $model
        ]);
        Yii::app()->end();
    }

    public function sendAjaxResponseString($result)
    {
        header('Content-type: application/json', true, 200);

        echo json_encode($result);
        Yii::app()->end();
    }
}