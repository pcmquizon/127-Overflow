@extends('dashboardLayout')

@section('title')
    <title>Edit playlists</title>
@stop

@section('content')

{{--dd($playlists)--}}

@if($playlists) 
	<h1> Playlists </h1>
	
	<hr class="featurette-divider" style="margin-top:20px; margin-bottom:20px;">

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Added on</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			
			@foreach ($playlists as $playlist)
				<tr>
					<td>
						<a href="/playlist/{{$playlist->id}}/details">
							{{$playlist->name}}
						</a>						
					</td>					
					<td>
						{{$playlist->created_at}}
					</td>					
					<td>
						<a href="/playlist/{{$playlist->id}}/edit">Edit playlist detail <i class="glyphicon glyphicon-pencil small"></i></a>
					</td>
				</tr>
			@endforeach

		</tbody>
	</table>

@else <h1> No playlists to edit yet, <a href="/playlist/create">create</a> one now! </h1>

@endif

@endsection
