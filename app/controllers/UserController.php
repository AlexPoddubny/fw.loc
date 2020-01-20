<?php
	
	
	namespace app\controllers;
	
	
	use app\models\User;
	use fw\core\base\View;
	
	class UserController
		extends AppController
	{
		public function actionSignup()
		{
			View::setMeta('Регистрация');
			if (!empty($_POST)){
				$user = new User();
				$user->load($_POST);
				if (!$user->validate() || !$user->checkUnique()) {
					$user->getErrors();
					$_SESSION['form_data'] = $_POST;
					redirect();
				}
				$user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
				if ($user->save()){
					$_SESSION['success'] = 'Registration successfull!';
				} else {
					$_SESSION['error'] = 'Registration Failed!';
				}
				redirect();
			}
		}
		
		public function actionLogin()
		{
		
		}
		
		public function actionLogout()
		{
		
		}
		
	}