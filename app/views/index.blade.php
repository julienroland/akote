@extends('layout')

@section('container')

<h1>{{ ('Akote') }}</h1>

@if(isset($message))
<p>{{$message}}</p>
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

{{ Form::open(array('url' => 'recherche/rapide/' )) }}

@if(Session::has('ancienneRechercheRapide'))

{{Form::label('ecole','Une école')}}
{{Form::radio('type','ecole',Session::get('ancienneRechercheRapide')['ecole'],array('id'=>'ecole'))}}

{{Form::label('ville','Une ville')}}
{{Form::radio('type','ville',Session::get('ancienneRechercheRapide')['ville'],array('id'=>'ville'))}}

{{Form::label('kot','Un kot')}}
{{Form::radio('type','kot',Session::get('ancienneRechercheRapide')['kot'],array('id'=>'kot'))}}


{{ Form::label('loyer_max','Loyer MAX') }}
{{ Form::select('loyer_max',array(
	'100'=>'100',
	'200'=>'200'
	),Session::get('ancienneRechercheRapide')['loyer_max'])

}}

{{ Form::label('loyer_min','Loyer MIN') }}

{{ Form::select('loyer_min', array(
	'100'=>'100',
	'200'=>'200'
	),Session::get('ancienneRechercheRapide')['loyer_min']);

}}

{{ Form::label('charge','Charges') }}

{{ Form::select('charge', array(
	'Comprise',
	'non-comprise'
	),Session::get('ancienneRechercheRapide')['charges']);

}}
<div id="gmap"></div>
{{Form::label('map','Indiquez l\'adresse')}}
{{Form::text('zone',Session::get('ancienneRechercheRapide')['zone'],array('id'=>'map','placeholder'=>'Rue code postal,ville'))}}
{{Form::label('distance','Indiquez le rayon du filtre (celui-ci est en mètre)')}}
{{Form::text('distance',Session::get('ancienneRechercheRapide')['distance'],array('id'=>'distance','placeholder'=>'ex : 1000 pour 1km'))}}
{{Form::hidden('coords','',array('id'=>'coords'))}}
{{ Form::button('Filtrer',array('id'=>'filtrer')) }}
@else
{{Form::label('ecole','Une école')}}
{{Form::radio('type','ecole',false,array('id'=>'ecole'))}}

{{Form::label('ville','Une ville')}}
{{Form::radio('type','ville',true,array('id'=>'ville'))}}

{{Form::label('kot','Un kot')}}
{{Form::radio('type','kot',false,array('id'=>'kot'))}}


{{ Form::label('loyer_max','Loyer MAX') }}
{{ Form::select('loyer_max',array(
	'100'=>'100',
	'200'=>'200'
	))

}}

{{ Form::label('loyer_min','Loyer MIN') }}

{{ Form::select('loyer_min', array(
	'100'=>'100',
	'200'=>'200'
	));

}}

{{ Form::label('charge','Charges') }}

{{ Form::select('charge', array(
	'Comprise',
	'non-comprise'
	));

}}
<div id="gmap"></div>
{{Form::label('map','Indiquez l\'adresse')}}
{{Form::text('zone','',array('id'=>'map','placeholder'=>'Rue code postal,ville'))}}
{{Form::label('distance','Indiquez le rayon du filtre (celui-ci est en mètre)')}}
{{Form::text('distance','',array('id'=>'distance','placeholder'=>'ex : 1000 pour 1km'))}}
{{Form::hidden('coords','',array('id'=>'coords'))}}
{{ Form::button('Filtrer',array('id'=>'filtrer')) }}
@if(Auth::check())
{{Form::label('enregistrer','Enregistrer la recherche')}}
{{Form::checkbox('enregistrer')}}
{{Form::label('enregistrerNom','Donnez un nom à votre recherche enregistré (20 charactères maximun)')}}
{{Form::text('enregistrerNom','',array('placeholder'=>'ex: recherche kot liège'))}}
@endif
{{Form::submit('envoye')}}
{{Form::close()}}
@endif <!-- test si la session ancienne recherche existe -->
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
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/map.js"></script>


@stop