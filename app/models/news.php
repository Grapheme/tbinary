<?php

class news extends Eloquent {
	protected $guarded = array();

	protected $table = 'news';

	public static $rules = array(
		'title' => 'required',
		'language' => 'required'
	);

	public static function getAmount($number)
	{
		$news = self::paginate($number);
		return $news;
	}

}