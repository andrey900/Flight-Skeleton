<?php

namespace Controllers;

use Models\Pages;
use Flight;

class PageController extends FrontController
{
	public function indexAction(){
		$this->pageData['pages'] = Pages::getAll();
		$this->pageData['routePages'] = $this->routesSettings['pages'];

		$this->render('pageLists.twig');
	}

	public function homeAction(){
		if( !Pages::getHomePage() ){
			Flight::notFound();
			return;
		}
		$connection = Flight::db();
print_r($connection->connection()->getDatabaseName());
		$this->pageData['homepage'] = Pages::getHomePage();
		$this->pageData['routePages'] = $this->routesSettings['pages'];

		$this->render('home.twig');
	}

	public function detailAction($code){
		$this->pageData['page'] = Pages::where('active', true)->where('code', $code)->firstOrFail();
		$this->pageData['routePages'] = $this->routesSettings['pages'];

		$this->render('pageDetail.twig');
	}

	public static function phpinfoAction(){
		phpinfo();
	}
}