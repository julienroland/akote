<?php

class InscriptionLocataireController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{

		return View::make('inscription.locataire.etape1');
	}

	public function comfirmer()
	{
		$email = Input::get('email');
		$nom = Input::get('nom');
		$motdepasse = Input::get('motdepasse');

		$motdepasseH = Hash::make($motdepasse);

		$ajout = DB::table('users')->insert(
			array('nom' => $nom, 'email'=>$email, 'motdepasse'=>$motdepasseH)
			);
		if(!$ajout){

		return Redirect::to('inscription.locataire.etape1')->with('message','Erreur d\'enregistrement');
		
		}
		return View::make('inscription.locataire.comfirmer');	
		

	}

	

}