<?php
	
	
	namespace app\controllers\admin;
	
	
	use app\controllers\AppController;
	
	class AdminController
		extends AppController
	{
//		public $layout = 'admin';
		
		public function __construct($route)
		{
			parent::__construct($route);
		}
		
		protected function checkAdmin(){
			return isset($_SESSION['user']) && 'admin' == $_SESSION['user']['role'];
		}
	}