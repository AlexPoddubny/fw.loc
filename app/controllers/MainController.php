<?php
	
	namespace app\controllers;
	
	
	use app\models\Main;
	use R;
	use vendor\core\App;
	
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
			$this->set(compact('posts', 'menu', 'meta'));
		}
		
		public function actionTest()
		{
			if ($this->isAjax()){
				echo 111;
				die;
			}
			$this->layout = 'test';
			$title = 'PAGE TEST';
			$this->set(compact('title'));
		}
		
	}