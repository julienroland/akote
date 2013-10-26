@extends('layout')

@section('container')
@if(isset($listeKot))
	@if(!empty($listeKot))
		@foreach($listeKot as $kot)
		<fieldset>	
		<p>{{$kot->region}}</p>
		<p>{{$kot->prix}}</p>
		<p>{{$kot->disponible}}</p>
		</fieldset>
		@endforeach
	@endif
@endif
@stop