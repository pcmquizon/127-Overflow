@extends('homeLayout')

@section('title')
	<title>Overflow</title>
@stop

@section('nav')
	<li class="active"><a href="/">Home</a></li>
	<li><a href="/about">About</a></li>
	<li><a href="/contact">Contact</a></li>
@stop

@section('navright')
	<li><a href="/auth/login/">Sign in</a></li>
	<li><a href="/auth/register/">Sign up</a></li>
@stop

@section('content')

		<!-- Carousel
    ================================================== -->
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
  		<!-- Indicators -->
  		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
  		</ol>
  		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
				<div class="container">
					<div class="carousel-caption">
						<h1>Overflow</h1>
						<p>Where you can hear the latest trending music in the community.</p>
						<h1 class="lead">For free.</h1>
						<p data-toggle="modal" data-target="#signUpModal"><a class="btn btn-lg btn-primary" href="/auth/register" role="button">Sign up today</a></p>
					</div>
				</div>
			</div>
			<div class="item">
				<img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
				<div class="container">
					<div class="carousel-caption" style="margin-bottom:75px;">
						<h1>Create your own playlist. Try it, to belive it.</h1>
						<p>Play the music in the cloud.</p>
						<h1 class="lead">Access your Melodies everywhere. Anytime.</h1>
						{{--<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>--}}
					</div>
				</div>
			</div>
			<div class="item">
				<img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
				<div class="container">
					<div class="carousel-caption" style="margin-bottom:75px;">
						<h1>Checkmate.</h1>
						<p>Share your music to everyone.</p>
						<h1 class="lead">Let your voice be heard.</h1>
						{{--<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>--}}
					</div>
				</div>
			</div>
  		</div>
  		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
  		</a>
  		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
  		</a>
		</div><!-- /.carousel -->


		<!-- Marketing messaging and featurettes
    ================================================== -->
		<!-- Wrap the rest of the page in another container to center all the content. -->

		<div class="container marketing">


  		<!-- START THE FEATURETTES -->

  		<hr class="featurette-divider">
  		<div class="row featurette">
			<div class="col-md-7">
				<h2 class="featurette-heading"> Upload your own music.
				<br/><span class="text-muted">  Everyone will hear it now. </span>
				</h2>
				<p class="lead">
					We will love to hear your masterpiece.
				</p>
			</div>
			<div class="col-md-5">
				<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" src="/images/61bKleujTmL._SL1500_.jpg" alt="Generic placeholder image">
			</div>
  		</div>

  		<hr class="featurette-divider">

  		<div class="row featurette">
			<div class="col-md-7 col-md-push-5">
				<h2 class="featurette-heading">Create your own playlist.
				<br/><span class="text-muted">Try it, to belive it.</span></h2>
				<p class="lead"> 
					Add songs to your own playlist.<br/>Various artists and music are available here. 
				</p>
			</div>
			<div class="col-md-5 col-md-pull-7">
				<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" src="/images/GymPlaylist.jpg" alt="Generic placeholder image">
			</div>
  		</div>

  		<hr class="featurette-divider">

  		<div class="row featurette">
			<div class="col-md-7">
				<h2 class="featurette-heading">And lastly, this one.
				<br/><span class="text-muted">Checkmate.</span></h2>
				<p class="lead">
					Share your music to everyone.
				</p>
			</div>
			<div class="col-md-5">
				<img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" src="/images/21328.jpg" alt="Generic placeholder image">
			</div>
  		</div>

  		<hr class="featurette-divider">
  		<!-- /END THE FEATURETTES -->
  		</div><!-- /.container -->
@stop
