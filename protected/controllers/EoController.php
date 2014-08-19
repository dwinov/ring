<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/4/14
 * Time: 12:45 PM
 */

class EoController extends Controller
{
    public $layout = '//layouts/layout';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules()
    {
        return array(
            array(
                'allow',
                'actions' => array('index','create', 'update', 'delete', 'client', 'uploader', 'delgal', 'detail', 'register'),
                'users' => array('@'),
                'expression' => 'Yii::app()->user->roleid == 2'
            ),
            array(
                'allow',
                'actions' => array('update', 'register'),
                'users' => array('*'),
            ),
            array(
                'deny',
                'users' => array('*')
            ),
        );
    }

    public function actionIndex()
    {
        if(Yii::app()->request->isAjaxRequest)
        {
            $model = new Eo();
            $data = $model->getAllData($_GET);
            echo CJavaScript::jsonEncode($data);
            Yii::app()->end();
        }

        $this->render('index');
    }

    public function actionRegister()
    {
        if(isset($_POST['Eo']) && isset($_POST['User']) && $_POST['tnc'] == 1)
        {
            $user = new User();
            $eo = new Eo();

            $usr = User::model()->find('usr_email=:email', array(':email' => $_POST['User']['usr_email']));
            if(!isset($usr->usr_id))
            {
                $user_id = $user->insertUser($_POST['User']);

                if($user_id != null)
                {
                    $_POST['Eo']['eo_user_id'] = $user_id;
                    $_POST['Eo']['eo_address'] = '';
                    $_POST['Eo']['eo_phone'] = '';
                    $_POST['Eo']['eo_fax'] = '';
                    $_POST['Eo']['eo_email'] = $_POST['User']['usr_email'];
                    $_POST['Eo']['eo_website'] = '';
                    $_POST['Eo']['eo_description'] = '';
                    if($eo->insertData($_POST, $_FILES))
                    {
                        $neweoid = Yii::app()->db->getLastInsertId();
                        $login = new LoginForm();

                        $login->username = $_POST['User']['usr_email'];
                        $login->password = $_POST['User']['usr_password'];

                        if($login->validate($login->attributes) && $login->login())
                        {
                            $model_user = User::model()->findByPk($user_id);
                            $dataEo = $eo->getEoById($neweoid);
                            Helper::sendEmail('register', $model_user, "Registration");
                            $this->redirect(Yii::app()->createUrl('eo/update', array('id' => $dataEo->eo_id, 'user_id' => Yii::app()->user->usrid)));
                        }
                        else
                        {
                            $this->redirect(Yii::app()->createUrl('site/login'));
                        }
                    }
                    else
                    {
                        $this->redirect(Yii::app()->createUrl('site/login'));
                    }
                }
                else
                {
                    $this->redirect(Yii::app()->createUrl('site/login'));
                }
            }else{
                $this->redirect(Yii::app()->createUrl('site/login'));
            }
        }
        else
        {
            $this->redirect(Yii::app()->createUrl('site/login'));
        }
        $this->redirect(Yii::app()->createUrl('site/login'));
    }

    public function actionCreate()
    {
        if(isset($_POST['Eo']))
        {
            $model = new Eo();

            if($model->insertData($_POST, $_FILES))
            {
                $this->redirect(array('eo/update/' . Yii::app()->db->getLastInsertId() . '?user_id=' . Yii::app()->user->usrid));
            }else{
                $this->redirect(array('eo/create'));
            }

        }
        $this->render('create');
    }

    public function actionUpdate($id)
    {
        $model = new Eo();

        if(isset($_POST['Eo']))
        {
            if($model->updateData($_POST, $_FILES))
            {
                if(isset($_GET['user_id']))
                {
                    $this->redirect(array('eo/update/' . $id . '?user_id=' . $_GET['user_id']));
                }else{
                    $this->redirect(array('eo/index'));
                }
            }else{
                if(isset($_GET['user_id']))
                {
                    $this->redirect(array('eo/update/' . $id . '?user_id=' . $_GET['user_id']));
                }else{
                    $this->redirect(array('eo/index'));
                }
            }
        }

        if(isset($_GET['user_id']))
        {
            $eo = $model->getEoByUserId($_GET['user_id']);
            $data = $model->getEoById($eo['eo_id']);
            $this->render('update', array(
                'model' => $data,
                'user_id' => $_GET['user_id']
            ));
        }else{
            $data = $model->getEoById($id);
            $this->render('update', array(
                'model' => $data,
            ));
        }
    }

    public function actionClient()
    {
        $model = new Eo();

        if(isset($_POST['Eo']))
        {
            if(!isset($_POST['Eo']['eo_id']))
            {
                if($model->insertData($_POST, $_FILES))
                {
                    $this->redirect(array('member/index'));
                }else{
                    $this->redirect(array('member/index'));
                }
            }else{
                if($model->updateData($_POST, $_FILES))
                {
                    $this->redirect(array('member/index'));
                }else{
                    $this->redirect(array('member/index'));
                }
            }
        }else{
            $this->redirect(array('member/index'));
        }
    }

    public function actionDelete($id)
    {
        $model = new Eo();
        $model->getEoById($id)->delete();
    }

    public function actionUploader()
    {
        $model = new GalleryEO();

        if(count($_FILES) != 0)
        {
            $model->insertData($_GET['id'], $_FILES);
            Yii::app()->end();
        }

        $this->render('uploader', array(
            'model' => $model->getAllData($_GET['id'])
        ));
    }

    public function actionDelgal()
    {
        $model = new GalleryEO();
        $model->getById($_POST['id'])->delete();
    }

    public function actionDetail()
    {
        $model = new Eo();
        $model_glr_eo = new GalleryEO();
        $event = new Event();

        $eo = $model->getEoById($_GET['id']);
        $glr = $model_glr_eo->getAllData($eo->eo_id);
        $evt = $event->getEventsByEo($eo->eo_id);

        $this->render('detail', array(
            'model' => $eo,
            'glr_eo' => $glr,
            'event' => $evt
        ));

    }
}