<?php

class RechercheController extends BaseController {



	public function accueil(){

		return View::make('recherche.index');
	}

	public function rapide(){

		return View::make('recherche.rapide');
	}
	public function rechercheRapide($type = NULL){

		$formData = array(
			'type' =>Input::get('type'),
			'loyer_max' => Input::get('loyer_max'),
			'loyer_min' => Input::get('loyer_min'),
			'charges' => Input::get('charge')
			);
		$formRules = array(
			'type' =>'required',
			'loyer_max' => 'required',
			'loyer_min' => 'required',
			'charges' => 'required'
			);

		$validator = Validator::make($formData, $formRules);

		if($validator->fails())
		{
			$messages = $validator->messages();
			return Redirect::to('/')->with('validatorMessge',$messages);
		}
		$type=Input::get('type');
		$loyerMax=Input::get('loyer_max');
		$loyerMin=Input::get('loyer_min');
		$charges=Input::get('charge');
		$zone=Input::get('zone');
		$distance=Input::get('distance');

		$arrayRechercheRapide = array(
			'type'=>$type,
			'loyer_max'=>$loyerMax,
			'loyer_min'=>$loyerMin,
			'charges'=>$charges,
			'zone'=>$zone,
			'distance'=>$distance
			);

		Session::put('ancienneRechercheRapide',$arrayRechercheRapide);
		
		if(Auth::check())
		{
			if(Input::get('enregistrer')=== '1') //register the rapid search of user
			{
				
				if(!empty(Input::get('enregistrerNom')))
				{
					$nom = Input::get('enregistrerNom');
				}
				else
				{
					$nom = 'recherchePerso';
				}	

				$rechercheRapide = DB::table('rechercheRapideEnregistre')
				->insert(array(
					'user_id'=>Session::get('user')['id'],
					'rechercheEnregistre'=>json_encode($arrayRechercheRapide),
					'nom' =>$nom						
					)
				);
				if(!$rechercheRapide){
					return Redirect::to('/')->with('bddMessage','Erreur lors de l\'ajout à la base de donnée');
				}
			}//end enregistrement recherche
		}
		
		if(Input::get('type')==='kot')
		{
			$kot = DB::table('kot')->orderBy('prix')->get();
			return View::make('recherche.type.kot')->with('listeKot',$kot);
		}
		elseif(Input::get('type')==='ecole')
		{
			$kot = DB::table('kot')->orderBy('prix')->get();
			return View::make('recherche.type.ecole')->with('listeKot',$kot);
		}
		elseif(Input::get('type')==='ville')
		{
			if(!empty(Input::get('zone'))){
				$region = strtolower(Input::get('zone'));

				$kot = DB::table('kot')->orderBy('prix')->where('region',$region)->get();
				
				if(!$kot)
				{
					$kot = DB::table('kot')->orderBy('region')->get();
				}
				return View::make('recherche.type.ville')->with(array('listeKot'=>$kot,'message'=>'Aucun résultat ne correspond à votre séléection, voici les kots les plus proches.'));
			}	
			else
			{
				$kot = DB::table('kot')->orderBy('prix')->get();
				return View::make('recherche.type.ville')->with(array('listeKot'=>$kot,'message'=>'Vous n\'avez ciblé aucune ville précédemment, vous pouvez le faire '.link_to_route('showVilleMap','maintenant')));
			}
			

		}

		
	}

	public function detaillee(){

		return View::make('recherche.detaillee');
	}

}