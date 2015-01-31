<?php


class app {

	/*
		Request URL with paramters
	*/
	protected $url;

	/*
		Controller Name
	*/
	protected $controllerName;

	/*
		Controller object
	*/
	protected $controller;

	/*
		Name of the action
	*/
	protected $actionName;

	/*
	
	*/
	public function __construct($url) {
		$this->url = $url;
	}

	public function parseURL() {
		$relevantUrl = explode(APPROOT, $this->url);
		$url = explode('/', $relevantUrl[1]);
		$this->controllerName = !empty($url[1]) ? $url[1]."Controller" : "indexController";
	}

	public function loadController() {
		$this->controller = new $this->controllerName();
		if(!$this->controller) echo "This path does not exist";
	}
}
?>