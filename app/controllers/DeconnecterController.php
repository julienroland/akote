<?php  

class DeconnecterController extends BaseController
{	
	
	public function accueil()
	{
		Auth::logout();
		Session::forget('user');
		return Redirect::intended('/');
	}



}