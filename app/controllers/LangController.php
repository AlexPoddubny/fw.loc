<?php
	
	
	namespace app\controllers;
	
	
	use fw\core\App;
	
	class LangController
		extends AppController
	{
		public function actionChange()
		{
			$lang = !empty($_GET['lang']) ? $_GET['lang'] : null;
			if ($lang){
				if (array_key_exists($lang, App::$app->getProperty('langs'))){
					setcookie('lang', $lang, time() + 3600*24*7, '/');
					redirect();
				}
			}
		}
	}