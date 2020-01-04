<?php
	
	error_reporting(-1);
	
	use vendor\core\Router;
	
	$query = rtrim($_SERVER['QUERY_STRING'], '/');
	
	define('WWW', __DIR__);
	define('CORE', dirname(__DIR__ . '/vendor/core'));
	define('ROOT', dirname(__DIR__));
	define('APP', dirname(__DIR__) . '/app');
	define('LAYOUT', 'default');
	
	require '../vendor/libs/functions.php';

	//classes autoload
	spl_autoload_register(function($class){
		$file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
		if (is_file($file)){
			require_once $file;
		}
	});
	
	//specific routes
	Router::add('^page/(?P<action>[a-z-]+)?/(?P<alias>[a-z-]+)?$', ['controller' => 'page']);
	Router::add('^page/(?P<alias>[a-z-]+)?$', ['controller' => 'page', 'action' => 'view']);
	
	//default routes
	Router::add('^$', ['controller' => 'main', 'action' => 'index']);
	Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
	
	//routing
	Router::dispatch($query);