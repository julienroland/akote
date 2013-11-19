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
		
		if ($validator->fails()) {
			$messages = $validator->messages();
			return View::make('profil.identifier')
			->with('errorMessages',$messages);
			
		}
		else
		{
			if (Auth::attempt($userdata)) {
				
				$user = User::where('email',$email)->first();				

				Session::put('user',$user);

				$prenomNom = $user->prenom.' '.$user->nom;

				return Redirect::intended('profil')
					->with('message','Vous êtes maintenant connecté en tant que '.$prenomNom);
			} else {
				return Redirect::to('identifier')
					->with('errorMessages','erreur');

			}
		}

	}
}