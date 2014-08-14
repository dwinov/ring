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

    public function actionSend()
    {
        if(isset($_POST['type_email']) && isset($_POST['type_inbox'])){

        }elseif(isset($_POST['type_email'])){
            if(isset($_POST['list_member']))
            {
                if(count($_POST['list_member']) > 0 && count($_POST['list_member']) == 1)
                {
                    $model = User::model()->findByAttributes(array('mem_id' => $_POST['list_member']));
                    Helper::sendEmail('broadcast',$model, 'Broadcast Event');
                }elseif(count($_POST['list_member']) > 0 && count($_POST['list_member']) > 1){
                    $memArr = explode(',', $_POST['list_member']);
                    for($i = 0; $i < count($memArr); $i++)
                    {
                        $model = User::model()->findByAttributes(array('mem_id' => $memArr[$i]));
                        Helper::sendEmail('broadcast',$model, 'Broadcast Event');
                    }
                }
            }
        }elseif(isset($_POST['type_inbox'])){

        }

        $this->redirect(array('broadcast/index'));
    }
}