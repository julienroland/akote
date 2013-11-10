<?php 
/**
* 
*/
class AjaxController extends BaseController
{
	
	public function listKot()
	{
		$datas = DB::table('kot')->get();

		if(!$datas)
		{	
			

		}
		$id = [];
		$prix = [];
		$region = [];
		$disponibilite = []; 
		$lat= [];
		$lng= [];
		$adresse = [];
		$oData = [];

		foreach ($datas as $data)
			{
				$d = array('id'=>$data->id,'prix'=>$data->prix,'region'=>$data->region,'adresse'=>$data->adresse,'disponible'=>$data->disponible,'lat'=>$data->lat,'lng'=>$data->lng);
				array_push($oData, $d );
			}
		 
		return(json_encode(array('data'=>$oData)));
	}
	public function listEcole()
	{
		$datas = DB::table('ecoles')->get();

		if(!$datas)
		{	
			

		}
		$id = [];
		$nom = [];
		$siteweb = [];
		$region = []; 
		$lat= [];
		$lng= [];
		$adresse = [];
		$postal = [];
		$initial = [];
		$oData = [];

		foreach ($datas as $data)
			{
				$d = array('id'=>$data->id,'nom'=>$data->nom,'siteweb'=>$data->siteweb,'region'=>$data->region,'lat'=>$data->lat,'lng'=>$data->lng,'adresse'=>$data->adresse,'postal'=>$data->postal,'initial'=>$data->initial);
				array_push($oData, $d );
			}
		 
		return(json_encode(array('data'=>$oData)));
	}
}