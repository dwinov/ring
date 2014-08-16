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
        $eo = $model_eo->getEoByUserId(Yii::app()->user->usrid);

        $this->render('index', array(
            'eo_id' => $eo['eo_id']
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
                        $model = Member::model()->findByAttributes(array('mem_id' => $listMembersArr[$i]));
                        $input['ibx_mem_id'] = $listMembersArr[$i];
                        $input['ibx_sender_id'] = $_POST['eo_id'];
                        $input['ibx_msg'] = $_POST['message'];
                        $model_inbox->insertData($input);
                        Helper::sendEmail('broadcast',$model, 'Broadcast Event');
                    }
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
                        $model = Member::model()->findByAttributes(array('mem_id' => $listMembersArr[$i]));
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