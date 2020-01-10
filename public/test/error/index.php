<?php
	
	define("DEBUG", 1);
	
	class ErrorHandler
	{
		public function __construct()
		{
			if (DEBUG) {
				error_reporting(-1);
			} else {
				error_reporting(0);
			}
			set_error_handler([$this, 'errorHandler']);
			ob_start();
			register_shutdown_function([$this, 'fatalErrorHandler']);
		}
		
		public function errorHandler($errno, $errstr, $errfile, $errline)
		{
			$this->displayError($errno, $errstr, $errfile, $errline);
			return true;
		}
		
		public function fatalErrorHandler()
		{
			$error = error_get_last();
			if (!empty($error) AND $error['type']
				& ( E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)){
				ob_get_clean();
				$this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
			} else {
				ob_end_flush();
			}
		}
		
		protected function displayError(
			$errno,
			$errstr,
			$errfile,
			$errline,
			$responce = 500
		)
		{
			http_response_code($responce);
			if (DEBUG) {
				require 'views/dev.php';
			} else {
				require 'views/prod.php';
			}
			die;
		}
		
	}
	
	new ErrorHandler();
	
	try {
		if (empty($test)){
			throw new Exception('Ooops! Exception!');
		}
	} catch (Exception $e){
		var_dump($e);
	}