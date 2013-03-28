<?php
	
	require_once("settings.php");
	
	$app = new \Slim\Slim($config_slim);
	
	$app->add(new Slim\Extras\Middleware\StrongAuth($config_strong));
	
	$c = new Application($app);
	
	require_once("apps.php");
	require_once("routes.php");
	
	$c->run();