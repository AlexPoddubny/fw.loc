<?php
	
	
	namespace app\controllers\admin;
	
	
	use fw\core\base\View;
	
	class UserController
		extends AdminController
	{
		public function actionIndex()
		{
			View::setMeta('АДминка::Users', 'Description', 'Keywords');
		}
		
		public function actionTest()
		{
//			echo 'АДминка TEST!';
		}
	}