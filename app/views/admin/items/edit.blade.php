@extends('layouts.master')
 
@section('sidebar')
     @parent
     Items list
@stop
 
@section('content')

<h1>Edit {{ $item->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($item, array('route' => array('items.update', $item->id), 'files' => true, 'method' => 'PUT')) }}

		<div class="form-group">
			{{ Form::label('title', 'Title') }}
			{{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
		</div>
	
		<div class="form-group">
			{{ Form::label('url', 'Url') }}
			{{ Form::text('url', Input::old('url'), array('class' => 'form-control')) }}
		</div>
	
		<div class="form-group">
			{{ Form::label('type', 'Type') }}
			<select name="type" class="form-control">
			@foreach($categories as $cat)
				<option {{ ($item->types[0]->id == $cat->id) ? 'selected' : '' }} value="{{ $cat->id }}">{{ $cat->name }}</option>
			@endforeach
			</select>
		</div>

		<div class="form-group">
			{{ Form::label('client', 'Client') }}
			{{ Form::text('client', Input::old('client'), array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('role', 'Role') }}
			{{ Form::text('role', Input::old('role'), array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('year', 'Year') }}
			{{ Form::text('year', Input::old('year'), array('class' => 'form-control')) }}
		</div>

		<div class="form-group">
			{{ Form::label('description', 'Description') }}
			{{ Form::textarea('description', Input::old('description'), array('class' => 'form-control')) }}
		</div>
		
		<div>
			@foreach($item->images as $img)
			<div class="item-thumb">
				<img height="150px" src="{{ url(); }}/{{ $img->path }}"></img>
				<a class="item-close" href="{{ URL::to('items/destroyimg/'. $img->id . '/'. $item->id ) }}">+</a>
			</div>
			@endforeach
			<div class="clearfix"></div>
		</div>
		<div class="form-group">
			{{ Form::label('file', 'File:') }}
			{{ Form::file('images[]', ['multiple' => true]) }}
		</div>

	{{ Form::submit('Edit!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop
