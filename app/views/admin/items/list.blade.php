@extends('layouts.master')
 
@section('sidebar')
     @parent
     Items list
@stop
 
@section('content')
	<h1>Items</h1><hr>
	 
	<div class="row">
		<div class="col-md-12">
			<a class="btn btn-small btn-info" href="{{ URL::to('items/create') }}"><span class="glyphicon glyphicon-plus"></span> New Item</a>		
		</div>
	</div>
<br>
	<div class="row">
	  @foreach($items as $item)
	    <div class="col-md-3 item-elem" style="height:300px;">			
			
			<h4>{{ $item->title }}</h4>
		    @foreach ($item->images->slice(0, 1) as $image) 
				<img style="width:100%" src="{{ $image->path }}"></img>
			@endforeach			
			
			<p><strong>Type: </strong>
			@foreach ($item->types as $cat)
				{{ $cat->name }}			
			@endforeach
			</p>

			<p><strong>Url: </strong>{{ $item->url }}</p>
			
			<div class="item-ops">
				<a href="{{ URL::to('items/' . $item->id . '/edit') }}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></a>			
				{{ Form::open(array('url' => 'items/' . $item->id)) }}
					{{ Form::hidden('_method', 'DELETE') }}
					<a type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
				{{ Form::close() }}
			</div>
	    </div>
	  @endforeach 
	</div>
@stop
