<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/13/14
 * Time: 2:32 PM
 */

class ParentController extends Controller
{
    public $layout = "";

    public function filters()
    {
        return array(
            'postOnly + create',
            'putOnly + update',
            'deleteOnly + delete',
        );
    }

    public function sendAjaxResponse(AjaxResponseInterface $model = null, $result = null)
    {
        header('Content-type: application/json', true, 200);

        if($model != null && $result == null)
        {
            echo json_encode([
                'data' => $model->getResponseData(),
                'error' => $model->getErrors()
            ]);
        }elseif($model == null && $result != null)
        {
            echo json_encode($result);
        }
        Yii::app()->end();
    }
}