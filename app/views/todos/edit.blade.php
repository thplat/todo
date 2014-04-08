@extends('master')

@section('content')
	{{ Form::open(['url' => 'task/'. $task->id .'/edit']) }}

	<input type="text" name="name" placeholder="Aufgabe" value="{{ $task->name }}" ><br>
	<textarea name="text">{{ $task->text }}</textarea><br>
	<input type="submit" value="Bearbeiten">
	{{ Form::close() }}
@stop