@extends('dashboardLayout')

@section('title')
	<title>View Profile</title>
@stop

@section('content')

<style type="text/css">
	body{
		padding: 0px;
	}
	.col-lg-3.control-label{
		padding-top: 0px;
	}
</style>

<div id="page-wrapper">
	<div class="container-fluid">
		
		<div class="row">
			<h1 class="page-header">Profile</h1>
			<i class="glyphicon glyphicon-edit"></i><a href="/user/profile/edit"> Edit Profile</a>
		</div>
			<div class="row">
				<!-- left column -->
			    <div class="col-md-4 col-sm-6 col-xs-12">
			      <div class="text-center">
			        <img src="/profile_pictures/{{$path}}" class="avatar img-circle img-thumbnail" alt="avatar" style="height:auto; width:150px;">
			        {{--http://stackoverflow.com/questions/757782/how-to-preserve-aspect-ratio-when-scaling-image-using-one-css-dimension-in-ie6--}}
					<h6>Upload a different photo...</h6>
			        

			        	{!! Form::open(array('url' => '/user/profile/edit/dp', 
			        						 'class' => 'form', 
			        						 'method' => 'POST', 
			        						 'files' => true, 
			        						 'enctype' => 'multipart/form-data'));!!}

							<!---->
							<div class="well well-sm">
								{!! Form::file('image', null, ['class'=>'form-control']) !!}
							</div>
							
							<!---->
							{{--<input type="file"  name="image" class="text-center center-block well well-sm">--}}
							{!! Form::submit('Update profile picture', ['class'=>'btn btn-default']) !!}
							{!!Form::close()!!}
							<hr/>
			      </div>
			    </div>

			    <!-- edit form column -->
				<div class="col-lg-8 col-md-6 col-sm-12 personal-info">				
			{{--<form class="form-horizontal" role="form">--}}
			{!!Form::open(['class'=>'form-horizontal'])!!}
				<div class="form-group">
					<label class="col-lg-3 control-label">First name:</label>
					<div class="col-lg-8">
						{{Auth::user()->first_name}}
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Last name:</label>
					<div class="col-lg-8">
						{{Auth::user()->last_name}}
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Email:</label>
					<div class="col-lg-8">
						{{Auth::user()->email}}
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Username:</label>
					<div class="col-lg-8">
						{{Auth::user()->username}}
					</div>
				</div>

				<div class="form-group">
					{!!Form::label('password','Password: ', ['class'=>'col-lg-3 control-label'])!!}						
					<div class="col-lg-8">
						<i class="glyphicon glyphicon-edit"></i><a href="/user/profile/edit/password"> Edit Password</a>
					</div>
				</div>

			{!!Form::close()!!}
		</div>
	</div>
</div>
@stop
