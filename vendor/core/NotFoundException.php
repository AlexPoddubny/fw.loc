<?php
	
	
	namespace vendor\core;
	
	
	use Exception;
	
	class NotFoundException
		extends Exception
	{
		public function __construct($message = '', $code = 404){
			parent::__construct($message, $code);
		}
	}