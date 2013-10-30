<?php

class RechercheController extends BaseController {



	public function accueil(){

		return View::make('recherche.index');
	}

	public function rapide(){

		return View::make('recherche.rapide');
	}
	public function rechercheRapide($type = NULL){
		
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
			$kot = DB::table('kot')->orderBy('prix')->get();
			return View::make('recherche.type.ville')->with('listeKot',$kot);

		}

		
	}

	public function detaillee(){

		return View::make('recherche.detaillee');
	}

}