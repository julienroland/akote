<?php

class RechercheController extends BaseController {



	public function accueil(){

		return View::make('recherche.index');
	}

	public function rapide(){

		return View::make('recherche.rapide');
	}
	public function rechercheRapide(){
		
		$kot = DB::table('kot')->orderBy('prix')->get();
		return View::make('recherche.type.ecole')->with('listeKot',$kot);
		
	}

	public function detaillee(){

		return View::make('recherche.detaillee');
	}

}