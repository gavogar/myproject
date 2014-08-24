<!-- app/views/nerds/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Look! I'm CRUDding</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('usuarios') }}">Nerd Alert</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('usuarios') }}">View All Nerds</a></li>
		<li><a href="{{ URL::to('usuarios/create') }}">Create a Nerd</a>
	</ul>
</nav>

<h1>Create a Nerd</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'usuarios')) }}

	<div class="form-group">
		{{ Form::label('nombre', 'Nombre') }}
		{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('apellido', 'Apellido') }}
		{{ Form::text('apellido', Input::old('apellido'), array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Create the Usuario!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>