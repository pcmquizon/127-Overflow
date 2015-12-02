@extends('dashboardLayout')

@section('title')
	<title>Add Melody</title>
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
		<h1 class="page-header">Create a New Melody</h1>
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-12">

				{!! Form::open(
				    array(
				        'url' => '/track', 
				        'class' => 'form', 
				        'method' => 'POST',
				        'files' => true,
				        'enctype' => 'multipart/form-data'));
				        !!}


					<div class="form-group">
						{!!Form::label('name','Name of the Track:', ['class'=>'col-lg-3 control-label'])!!}	
						<div class="col-lg-8">
							{!!Form::text('name', NULL, ['class'=>'form-control'] )!!}
						</div>
					</div>

					<div class="form-group">
						{!!Form::label('name','Artist Name:', ['class'=>'col-lg-3 control-label'])!!}		
						<div class="col-lg-8">
							{!!Form::text('artist_name', NULL, ['class'=>'form-control'] )!!}
						</div>
					</div>

					<div class="form-group">
						{!!Form::label('name','Album Name:', ['class'=>'col-lg-3 control-label'])!!}		
						<div class="col-lg-8">
							{!!Form::text('album_name', NULL, ['class'=>'form-control'] )!!}
						</div>
					</div>

					<div class="form-group">
						{!!Form::label('image','The melody file: ', ['class'=>'col-lg-3 control-label'])!!}	
						<div class="col-lg-8">
							{!! Form::file('image', null, ['class'=>'form-control']) !!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-8">
							{!! Form::submit('Add Melody', ['class'=>'btn btn-primary']) !!}
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
