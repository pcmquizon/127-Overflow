@extends('dashboardLayout')

@section('title')
    <title>Add Melodies to your playlist</title>
@stop

@section('content')

{{--dd($tracks)--}}

@if($track_data) 
	<h1> Add Melodies to {{$playlist_to_edit->name}} </h1>

		<ul class="list-inline" style="margin-top:30px;">
			<li>
				<i class="glyphicon glyphicon-edit"></i><a href="/playlist/{{$playlist_to_edit->id}}/details"> Back to Playlist</a>
			</li>
			<li>
				<small><i class="glyphicon glyphicon-minus"></i></small><a href="/playlist/{{$playlist_to_edit->id}}/remove"> Remove Songs from Playlist</a>
			</li>
		</ul>

	<table class="table table-hover" style="margin-top:50px;">
		<thead>
			<tr>
				<th>Name</th>
				<th>Artist</th>
				<th>Album</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

			@foreach ($track_data as $track_entry)
				<tr>
					<td>
						<a href="/track/{{$track_entry->track_id}}/details/">
							{{$track_entry->track_name}}
						</a>
					</td>						
					<td>
						{{$track_entry->artist_name}}
					</td>
					<td>
						{{$track_entry->album_name}}
					</td>
					<td>
						<a href="/playlist/{{$playlist_to_edit->id}}/add/{{$track_entry->track_id}}"><i class="glyphicon glyphicon-plus small"></i> Add melody to playlist </a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@else <h1> No melodies to view yet, <a href="/track/create">create</a> one now! </h1>

@endif

@endsection