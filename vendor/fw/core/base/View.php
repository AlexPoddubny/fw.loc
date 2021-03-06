<?php
	
	
	namespace fw\core\base;
	
	
	use Exception;
	use fw\core\App;
	
	class View
	{
		public $route = [];
		public $view;
		public $layout;
		public $scripts = [];
		public static $meta = [
			'title' => '',
			'desc' => '',
			'keywords' => ''
		];
		
		public function __construct($route, $layout = '', $view = '')
		{
			$this->route = $route;
			if (false === $layout){
				$this->layout = false;
			} else {
				$this->layout = $layout ?: LAYOUT;
			}
			$this->view = $view;
		}
		
		public function compressPage($buffer)
		{
			$search = [
				"/(\n)+/",
				"/\r\n+/",
				"/\n(\t)+/",
				"/\n(\ )+/",
				"/\>(\n)+</",
				"/\>\r\n</",
			];
			$replace = [
				"\n",
				"\n",
				"\n",
				"\n",
				'><',
				'><',
			];
			return preg_replace($search, $replace, $buffer);
		}
		
		public function render($vars)
		{
			Lang::load(App::$app->getProperty('lang')['code'], $this->route);
			if (is_array($vars)){
				extract($vars);
			}
			$file_view = APP
				. '/views/'
				. $this->route['prefix']
				. $this->route['controller'] . '/'
				. $this->view . '.php';
			// enable compress in production
			if (DEBUG){
				ob_start();
			} else {
				ob_start('ob_gzhandler');
				header('Content-Encoding: gzip');
			}
			if (is_file($file_view)){
				require $file_view;
			} else {
				throw new Exception('<p>View <b>' . $file_view . '</b> not found </p>');
			}
			$content = $this->cutScripts(ob_get_contents());
			ob_clean();
			if (false !== $this->layout){
				$file_layout = APP
					. '/views/layouts/'
					. $this->layout . '.php';
				if (is_file($file_layout)){
					$scripts = [];
					if (!empty($this->scripts[0])){
						$scripts = $this->scripts[0];
					}
					require $file_layout;
				} else {
					throw new Exception('<p>Layout <b>' . $file_layout . '</b> not found </p>');
				}
			}
		}
		
		protected function cutScripts($content)
		{
			$pattern = "#<script.*?>.*?</script>#si";
			preg_match_all($pattern, $content, $this->scripts);
			if (!empty($this->scripts)){
				$content = preg_replace($pattern, '', $content);
			}
			return $content;
		}
		
		/**
		 * @return array
		 */
		public static function getMeta()
		{
			echo '<title>' . self::$meta['title'] . '</title>'
			. '<meta name="description" content="' . self::$meta['desc'] . '">'
			. '<meta name="keywords" content="' . self::$meta['keywords'] . '">';
		}
		
		/**
		 * @param string $title
		 * @param string $desc
		 * @param string $keywords
		 */
		public static function setMeta(
			$title = '',
			$desc = '',
			$keywords = ''
		)
		{
			self::$meta['title'] = $title;
			self::$meta['desc'] = $desc;
			self::$meta['keywords'] = $keywords;
		}
		
		public function getPart($file)
		{
			$file = APP . '/views/' . $file . '.php';
			if (is_file($file)){
				require_once $file;
			} else {
				echo 'File ' . $file . ' not found';
			}
		}
		
	}