@extends('dashboardLayout')

@section('title')
    <title>Edit Melodies</title>
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
				@if( \Auth::user()->role==='admin' )
					<th>Uploaded on</th>
					<th>Action</th>
				@endif
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
					
					@if( \Auth::user()->role==='admin' )
						<td>{{$track_entry->created_at}}</td>
						<td>
							<a href="/track/{{$track_entry->track_id}}/edit/">Edit melody details <i class="glyphicon glyphicon-pencil small"></i></a>
						</td>
					@endif	
					
				</tr>
			@endforeach
		</tbody>
	</table>

@else <h1> No melodies to edit yet, <a href="/track/create">create</a> one now! </h1>

@endif

@endsection