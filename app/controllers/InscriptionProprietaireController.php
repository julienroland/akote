<?php

class InscriptionProprietaireController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{

		return View::make('inscription.proprietaire.etape1');
	}
	/*public function accueil($etape)
	{
		dd($etape);
		if($etape==='etape2')
		{
		return View::make('inscription.proprietaire.etape2');
		}
		else if($etape==='etape3')
		{
		return View::make('inscription.proprietaire.etape3');
		}
		else if($etape==='etape4')
		{
		return View::make('inscription.proprietaire.etape4');
		}
		else if($etape==='etape5')
		{
		return View::make('inscription.proprietaire.etape5');
		}
	}*/
	public function createAccount()
	{
	
		return View::make('inscription.proprietaire.etape2');
	}

	public function image()
	{

	 	return View::make('inscription.proprietaire.etape3');
	 	
	}

	public function batiment()
	{
	 	return View::make('inscription.proprietaire.etape4');	
	}

	public function autre()
	{
	 	return View::make('inscription.proprietaire.etape5');	
	}
	
	public function annonce()
	{
	 	return View::make('inscription.proprietaire.annonce');	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		return View::make('inscription.proprietaire');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}