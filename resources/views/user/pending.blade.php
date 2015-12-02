@extends('dashboardLayout')

@section('title')
    <title>View pending users</title>
@stop

@section('content')

	@if($users)
		<h1> Pending Users </h1>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Username</th>
					<th>Date Joined</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<td>{{$user->username}}</td>
						<td>{{$user->created_at}}</td>
						<td><a href="/user/approve/{{$user->id}}"><i class="glyphicon glyphicon-ok-circle"></i> Approve</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else <h1> No users to approve!! Yay!</h1>

	@endif

	

@endsection