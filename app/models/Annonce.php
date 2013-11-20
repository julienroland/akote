<?php

class Annonce extends Eloquent {
	protected $table = 'annonces';

	protected $guarded = array();

	public static $sluggable = array(
		'build_from' => 'title',
		'save_to'    => 'slug',
		);
	
	public static $rules = array(//'author' => 'required',
		//'body' => 'required'
		);

	public function user(){
		return $this->belongsTo('User'); // une annonce appartient a un user 
	}
}
