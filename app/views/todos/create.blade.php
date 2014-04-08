@extends('master')

@section('content')
	{{ Form::open(['url' => 'task/new']) }}

	<input type="text" name="name" placeholder="Aufgabe"><br>
	<textarea name="text"></textarea><br>
	<input type="submit" value="Absenden">
	{{ Form::close() }}
@stop