<?php
	
	
	namespace vendor\core\base;
	
	
	class View
	{
		public $route = [];
		public $view;
		public $layout;
		public $scripts = [];
		
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
		
		public function render($vars)
		{
			if (is_array($vars)){
				extract($vars);
			}
			$file_view = APP
				. '/views/'
				. $this->route['controller'] . '/'
				. $this->view . '.php';
			ob_start();
			if (is_file($file_view)){
				require $file_view;
			} else {
				echo '<p>View <b>' . $file_view . '</b> not found </p>';
			}
			$content = ob_get_clean();
			if (false !== $this->layout){
				$file_layout = APP
					. '/views/layouts/'
					. $this->layout . '.php';
				if (is_file($file_layout)){
					require $file_layout;
				} else {
					echo '<p>Layout <b>' . $file_layout . '</b> not found </p>';
				}
			}
		}
		
		protected function cutScripts($content)
		{
			$pattern = "#<script.*?>.*?</script>#si";
			preg_match_all($pattern, $content, $this->scripts);
		}
		
	}