@extends('dashboardLayout')

@section('title')
    <title>View approved Users</title>
@stop

@section('content')
@if($users) 
	<div class="container col-lg-12">
		<h1> Approved Users </h1>

		<hr class="featurette-divider" style="margin-top:0px; margin-bottom:20px;">

		<table>
			<thead>
				<tr>
					<th> Select date to view specific users approved</th>
				</tr>
			</thead>
			
			<tbody>
				{!! Form::open(['url' => '/user/show/approved/on', 'method' => 'post', 'class' => 'col-lg-4']) !!}
				<tr>
					<td>
						<select class="form-control" name="date"/>
							@foreach ($dates as $date) 
								<option> {{ $date->date_approved}} </option>
							@endforeach

						</select> 
						<input class="btn btn-primary" style="margin-top:1em;"type="submit" value="Search"/>
					</td>
				</tr>
				{!! Form::close()!!}
			</tbody>
		</table>		
	
		<hr class="featurette-divider" style="margin-top:20px; margin-bottom:20px;">
	

	</div>

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Username</th>
				<th>Email Address</th>
				<th>Date Joined</th>
				<!--<th>Action</th>-->
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{$user->username}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->created_at}}</td>
				<!--
					<td><a href="/user/deactivate/{{$user->id}}"><i class="glyphicon glyphicon-remove-circle"></i> Deactivate</td>
				-->
				</tr>
			@endforeach
		</tbody>
	</table>

@else <h1> No user is approved today! Nyay! </h1>

@endif

@endsection