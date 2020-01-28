<?php
	
	
	namespace app\controllers\admin;
	
	
	use app\controllers\AppController;
	use app\models\User;
	
	class AdminController
		extends AppController
	{
		public $layout = 'admin';
		
		public function __construct($route)
		{
			parent::__construct($route);
			if (!User::isAdmin()){
				$_SESSION['error'] = 'User access denied!';
				redirect('/');
			}
		}
	}