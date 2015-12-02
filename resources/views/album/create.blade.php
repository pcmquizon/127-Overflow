@extends('dashboardLayout')

@section('title')
	<title>Add Album</title>
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
		<h1 class="page-header">
			Create New Album 
				@if( $artist_id )
					for {{ $artist_name }}
				@endif
		</h1>
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-12">

				{!! Form::open(
				    array(
				        'url' => 'album', 
				        'class' => 'form', 
				        'method' => 'POST',
				        'files' => true,
				        'enctype' => 'multipart/form-data'));
				        !!}


					<div class="form-group">
						{!!Form::label('name','Album Name:', ['class'=>'col-lg-3 control-label'])!!}	
						<div class="col-lg-8">
								@if($album_name)
									{!!Form::text('album_name', $album_name, ['class'=>'form-control','disabled'])!!}
									{!!Form::hidden('name',$album_name)!!}	
								@else
									{!!Form::text('name', $album_name, ['class'=>'form-control'])!!}
								@endif	
						</div>
					</div>

					{{--dd($album_name)--}}

					<div class="form-group">
						{!!Form::label('year_released','Year Released:', ['class'=>'col-lg-3 control-label'])!!}	
						<div class="col-lg-8">
							<input type="date" name="year_released" class="form-control"/>
						</div>
					</div>

					<div class="form-group">
						{!!Form::label('recording_company','Recording Company:', ['class'=>'col-lg-3 control-label'])!!}
						<div class="col-lg-8">
							{!!Form::text('recording_company', NULL, ['class'=>'form-control'] )!!}
						</div>
					</div>

					

					{{--dd($artist_name)--}}
					<div class="form-group">
						<div class="col-lg-8">
							{!! Form::hidden('track_id', $track_id, ['class'=>'form-control']) !!}
							{!! Form::hidden('artist_name', $artist_name, ['class'=>'form-control']) !!}
							{!! Form::hidden('artist_id', $artist_id, ['class'=>'form-control']) !!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-8">
							{!! Form::submit('Add Album', ['class'=>'btn btn-primary']) !!}
							<span></span><span></span>
							<a href="/album/view/"><input class="btn btn-danger" type="button" value="Cancel (album not known)" /></a>
							{!!Form::close()!!}
						</div>
					</div>
				</div>
			</div>
	</div>
</div>

@stop
