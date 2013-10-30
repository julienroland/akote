@extends('layout')

@section('container')
<fieldset>
	<legend></legend>
	{{link_to_route('informationsProfil','Mes informations personnel')}}
	{{Session::get('user')['nom']}}
</fieldset>
@stop