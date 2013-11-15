@extends('layout')

@section('container')
@if(isset($message))
{{$message}}
@endif
<?php var_dump($listeKot); ?>
@if(isset($listeKot))
@if(!empty($listeKot))
@foreach($listeKot as $kot)
<fieldset>
	<a href="{{route('showAnnonce')}}"><img src="http://placehold.it/150x150" alt=""></a>
	<p>{{link_to_route('showAnnonce',$kot->region)}}</p>
	<p>{{('Prix')}} {{$kot->charges}} {{$kot->prix}}</p>
	<p>{{$kot->excerpt}}</p>
	<p>{{$kot->disponible}}</p>
	<img src="http://maps.googleapis.com/maps/api/staticmap?center={{$kot->lat}},{{$kot->lng}}&zoom=13&size=200x200&maptype=roadmap
	&markers=color:blue%7Clabel:S%7C{{$kot->lat}},{{$kot->lng}}&sensor=false" alt="position du logement	">
	<p>{{$kot->adresse}}</p>
</fieldset>
@endforeach
@endif
@endif
@stop