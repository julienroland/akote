<?php  

/**
* 
*/
class ProfilController extends BaseController
{	
	
	public function accueil(){

		return View::make('profil.profil');

	}

	public function informations(){
		$userData = User::where('users.id','=',Session::get('user')['id'])->get();
		return View::make('profil.informations')->with('userData',$userData);
	}

	public function monKot(){
		$chambre = Chambre::where('locataire_id','=',Session::get('user')['id'])
			->join('kot','chambres.kot_id','=','kot.id')->get(); //faire la relative entre la chambre qui est à mon user et au kot en question.
		//$chambre = json_decode( $chambre );
			
		return View::make('profil.locataire.monKot')->with('kot',$chambre);
	}

	public function recherche(){

		if(Auth::check())
		{
			
			$rechercheRapide = DB::table('rechercheRapideEnregistre')
			->where('user_id',Session::get('user')['id'])->get();

			$recherceDetaillee = '';
			$typeRecherche = array(
				'rapide'=>$rechercheRapide,
				'detaillee'=>$recherceDetaillee
				);
			return View::make('profil.locataire.recherche')->with('rechercheEnregistre',$typeRecherche['rapide']);
		}
		else
		{
			return Redirect::to('/');
		}
	}
	
}