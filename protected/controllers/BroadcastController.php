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
            $data = $model->getAllMember($_POST);
            echo CJavaScript::jsonEncode($data);
            Yii::app()->end();
        }

        $model_eo = new Eo();
        $model_credit = new Credit();
        $eo = $model_eo->getEoByUserId(Yii::app()->user->usrid);
        $list_interest = Interest::model()->findAll();
        $list_region = Region::model()->findAll();
        $credit = $model_credit->getCreditByEoId($eo['eo_id']);

        $this->render('index', array(
            'interest' => $list_interest,
            'region' => $list_region,
            'eo_id' => $eo['eo_id'],
            'credit' => $credit
        ));
    }

    public function actionSend()
    {
        if(isset($_POST['type_email']) && isset($_POST['type_inbox'])){
            if(isset($_POST['list_member']))
            {
                $listMembersArr = explode(',', $_POST['list_member']);
                if(count($listMembersArr) > 0)
                {
                    $model_inbox = new Inbox();
                    $input = array();
                    for($i = 0; $i < count($listMembersArr); $i++)
                    {
                        $model_member = Member::model()->findByAttributes(array('mem_id' => $listMembersArr[$i]));
                        $model = User::model()->findByAttributes(array('usr_id' => $model_member->mem_user_id));
                        $model->usr_email = $model_member->mem_email;
                        $input['ibx_mem_id'] = $listMembersArr[$i];
                        $input['ibx_sender_id'] = $_POST['eo_id'];
                        $input['ibx_msg'] = $_POST['message'];
                        $model_inbox->insertData($input);
                        Helper::sendEmail('broadcast',$model, 'Broadcast Event');
                    }
                    $credit = new Credit();
                    $result_credit = $credit->payment($_POST['eo_id'], $_POST['payment']);
                }
            }
        }elseif(isset($_POST['type_email'])){
            if(isset($_POST['list_member']))
            {
                $listMembersArr = explode(',', $_POST['list_member']);
                if(count($listMembersArr) > 0)
                {
                    for($i = 0; $i < count(listMembersArr); $i++)
                    {
                        $model_member = Member::model()->findByAttributes(array('mem_id' => $listMembersArr[$i]));
                        $model = User::model()->findByAttributes(array('usr_id' => $model_member->mem_user_id));
                        $model->usr_email = $model_member->mem_email;
                        Helper::sendEmail('broadcast',$model, 'Broadcast Event');
                    }
                }
            }
        }elseif(isset($_POST['type_inbox'])){
            if(isset($_POST['list_member']))
            {
                $listMembersArr = explode(',', $_POST['list_member']);
                if(count($listMembersArr) > 0)
                {
                    $model_inbox = new Inbox();
                    $input = array();
                    for($i = 0; $i < count($listMembersArr); $i++)
                    {
                        $input['ibx_mem_id'] = $listMembersArr[$i];
                        $input['ibx_sender_id'] = $_POST['eo_id'];
                        $input['ibx_msg'] = $_POST['message'];
                        $model_inbox->insertData($input);
                    }
                }
            }
        }

        $this->redirect(array('broadcast/index'));
    }
}