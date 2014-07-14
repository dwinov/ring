<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/14/14
 * Time: 3:00 PM
 */

class EventController extends ParentController
{
    public $layout = "";
    public $model;

    public function __construct()
    {
        $this->model = new Event();
    }

    public function actionIndex()
    {
        $result = $this->model->getAllEvent();
        $this->sendAjaxResponse($result);
    }

    public function actionView()
    {
        $json = file_get_contents('php://input');
        $obj = json_decode($json);

        $result = $this->model->getEventById($obj->id);
        $this->sendAjaxResponse($result);
    }
}