@extends('layout')

@section('container')
@if(isset($message))
<p>{{$message}}</p>
@endif
{{Form::open(array('url'=>'identifier'))}}

{{Form::label('email','Entrez votre email')}}
{{Form::text('email','',array('placeholder'=>'email@gmail.com'))}}

{{Form::label('password','Entrez votre mot de passe')}}
{{Form::password('password','')}}

{{Form::submit('Se connecter')}}

{{Form::close()}}

@stop