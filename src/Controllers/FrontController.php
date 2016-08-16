<?php

namespace Controllers;

use Flight;

class FrontController
{
	public $beforeRender;
	public $afterRender;

	protected $pageData;
	protected $appConfig;
	protected $routesSettings;

	public function __construct(){
		$this->pageData = array(
			"h1" => "",
			"title" => "",
			"keywords" => "",
			"description" => "",
			"router" => "",
			"sitename" => "",
		);

		$this->appConfig = Flight::getConfig();
		$this->routesSettings = $this->appConfig['routes'];
	}

	public function render($template){
		if( $this->beforeRender instanceof \Closure ){
			$t = $this->beforeRender;
			$t($this);
		}

		Flight::view()->display($template, $this->pageData);

		if( $this->afterRender instanceof \Closure ){
			$t = $this->afterRender;
			$t($this);
		}
	}

	public function notFound(){
		$this->render("404.twig");
	}
}