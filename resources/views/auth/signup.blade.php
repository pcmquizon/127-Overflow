<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<h4 class="modal-title">Register here</h4>
</div>
<div class="modal-body">

	{!!Form::open()!!}	
		<div class="form-group">
			{!!Form::label('userFirstName','inputFirstName',['class'=>'sr-only'])!!}
			{!!Form::text('userFirstName',null, ['class'=>'form-control', 'placeholder'=>'First Name', 'required'=>'', 'autofocus'=>''])!!}

			{!!Form::label('userLastName','inputLastName',['class'=>'sr-only'])!!}
			{!!Form::text('userLastName',null, ['class'=>'form-control', 'placeholder'=>'Last Name', 'required'=>''])!!}
		</div>
		
		<div class="form-group">
			{!!Form::label('userUsername','inputUsername',['class'=>'sr-only'])!!}
			{!!Form::text('userUsername',null, ['class'=>'form-control', 'placeholder'=>'Username', 'required'=>''])!!}
			
			{!!Form::label('userPassword','inputPassword',['class'=>'sr-only'])!!}
			{!!Form::password('userPassword', ['class'=>'form-control', 'placeholder'=>'Password', 'required'=>''])!!}
		
			{!!Form::label('userEmailAddress','inputEmail',['class'=>'sr-only'])!!}
			{!!Form::email('userEmailAddress',null, ['class'=>'form-control', 'placeholder'=>'Email Address', 'required'=>''])!!}
		</div>
	
		<div class="checkbox">
			<label>
				{!!Form::checkbox('remember','remember-me')!!} Remember me
			</label>
		</div>
	
		{!! Form::submit('Sign up', ['class' =>'btn btn-lg btn-primary btn-block'])!!}
	{!!Form::close()!!}
	
</div>
<div class="modal-footer">
	<label class="pull-left">
		Already have an account? Sign in
		<span data-toggle="modal" data-target="#signInModal" onclick="nie();">
			<a href="#">here</a>.
		</span>
	</label>
</div>
