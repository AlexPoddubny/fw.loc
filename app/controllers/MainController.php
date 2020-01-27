<?php
	
	namespace app\controllers;
	
	
	use app\models\Main;
	use fw\libs\Pagination;
	use R;
	use fw\core\App;
	use fw\core\base\View;
	
	class MainController
		extends AppController
	{
		
		public function actionIndex()
		{
			$lang = App::$app->getProperty('lang')['code'];
			$total = R::count('posts', 'lang_code = ?', [$lang]);
			$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
			$perpage = 2;
			$pagination = new Pagination($page, $perpage, $total);
			$start = $pagination->getStart();
			$posts = R::findAll(
				'posts',
				'lang_code = ? LIMIT ' . $start . ', ' . $perpage,
				[$lang]
			);
			View::setMeta('Main page', 'Main page description', 'Keywords');
			$this->set(compact('posts', 'pagination', 'total'));
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