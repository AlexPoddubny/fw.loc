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
			$title = 'Page title';
			$this->set(compact('title', 'posts'));
		}
	}