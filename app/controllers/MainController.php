<?php
	
	namespace app\controllers;
	
	
	use app\models\Main;
	
	class MainController
		extends AppController
	{
		public function actionIndex()
		{
			$model = new Main();
			$posts = $model->findAll();
			$post = $model->findOne(1);
			debug($post);
			$title = 'Page title';
			$this->set(compact('title', 'posts'));
		}
	}