@extends('layout')

@section('container')

<ul>
	<li>{{('Votre nom: ')}}{{Session::get('user')['nom']}}</li>
	<li>{{('Votre prénom: ')}}{{Session::get('user')['prenom']}}</li>
	<li>{{('Type de compte: ')}}{{Session::get('user')['nom']}}</li>
	<li>{{('Votre email: ')}}{{Session::get('user')['email']}}</li>
</ul>

@stop