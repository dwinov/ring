<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/13/14
 * Time: 3:39 PM
 */

class MemberController extends ParentController
{
    public $layout = "";

    public function actionIndex()
    {
        $json = file_get_contents('php://input');
        $obj = json_decode($json);

        $model = new Member;

    }
}