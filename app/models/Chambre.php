<?php

class Chambre extends Eloquent {
	
	protected $table = 'chambres';

	protected $guarded = array();

	public static $rules = array();

	

	public function kot(){
		return $this->belongsTo('kot');
	}
	public function user(){
		return $this->belongsTo('users');
	}
	
}
