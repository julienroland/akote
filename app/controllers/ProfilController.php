<?php  

/**
* 
*/
class ProfilController extends BaseController
{	
	
	public function accueil(){

		Return View::make('profil.profil');

	}

	public function informations(){

		Return View::make('profil.informations');
	}

	public function monKot(){
		//$chambre = Chambre::where('locataire_id','=',Session::get('user')['id'])->first(); //faire la relative entre la chambre qui est à mon user et au kot en question.
		Return View::make('profil.locataire.monKot');
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