@extends('layout')

@section('container')

<h1>{{ ('Akote') }}</h1>

@if(isset($message))
<p>{{$message}}</p>
@endif
<div>
<h2>{{('Pourquoi choisir Akote.be ?')}}</h2>

<p>{{('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, quo, pariatur, dolor aliquam ad odio non praesentium temporibus qui dolorem illum alias est sequi itaque deserunt tempora doloribus quas. Facilis.')}}</p>

</div>

<div>
<h2>{{('Aidez-nous')}}</h2>

<p>{{('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, quo, pariatur, dolor aliquam ad odio non praesentium temporibus qui dolorem illum alias est sequi itaque deserunt tempora doloribus quas. Facilis.')}}</p>

</div>

<h2>{{('Recherche')}}</h2>

	<p>{{link_to_route('showRapide','Rapide')}}</p>

	<p>{{link_to_route('showDetaillee','Détaillée')}}</p>
	
@if(isset($email))

	{{$email}}
@endif
@stop