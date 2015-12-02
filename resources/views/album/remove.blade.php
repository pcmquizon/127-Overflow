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
				<th>Added on</th>
				<th>Action</th>
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
					<td>{{$album_entry->created_at}}</td>
					<td>
						{!! Form::open(
							array('url' => 'album/'.$album_entry->album_id,'class' => 'form', 'method' => 'DELETE', 'style' => 'margin:0px;'));!!}
						{!! Form::submit('Remove album', ['class'=>'btn btn-danger']) !!}
						{!!Form::close()!!}
					</td>
				</tr>
			@endforeach

		</tbody>
	</table>

@else <h1> No albums to remove yet, <a href="/album/create">create</a> one now! </h1>

@endif

@endsection
