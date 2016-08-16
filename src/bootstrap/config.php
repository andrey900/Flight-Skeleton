<?php

use App\Routes\RouteGenerator;

return array(
	"settings" => array(
		"path.base"  => SITE_DIR,
		"path.app"   => SITE_DIR.'src'.DIRECTORY_SEPARATOR.'App'.DIRECTORY_SEPARATOR,
		"path.log"   => SITE_DIR.'log'.DIRECTORY_SEPARATOR,
		"path.cache" => SITE_DIR.'cache'.DIRECTORY_SEPARATOR,
		"path.templates" => SITE_DIR."src".DIRECTORY_SEPARATOR."templates".DIRECTORY_SEPARATOR,
		"path.upload"   => SITE_DIR.'uploads'.DIRECTORY_SEPARATOR,
		"template.name" => "main",
	),
	"twig" => array(
		// 'cache'	=>	'twig/',
		// 'cache'	=>	false,
		'auto_reload' => true,
		'debug'	=>	true,
	),
	"db" => array(
		'driver'    => 'mysql',
		'host'      => 'localhost',
		'database'  => 'db_name',
		'username'  => 'user_name',
		'password'  => 'user_pass',
		'charset'   => 'utf8',
		'collation' => 'utf8_unicode_ci',
		'prefix'    => '',
	),
	"routes" => array(
		"home" => 
			RouteGenerator::generateArrRoute('index', '/', '/', 'PageController@homeAction'),
		"pages" => 
			RouteGenerator::generateArrRoute('index', '/pages/', '/', 'PageController') + 
			RouteGenerator::generateArrRoute('detail', '/page/#code#/', '/page/@code[\w]+/', 'PageController'),
	)
);
