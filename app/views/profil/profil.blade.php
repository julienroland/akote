@extends('layout')

@section('container')
<fieldset>
	<legend>{{('Profil de '.Session::get('user')['prenom'].' '.Session::get('user')['nom'])}}</legend>
	{{HTML::linkRoute('profil.informations.index','Mes informations personnel',Session::get('user')['id'])}}
	@if(Session::get('user')['accountType'] ==='locataire')

		{{link_to_route('rechercheEnregistreProfil','Voir mes recherches enregistrées')}}
		{{link_to_route('showKotProfil','Voir mon kot')}}
	@endif
	
	{{Session::get('user')['nom']}}
</fieldset>
@stop