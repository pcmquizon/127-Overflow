
{!!Form ::open (array('route' => 'sessions.store'))!!}

<ul>

	 <li> 

	 		{!!Form ::label('username','username')!!}						
	 		{!!Form ::text('username')!!}

	 </li>



	 <li> 

	 		{!!Form ::label('password','password')!!}
	 		{!!Form ::password('password')!!}
	 		
	 </li>


	 <li> 
	
	 		{!!Form::submit()!!}

	 </li>

{!!Form::close()!!}