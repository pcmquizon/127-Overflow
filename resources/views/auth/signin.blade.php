<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<h4 class="modal-title">Please sign in</h4>
</div>

<div class="modal-body">
	
	{!!Form::open()!!}	
		<div class="form-group">
			{!!Form::label('userEmailAddress','inputEmail',['class'=>'sr-only'])!!}
			{!!Form::email('userEmailAddress',null, ['class'=>'form-control', 'placeholder'=>'Email address', 'required'=>'', 'autofocus'=>''])!!}

			{!!Form::label('userPassword','inputPassword',['class'=>'sr-only'])!!}
			{!!Form::password('userPassword', ['class'=>'form-control', 'placeholder'=>'Password', 'required'=>''])!!}
		</div>

		<div class="checkbox">
			<label>
				{!!Form::checkbox('remember','remember-me')!!} Remember me
			</label>
		</div>

		{!! Form::submit('Sign in', ['class' =>'btn btn-lg btn-primary btn-block'])!!}
	{!!Form::close()!!}

</div>

<div class="modal-footer">
	<label class="pull-left">
		Don't have an account? Register
		<span data-toggle="modal" data-target="#signUpModal" onclick="pot();">
			<a href="#">here</a>.
		</span>
	</label>
</div>	
