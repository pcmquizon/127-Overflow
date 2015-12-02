@extends('dashboardLayout')

@section('title')
	<title>Add Artist</title>
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
			

			@if( $track_id )
				Add Artist to the Melody {{ $track_name }}
			@else
				Create New Artist
			@endif
		</h1>
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-12">


				{!! Form::open(
				    array(
				        'url' => 'artist', 
				        'class' => 'form',
				        'method' => 'POST',
				        'files' => true,
				        'enctype' => 'multipart/form-data'));
				        !!}

				    

					<div class="form-group">
						{!!Form::label('name','Artist Name:', ['class'=>'col-lg-3 control-label'])!!}	
						<div class="col-lg-8">
								@if($artist_name)
									{!!Form::text('artist_name', $artist_name, ['class'=>'form-control','disabled'])!!}
									{!!Form::hidden('name',$artist_name)!!}	
								@else
									{!!Form::text('name', $artist_name, ['class'=>'form-control'])!!}
								@endif	
						</div>
					</div>

					<div class="form-group">
						{!!Form::label('name','Biography', ['class'=>'col-lg-3 control-label'])!!}			
						<div class="col-lg-8">
							{!!Form::textarea('biography', NULL, ['class'=>'form-control', 'placeholder'=>'The artist\'s biography is not required,but kindly press the \'Save Artist\' button, so your artist will be added to the database. Thanks!'] )!!}
						</div>
					</div>

					{!! Form::hidden('track_id', $track_id, array('class' => 'form-control')) !!}
					{!! Form::hidden('album_name', $album_name, array('class' => 'form-control')) !!}

					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-8">
							{!! Form::submit('Add Artist', ['class'=>'btn btn-primary']) !!}				
							<span></span><span></span>
							<a href="/artist/view/"><input class="btn btn-danger" type="button" value="Cancel (artist not known)" /></a>
							{!!Form::close()!!}
						</div>
					</div>
				</div>
			</div>
	</div>
</div>

@stop
