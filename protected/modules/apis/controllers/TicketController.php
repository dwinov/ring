<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 8/25/14
 * Time: 1:02 PM
 */

class TicketController extends ParentController
{
    public $layout = "";

    public function actionIndex()
    {
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            $user = User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN']));
            if($user)
            {
                $model = new Ticket();
                $result = $model->getTicketByEvtId($_POST['evt_id']);
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

    public function actionBuy()
    {
        if(isset($_SERVER['HTTP_TOKEN']))
        {
            $user = User::model()->find('usr_token=:token', array(':token' => $_SERVER['HTTP_TOKEN']));
            if($user)
            {
                $model = new Member();
                $model_ticket = new Ticket();

                $data_mem = $model->getMemberByUserId($user->usr_id);

                $tkt_id = explode(',', $_POST['tkt_id']);
                $qty = explode(',', $_POST['tkt_quantity']);
                $data = array();
                for($i = 0; $i < count($tkt_id); $i++)
                {
                    $data['mem_id'] = $data_mem['mem_id'];
                    $data['tkt_id'] = $tkt_id[$i];
                    $data['tkt_qty'] = $qty[$i];
                    $data['evt_id'] = $_POST['evt_id'];
                    $model_ticket->BuyTickets($data);
                }

//                $this->sendAjaxResponse($result);
            }else{
                $result = array('result' => false, 'value' => "Token is expaired");
                $this->sendAjaxResponseString($result);
            }
        }else{
            $result = array('result' => false, 'value' => "Token is lost");
            $this->sendAjaxResponseString($result);
        }
    }

    public function actionList()
    {

    }
}