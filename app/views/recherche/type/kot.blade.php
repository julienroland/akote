@extends('layout')

@section('container')
@if(isset($listeKot))
	@if(!empty($listeKot))
		@foreach($listeKot as $kot)
		<fieldset>	
		<p>{{link_to_route('showAnnonce',$kot->region)}}</p>
		<p>{{$kot->prix}}</p>
		<p>{{$kot->disponible}}</p>
		</fieldset>
		@endforeach
	@endif
@endif
@stop