@extends('layouts.public_nosid')
 
@section('content')

		<div id="ip-container" class="ip-container">
			<!-- initial header -->
			<header class="ip-header">
				<div class="ip-logo">
<!--
					<h1>roc toll</h1>
			        <p>Web dev<span class="blink" style="visibility: hidden;">_</span></p>   
-->
			        <h2>recent work in web {{$category->name}}</h2>   
				</div>
				<div class="ip-loader">
					<svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
						<path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
						<path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
					</svg>
				</div>
			</header>

			<!-- main content -->
			<div class="ip-main test">
		        <a href="../"><span style="position: absolute; top:15px; left:20px; font-size: 17px;">&larr;</span></a>

				<div class="">
					<div class="row">
						@if($category->items)
						@foreach($category->items as $item)
						<div class="cat-item">
						
							<div class="col-md-12">
								<h3>{{ $item->title }}</h3>
							</div>
							<div class="col-md-12">
								<div class="row light" style="font-size: 16px; text-align: center; line-height: 13px; padding: 0px 0px 75px;">
									<div class="col-md-3">
										<p>My Role</p>
										<b>{{ $item->role }}</b>
									</div>
									<div class="col-md-3">
										<p>Done for</p>
										<b>{{ $item->client }}</b>
									</div>
									<div class="col-md-3">
										<p>Year</p>
										<b>{{ $item->year }}</b>
									</div>
									<div class="col-md-3">
										<p>Category</p>
										<b>Web{{ $category->name }}</b>
									</div>
								</div>
							</div>
							<div class="col-md-10 col-md-offset-1">
								<p class="light" style="text-align:center">
									{{ $item->description }}
								</p>
								@foreach ($item->images->slice(0, 3) as $image) 
									<img style="width:100%" src="{{ '../'.$image['path'] }}"></img>
								@endforeach
								
							</div>
							<div class="col-md-12" style="text-align: center;">
								<div style="width:115px; border-bottom: 1px solid #505050; padding-bottom: 50px; margin: 0 auto;">
									@if($item->url)
										<b><a href="http://{{ $item->url }}">Surf the web!</a></b>																
									@endif
								</div>
							</div>

							<div class="clearfix"></div>
						</div>
						@endforeach
						@endif
					</div>
				</div>
				
		        <a href="#top"><span style="position: absolute; bottom:15px; right:20px; font-size: 17px;">&uarr;</span></a>

				
			</div>
		</div><!-- /container -->

    {{HTML::script('assets/js/classie.js')}}
    {{HTML::script('assets/js/pathLoader.js')}}
    {{HTML::script('assets/js/main.js')}}
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script>
	$(function() {
	  $('a[href*=#]:not([href=#])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});	    
    </script>

@stop
