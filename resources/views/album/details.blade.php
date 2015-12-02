@extends('dashboardLayout')

@section('title')
	<title>Album Profile</title>
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
			<h1 class="page-header">{{$album_data->album_name}}</h1>
			@if(Auth::user()->role === 'admin')
				<i class="glyphicon glyphicon-edit"></i><a href="/album/{{$album_data->album_id}}/edit"> Edit album</a>
			@endif
		</div>
		


			<div class="row">	
				<div class="col-lg-8 col-md-6 col-sm-12 personal-info">				

					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-lg-3 control-label">Album name:</label>
							<div class="col-lg-8">
								{{$album_data->album_name}}
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Artist name:</label>
							<div class="col-lg-8">
								{{$album_data->artist_name}}
							</div>
						</div>

						@if($tracks)
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Recording Company:</label>
							<div class="col-lg-8">
								{{$album_data->recording_company}}
							</div>
						</div>
						
							<div class="form-group">
								<label class="col-lg-3 control-label">Track listing:</label>
								<div class="col-lg-8">
									<ul style="list-style:none; padding:0px;">
										@foreach($tracks as $track)
											<a href="/track/{{$track->track_id}}/details">
												<li>{{$track->track_name}}</li>
											</a>
										@endforeach
									</ul>
								</div>
							</div>
						@endif
				</div>
			</div>
	</div>
</div>

@stop
