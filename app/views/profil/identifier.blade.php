@extends('layout')

@section('container')
{{Form::open(array('url'=>'identifier'))}}

{{Form::label('email','Entrez votre email')}}
{{Form::text('email','',array('placeholder'=>'email@gmail.com'))}}

{{Form::label('motdepasse','Entrez votre mot de passe')}}
{{Form::password('motdepasse','')}}

{{Form::submit('Se connecter')}}

{{Form::close()}}
@if(isset($nom))
{{$nom}}
@endif
@stop