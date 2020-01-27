<?php
	
	
	namespace app\controllers\admin;
	
	
	use fw\core\base\View;
	
	class MainController
		extends AdminController
	{
		public function actionIndex()
		{
			if ($this->checkAdmin()) {
				View::setMeta('АДминка::Главная страница', 'Description', 'Keywords');
				//echo $this->layout;
			} else {
				$_SESSION['error'] = 'User access denied!';
				redirect('/');
			}
		}
		
	}