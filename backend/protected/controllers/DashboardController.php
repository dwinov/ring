<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 7/11/14
 * Time: 2:42 PM
 */

class DashboardController extends Controller
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
                'actions' => array('index'),
                'users' => array('@'),
                'expression' => 'Yii::app()->user->roleid == 1'
            ),
            array(
                'deny',
                'users' => array('*')
            ),
        );
    }

    public function actionIndex()
    {
        $model_member = new Member();
        $model_event = new Event();

        $data_member = $model_member->getMemberForGraph();
        $data_event = $model_event->getEventsForGraph();

        $categoryMem = array();
        $count_mem = array();
        $member = array();
        $name = '';
        $resultMem = array();
        foreach($data_member as $mem)
        {
            $name = 'Members';
            array_push($categoryMem, $mem['mem_month']);
            array_push($count_mem, intval($mem['total']));
        }

        $member['showInLegend'] = false;
        $member['name'] = $name;
        $member['data'] = $count_mem;

        array_push($resultMem, $member);

        $count_evt = array();
        $event = array();
        $resultEvt = array();
        $categoryEvt = array();
        foreach($data_event as $evt)
        {
            $name = 'Events';
            array_push($count_evt, intval($evt['total']));
            array_push($categoryEvt, $evt['evt_month']);
        }

        $event['showInLegend'] = false;
        $event['name'] = $name;
        $event['data'] = $count_evt;

        array_push($resultEvt, $event);

        $this->render('index', array(
            'data_mem' => $resultMem,
            'data_evt' => $resultEvt,
            'category_mem' => $categoryMem,
            'category_evt' => $categoryEvt
        ));
    }
}