<?php

class Kot extends Eloquent {

	protected $table = 'kot';

	protected $guarded = array();

	public static $rules = array();

	public function user()
	{
		return $this->belongsTo('User');
	}
	public function chambre()
	{
		return $this->hasMany('Chambre');
	}
	public function charge()
	{
		return $this->hasOne('Charge');
	}
}
