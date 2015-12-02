@extends('dashboardLayout')

@section('title')
    <title>Remove Melodies from playlist</title>
@stop

@section('content')

{{--dd($tracks[0]->track_id)--}}

@if($tracks[0]->track_id) 
	<h1> Remove Melodies to {{$playlist_to_edit->name}} </h1>

		<ul class="list-inline" style="margin-top:30px;">
			<li>
				<i class="glyphicon glyphicon-edit"></i><a href="/playlist/{{$playlist_to_edit->id}}/details"> Back to Playlist</a>
			</li>
			<li>
				<small><i class="glyphicon glyphicon-plus"></i></small><a href="/playlist/{{$playlist_to_edit->id}}/add"> Add Songs from Playlist</a>
			</li>
		</ul>

	<table class="table table-hover" style="margin-top:50px;">
		<thead>
			<tr>
				<th>Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>

			@foreach ($tracks as $track_entry)
				<tr>
					<td>
						<a href="/track/{{$track_entry->track_id}}/details/">
							{{$track_entry->track_name}}
						</a>
					</td>						
					<td>
						{!! Form::open(
							array('url' => 'playlist/'.$playlist_to_edit->id.'/remove/'.$track_entry->track_id,'class' => 'form', 'method' => 'DELETE', 'style' => 'margin:0px;'));!!}
						{!!Form::hidden('playlist_id', $playlist_to_edit->id)!!}
						{!!Form::hidden('track_id', $track_entry->track_id)!!}
						{!! Form::submit('Remove from playlist', ['class'=>'btn btn-danger']) !!}
						{!!Form::close()!!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@else <h1> No melodies to remove yet, <a href="/playlist/{{$playlist_to_edit->id}}/add">add</a> melodies now! </h1>

@endif

@endsection