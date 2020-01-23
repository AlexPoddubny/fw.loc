<?php
	
	error_reporting(-1);
	
	use fw\core\App;
	use fw\core\Router;
	
	$query = rtrim($_SERVER['QUERY_STRING'], '/');
	
	define('WWW', __DIR__);
	define('CORE', dirname(__DIR__ . '/vendor/fw/core'));
	define('ROOT', dirname(__DIR__));
	define('LIBS', dirname(__DIR__) . '/vendor/fw/libs');
	define('APP', dirname(__DIR__) . '/app');
	define('TMP', dirname(__DIR__) . '/tmp');
	define('LOG', TMP . '/log');
	define('CACHE', TMP . '/cache');
	define('LAYOUT', 'blog');
	define("DEBUG", 1);
	
	require '../vendor/fw/libs/functions.php';
	require __DIR__ . '/../vendor/autoload.php';

	new App();
	
	//specific routes
	Router::add('^page/(?P<action>[a-z-]+)?/(?P<alias>[a-z-]+)?$', ['controller' => 'page']);
	Router::add('^page/(?P<alias>[a-z-]+)?$', ['controller' => 'page', 'action' => 'view']);
	
	//ADminka
	Router::add('^admin$', ['controller' => 'user', 'action' => 'index', 'prefix' => 'admin']);
	Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);
	
	//default routes
	Router::add('^$', ['controller' => 'main', 'action' => 'index']);
	Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
	
	//routing
	Router::dispatch($query);