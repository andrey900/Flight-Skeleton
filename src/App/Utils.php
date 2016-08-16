<?php

namespace App;

class Utils
{
	public static function makeUrl($str, $symbol = "_"){
		 // replace non letter or digits by @symbol
		$text = preg_replace('~[^\pL\d]+~u', $symbol, $str);

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		$text = preg_replace('~[^_-\w]+~', '', $text);

		// trim
		$text = trim($text);

		// remove duplicate -
		$text = preg_replace('~_-+~', $symbol, $text);

		// lowercase
		$text = strtolower($text);

		return $text;
	}
}