<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/26/14
 * Time: 12:30 PM
 */

class EoController extends ParentController
{
    public $layout = "";
    public $model;

    public function __construct()
    {
        $this->model = new Eo();
    }

    /**
     * this apis for get all venue
     */
    public function actionIndex()
    {
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
            {
                $result = $this->model->getAllEo();
                if($result != null)
                {
                    $this->sendAjaxResponse($result);
                }else{
                    $result = array('result' => true, 'value' => "No Data");
                    $this->sendAjaxResponseString($result);
                }
            }else{
                $result = array('result' => false, 'value' => "Token is expaired");
                $this->sendAjaxResponseString($result);
            }
        }else{
            $result = array('result' => false, 'value' => "Token is lost");
            $this->sendAjaxResponseString($result);
        }
    }

    public function actionUpdate()
    {
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
            {
                if($this->model->updateData($_POST, $_FILES) == true)
                {
                    $result = array('result' => true, 'value' => "EO has been updated");
                    $this->sendAjaxResponseString($result);
                }else{
                    $result = array('result' => true, 'value' => "failed to update EO");
                    $this->sendAjaxResponseString($result);
                }
            }else{
                $result = array('result' => false, 'value' => "Token is expaired");
                $this->sendAjaxResponseString($result);
            }
        }else{
            $result = array('result' => false, 'value' => "Token is lost");
            $this->sendAjaxResponseString($result);
        }
    }

    /**
     * this apis for get Eo for see the detail
     */
    public function actionView()
    {
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            if(User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN'])))
            {
                $result = $this->model->getEoByIdAPI($_POST['id']);
                $this->sendAjaxResponse($result);
            }else{
                $result = array('result' => false, 'value' => "Token is expaired");
                $this->sendAjaxResponseString($result);
            }
        }else{
            $result = array('result' => false, 'value' => "Token is lost");
            $this->sendAjaxResponseString($result);
        }
    }
}