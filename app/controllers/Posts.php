<?php
	
	namespace app\controllers;
	
	
	use vendor\core\base\Controller;
	
	class Posts
		extends Controller
	{
		
		public function actionIndex()
		{
			debug($this->route);
		}
		
		public function actionTest()
		{
			echo __METHOD__;
		}
		
		
	}