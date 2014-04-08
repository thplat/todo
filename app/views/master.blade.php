<!DOCTYPE html>
<html>
<head>
	@section('header')
		<meta charset="UTF-8">
		<title>My Todo List</title>
		<link rel="stylesheet" type="text/css" href="{{ URL::to('css/base.css') }}">
	@show
</head>
<body>
	<div id="page-wrapper">
		
		<h1>My Todo List</h1>
		<hr>
		<a class="button" href="{{ URL::to('task/new') }}">Neue Aufgabe</a>
		<hr>
		@if(Session::has('message'))
			<div class="{{ Session::get('message.type') }}">
				{{ Session::get('message.message') }}
			</div>
		@endif
		<div id="content-wrapper">
			@yield('content')
		</div>

	</div>
	@section('footer')

	@show
</body>
</html>