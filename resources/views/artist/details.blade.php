@extends('dashboardLayout')

@section('title')
	<title>Artist Profile</title>
@stop

{{--template from: http://bootstrap.snipplicious.com/snippet/19/edit-profile-page--}}

@section('content')

<style>
	label.col-lg-3.control-label{
		padding-top: 0px;
	}
</style>

<div id="page-wrapper">
	<div class="container-fluid">
		
		<div class="row" style="margin-bottom:15px !important;">
			<h1 class="page-header">{{$artist_data->artist_name}}</h1>
			@if(Auth::user()->role === 'admin')
				<i class="glyphicon glyphicon-edit"></i><a href="/artist/{{$artist_data->artist_id}}/edit"> Edit artist</a>
			@endif
		</div>
		
			<div class="row">	
				<div class="col-lg-8 col-md-6 col-sm-12 personal-info">				

					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-lg-3 control-label">Artist name:</label>
							<div class="col-lg-8">
								{{$artist_data->artist_name}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Biography:</label>
							<div class="col-lg-8">
								{{$artist_data->biography}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Melodies recorded:</label>
							<div class="col-lg-8">
								<ul style="list-style:none; padding:0px;">
									@foreach($tracks as $track)
										<li>
											<a href="/track/{{$track->track_id}}/details/">
												{{$track->track_name}}
											</a>
										</li>
									@endforeach
								</ul>
							</div>
						</div>
				</div>
			</div>
	</div>
</div>

@stop
