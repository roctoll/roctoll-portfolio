@extends('layouts.master')
 
@section('sidebar')
     @parent
     Lista de usuarios
@stop
 
@section('content')

	<div class="row">
		<div class="col-md-4">

		{{ Form::open(array('url' => 'login')) }}
	
			<!-- if there are login errors, show them here -->
			<p>
				{{ $errors->first('username') }}
				{{ $errors->first('password') }}
			</p>

			<div class="form-group">
				{{ Form::label('username', 'User Name') }}
				{{ Form::text('username', Input::old('username'), array('class' => 'form-control')) }}
			</div>
	
			<div class="form-group">
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password', array('class' => 'form-control')) }}
			</div>
	
			{{ Form::submit('Submit!', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}
		
		</div>
	</div>
	
@stop