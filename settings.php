<?php
	
	
	define('EXT', '.html');
	define('MEDIA', '/framework/app/media/');

	require_once("libs/Slim/Slim.php");
	require_once("libs/Slim/View.php");
	require_once("libs/Slim/Extras/Views/Twig.php");
	require_once("libs/ActiveRecord/ActiveRecord.php");
	require_once("libs/Strong/Strong.php");
	require_once("app/application.php");
	
	$url_security = array(
		array('path' => '/admin/.+'),
	);
	
	// Authentication Strong
	$config_strong = array(
	    'provider' => 'Activerecord',
	    'auth.type' => 'form',
	    'login.url' => '/framework/login',
	    'security.urls' => $url_security,
	);
	
	//Configuração Slim
	$config_slim = array(
		'view' => new \Slim\Extras\Views\Twig(),
		'templates.path' => 'app/templates/',
		'debug' => true
	);
	
	\Slim\Slim::registerAutoloader();
	\Slim\Extras\Views\Twig::$twigDirectory = __DIR__ . '/libs/Twig/';
	\Slim\Extras\Views\Twig::$twigExtensions = array('Twig_Extensions_Slim',);
	
	ActiveRecord\Config::initialize(function($cfg){
		
		$host = "localhost";
		$user = "root";
		$password = "";
		$database = "frameworkslim";
		$directory_model = "/app/models";
		
	    $cfg->set_model_directory(dirname(__FILE__) . $directory_model);
	    $cfg->set_connections(array('development' => "mysql://{$user}:{$password}@{$host}/{$database}"));
	});
	
