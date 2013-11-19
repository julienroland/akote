<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* TEST */
Route::get('testModelAnnonce',function(){
	$annonce= Annonce::with('annonce')
		->join('users','annonces.user_id','=','users.id')
		->get();
	return $annonce;
});
Route::get('testModelUserKot',function(){
	$kots= Kot::with('user')
		->join('userHasKots','kot.id','=','userHasKots.kot_id')
		->join('users','userHasKots.user_id','=','users.id')
		->where('users.id','=','39')
		->get();

		return $kots;
	
});
Route::get('testModelKot',function(){
	$kots= User::with('kot')
		->join('userHasKots','users.id','=','userHasKots.user_id')
		->join('kot','userHasKots.kot_id','=','kot.id')
		->where('users.id','=','39')
		->get();

		return $kots;
	
});
/* END TEST*/

/*
*
*	Français
*
*/

/*
*
*	IF LOGIN
*
*/

Route::group(array('before','auth'),function(){

	//Route::get('identifier',function(){
		
		//return Redirect::intended('/');
		
	//});

});

/* END IF LOGIN */

/*
*
*	AJAX
*
*/
	Route::any('dataKot',array(
		'as'=>'listKot',
		'uses'=>'ajaxController@listKot'
		));
	Route::any('dataEcole',array(
		'as'=>'listEcole',
		'uses'=>'ajaxController@listEcole'
		));
/*END AJAX*/

/* ACCUEIL */
Route::get('/',array(

	'as'=>'showIndex',
	'uses'=>'HomeController@index'

	));
/* END ACCUEIL*/

/*
*
* IDENTIFIER
*
*/
Route::get('identifier',array(
	'as'=>'identifierUser',
	'uses'=>'IdentifierController@accueil'
	));

Route::post('identifier',array(
	'as'=>'identifierUserRequete',
	'uses'=>'IdentifierController@requete'
	));

/*END IDENTIFIER*/

/*
*
* DECONNECTER
*
*/

Route::get('deconnecter',array(
	'as'=>'deconnecterUser',
	'uses'=>'DeconnecterController@accueil'
	));

/*END DECONNECTER*/

/*
*
*	PROFIL
*
*/
	Route::get('profil',array(
		'as'=>'profilUser',
		'uses'=>'ProfilController@accueil'
		));
	/*Route::get('profil/informations',array(
		'as'=>'informationsProfil',
		'uses'=>'ProfilController@informations'
		));*/
	Route::resource('profil.informations', 'UtilisateurController');
	/*Locataire view*/
	Route::get('profil/recherche_enregistre',array(
		'as'=>'rechercheEnregistreProfil',
		'uses'=>'profilController@recherche'
		));
	Route::get('profil/mon_kot',array(
		'as'=>'showKotProfil',
		'uses'=>'profilController@monKot'
		));
	/*end locataire view*/
/*END PROFIL*/
/*
*
*	MAP
*
*/
	/*Ville map*/

	Route::get('map/ville',array(
		'as'=>'showVilleMap',
		'uses'=>'mapController@ville'
		));

	/*END ville map*/
/*END MAP*/
/* 
*
*INSCRIPTION
*
*/

Route::get('inscription',array(

	'as'=>'showInscription',
	'uses'=>'InscriptionController@accueil'

	));


Route::get('inscription/proprietaire', function(){

	Redirect::route('inscription/proprietaire/etape1');

});
Route::get('inscription/locataire', function(){

	Redirect::route('inscription/locataire/etape1');

});
Route::get('inscription/colocation', function(){

	Redirect::route('inscription/colocation/etape1');

});

/*Propriétaire*/
Route::any('inscription/proprietaire/etape1',array(

	'as'=>'inscriptionProprietaire',
	'uses'=>'InscriptionProprietaireController@index'

	));
	/*Route::any('inscription/proprietaire/{etape}',array(
		'as'=>'inscriptionProprietaire',
		'uses'=>'InscriptionController@accueil'
		))->where('etape','[0-5]{1}');*/
Route::post('inscription/proprietaire/etape2',array(

	'as'=>'inscriptionProprietaireAccount',
	'uses'=>'InscriptionProprietaireController@createAccount'

	));
Route::post('inscription/proprietaire/etape3',array(

	'as'=>'inscriptionProprietaireImage',
	'uses'=>'InscriptionProprietaireController@image'

	));	
Route::post('inscription/proprietaire/etape4',array(

	'as'=>'inscriptionProprietaireBatiment',
	'uses'=>'InscriptionProprietaireController@batiment'

	));
Route::post('inscription/proprietaire/etape5',array(

	'as'=>'inscriptionProprietaireAutre',
	'uses'=>'InscriptionProprietaireController@autre'

	));
Route::post('inscription/proprietaire/annonce',array(

	'as'=>'inscriptionProprietaireAnnonce',
	'uses'=>'InscriptionProprietaireController@annonce'

	));	
Route::any('inscription/proprietaire/comfirmer',array(

	'as'=>'inscriptionProprietaireComfirmer',
	'uses'=>'InscriptionProprietaireController@comfirmer'

	));
/*END proprietaire*/

/*locataire*/
Route::any('inscription/locataire/etape1',array(

	'as'=>'inscriptionLocataire',
	'uses'=>'InscriptionLocataireController@index'

	));
Route::post('inscription/locataire/comfirmer',array(

	'as'=>'inscriptionLocataireComfirmer',
	'uses'=>'InscriptionLocataireController@comfirmer'

	));
Route::post('inscription/locataire/valider',array(

	'as'=>'inscriptionLocataireValider',
	'uses'=>'InscriptionLocataireController@valider'

	));
/*END locataire*/

/*colocation*/
Route::any('inscription/colocation/etape1',array(

	'as'=>'inscriptionColocation',
	'uses'=>'InscriptionColocationController@index'

	));


Route::post('inscription/colocation/etape2',array(

	'as'=>'inscriptionColocationAccount',
	'uses'=>'InscriptionColocationController@createAccount'

	));
Route::post('inscription/colocation/etape3',array(

	'as'=>'inscriptionColocationImage',
	'uses'=>'InscriptionColocationController@image'

	));	
Route::post('inscription/colocation/etape4',array(

	'as'=>'inscriptionColocationBatiment',
	'uses'=>'InscriptionColocationController@batiment'

	));
Route::post('inscription/colocation/etape5',array(

	'as'=>'inscriptionColocationAutre',
	'uses'=>'InscriptionColocationController@autre'

	));
Route::post('inscription/colocation/annonce',array(

	'as'=>'inscriptionColocationAnnonce',
	'uses'=>'InscriptionColocationController@annonce'

	));	
Route::any('inscription/colocation/comfirmer',array(

	'as'=>'inscriptionColocationComfirmer',
	'uses'=>'InscriptionColocationController@comfirmer'

	));
/*END colocation*/
/*END INSCRIPTION*/

/*
*
* PROFIL
*
*/

Route::any('profil/',array(
	'as'=>'showProfil',
	'uses'=>'profilController@accueil'
	));
Route::any('profil/kot',array(
	'as'=>'showMonKot',
	'uses'=>'profilController@monKot'
	));
/*END PROFIL*/

/*
*
* CONDITIONS GENERAL D UTILISATION
*
*/
Route::get('cgu',array(
	'as'=>'cgu',
	'uses' => 'cguController@voir'
	));
/*END CGU*/

/*
*
* RECHERCHE 
*
*/

Route::get('recherche',array(

	'as'=>'showRecherche',
	'uses'=>'RechercheController@accueil'

	));

/*rapide*/

/*Route::get('recherche/rapide',array(

	'as'=>'showRapide',
	'uses'=>'RechercheController@rapide'

	));	*/
Route::any('recherche/rapide',array(
	'as'=>'showRapideEcole',
	'uses'=>'RechercheController@rechercheRapide'
	));
Route::any('recherche/rapide/{tri}',array(
	'as'=>'triRapide',
	'uses'=>'RechercheController@trier'
	));

/*END rapide*/

/*detaillee*/

Route::get('recherche/detaillee',array(

	'as'=>'showDetaillee',
	'uses'=>'RechercheController@detaillee'
	));

/*END detaillee*/

/*END RECHERCHE*/

/*
*
*	ANNONCE
*
*/
/*voir annonce*/
Route::get('annonce/{id}',array(
	'as'=>'showAnnonce',
	'uses'=>'AnnonceController@show'
	));
/*END voir annonce*/

/*valider annonce*/
Route::any('annonce/{id}/valider',array('before'=>'auth',
	'as'=>'validateAnnonce',
	'uses'=>'AnnonceController@validate'
	));
/*END valider annonce*/

/*END ANNONCE*/

//Route::resource('informationspersos', 'InformationspersosController');