@extends('dashboardLayout')

@section('title')
    <title>Delete Melodies</title>
@stop

@section('content')

{{--dd($tracks)--}}

@if($track_data) 
	<h1> Melodies </h1>
	
	<hr class="featurette-divider" style="margin-top:20px; margin-bottom:20px;">

	<table class="table table-hover">
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
						{!! Form::open(
							array('url' => 'track/'.$track_entry->track_id,'class' => 'form', 'method' => 'DELETE', 'style' => 'margin:0px;'));!!}
						{!! Form::submit('Remove track', ['class'=>'btn btn-danger']) !!}
						{!!Form::close()!!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@else <h1> No melodies to remove yet, <a href="/track/create">add</a> one now! </h1>

@endif

@endsection