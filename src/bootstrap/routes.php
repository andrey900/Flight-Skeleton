<?php

use Controllers\PageController;

/* Frontend routers */
$config = Flight::getConfig();

App\RouteGenerator::registerRouters();

Flight::map('notFound', function(){
    // Display custom 404 page
	$controller = PageController();
	$controller->notFound();
});

Flight::route('/phpinfo', array("PageController", 'phpinfoAction'));