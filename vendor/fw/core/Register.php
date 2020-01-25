<?php
	
	
	namespace fw\core;
	
	
	class Register
	{
		
		use TSingleton;
		
		protected static $properties = [];
		
		/**
		 * @return array
		 */
		public function setProperty($name, $value)
		{
			self::$properties[$name] = $value;
		}
		
		public function getProperty($name)
		{
			if (isset(self::$properties[$name])){
				return self::$properties[$name];
			}
			return null;
		}
		
		/**
		 * @return array
		 */
		public function getProperties()
		{
			return self::$properties;
		}
		
	}