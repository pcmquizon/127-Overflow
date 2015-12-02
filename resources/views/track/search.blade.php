@extends('dashboardLayout')

@section('title')
    <title>Search Melody</title>
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
				Search melody
		</h1>
		
			{!! Form::open(
			    array(
			        'url' => 'track/search', 
			        'class' => 'form', 
			        'method' => 'POST',
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
						{!! Form::submit('Search Melody', ['class'=>'btn btn-primary']) !!}
						<span></span><span></span>
						<a href="/track/view/"><input class="btn btn-danger" type="button" value="Cancel" /></a>
						{!!Form::close()!!}
					</div>
				</div>



				@if($track_data)
					

					<table class="table table-hover" style="margin-top:125px;">
						<thead>
							<tr>
								<th>Name</th>
								<th>Artist</th>
								<th>Album</th>
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