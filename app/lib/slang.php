<?php

class slang {

	public static function get($array = null)
	{
		$languages_model = language::all();
		foreach($languages_model as $lang)
		{
			$languages[] = $lang->code;
		}
		if($array == 'array')
		{
			return $languages;
		} else {

			$locale = Request::segment(1);
			if(in_array($locale, $languages)){
				App::setLocale($locale);
			} else {
				$locale = null;
			}

			return $locale;

		}
	}
}