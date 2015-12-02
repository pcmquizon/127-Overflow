@extends('dashboardLayout')

@section('title')
    <title>Delete playlist</title>
@stop

@section('content')

{{--dd($tracks[0]->track_id)--}}

@if($playlists) 
	<h1>Delete Playlist</h1>

	<table class="table table-hover" style="margin-top:50px;">
		<thead>
			<tr>
				<th>Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

			@foreach ($playlists as $playlist)
				<tr>
					<td>
						<a href="/playlist/{{$playlist->id}}/details/">
							{{$playlist->name}}
						</a>
					</td>						
					<td>
						{!! Form::open(
							array('url' => 'playlist/'.$playlist->id,'class' => 'form', 'method' => 'DELETE', 'style' => 'margin:0px;'));!!}
						{!!Form::hidden('playlist_id', $playlist->id)!!}
						{!! Form::submit('Remove playlist', ['class'=>'btn btn-danger']) !!}
						{!!Form::close()!!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@else <h1> No playlist to remove yet, <a href="/playlist/create">create</a> one now! </h1>

@endif

@endsection