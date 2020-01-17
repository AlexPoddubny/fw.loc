<?php
	
	
	namespace app\controllers;
	
	
	use app\models\User;
	use fw\core\base\View;
	
	class UserController
		extends AppController
	{
		public function actionSignup()
		{
			if (!empty($_POST)){
				$user = new User();
				$user->load($_POST);
				debug($user);
				die;
			}
			View::setMeta('Регистрация');
		}
		
		public function actionLogin()
		{
		
		}
		
		public function actionLogout()
		{
		
		}
		
	}