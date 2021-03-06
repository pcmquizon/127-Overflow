@extends('dashboardLayout')

@section('title')
	<title>Edit Melody</title>
@stop

@section('content')
<style> 
	.form-control { 
		margin-bottom:5px;
	}
	h1 {
		text-align:center;
		color: #3A3A3A;
		box-shadow: 0px 0px 5px #000;
		margin-bottom: 40px;
		padding: 10px;
	}
</style>

<div id="page-wrapper">
	<div class="container-fluid">
		<h1 class="page-header">Edit {{$track->track_name}}</h1>
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-12">

				{!! Form::open(
				    array(
				        'url' => "track/".$track->track_id, 
				        'class' => 'form', 
				        'method' => 'PATCH',
				        'files' => true,
				        'enctype' => 'multipart/form-data'));
				        !!}


					<div class="form-group">
						{!!Form::label('name','Name of the Track:', ['class'=>'col-lg-3 control-label'])!!}	
						<div class="col-lg-8">
							{!!Form::text('name', $track->track_name, ['class'=>'form-control'] )!!}
						</div>
					</div>

					<div class="form-group">
						{!!Form::label('name','Artist Name:', ['class'=>'col-lg-3 control-label'])!!}		
						<div class="col-lg-8">
							{!!Form::text('artist_name', $track->artist_name, ['class'=>'form-control', 'disabled'] )!!}
						</div>
					</div>

					<div class="form-group">
						{!!Form::label('name','Album Name:', ['class'=>'col-lg-3 control-label'])!!}		
						<div class="col-lg-8">
							{!!Form::text('album_name', $track->album_name, ['class'=>'form-control', 'disabled'] )!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-8">
							{!! Form::submit('Save changes', ['class'=>'btn btn-primary']) !!}
							<span></span><span></span>
							<a href="/track/view/"><input class="btn btn-danger" type="button" value="Cancel" /></a>
							{!!Form::close()!!}
						</div>
					</div>
				</div>
			</div>
	</div>
</div>

@stop
