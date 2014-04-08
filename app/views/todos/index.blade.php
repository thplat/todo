@extends('master')

@section('content')
	

	<strong>Offen:</strong><br>	
	<hr>

	@foreach($tasks AS $task)
		@include('todos.partials.todo', compact('task'))
	@endforeach

	<hr>
	<strong>Erledigt:</strong><br>
	<hr>

	@foreach($dones AS $task)
		@include('todos.partials.todo', compact('task'))
	@endforeach

@stop