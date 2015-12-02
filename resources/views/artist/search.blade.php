@extends('dashboardLayout')

@section('title')
    <title>Search Artist</title>
@stop

@section('content')

<style> 
	.form-control{ 
		margin-bottom:5px;
	}
	h1 {
		text-align:center;
		color: #3A3A3A;
		box-shadow: 0px 0px 5px #000;
		margin-bottom: 40px;
		padding: 10px;
	}
</style>

<div id="page-wrapper">
	<div class="container-fluid">
		<h1 class="page-header">
				@if(!$all_songs)
					Search artist
				@else
					Showing all songs for {{$track_data[0]->artist_name}}
				@endif

		</h1>
		
			{!! Form::open(
			    array(
			        'url' => 'artist/search', 
			        'class' => 'form', 
			        'files' => true,
			        'enctype' => 'multipart/form-data'));
			        !!}


				<div class="form-group">
					<div class="col-lg-12">
						{!!Form::text('query', NULL, ['class'=>'form-control'] )!!}
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label"></label>
					<div class="col-md-12">
						{!! Form::submit('Search Artist', ['class'=>'btn btn-primary']) !!}
						<span></span><span></span>
						@if(!$all_songs)
							<a href="/artist/view/"><input class="btn btn-danger" type="button" value="Cancel" /></a>
						@else
							<a href="/artist/search"><input class="btn btn-danger" type="button" value="Back to search by artist" /></a>
						@endif
						
						

						{!!Form::close()!!}
					</div>
				</div>

				@if($track_data)
					<table class="table table-hover" style="margin-top:125px;">
						<thead>
							<tr>
								@if(!$all_songs)
									<th>Artist</th>
									<th>Album</th>
									<th></th>
								@else
									<th>Track name</th>
									<th>Album</th>
								@endif
							</tr>
						</thead>
						<tbody>

							@foreach ($track_data as $track_entry)
								<tr>
									@if(!$all_songs)
										<td>
											<a href="/artist/{{$track_entry->artist_id}}/details/">
												{{$track_entry->artist_name}}
											</a>
										</td>
										<td>
											{{$track_entry->album_name}}
										</td>
										@if(\Auth::user()->role==='admin')						
											<td><a href="/artist/search/{{$track_entry->artist_name}}">
												View all songs by {{$track_entry->artist_name}}
											</a></td>
										@endif
									@else
									<td>
										<a href="/track/{{$track_entry->track_id}}/details/">
											{{$track_entry->track_name}}
										</a>
									</td>						
									<td>
										{{$track_entry->album_name}}
									</td>
								@endif
								</tr>
							@endforeach
						</tbody>
					</table>
				@else 
				<div class="container" style="display:inline-block; margin-top:12px;">
					<p><h4>Nothing matched your query.</h4></p>
				</div>
				@endif
	</div>
</div>


@endsection