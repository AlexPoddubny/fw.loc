<?php
	
	
	namespace app\controllers\admin;
	
	
	use fw\core\base\View;
	
	class UserController
		extends AdminController
	{
		public function actionIndex()
		{
			View::setMeta('АДминка::Главная страница', 'Description', 'Keywords');
			echo $this->layout;
		}
		
		public function actionTest()
		{
//			echo 'АДминка TEST!';
		}
	}