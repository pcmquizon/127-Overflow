@extends('dashboardLayout')

@section('title')
	<title>Edit Profile</title>
@stop

@section('content')

<style type="text/css">
	body{padding: 0px;}
</style>

<div id="page-wrapper">
	<div class="container-fluid">
	<h1 class="page-header">Edit Profile</h1>
			<div class="row">
				<!-- left column -->
			    <div class="col-md-4 col-sm-6 col-xs-12">
			      <div class="text-center">
			        <img src="/profile_pictures/{{$path}}" class="avatar img-circle img-thumbnail" alt="avatar" style="height:150px; width:150px;">
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
				<div class="col-md-8 col-sm-6 col-xs-12 personal-info">
				{!!Form::open(['url' => '/user/profile/', 'method' => 'post', 'class' => 'form-horizontal']) !!}
						<div class="form-group">
							{!!Form::label('first_name','First Name: ', ['class'=>'col-lg-3 control-label'])!!}						
							<div class="col-lg-8">
								{!!Form::text('first_name', Auth::user()->first_name, ['class'=>'form-control'] )!!}
							</div>
						</div>

						<div class="form-group">
							{!!Form::label('last_name','Last Name: ', ['class'=>'col-lg-3 control-label'])!!}						
							<div class="col-lg-8">
								{!!Form::text('last_name', Auth::user()->last_name, ['class'=>'form-control'] )!!}
							</div>
						</div>

						<div class="form-group">
							{!!Form::label('email','Email: ', ['class'=>'col-lg-3 control-label'])!!}						
							<div class="col-lg-8">
								{!!Form::text('email', Auth::user()->email, ['class'=>'form-control'] )!!}		
							</div>
						</div>

						<div class="form-group">
							{!!Form::label('username','Username: ', ['class'=>'col-lg-3 control-label'])!!}						
							<div class="col-lg-8">
								{!!Form::text('username', Auth::user()->username, ['class'=>'form-control'] )!!}
							</div>
						</div>

						<div class="form-group">
							{!!Form::label('password','Password: ', ['class'=>'col-lg-3 control-label'])!!}						
							<div class="col-lg-8" style="margin-top:7px;">
								<i class="glyphicon glyphicon-edit"></i><a href="/user/profile/edit/password"> Edit Password</a>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-8">
								<input class="btn btn-primary" value="Save Changes" type="submit">
								<span></span><span></span>
								<a href="/user/profile/"><input class="btn btn-danger" type="button" value="Back to profile" /></a>
								{!!Form::close()!!}
							</div>
						</div>
					</div>
				</div>
	</div>
</div>
@stop
