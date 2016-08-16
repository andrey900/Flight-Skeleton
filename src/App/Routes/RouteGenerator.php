<?php

namespace App;

use Flight;
use Illuminate\Support\Str;

/**
* 
*/
class RouteGenerator
{
	public static function generateArrRoute($name, $url, $pattern, $controller = false){
		$name = strtolower($name);
		
		if( $controller ){
			$_c = explode("@", $controller);
			$controller = $_c[0];
			$action = ( isset($_c[1]) ) ? $_c[1] : $name."Action";
		} else {
			$controller = Str::title(str_replace("/", "", $url))."Controller";
			$action = "indexAction";
		}
		
		return array(
			$name.".url" => $url,
			$name.".pattern" => $pattern,
			$name.".controller" => $controller,
			$name.".action" => $action,
		);
	}

	public static function registerRouters(array $arRouters = array()){
		if( !$arRouters ){
			$allConfig = \Flight::getConfig();
			$arRouters = $allConfig['routes'];
		}

		foreach ($arRouters as $routeName => $routerGroup) {
			$arRouterKeys = array();
			foreach ($routerGroup as $groupName => $info) {
				$arT = explode(".", $groupName);
				if( isset($arRouterKeys[$arT[0]]) ) continue;
				$arRouterKeys[$arT[0]] = $arT[0];
			}
			foreach ($arRouterKeys as $k) {
				Flight::route(
					$routerGroup[$k.'.pattern'], 
					array(
						Flight::$routerGroup[$k.'.controller'](), 
						$routerGroup[$k.'.action']
					)
				);
			};
		}
	}
}