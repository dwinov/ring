<?php

class DefaultController extends ParentController
{
	public function actionIndex()
	{
		$this->render('index');
	}
}