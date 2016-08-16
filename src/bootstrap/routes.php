<?php

use Controllers\PageController;

/* Frontend routers */
$config = Flight::getConfig();

App\Routes\RouteGenerator::registerRouters();

Flight::map('notFound', function(){
    // Display custom 404 page
	$controller = new PageController();
	$controller->notFound();
});

Flight::route('/phpinfo', array("Controllers\PageController", 'phpinfoAction'));

Flight::route('/install-example/', function(){
	$connection = Flight::db();
	try {
		$connection->connection();
		echo "install system";
	} catch (Exception $e){
		echo "<p style='color:red'>Please set the correct database connection!</p>";
		echo "<p>Edit 'db' array in config file: /src/bootstrap/config.php</p>";
		echo "<a href=\"/install-example/\">Check again!</a>";
	};
});