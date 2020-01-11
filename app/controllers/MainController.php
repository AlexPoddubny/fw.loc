<?php
	
	namespace app\controllers;
	
	
	use app\models\Main;
	use R;
	use vendor\core\App;
	use vendor\core\base\View;
	
	class MainController
		extends AppController
	{
		
		public function actionIndex()
		{
			$model = new Main;
			$posts = R::findAll('posts');
			$menu = $this->menu;
			View::setMeta('Main page', 'Main page description', 'Keywords');
			$this->set(compact('posts', 'menu'));
		}
		
		public function actionTest()
		{
			if ($this->isAjax()){
				$model = new Main;
				$post = R::findOne('posts', 'id = ' . $_POST['id']);
				$this->loadView('test', compact('post'));
				die;
			}
		}
		
	}