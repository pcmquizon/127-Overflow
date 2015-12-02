@extends('dashboardLayout')

@section('title')
    <title>Delete Melody</title>
@stop

@section('content')
@if($tracks) 
	<h1> Tracks </h1>
	
	<hr class="featurette-divider" style="margin-top:20px; margin-bottom:20px;">

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Artist</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($tracks as $track)
				<tr>
					<td>{{$track->name}}</td>
					<td>{{"Artist"}}</td>
					<td><a href="/track/remove/{{$track->id}}"><i class="glyphicon glyphicon-trash"></i>  Delete</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@else <h1> No track to remove yet, <a href="/track/create">create</a> one now! </h1>

@endif

@endsection