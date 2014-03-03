<?php

class sPage {

	public static function shortcode($clear, $data = null)
	{
		$str = explode(" ", $clear);
		$type = $str[0];

		if(!isset($str[1]))
		{
			$options = null;
			// no options
		} else {

			// options exist
			$options = [];
			for($i = 1; $i < count($str); $i++)
			{
				preg_match_all('/(.*?)=\"(.*?)\"/', $str[$i], $rendered);
				if(!empty($rendered[0]))
				{
					$options[$rendered[1][0]] = $rendered[2][0];
				}
			}
		}

		if(method_exists('shortcode',$type))
		{
			return shortcode::$type($options, $data);
		} else {
			return '['.$clear.']';
		}
	}

	public static function map()
	{
		return 1;
	}

	public static function show($url)
	{	

		$page = Page::where('url', $url)
				->where('language', Config::get('app.locale'))
				->first();

		if($page == null) {
			App::abort(404);
			exit;
		}
		$text = $page->content;
		$data = array('title' => $page->title, 'menu' => Page::menu());
		preg_match_all('/\[(.*?)\]/', $text, $reg);

		$regs = [];

		for ($j = 0; $j < count($reg[0]); $j++) {
			$regs[$reg[0][$j]] = $reg[1][$j];
		}

		$change = [];
		$to = [];

		foreach($regs as $tocange => $clear)
		{
			$change[] = $tocange;
			if(explode(' ', $clear)[0] == 'view')
			{
				$to[] = self::shortcode($clear, $data);
			} else {
				$to[] = self::shortcode($clear);
			}

		}

		$text = str_replace($change, $to, $text);

		return $text;

	}

}