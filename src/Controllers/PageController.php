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
		try {
			$connection = Flight::db();
			//echo "<pre>";print_r($connection->getConnection());
			//$connection->connection();
			//$this->pageData['homepage'] = Pages::getHomePage();
			//$this->pageData['routePages'] = $this->routesSettings['pages'];
		} catch (Exception $e){
			echo "string";
		}

		$this->render('home.twig');
	}

	public function detailAction($code){
		/*$this->pageData['page'] = Pages::where('active', true)->where('code', $code)->firstOrFail();
		$this->pageData['routePages'] = $this->routesSettings['pages'];
*/
		$this->render('pageDetail.twig');
	}

	public static function phpinfoAction(){
		phpinfo();
	}
}