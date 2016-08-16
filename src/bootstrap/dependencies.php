<?php

Flight::register('getConfig', function() use ($arConfig){
	return $arConfig;
});

Flight::set('settings', $arConfig['settings']);

$loader = new Twig_Loader_Filesystem($arConfig['settings']['path.templates'].$arConfig['settings']['template.name']);

Flight::register('view', 'Twig_Environment', array($loader, $arConfig['twig']), function($twig) {
	$twig->addExtension(new Twig_Extension_Debug()); // Add the debug extension
});

Flight::register('db', 'Illuminate\Database\Capsule\Manager', array(), function($db) use ($arConfig) {
	$db->addConnection($arConfig['db']);
	$db->setAsGlobal();
	$db->bootEloquent();
});

Flight::register('registerController', function(){
	$settings = Flight::get("settings");
	$controllers = array_diff(scandir($settings['path.app'].'../Controllers/'), array('..', '.', 'FrontController.php'));
	foreach ($controllers as $controllerFile) {
		if( !strpos($controllerFile, "Controller") ) 
			continue;

		$controllerName = pathinfo($controllerFile);
		$controllerName = $controllerName['filename'];
		Flight::register($controllerName, "Controllers\\".$controllerName);
	}
});
