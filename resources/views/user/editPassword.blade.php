@extends('dashboardLayout')

@section('title')
    <title>Edit Password</title>
@stop

@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
	<h1 class="page-header">Edit Password</h1>
		<div class="row">
			<div class="col-md-8 col-sm-6 col-xs-12 personal-info">
				{!!Form::open(['url' => '/user/profile/edit/password', 'method' => 'post', 'class' => 'form-horizontal']) !!}

				<div class="form-group">
					{!!Form::label('password','Old Password: ', ['class'=>'col-lg-3 control-label'])!!}						
					<div class="col-lg-8">
						{!!Form::password('old_password', ['class'=>'form-control'] )!!}
						{{--$msg--}}
					</div>
				</div>

				<div class="form-group" {{ $errors->has('password') ? 'has-error' : ''}}>
					{!!Form::label('password','Password: ', ['class'=>'col-lg-3 control-label'])!!}						
					<div class="col-lg-8">
						{!!Form::password('password', ['class'=>'form-control'] )!!}
						{!!$errors->first('password', '<span class="help-block">:message</span>')!!}
					</div>
				</div>

				<div class="form-group"  {{ $errors->has('password_confirmation') ? 'has-error' : ''}}>
					{!!Form::label('password','Confirm Password: ', ['class'=>'col-lg-3 control-label'])!!}						
					<div class="col-lg-8">
						{!!Form::password('password_confirmation', ['class'=>'form-control'] )!!}
						{!!$errors->first('password_confirmation', '<span class="help-block">:message</span>')!!}
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-3 control-label"></label>
					<div class="col-md-8">
						<input class="btn btn-primary" value="Save Changes" type="submit">
						<span></span><span></span>
						<a href="/user/profile/edit"><input class="btn btn-danger" type="button" value="Back to edit profile" /></a>
						{!!Form::close()!!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop