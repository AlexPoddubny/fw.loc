<?php
	
	namespace app\controllers;
	
	
	use app\models\Main;
	use R;
	
	class MainController
		extends AppController
	{
		public function actionIndex()
		{
			$model = new Main;
			$posts = R::findAll('posts');
			$menu = $this->menu;
			$this->setMeta('Main page', 'Main page description', 'Keywords');
			$meta = $this->meta;
			$this->set(compact('title', 'posts', 'menu', 'meta'));
		}
		
		public function actionTest()
		{
			$this->layout = 'test';
			$title = 'PAGE TEST';
			$this->set(compact('title'));
		}
		
	}