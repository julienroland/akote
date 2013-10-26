@extends('layout')

@section('container')

<ul>
	<li>{{('etape1')}}</li>
</ul>
<fieldset>
	<legend>{{('Informations personnels')}}</legend>
	{{Form::open(array('url'=>'inscription/locataire/comfirmer'))}}

	{{Form::label('email','Entrez votre adresse email')}}
	{{Form::text('email','',array('placeholder'=>'email@gmail.com'))}}

	{{Form::label('motdepasse','Entrez un mot de passe')}}
	{{Form::password('motdepasse')}}

	{{Form::label('nom','Votre nom de famille')}}
	{{Form::text('nom','',array('placeholder'=>'Roland'))}}
		
	{{Form::submit('Valider')}}
	{{Form::close()}}
</fieldset>

@stop