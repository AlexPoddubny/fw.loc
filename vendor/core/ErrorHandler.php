<?php
	
	namespace vendor\core;
	
	
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
			set_exception_handler([$this, 'exceptionHandler']);
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
				$this->displayError(
					$error['type'],
					$error['message'],
					$error['file'],
					$error['line']
				);
			} else {
				ob_end_flush();
			}
		}
		
		public function exceptionHandler($e)
		{
			$this->displayError(
				'Exception',
				$e->getMessage(),
				$e->getFile(),
				$e->getLine(),
				$e->getCode()
			);
			return true;
		}
		
		protected function logErrors(
			$message = '',
			$file = '',
			$line = ''
		)
		{
			error_log('[' . date('Y-m-d H:i:s')
				. '] Текст ошибки: '. $message . '| Файл: ' . $file . ' | Строка: ' . $line
				. "\n==========================\n",
				3, LOG . '/errors.log'
			);
		}
		
		protected function displayError(
			$errno,
			$errstr,
			$errfile,
			$errline,
			$responce = 500
		)
		{
			$this->logErrors($errstr, $errfile, $errline);
			http_response_code($responce);
			if ($responce == 404){
				require APP . '/views/errors/404.html';
				die;
			}
			if (DEBUG) {
				require APP . '/views/errors/dev.php';
			} else {
				require APP . '/views/errors/prod.php';
			}
			die;
		}
		
	}