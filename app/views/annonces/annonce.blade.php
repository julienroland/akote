@extends('layout')

@section('container')
ici serra présenté l'annonce

{{('Ajouter aux favoris')}}
{{('Contacter')}}
{{Form::open(array('url'=>'annonce/id/valider'))}}
	{{Form::label('chambre','Se porte candidat pour la chambre')}}

	{{Form::label('chambre1','n°:1')}}
	{{Form::radio('chambre','1',array('id'=>'chambre1'))}}

	{{Form::label('chambre2','n°:2')}}
	{{Form::radio('chambre','2',array('id'=>'chambre2'))}}

	{{Form::submit('Valider')}}

{{Form::close()}}

@stop