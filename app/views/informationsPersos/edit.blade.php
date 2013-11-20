@extends('layouts.scaffold')

@section('main')

<h1>Edit InformationsPerso</h1>
{{ Form::model($informationsPerso, array('method' => 'PATCH', 'route' => array('informationsPersos.update', $informationsPerso->id))) }}
	<ul>
        <li>
            {{ Form::label('Votre nom', 'Votre Nom:') }}
            {{ Form::text('Votre nom') }}
        </li>

        <li>
            {{ Form::label('Votre prenom', 'Votre Prenom:') }}
            {{ Form::text('Votre prenom') }}
        </li>

        <li>
            {{ Form::label('type de compte', 'Type De Compte:') }}
            {{ Form::text('type de compte') }}
        </li>

        <li>
            {{ Form::label('votre email', 'Votre Email:') }}
            {{ Form::text('votre email') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('informationsPersos.show', 'Cancel', $informationsPerso->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
