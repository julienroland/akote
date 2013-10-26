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
		$mdp = Input::get('motdepasse');
		$validator = Validator::make(
			array(
				'email'=>$email,
				'motdepasse'=>Hash::check($mdp)
				),
			array(
				'email'=>'required',
				'motdepasse'=>'required')
			);

		if($validator->fails()){
			$messages = $validator->messages();
			return Redirect::to('profil.identifier')->with('message',$messages);
		}

		$record = User::where($email)->first();

		if($record){
			return Redirect::to('/');

		}
    	
    	
    }
}