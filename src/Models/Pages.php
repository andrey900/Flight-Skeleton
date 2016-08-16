<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model {
	protected $table = "pages";

	protected $fillable = array("id", "name", "code", "active", "sort", "preview_text", "detail_text", "preview_image", "detail_image", "seo_title", "seo_description", "seo_keywords", "tags", "show_counter", "is_home");

	public static function getHomePage()
	{
		return self::where("is_home", true)->where('active', true)->firstOrFail();
	}
}