@extends('layouts.master')
 
@section('content')

<h1>Edit {{ $type->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

	{{ Form::model($type, array('route' => array('types.update', $type->id), 'method' => 'PUT', 'files' => true)) }}

		<div class="form-group">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
		</div>
	
		<div class="form-group">
			{{ Form::label('description', 'Description') }}
			{{ Form::text('description', Input::old('description'), array('class' => 'form-control')) }}
		</div>
			
		<div class="form-group">
			{{ Form::label('file', 'File:') }}
			{{ Form::file('image') }}
		</div>

	{{ Form::submit('Edit the Type!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop
