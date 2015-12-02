<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<meta name="description" content="">
		<meta name="author" content="">

		<link rel="icon" href="../../favicon.ico">
		@yield('custommeta')
		@yield('title')

		<!-- Bootstrap core CSS -->
		<link href="/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/sticky-footer.css" rel="stylesheet">
		<link href="/css/carousel.css" rel="stylesheet">

		<link href='/css/Fjalla-One-and-Average.css' rel='stylesheet' type='text/css'>

		@yield('customcss')
	</head>
	<body>		
		<div id="container">
			@yield('navbar')
		</div>	
		
		<div id="container">
			<div id="wrapper">
				<div id="page-wrapper">
					@include('flash::message')
					@yield('content')
				</div>
			</div>
		</div>
		
		<div id="container">
			<div id="wrapper">
				<div id="page-wrapper">
					@yield('footer')
				</div>
			</div>
		</div>
		{{--@yield('modal')--}}
		
		<!-- Bootstrap core JavaScript
    ================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
		<script src="/js/jquery/1.11.3/jquery.min.js"></script>
		<script src="/dist/js/bootstrap.min.js"></script>
		<script src="/js/bootbox/4.4.0/bootbox.min.js"></script>
		<script src="/js/jquery/ui/1.11.4/jquery.ui.min.js"></script>

		<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
		<script src="/assets/js/vendor/holder.min.js"></script>
		<script>
		    $('#flash-overlay-modal').modal();
		</script>
		@yield('customjs')
		
		
		
		
	</body>
</html>
