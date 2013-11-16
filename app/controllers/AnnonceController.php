<?php

class AnnonceController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{

		return View::make('inscription.locataire.etape1');
	}

	public function show($id)
	{
		$annonce = Annonce::find($id);
		return View::make('annonces.annonce')->with('annonce',$annonce);

	}
	public function validate()
	{
		$chambre = Input::get('chambre');
		$id = Input::get('id');
		$user_id = Session::get('user')['id'];

		$userdata = array(
			'chambre'=> $chambre,
			);

		$rules = array(
			'chambre' => 'required|numeric'
			);
		
		$validator = Validator::make($userdata, $rules);
		
		if ($validator->passes()) {

			$chambre_add = Chambre::where('kot_id','=',$id)->where('numero','=',$chambre)->first();
			$chambre_add->locataire_id = $user_id;
			
			$chambre_add->save();
			
			return View::make('annonces.validate')->with('chambre',$chambre);

			}
			else
			{
				$messages = $validator->messages();
				return Redirect::to('annonce/'.$id)
				->with('message',$messages);
			}
		}



	}