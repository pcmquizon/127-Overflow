@extends('master')

@section('titlepage')
	@yield('titlepage')
@stop
		
@section('customcss')
	
@stop

@section('navbar')
	<div class="navbar-wrapper">
	<div class="container">

		<nav class="navbar navbar-inverse navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">Overflow</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						@yield('nav')
					</ul>
					<ul class="nav navbar-nav navbar-right">
					<!--
						<li data-toggle="modal" data-target="#signInModal"><a href="#">Sign in</a></li>
						<li data-toggle="modal" data-target="#signUpModal"><a href="#">Sign up</a></li>
					-->
					@if(Auth::user())
						<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->username}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                        	<a href="/user/dashboard"><i class="glyphicon glyphicon-headphones"></i> Melody Feed</a>
                    	</li>
                        <li>
                            <a href="/user/profile"><i class="glyphicon glyphicon-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/auth/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
					@elseif(Auth::guest())
						@yield('navright')
					@endif
 					</ul>				
				</div>
			</div>
		</nav>
	</div>
	</div>
@stop

@section('content')
	@yield('content')
@stop

@section('footer')
	<footer class="footer panel-footer">
  		<div class="container-fluid">
	  		<!-- FOOTER -->  			
				<p>
					&copy; 2015 Jaime Company, Inc. {{--&middot; 
					<a href="#">Privacy</a> &middot; 
					<a href="#">Terms</a>--}}
				</p>
		</div>
	</footer>
@stop

@section('modal')
	@include('home.modal')
@stop
