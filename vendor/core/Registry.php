<?php
	
	
	namespace vendor\core;
	
	
	use vendor\core\base\TSingleton;
	
	class Registry
	{
		use TSingleton;
		
		protected static $objects = [];
		
		protected function __construct() {
			$components = (require ROOT . '/config/config.php')['components'];
			foreach($components as $name => $component){
				self::$objects[$name] = new $component;
			}
		}
		
		public function __get($name)
		{
			if (is_object(self::$objects[$name])){
				return self::$objects[$name];
			}
		}
		
		public function __set($name, $object)
		{
			if (!isset(self::$objects[$name])){
				self::$objects[$name] = new $object;
			}
		}
		
		public function getList(){
			echo '<pre>';
			var_dump(self::$objects);
			echo '</pre>';
		}
		
	}