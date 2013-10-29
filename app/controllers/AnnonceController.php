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

	public function show()
	{
		
		Return View::make('annonces.annonce');

	}
	public function validate()
	{
		
		Return View::make('annonces.validate');

	}

	

}