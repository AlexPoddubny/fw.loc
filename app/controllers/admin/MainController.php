<?php
	
	
	namespace app\controllers\admin;
	
	
	use fw\core\base\View;
	
	class MainController
		extends AdminController
	{
		public function actionIndex()
		{
			View::setMeta('АДминка::Main page', 'Description', 'Keywords');
		}
		
	}