<?php

class slink {

	public static function to($link)
	{

		$locale = slang::get();

		$string = $locale."/".$link;

		if (Request::secure())
		{
			return secure_asset($string);
		} else {
			return asset($string);
		}
	}

	public static function path($link)
	{
		if (ssl::is())
		{
			return secure_asset($link);
		} else {
			return asset($link);
		}
	}

	public static function segment($n)
	{
		$locale = slang::get();
		if($locale != null) { $n++; }

		return Request::segment($n);
	}
}