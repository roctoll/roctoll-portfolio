<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{HTML::style('assets/css/bootstrap.min.css')}}
        
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        {{HTML::style('assets/css/public.css')}}

        {{HTML::script('assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js')}}
        
    </head>
    <body id="top">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	
			    <div class="sidebar">
				    <header class="">
				      <a href="http://roctoll.com">
				        <h1>roc toll</h1>
				        <p>Web dev<span class="blink" style="visibility: hidden;">_</span></p>      
				      </a>
				
				      <ul>
<!-- 				        <li><a href="/contact">Contact</a></li> -->
				        <li><a href="mailto:roc@roctoll.com">Contact</a></li>
				        <li><a href="http://es.linkedin.com/in/roctoll" target=_blank >LinkedIn</a></li>
				        <li><a href="http://instagram.com/roctoll/" target=_blank >Instagram</a></li>
				        <li><a href="http://www.twitter.com/roctoll" target=_blank >Twitter</a></li>
				      </ul>
				      
				      <div class="clearfix"></div>	
					</header>
			    </div>
			    <div class="col-md-9 col-md-offset-2 main">
				    @yield('content')
			    </div>
			    <footer>
					<p>code by me, <a href="http://laravel.com/" target="_blank">Laravel</a> test</p>
				</footer>
	    
	    
    
        {{HTML::script('assets/js/vendor/jquery-1.11.0.min.js')}}

        {{HTML::script('assets/js/vendor/bootstrap.min.js')}}

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
            
            
			$('.blink').each(function() {
			    var elem = $(this);
			    setInterval(function() {
			        if (elem.css('visibility') == 'hidden') {
			            elem.css('visibility', 'visible');
			        } else {
			            elem.css('visibility', 'hidden');
			        }    
			    }, 450);
			});

        </script>
    </body>
</html>