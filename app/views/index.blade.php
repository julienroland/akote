@extends('layout')

@section('container')

<h1>{{ ('Akote') }}</h1>

@if(isset($message))
<p>{{$message}}</p>
@endif
@if(isset($validatorMessage))
<p>{{$validatorMessage}}</p>
@endif
@if(Auth::check())
Activité(s) - Dernière(s) visite(s) - dernier(s) message(s)
@else
<div>
	<h2>{{('Pourquoi choisir Akote.be ?')}}</h2>

	<p>{{('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, quo, pariatur, dolor aliquam ad odio non praesentium temporibus qui dolorem illum alias est sequi itaque deserunt tempora doloribus quas. Facilis.')}}</p>

</div>

<div>
	<h2>{{('Aidez-nous')}}</h2>

	<p>{{('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti, quo, pariatur, dolor aliquam ad odio non praesentium temporibus qui dolorem illum alias est sequi itaque deserunt tempora doloribus quas. Facilis.')}}</p>

</div>
@endif
<h2>{{('Recherche')}}</h2>

<p>{{link_to_route('showRapide','Rapide')}}</p>
<p>{{('Rechercher par rapport à :')}}</p>

<?php  var_dump(Session::get('ancienneRechercheRapide'));?>

{{ Form::open(array('url' => 'recherche/rapide/','id'=>'rapide' )) }}


{{Form::label('aucun','Aucun filtre')}}
{{Form::radio('type','aucun',Session::get('ancienneRechercheRapide[\'aucun\']',false),array('id'=>'aucun'))}}

{{Form::label('ecole','Une école')}}
{{Form::radio('type','ecole',Session::get('ancienneRechercheRapide[\'ecole\']',true),array('id'=>'ecole'))}}

{{Form::label('ville','Une ville')}}
{{Form::radio('type','ville',Session::get('ancienneRechercheRapide[\'ville\']',false),array('id'=>'ville'))}}


	<div id="gmap"></div>
	{{Form::label('map','Indiquez l\'adresse',array('class'=>'type'))}}
	{{Form::text('zone',Session::get('ancienneRechercheRapide[\'zone\']','test'),array('id'=>'map','class'=>'type','placeholder'=>'Rue code postal,ville'))}}

	{{Form::label('distance','Indiquez le rayon du filtre (celui-ci est en mètre)')}}
	{{Form::text('distance',Session::get('ancienneRechercheRapide')['distance'],array('id'=>'distance','placeholder'=>'ex : 1000 pour 1km'))}}

	{{Form::hidden('coords','',array('id'=>'coords'))}}

	{{ Form::button('Filtrer',array('id'=>'filtrer')) }}
	@if(Auth::check())
	{{Form::label('enregistrer','Enregistrer la recherche')}}
	{{Form::checkbox('enregistrer')}}
	{{Form::label('enregistrerNom','Donnez un nom à votre recherche enregistré (20 charactères maximun)')}}
	{{Form::text('enregistrerNom','',array('placeholder'=>'ex: recherche kot liège'))}}
	@endif

	{{Form::hidden('listKot','',array('id'=>'listKot'))}}

	{{Form::submit('envoye',array('class'=>'btn btn-primary'))}}
	{{Form::close()}}
	<!-- test si la session ancienne recherche existe -->
	{{ $errors->first('url','<div class="error">:message</div>') }} 


	<p>{{link_to_route('showDetaillee','Détaillée')}}</p>
	<fieldset>

		<p>{{('Localiser : Une école, une ville, un kot')}}</p>

		{{ Form::open(array('detaillee' => 'recherche/detaillee' )) }}

		<fieldset>
			<legend>{{('Base')}}</legend>
			{{ Form::label('loyer_max','Loyer MAX') }}

			{{ Form::select('loyer_max', array(
				'200',
				'3OO'
				));

			}}
		</fieldset>

		<fieldset>
			<legend>{{('Supplémentaire')}}</legend>
			{{ Form::label('loyer_max','Loyer MAX') }}

			{{ Form::select('loyer_max', array(
				'200',
				'3OO'
				));

			}}
		</fieldset>

		<fieldset>
			<legend>{{('Bâtiment')}}</legend>
			{{ Form::label('loyer_max','Loyer MAX') }}

			{{ Form::select('loyer_max', array(
				'200',
				'3OO'
				));

			}}
		</fieldset>

		<fieldset>
			<legend>{{{('Carte')}}}</legend>
			{{ Form::label('loyer_max','Loyer MAX') }}

			{{ Form::select('loyer_max', array(
				'200',
				'3OO'
				));

			}}
		</fieldset>

		{{ Form::submit('Chercher') }}

		{{Form::close()}}

		{{ $errors->first('url','<div class="error">:message</div>') }} 


	</fieldset>
	@if(Auth::check())
	{{('Recherche enregistrée')}}
	{{Form::open(array('enregistre'=>'recherche/enregistrée'))}}

	{{Form::select('mesRecherches',array('toto','titi'))}}

	{{Form::submit('chercher')}}
	{{Form::close()}}
	@endif
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHJ3p-sn1Y5tJGrzH9MF5cbR5sdsDmhfg&sensor=false&libraries=places,geometry"></script>
	{{ HTML::script('js/map.js') }}


	@stop