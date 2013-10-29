<?php  

/**
* 
*/
class IdentifierController extends BaseController
{	
	
	public function accueil(){

		Return View::make('profil.identifier');
	}

	public function requete()
	{
		
		$email = Input::get('email');
		$mdp = Input::get('password');

		$userdata = array(
			'email'    => $email,
			'password' => $mdp
			);

		$rules = array(
			'email' => 'required|email',
			'password' => 'required'
			);

		$validator = Validator::make($userdata, $rules);
		
		if ($validator->passes()) {

			if (Auth::attempt($userdata)) {
				$nomPrenom = $userData[0]->nom.' '.$userData[0]->prenom;
				return View::make('profil.identifier')
				->with('message','Vous êtes maintenant connecté en tant que '.$nomPrenom);
			} else {

        // Redirect to the login page.
				return View::make('profil.identifier')
				->with('message','Erreur');
			}
		}

	}
}