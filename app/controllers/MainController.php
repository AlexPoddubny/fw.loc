<?php
	
	namespace app\controllers;
	
	
	class MainController
		extends AppController
	{
		public function actionIndex()
		{
			$name = 'Alex';
			$hi = 'Hello';
			$this->set(compact('name', 'hi'));
		}
	}