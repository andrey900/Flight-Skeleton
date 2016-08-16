<?php

namespace Controllers;

use Models\Pages;

class PageController extends FrontController
{
	public function indexAction(){
		$this->pageData['homepage'] = Pages::getHomePage();
		$this->pageData['routePages'] = $this->routesSettings['pages'];
		$this->render('home.twig');
	}

	public function homeAction(){
		$this->render('pageLists.twig');
	}

	public function detailAction(){
		$this->render('pageDetail.twig');
	}

	public static function phpinfoAction(){
		phpinfo();
	}
}