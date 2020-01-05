<?php
	
	namespace app\controllers;
	
	
	class Main
		extends App
	{
		public function actionIndex()
		{
			$name = 'Alex';
			$hi = 'Hello';
			$this->set(compact('name', 'hi'));
		}
	}