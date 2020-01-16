<?php
	
	namespace app\controllers;
	
	
	use app\models\Main;
	use Monolog\Handler\StreamHandler;
	use Monolog\Logger;
	use R;
	use fw\core\App;
	use fw\core\base\View;
	
	class MainController
		extends AppController
	{
		
		public function actionIndex()
		{
			$log = new Logger('name');
			$log->pushHandler(new StreamHandler(LOG . '/monolog.log',
				Logger::WARNING));
			$log->warning('Foo');
			$log->error('Bar');
			
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