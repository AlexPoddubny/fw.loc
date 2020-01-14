<?php
	
	
	namespace app\controllers\admin;
	
	
	class UserController
		extends AdminController
	{
		public function actionIndex()
		{
			echo 'АДминка!';
		}
		
		public function actionTest()
		{
			echo 'АДминка TEST!';
		}
	}