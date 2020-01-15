<?php
	
	
	namespace app\controllers\admin;
	
	
	use vendor\core\base\View;
	
	class UserController
		extends AdminController
	{
		public function actionIndex()
		{
			View::setMeta('АДминка::Главная страница', 'Description', 'Keywords');
		}
		
		public function actionTest()
		{
//			echo 'АДминка TEST!';
		}
	}