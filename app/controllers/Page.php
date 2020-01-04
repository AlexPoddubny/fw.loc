<?php
	
	
	namespace app\controllers;
	
	
	use vendor\core\base\Controller;
	
	class Page
		extends Controller
	{
		public function actionView()
		{
			debug($this->route);
		}
	}