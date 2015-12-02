@extends('homeLayout')

@section('title')
	<title>Contact us</title>
@stop

@section('nav')
	<li><a href="/">Home</a></li>
	<li><a href="/about">About</a></li>
	<li class="active"><a href="/contact">Contact</a></li>
@stop

@section('navright')
	<li><a href="/auth/login/">Sign in</a></li>
	<li><a href="/auth/register/">Sign up</a></li>
@stop

@section('content')
<hr class="featurette-divider">

		<div class="container marketing">
			<div class="content">
				<div class="col-md-12">
					<div class="flow" style="background-color:#101010;min-height:20% !important;"> 
						<br/>
						<h1 style="text-align:center;color:#FFFFFF"> Pia Carmela Quizon and Jaime Canicula</h1>
						<p align="center"> <span  class="text-muted"> Institute of Computer Science, UPLB </span></p>
						<br/>
					</div>
				</div>
			</div>
		</div>
@stop

