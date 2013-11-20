<?php

class Message extends Eloquent {

	protected $table = 'messages';

	protected $guarded = array();

	public static $rules = array();

	public function user()
	{
		return $this->belongsTo('users');
	}
}
