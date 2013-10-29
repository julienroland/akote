@extends('layout')

@section('container')
ici serra présenté l'annonce
{{('Ajouter aux favoris')}}
{{('Contacter')}}
{{Form::open(array('url'=>'annonce/id/valider'))}}
	{{Form::label('chambre','Se porte candidat pour la chambre n°:')}}
	{{Form::('chambre','1')}}
	{{Form::radio('chambre','2')}}
	{{Form::submit('Valider')}}

{{Form::close()}}
@stop