<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/5/14
 * Time: 1:53 PM
 */

class VenueController extends Controller
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
                'actions' => array('index','create', 'update', 'delete', 'uploader', 'delgal', 'detail'),
                'users' => array('@'),
                'expression' => 'Yii::app()->user->roleid == 3 || Yii::app()->user->roleid == 2'
            ),
            array(
                'allow',
                'actions' => array('register'),
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
            $model = new Venue();
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
            $venue = new Venue();

            $usr = User::model()->find('usr_email=:email', array(':email' => $_POST['User']['usr_email']));
            if(!isset($usr->usr_id))
            {
                $user_id = $user->insertUser($_POST['User']);

                if($user_id != null)
                {
                    $_POST['Venue']['vn_user_id'] = $user_id;
                    $_POST['Venue']['vn_address'] = '';
                    $_POST['Venue']['vn_phone'] = '';
                    $_POST['Venue']['vn_fax'] = '';
                    $_POST['Venue']['vn_email'] = $_POST['User']['usr_email'];
                    $_POST['Venue']['vn_website'] = '';
                    $_POST['Venue']['vn_description'] = '';
                    $_POST['Venue']['vn_longitude'] = null;
                    $_POST['Venue']['vn_latitude'] = null;
                    if($venue->insertData($_POST, $_FILES))
                    {
                        $login = new LoginForm();

                        $login->username = $_POST['User']['usr_email'];
                        $login->password = $_POST['User']['usr_password'];

                        if($login->validate($login->attributes) && $login->login())
                        {
                            $model_user = User::model()->findByPk($user_id);
                            Helper::sendEmail('register', $model_user, "Registration");
                            $this->redirect(Yii::app()->createUrl('venue/index'));
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
        if(isset($_POST['Venue']))
        {
            $model = new Venue();

            if($model->insertData($_POST, $_FILES))
            {
                if(Yii::app()->user->roleid == 3)
                {
                    $this->redirect(array('member/index'));
                }else{
                    $this->redirect(array('venue/index'));
                }
            }else{
                if(Yii::app()->user->roleid == 3)
                {
                    $this->redirect(array('member/index'));
                }else{
                    $this->redirect(array('venue/index'));
                }
            }

        }
        $this->render('create');
    }

    public function actionUpdate()
    {
        $model = new Venue();

        if(isset($_POST['Venue']))
        {
            if($model->updateData($_POST, $_FILES))
            {
                if(Yii::app()->user->roleid == 3)
                {
                    $this->redirect(array('member/index'));
                }else{
                    $this->redirect(array('venue/index'));
                }
            }else{
                if(Yii::app()->user->roleid == 3)
                {
                    $this->redirect(array('member/index'));
                }else{
                    $this->redirect(array('venue/index'));
                }
            }
        }

        $data = $model->getVenueById($_REQUEST['id']);

        $this->render('update', array(
            'model' => $data,
        ));
    }

    public function actionDelete($id)
    {
        $model = new Venue();
        $model->getVenueById($id)->delete();
    }

    public function actionUploader()
    {
        $model = new GalleryVenue();

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
        $model = new GalleryVenue();
        $model->getById($_POST['id'])->delete();
    }

    public function actionDetail()
    {
        $model = new Venue();
        $model_glr_venue = new GalleryVenue();

        $venue = $model->getVenueById($_GET['id']);
        $glr = $model_glr_venue->getAllData($venue->vn_id);

        $this->render('detail', array(
            'model' => $venue,
            'glr_venue' => $glr,
        ));

    }
}