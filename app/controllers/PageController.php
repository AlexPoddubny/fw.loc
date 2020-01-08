<?php
	
	
	namespace app\controllers;
	
	
	class PageController
		extends AppController
	{
		public function actionView()
		{
			$menu = $this->menu;
			$title = 'Page';
			$this->set(compact('menu', 'title'));
		}
		
	}