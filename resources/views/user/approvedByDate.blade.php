@extends('dashboardLayout')

@section('title')
    <title>View approved users on</title>
@stop

@section('content')

	@if($users) 
		<h1> Users approved on : {{$date}} </h1>

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
						@if( !($user->username === Auth::user()->username) )
							<td><a href="/user/deactivate/{{$user->id}}"><i class="glyphicon glyphicon-remove-circle"></i>  Deactivate</td>
						@else
							<td><i class="glyphicon glyphicon-remove-circle"></i> Deactivate</td>
						@endif

					</tr>
				@endforeach
			</tbody>
		</table>

	@else <h1> No user is approved today! Nyay! </h1>

	@endif

@endsection