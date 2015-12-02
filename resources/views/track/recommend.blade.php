@extends('dashboardLayout')

@section('title')
    <title>Recommend Melody</title>
@stop

@section('content')
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
			@foreach ($track_data as $track)
				<tr>
					<td style="vertical-align:middle;">
						<a href="/track/{{$track->track_id}}/details/">
							{{$track->track_name}}
						</a>
					</td>
					<td style="vertical-align:middle;">{{$track->artist_name}}</td>
					<td style="vertical-align:middle;">{{$track->album_name}}</td>
					<td>
							{!! Form::open(
								array('url' => 'track/recommend','class' => 'form', 'method' => 'POST', 'style' => 'margin:0px;'));!!}
							{!!Form::hidden('id', $track->track_id)!!}
							{!! Form::submit('Recommend', ['class'=>'btn btn-primary']) !!}
							{!!Form::close()!!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@else <h1> No tracks to recommend yet, <a href="/track/create">create</a> one now! </h1>

@endif

@endsection