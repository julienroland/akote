<?php  

/**
* 
*/
class ProfilController extends BaseController
{	
	
	public function accueil(){

		Return View::make('profil.profil');

	}
	public function informations(){

		Return View::make('profil.informations');
	}
	
}