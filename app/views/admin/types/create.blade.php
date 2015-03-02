@extends('layouts.master')
 
@section('content')
	<h1>Add Type</h1><hr>
	 
	<!-- if there are creation errors, they will show here -->
	{{ HTML::ul($errors->all()) }}
	
	{{ Form::open(array('url' => 'types', 'files' => true)) }}
	
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
	
		{{ Form::submit('Add Type!', array('class' => 'btn btn-primary')) }}
	
	{{ Form::close() }}
@stop
