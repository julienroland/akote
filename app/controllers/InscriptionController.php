<?php

class InscriptionController extends BaseController {


	public function accueil()
	{
		return View::make('inscription.index');
	}

}