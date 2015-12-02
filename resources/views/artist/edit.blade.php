@extends('dashboardLayout')	


@section('title')
	<title>Edit Artist</title>
@stop

@section('content')

<div id="page-wrapper">
	<div class="container-fluid">
		<h1 class="page-header">
			
			Edit {{$artist->name}}
		</h1>
			<div class="row">
				<div class="col-md-8 col-sm-6 col-xs-12">


				{!! Form::open(
				    array(
				        'url' => "artist/".$artist->id, 
				        'class' => 'form', 
				        'method' => 'PATCH',
				        'files' => true,
				        'enctype' => 'multipart/form-data'));
				        !!}


					<div class="form-group">
						{!!Form::label('name','Artist Name:', ['class'=>'col-lg-3 control-label'])!!}	
						<div class="col-lg-8">
							{!!Form::text('name', $artist->name, ['class'=>'form-control'] )!!}
						</div>
					</div>

					<div class="form-group">
						{!!Form::label('name','Biography', ['class'=>'col-lg-3 control-label'])!!}			
						<div class="col-lg-8">
							{!!Form::textarea('biography', $artist->biography, ['class'=>'form-control'] )!!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-8">
							{!! Form::submit('Save changes', ['class'=>'btn btn-primary']) !!}
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