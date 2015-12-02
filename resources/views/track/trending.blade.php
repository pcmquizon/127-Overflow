@extends('dashboardLayout')

@section('title')
    <title>Trending Melodies</title>
@stop

@section('content')

{{--dd($track_data)--}}

@if($track_data) 
	<h1> Melodies </h1>
	
	<hr class="featurette-divider" style="margin-top:20px; margin-bottom:20px;">

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Artist</th>
				<th>Album</th>
				<th style="text-align:center;">Number of hits</th>
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
					<td style="text-align:center;">{{$track_entry->times_played_total}}</td>				
				</tr>
			@endforeach
		</tbody>
	</table>

@else <h1> No trending melodies to view yet, <a href="/track/recommend">suggest</a> melodies now! </h1>

@endif

@endsection