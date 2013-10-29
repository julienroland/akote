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

		$infoCompte = array(
			'nom' => $nom,
			'email'=>$email, 
			'password'=>$motdepasseH,
			'accountType'=>'locataire'
			);

		 Session::put('infosCompte', array(
			'nom' => $nom,
			'email'=>$email, 
			'password'=>$motdepasseH,
			'accountType'=>'locataire'
			));

		$validator = Validator::make(
			array(
				'name' => $nom,
				'password' => $motdepasseH,
				'email' => $email
				),
			array(
				'name' => 'required',
				'password' => 'required|min:3',
				'email' => 'required|email|unique:users'
				)
			);

		if ($validator->fails())
		{
			$messages = $validator->messages();

			return View::make('inscription.locataire.etape1')->with('message',$messages);	
		}

	return View::make('inscription.locataire.comfirmer')->with('infoCompte',$infoCompte);	


}
public function valider(){

	

	$ajout = DB::table('users')->insert(
		array(
			'nom' => $nom,
			'email'=>$email, 
			'password'=>$motdepasseH,
			'accountType'=>'locataire'
			)
		);
	if(!$ajout){

		return Redirect::to('inscription.locataire.etape1')->with('message','Erreur d\'enregistrement');
		
	}
}



}