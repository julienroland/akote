<?php

class Charge extends Eloquent {
	protected $table = 'charges';

	protected $guarded = array();

	public static $rules = array();

	public function kot()
	{
		return $this->belongsToMany('Kot');
	}
}
