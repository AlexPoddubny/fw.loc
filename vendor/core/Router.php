<?php
	
	namespace vendor\core;
	
	
	class Router
	{
		protected static $routes = [];
		protected static $route = [];
		
		/*public function __construct()
		{
			echo __FILE__;
		}*/
		
		public static function add($regexp, $route = [])
		{
			self::$routes[$regexp] = $route;
		}
		
		/**
		 * @return array
		 */
		public static function getRoutes()
		{
			return self::$routes;
		}
		
		/**
		 * @return array
		 */
		public static function getRoute()
		{
			return self::$route;
		}
		
		/**
		 * finding route
		 * @param $url
		 * @return bool
		 */
		private static function matchRoute($url)
		{
			foreach (self::$routes as $pattern => $route){
				if (preg_match("#$pattern#i", $url, $matches)){
					foreach ($matches as $k => $v){
						if (is_string($k)){
							$route[$k] = $v;
						}
					}
					if (!isset($route['action'])){
						$route['action'] = 'index';
					}
					self::$route = $route;
					return true;
				}
			}
			return false;
		}
		
		protected static function upperCamelCase($name)
		{
			return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
		}
		
		/**
		 * redirects URL to route
		 * @param string $url - source URL
		 * @return void
		 */
		public static function dispatch($url)
		{
			$url = self::removeQueryString($url);
			debug($url);
			if (self::matchRoute($url)){
				$controller = 'app\controllers\\'
					. self::upperCamelCase(self::$route['controller']);
				if (class_exists($controller)){
					$cObj = new $controller(self::$route);
					$action = 'action' . self::upperCamelCase(self::$route['action']);
					if (method_exists($cObj, $action)){
						$cObj->$action();
					} else {
						echo 'Method <b>' . $action . '</b> not found';
					}
				} else {
					echo 'Controller <b>' . $controller . '</b> not found';
				}
			} else {
				http_response_code(404);
				include '404.html';
			}
		}
		
		protected static function removeQueryString($url)
		{
			if ($url){
				$params = explode('&', $url);
				if (false === strpos($params[0], '=')){
					return rtrim($params[0], '/');
				}
				return '';
			}
			return $url;
		}
		
	}