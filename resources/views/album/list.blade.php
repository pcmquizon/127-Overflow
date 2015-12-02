@extends('dashboardLayout')

@section('title')
    <title>View Albums</title>
@stop

@section('content')

{{--dd($albums)--}}

@if($album_data) 
	<h1> Albums </h1>
	
	<hr class="featurette-divider" style="margin-top:20px; margin-bottom:20px;">

	<table class="table table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Artist</th>
				<th>Recording Company</th>
				@if( \Auth::user()->role==='admin' )
					<th>Added on</th>
					<th>Action</th>
				@endif	
			</tr>
		</thead>
		<tbody>
			
			@foreach ($album_data as $album_entry)
				<tr>
					<td>
						<a href="/album/{{$album_entry->album_id}}/details">
							{{$album_entry->album_name}}
						</a>						
					</td>					
					<td>
						{{$album_entry->artist_name}}
					</td>
					<td>
						{{$album_entry->recording_company}}
					</td>
					@if( \Auth::user()->role==='admin' )
						<td>{{$album_entry->created_at}}</td>
						<td><a href="/album/{{$album_entry->album_id}}/edit/">Edit album details <small><i class="glyphicon glyphicon-pencil small"></i></small></a></td>
					@endif	
				</tr>
			@endforeach

		</tbody>
	</table>

@else <h1> No albums to edit yet, <a href="/album/create">create</a> one now! </h1>

@endif

@endsection
