<?php
	
	namespace vendor\core;
	
	
	use Exception;
	
	class Router
	{
		protected static $routes = [];
		protected static $route = [];
		
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
					if (!isset($route['prefix'])){
						$route['prefix'] = '';
					} else {
						$route['prefix'] .= '\\';
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
		 * @throws NotFoundException
		 */
		public static function dispatch($url)
		{
			$url = self::removeQueryString($url);
			if (self::matchRoute($url)){
				$controller = 'app\controllers\\'
					. self::$route['prefix']
					. self::upperCamelCase(self::$route['controller'])
					. 'Controller';
				if (class_exists($controller)){
					$cObj = new $controller(self::$route);
					$action = 'action' . self::upperCamelCase(self::$route['action']);
					if (method_exists($cObj, $action)){
						$cObj->$action();
						$cObj->getView();
					} else {
						throw new Exception('Method <b>' . $action . '</b> not found');
					}
				} else {
					throw new Exception('Controller <b>' . $controller . '</b> not found');
				}
			} else {
				throw new NotFoundException('Page not found');
			}
		}
		
		/**
		 * deleting GET-parameters
		 * @param string $url
		 * @return string
		 */
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