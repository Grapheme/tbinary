<?php

class group extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'desc' => 'required'
	);

	public function roles()
	{
		return $this->belongsToMany('role');
	}
}