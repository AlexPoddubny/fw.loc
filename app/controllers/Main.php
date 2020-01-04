<?php
	
	namespace app\controllers;
	
	
	use vendor\core\base\Controller;
	
	class Main
		extends Controller
	{
		public function actionIndex()
		{
			echo __METHOD__;
		}
	}