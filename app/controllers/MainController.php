<?php
	
	namespace app\controllers;
	
	
	use app\models\Main;
	use fw\libs\Pagination;
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
			$model = new Main;
			
			$total = R::count('posts');
			$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
			$perpage = 1;
			$pagination = new Pagination($page, $perpage, $total);
			$start = $pagination->getStart();
			$posts = R::findAll('posts', 'LIMIT ' . $start . ', ' . $perpage);
			$menu = $this->menu;
			View::setMeta('Main page', 'Main page description', 'Keywords');
			$this->set(compact('posts', 'menu', 'pagination', 'total'));
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