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
		$motdepasseComfirm = Input::get('passwordComfirm');

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
				'password' => $motdepasse,
				'passwordComfirm'=>$motdepasseComfirm,
				'email' => $email
				),
			array(
				'name' => 'required|alpha',
				'password' => 'required|min:3|max:20',
				'passwordComfirm'=>'required|same:password',
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

	$nom = Session::get('infosCompte')['nom'];
	$email = Session::get('infosCompte')['email'];
	$motdepasseH = Session::get('infosCompte')['password'];

	$ajout = DB::table('users')->insert(
		array(
			'nom' => $nom,
			'email'=>$email, 
			'password'=>$motdepasseH,
			'accountType'=>'locataire'
			)
		);
	if(!$ajout){

		return Redirect::to('inscription/locataire/etape1');
		
		}

		return Redirect::to('inscription/locataire/etape1');

}



}