<?php
	
	
	namespace fw\widgets\lang;
	
	
	use fw\core\App;
	
	class Lang
	{
		
		protected $tpl;
		protected $langs;
		protected $lang;
		
		public function __construct()
		{
			$this->tpl = __DIR__ . '/lang_tpl/lang_tpl.php';
			$this->run();
		}
		
		public function run()
		{
			$this->langs = App::$app->getProperty('langs');
			$this->lang = App::$app->getProperty('lang');
			echo $this->getHtml();
		}
		
		/**
		 * @return mixed
		 */
		public static function getLangs()
		{
			return \R::getAssoc('SELECT code, title, base FROM languages ORDER BY base DESC');
		}
		
		/**
		 * @return mixed
		 */
		public static function getLang($langs)
		{
			if (isset($_COOKIE['lang']) && array_key_exists($_COOKIE['lang'],
				$langs)){
				$key = $_COOKIE['lang'];
			} else {
				$key = key($langs);
			}
			$lang = $langs[$key];
			$lang['code'] = $key;
			return $lang;
		}
		
		protected function getHtml()
		{
			ob_start();
			require_once $this->tpl;
			return ob_get_clean();
		}
		
	}