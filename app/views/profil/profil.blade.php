@extends('layout')

@section('container')
<fieldset>
	<legend>{{('Profil de '.Session::get('user')['prenom'].' '.Session::get('user')['nom'])}}</legend>
	{{link_to_route('informationsProfil','Mes informations personnel')}}
	@if(Session::get('user')['accountType'] ==='locataire')

		{{link_to_route('rechercheEnregistreProfil','Voir mes recherches enregistrées')}}
		{{link_to_route('showKotProfil','Voir mon kot')}}
	@endif
	
	{{Session::get('user')['nom']}}
</fieldset>
@stop