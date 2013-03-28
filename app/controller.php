<?php

abstract class Controller extends Application {

	public function __construct()
	{
		parent::__construct();
		$this->auth = Strong::getInstance();

		if ($this->auth->loggedIn()) {
			$this->user = $this->auth->getUser();
		}
	}

	public function redirect($name, $routeName = true)
	{
		$url = $routeName ? $this->app->urlFor($name) : $name;
		$this->app->redirect($url);
	}

	public function get($value = null)
	{
		return $this->app->request()->get($value);
	}

	public function post($value = null)
	{
		return $this->app->request()->post($value);
	}

	public function response($body)
	{
		$response = $this->app->response();
		$response['Content-Type'] = 'application/json';
		$response['X-Powered-By'] = APPLICATION . ' ' . VERSION;
		$response->body(json_encode(array($body)));
	}

	public function render($template, $data = array(), $status = null)
	{
		if ($len = strpos(strrev($template), '.')) {
			$template = substr( $template, 0, -($len+1) );
		}
		if($this->auth->loggedIn()){
			$this->app->view()->appendData(array('usuario' => $this->user));
		}
		$this->app->view()->appendData(array('MEDIA' => MEDIA));
		$this->app->render($template . EXT, $data, $status);
	}
	
}