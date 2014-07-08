<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/8/14
 * Time: 8:40 PM
 */

class ApiController extends Controller
{
    public $layout = "";

    public function filters()
    {
        return array(
//            'accessControl',
            'postOnly + create',
            'putOnly + update',
            'deleteOnly + delete',
        );
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider('Girl');
        $this->sendAjaxResponse($dataProvider);
    }

    public function actionCreate()
    {
        $model = new Girl;
        $model->attributes = $_POST;
        $result = $model->save();

        $this->sendAjaxResponse($model);
    }

    public function actionView($id)
    {
        $data = $this->loadModel($id);
        $this->sendAjaxResponse($data);
    }

    public function actionRegister()
    {
        $json = file_get_contents('php://input');
        $obj = json_decode($json);

        $user = new User();

        $username = explode('@', $obj->email);
        $user->usr_email = $obj->email;
        $user->usr_password = md5($obj->password);
        $user->usr_type_id = 1;
        $user->usr_username = $username[0];

        if($user->insert())
        {
            $member = new Member();

            $member->mem_usr_id = $user->usr_id;
            $member->mem_screen_name = $obj->firstname . " " . $obj->lastname;
            $member->mem_first_name = $obj->firstname;
            $member->mem_last_name = $obj->lastname;
            $member->mem_phone = $obj->phonenumber;
            $member->mem_birthdate = $obj->birthdate;
            $member->mem_gender = $obj->gender;

            if($member->insert())
                $this->sendAjaxResponse($user);
        }
    }

    public function actionLogin()
    {
        $json = file_get_contents('php://input');
        $obj = json_decode($json);

        $user = User::model()->find('usr_email=:email', array(':email' => $obj->username));
        if($user != null && $user->validate($obj->password))
        {
            $token = Helper::generateToken();
            $user->usr_token = $token;
            $user->save();
            $result = array('result' => true, 'value' => $token);
            $this->sendAjaxResponse(null, $result);
        }else{
            $result = array('result' => true, 'value' => "Login Butut");
            $this->sendAjaxResponse(null, $result);
        }
    }

    public function loadModel($id)
    {
        $model=Girl::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist!.');
        return $model;
    }

    private function sendAjaxResponse(AjaxResponseInterface $model = null, $result = null)
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