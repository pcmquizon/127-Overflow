@extends('dashboardLayout')

@section('title')
	<title>Add Playlist</title>
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
				Create New Playlist
		</h1>
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-12">


				{!! Form::open(
				    array(
				        'url' => 'playlist/', 
				        'class' => 'form', 
				        'files' => true,
				        'enctype' => 'multipart/form-data'));
				        !!}


					<div class="form-group">
						{!!Form::label('name','Playlist Name:', ['class'=>'col-lg-3 control-label'])!!}	
						<div class="col-lg-8">
							{!!Form::text('name', NULL, ['class'=>'form-control'] )!!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-8">
							{!! Form::submit('Create Playlist', ['class'=>'btn btn-primary']) !!}
							<span></span><span></span>
							<a href="/playlist/view/"><input class="btn btn-danger" type="button" value="Cancel" /></a>
							{!!Form::close()!!}
						</div>
					</div>
				</div>
			</div>
	</div>
</div>

@stop
