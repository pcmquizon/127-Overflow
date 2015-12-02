@extends('dashboardLayout')

@section('title')
    <title>View artists</title>
@stop

@section('content')

{{--dd($artists)--}}

@if($artist_data) 
	<h1> Artists </h1>
	
	<hr class="featurette-divider" style="margin-top:20px; margin-bottom:20px;">

		@foreach ($artist_data as $artist_entry)

		<article>

				<a href="/artist/{{$artist_entry->artist_id}}/details">
					<h3>{{$artist_entry->artist_name}}</h3>
				</a>
				<em><small>Added on {{$artist_entry->created_at}}</small></em>
				
				<p>
					@if( $artist_entry->biography )
						<p>{{$artist_entry->biography}}</p>
					@else
						<p>Currently no known information about the artist.</p>
					@endif	
				</p>

				<p>
					{!! Form::open(
						array('url' => 'artist/'.$artist_entry->artist_id,'class' => 'form', 'method' => 'DELETE', 'style' => 'margin:0px;'));!!}
					{!! Form::submit('Remove artist', ['class'=>'btn btn-danger']) !!}
					{!!Form::close()!!}
				</p>

			<hr class="featurette-divider" style="margin-top:0px; margin-bottom:20px;">
		</article>

		@endforeach


@else <h1> No artists to remove yet, <a href="/artist/create">add</a> one now! </h1>

@endif

@endsection