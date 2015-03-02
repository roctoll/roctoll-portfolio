@extends('layouts.master')
 
@section('content')
	<h1>Types</h1><hr>
	 
	<div class="row">
		<div class="col-md-12">
			<a class="btn btn-small btn-info" href="{{ URL::to('types/create') }}">Add an Type</a>		
		</div>
	</div>

	<div class="row">
	  @foreach($categories as $cat)
	    <div class="col-md-3" style="height:300px">			
			
			<h3>{{ $cat->name }}</h3>
			<img style="width:100%" src="{{ $cat->image['path'] }}"></img>

			<a class="btn btn-small btn-warning pull-left" href="{{ URL::to('types/' . $cat->id . '/edit') }}">EDT</a>
			
			{{ Form::open(array('url' => 'types/' . $cat->id)) }}
				{{ Form::hidden('_method', 'DELETE') }}
				{{ Form::submit('DEL', array('class' => 'btn btn-danger pull-left')) }}
			{{ Form::close() }}
			
	    </div>
	  @endforeach 
	</div>
@stop
