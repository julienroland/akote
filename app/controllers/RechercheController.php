<?php

class RechercheController extends BaseController {



	public function accueil(){

		return View::make('recherche.index');
	}

	public function rapide(){

		return View::make('recherche.rapide');
	}

	public function detaillee(){

		return View::make('recherche.detaillee');
	}

}