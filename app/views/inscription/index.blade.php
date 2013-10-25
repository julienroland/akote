@extends('layout')

@section('container')

<h2>{{('Inscription en tant que ?')}}</h2>

<ul>
	<li><h3>{{link_to_route('inscriptionProprietaire','Propriétaire')}}</h3><p>{{('Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, aut, alias amet quasi et maxime quam deserunt dolore at tempore ut porro molestiae accusantium neque non ratione quae cum temporibus!')}}</p></li>
	<li><h3>{{('Locataire')}}</h3><p>{{('Lorem')}}</p></li>
	<li><h3>{{('Colocation')}}</h3><p>{{('Blabla')}}</p></li>
</ul>

@stop