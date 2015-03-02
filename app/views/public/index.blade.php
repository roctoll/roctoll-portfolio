@extends('layouts.public')
 
@section('content')

	<div class="grid">
	  @foreach($categories as $cat)
		<figure class="effect-romeo {{$cat->name }}">
			<img src="{{ $cat->image['path'] }}" alt="img05" width=70%>
			<figcaption>
				<h2>Web {{ $cat->name }}</h2>
				<p>{{ $cat->description }}</p>
				<a href="{{ URL::to('category/'.$cat->id) }}">View more</a>
			</figcaption>			
		</figure>
	  @endforeach 
	</div>

@stop
