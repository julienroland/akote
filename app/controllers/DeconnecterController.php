<?php  

class DeconnecterController extends BaseController
{	
	
	public function accueil()
	{
		Auth::logout();
		Session::forget('user');
		Return View::make('index');
	}



}