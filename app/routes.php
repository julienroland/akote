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

/*
*
*	Français
*/

/* ACCUEIL */
Route::get('/',array(

	'as'=>'showIndex',
	'uses'=>'HomeController@index'

	));
/* END ACCUEIL*/

/* 
*
*INSCRIPTION
*
*/

Route::get('inscription',array(

	'as'=>'showInscription',
	'uses'=>'InscriptionController@accueil'

	));

	/*Propriétaire*/
	Route::get('inscription/proprietaire', function(){

		Redirect::route('inscription/proprietaire/etape1');

	});
	Route::any('inscription/proprietaire/etape1',array(

	'as'=>'inscriptionProprietaire',
	'uses'=>'InscriptionProprietaireController@index'

	));
	/*Route::post('inscription/proprietaire/{etape}',array(
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
/*END INSCRIPTION*/

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

	Route::get('recherche/rapide',array(

	'as'=>'showRapide',
	'uses'=>'RechercheController@rapide'

	));

	/*END rapide*/

	/*detaillee*/

	Route::get('recherche/detaillee',array(

	'as'=>'showDetaillee',
	'uses'=>'RechercheController@detaillee'

	));

	/*END detaillee*/
/*END RECHERCHE*/