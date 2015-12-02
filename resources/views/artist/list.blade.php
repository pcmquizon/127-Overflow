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
				@if( \Auth::user()->role==='admin' )
					<em><small>Added on {{$artist_entry->created_at}}</small></em>
					&nbsp; &middot; &nbsp;
					<small><a href="/artist/{{$artist_entry->artist_id}}/edit/">Edit artist details <small><i class="glyphicon glyphicon-pencil small"></i></small></a></small>
				@endif

				<p>
					@if( $artist_entry->biography )
						<p>{{$artist_entry->biography}}</p>
					@elseif( \Auth::user()->role==='admin' && !$artist_entry->biography )
						<a href="/artist/{{$artist_entry->artist_id}}/edit/">Edit biography</a> <i class="glyphicon glyphicon-pencil small"></i>
					@else
						<p>Currently no known information about the artist.</p>
					@endif	
				</p>

			

			<hr class="featurette-divider" style="margin-top:0px; margin-bottom:20px;">
		</article>

		@endforeach


@else <h1> No artists to edit yet, <a href="/artist/create">add</a> one now! </h1>

@endif

@endsection