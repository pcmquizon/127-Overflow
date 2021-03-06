@extends('homeLayout')

@section('title')
	<title>About</title>
@stop

@section('nav')
	<li><a href="/">Home</a></li>
	<li class="active"><a href="/about">About</a></li>
	<li><a href="/contact">Contact</a></li>
@stop

@section('navright')
	<li><a href="/auth/login/">Sign in</a></li>
	<li><a href="/auth/register/">Sign up</a></li>
@stop

@section('content')

<style type="text/css">
	h4{color:#E4E3E3;}	
	ul{list-style:none;  padding:0px; text-align:center;}
	a:hover{text-decoration:none;}
	span{font-size: medium;}
</style>

		<hr class="featurette-divider">

		<div class="container marketing">
			<div class="content">
				<div class="col-md-12">
					<div class="flow" style="background-color:#101010;min-height:20% !important; padding:15px;"> 
						<br/>
						<h1 style="text-align:center;color:#FFFFFF"> This is a CMSC 127 Project implemented using Laravel 5.1</h1>
						<p align="center"> <span  class="text-muted"> Credits to Bootstrap, BootBox, jQueryUI, stackoverflow, Laravel.com, Laracasts and Jaime Canicula </span></p>
						<br/>
					</div>
				</div>
			</div>
		</div>

		<div class="container marketing" style="margin-top:20px !important;">
			<div class="content">
				<div class="col-md-12">
					<div class="flow" style="background-color:#101010;min-height:20% !important;"> 
						<br/>
						<h3 style="text-align:center;color:#FFFFFF"> I would also like to thank the following in making this project a success:</h3>
						<div class="row" align="center">
						    <div class="col-md-6 col-sm-8 col-xs-12">
						    	<h4>GUI / Templates</h4>
						    	<p align="center">
									<ul class="list-group">
										<li><a href="http://getbootstrap.com/examples/carousel/">
											<span class="text-muted">Bootstrap Carousel Example</span>
										</a></li>

										<li><a href="http://getbootstrap.com/examples/signin/">
											<span class="text-muted">Bootstrap Sign In Example</span>
										</a></li>

										<li><a href="http://getbootstrap.com/examples/sticky-footer/">
											<span class="text-muted">Bootstrap Sticky Footer Example</span>
										</a></li>

										<li><a href="http://startbootstrap.com/template-overviews/sb-admin/">
											<span class="text-muted">SB Admin Dashboard Template</span>
										</a></li>

										<li><a href="http://bootstrap.snipplicious.com/snippet/20/user-profile">
											<span class="text-muted">Edit Profile Snippet</span>
										</a></li>

										<li><a href="http://devblog.lastrose.com/html5-audio-video-playlist/">
											<span class="text-muted">Playlist Template</span>
										</a></li>

										<li><a href="http://bootstrap.snipplicious.com/snippet/6/comments">
											<span class="text-muted">Comments Snippet</span>
										</a></li>

										<li><a href="http://lorempixel.com">
											<span class="text-muted">Random pictures of people (during testing)</span>
										</a></li>

										<li><a href="unisex-bathroom-logo-md.png">
											<span class="text-muted">Default Profile Picture</span>
										</a></li>										
									</ul>
								</p>
						    </div>

							<div class="col-md-6 col-sm-8 col-xs-12">
								<h4>Tutorials</h4>
								<p align="center">
									<ul class="list-group">
										
										<li><a href="https://www.codetutorial.io/laravel-5-file-upload-storage-download/">
											<span class="text-muted">File Upload Tutorial</span>
										</a></li>

										<li>
											<a href="https://www.theparticlelab.com/building-a-custom-html5-audio-player-with-jquery/"><span class="text-muted">Audio Player Tutorial</span></a>
											[
											<a href="http://thebox.maxvoltar.com/assets/js/master.js"><span class="text-muted">JS</span></a>
											,
											<a href="http://thebox.maxvoltar.com/assets/css/master.css"><span class="text-muted">CSS</span></a>
											,
											<a href="http://thebox.maxvoltar.com/assets/img/player.png"><span class="text-muted">Player Controls</span></a>
											]
										</li>

										<li>
											<a href="http://­www.hongkiat.com/­blog/­jquery-volumn-slider/"><span class="text-muted">Volume Slider Tutorial</span></a>
											[
											<a href="http://­media02.hongkiat.com/­jquery-ui-slider/­demo/source.zip"><span class="text-muted">Source</span></a>
											]
										</li>

										<li><a href="http://tutsnare.com/post-data-using-ajax-in-laravel-5/">
											<span class="text-muted">Using Ajax in Laravel 5</span>
										</a></li>

										
										
										
										

										
									</ul>
								</p>
							</div>
									
						</div>
						
						<br/>
					</div>
				</div>
			</div>
		</div>



@stop

