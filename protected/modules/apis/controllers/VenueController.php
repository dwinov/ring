<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/14/14
 * Time: 3:16 PM
 */

class VenueController extends ParentController
{
    public $layout = "";
    public $model;

    public function __construct()
    {
        $this->model = new Venue();
    }

    public function actionIndex()
    {
        $result = $this->model->getAllVenue();
        $this->sendAjaxResponse($result);
    }

    public function actionView()
    {
        $json = file_get_contents('php://input');
        $obj = json_decode($json);

        $result = $this->model->getVenueById($obj->id);
        $this->sendAjaxResponse($result);
    }
}