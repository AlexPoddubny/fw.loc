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
				if (!$user->validate($_POST)){
					echo $user->getErrors();
					redirect();
				}
				$user->load($_POST);
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