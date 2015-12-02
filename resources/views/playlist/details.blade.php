@extends('dashboardLayout')

@section('title')
	<title>View Playlist</title>
@stop

@section('custommeta')
	<meta name="_token" content="{!! csrf_token() !!}"/>
@endsection


@section('content')
<style>

	.active a{
		/*color:#5DB0E6;*/
		text-decoration:none;
	}
	#playlist,audio{
		/*background:#666;
		width:40%;*/
	}
	#playlist li a{
		/*color:#eeeedd;*/
		/*background:#333;*/
		display:block;
		margin-top:1px;
	}	
	li a:hover{
		text-decoration:none;
	}

	label.col-lg-3.control-label{
		padding-top: 0px;
	}

</style>

<div id="page-wrapper">
	<div class="container-fluid">
		
		<div class="row" style="margin-bottom:15px !important;">
			<h1 class="page-header">{{$playlist_data->playlist_name}}</h1>
			<ul class="list-inline" style="margin-top:30px;">
				<li class="alert">
					<i class="glyphicon glyphicon-trash"></i><a href="/playlist/{{$playlist_data->playlist_id}}/delete"> Delete Playlist</a>

					{{--/playlist/{{$playlist_data->playlist_id}}/--}}
				</li>
				<li>
					<i class="glyphicon glyphicon-edit"></i><a href="/playlist/{{$playlist_data->playlist_id}}/edit"> Edit Playlist</a>
				</li>
				<li>
					<small><i class="glyphicon glyphicon-plus"></i></small><a href="/playlist/{{$playlist_data->playlist_id}}/add"> Add Songs to Playlist</a>
				</li>
				<li>
				<small><i class="glyphicon glyphicon-minus"></i></small><a href="/playlist/{{$playlist_data->playlist_id}}/remove"> Remove Songs from Playlist</a>
			</li>
			</ul>
		</div>
		
			<div class="row">	
				<div class="col-lg-8 col-md-6 col-sm-12 personal-info">				

					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label class="col-lg-3 control-label">Playlist name:</label>
							<div class="col-lg-8">
								{{$playlist_data->playlist_name}}
							</div>
						</div>
						@if($tracks)
							<div class="form-group">
								<label class="col-lg-3 control-label">Playlist contents:</label>
								<div class="col-lg-8">
									<ul style="list-style:none; padding:0px;">
										@foreach($tracks as $track)
											@if($track->path)
												<li>
													<a href="/track/{{$track->path}}/details/">
														{{$track->track_name}}
													</a>
												</li>
											@else
												<li>
													No melodies yet.
												</li>
											@endif
										@endforeach
									</ul>
								</div>
							</div>
						@endif
					</form>
				</div>
			</div>

			<div class="well col-lg-4">
				@if($track->path)
				
					<audio id="audio" preload="auto" tabindex="0" loop="loop">

					@foreach ($tracks as $track)
				 	 	<source src="/tracks/{{$track->path}}.mp3" type="audio/mpeg" />
				  		<?php break;?>
				  	@endforeach
					</audio>

					<div>
	    				<button class="play">Play</button>
	    				<button class="pause">Pause</button>
					</div>

					<?php $ctr= 0; ?>
					<hr style="margin: 10px 0px;"/>
					<p>
						<ul id="playlist" style="list-style:none; padding:0px; margin:0px;">
				        	@foreach($tracks as $track)
				        		<p>
						       @if($ctr==0)	<li class="active">
						       @else <li>
						       @endif 
									<a class="track" href="/tracks/{{$track->path}}.mp3">{{$track->track_name}}</a>
								</li>
									<?php $ctr++;?>
								</p>
						    @endforeach
						</ul>
					</p>
				@else
					No melodies yet, <a href="/playlist/{{$playlist_data->playlist_id}}/add">add</a> melodies now!
				@endif
			</div>



	</div>
</div>
@stop
	
@section('customjs')


<script type="text/javascript">

	var audio;
	var playlist;
	var tracks;
	var current;




	 $(".pause").click(function(){
         $('audio').trigger('pause');
     });


     $(".play").click(function(){
		var z = document.getElementById('audio');
		var newTrack = $(this).attr('href');
		var id = $('#audio source').attr('src',newTrack)[0]['src'].match('\\d+\.mp3')[0].split("\.mp3")[0];

		if(z.paused){
			//console.log($('audio').trigger('play')==false);
			$('audio').trigger('play');
	      	$.ajax({
	      		type: 'POST',
	      		url: '/track/addplay',
	      		//datatype: 'text',
	      		data: {
	      			song_id: id
	      		}
	      		/*
	      		,success: function(data){
	      			//yung napiprint dito ay defined kay tracks controller addPlay method
			        alert(data);
			    }
			    //*/
			});
      	} 	
     });

	init();

	$(document).on("click", ".alert", function(e) {
		e.preventDefault();
	    bootbox.confirm("Are you sure?", function(result) {
		  console.log("Confirm result: "+result);
		  if(result==true){
		  	//return true;
		  	
		  	// mag ajax ka dito //
		  	window.location = "/playlist/<?php echo $playlist_data->playlist_id;?>/delete";
		  	//or delete tong isa na get//

		  }
		  	
		}); 
	});


	function init(){
	 
	    current = 0;
	    audio = $('audio');
	    playlist = $('#playlist');
	    tracks = playlist.find('li a');
	    len = tracks.length - 1;
	    audio[0].volume = 1;
	//  audio[0].play();

	    playlist.find('a').click(function(e){
	        //e.preventDefault();
	        link = $(this);
	        //console.log('eow pfuh');
	        current = link.parent().index();
	        run(link, audio[0]);
	    });

		$(".well li a").click(function(e){
			e.preventDefault();
			var newTrack = $(this).attr('href');
			$('#audio source').attr('src',newTrack);
			//alert($('#audio source').attr('src'))
			audio[0].load();
		    audio[0].play();
		    //console.log('ha!');

		    //console.log($('#audio source').attr('src',newTrack)[0]['src'].match('\\d+\.mp3')[0].split("\.mp3")[0]);

		    var id = $('#audio source').attr('src',newTrack)[0]['src'].match('\\d+\.mp3')[0].split("\.mp3")[0];

		    //ajax here for hits
		   	$.ajax({
	      		type: 'POST',
	      		url: '/track/addplay',
	      		//datatype: 'text',
	      		data: {
	      			song_id: id
	      		}
	      		//,success: function(data){
	      		//	//yung napiprint dito ay defined kay tracks controller addPlay method
			    //    alert(data);
			    //}
			    
			});

		});

	    audio[0].addEventListener('ended',function(e){
	        current++;
	        if(current == len){
	            current = 0;
	            link = playlist.find('a')[0];
	        }else{
	            link = playlist.find('a')[current];    
	        }
	        run($(link),audio[0]);
	    });
	    
	    //console.log("hello");
	}

	function run(link, player){
	        player.src = link.attr('href');
	        par = link.parent();
	        par.addClass('active').siblings().removeClass('active');
	        audio[0].load();
	        audio[0].play();
	}

	$('#audio').click(function() {
	  if (this.paused == false) {
	      this.pause();
	      alert('music paused');
	  } else {
	      this.play();
	      alert('music playing');
	  }
	});

</script>


<script type="text/javascript">
	$.ajaxSetup({
	   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});
</script>

@endsection