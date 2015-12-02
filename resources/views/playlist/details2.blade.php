@extends('dashboardLayout')

@section('title')
    <title>Play Melody</title>
@stop

@section('custommeta')
	<meta name="_token" content="{!! csrf_token() !!}"/>
@endsection


@section('content')

<style type="text/css">
/* @group player */

.player {
	display: block;
	height: 48px;
	/*width: 400px;*/
		width: auto;
	/*position: absolute;*/
	top: 349px;
	left: -1px;
	-webkit-box-shadow: 0 -1px 0 rgba(20, 30, 40, .75);
	-moz-box-shadow: 0 -1px 0 rgba(20, 30, 40, .75);
	-o-box-shadow: 0 -1px 0 rgba(20, 30, 40, .75);
	box-shadow: 0 -1px 0 rgba(20, 30, 40, .75);
	border-top: 1px solid #c2cbd4;
	border-bottom: 1px solid #283541;
		border-left: 1px solid #283541;
		border-right: 1px solid #283541;
	background: #939eaa;
	background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(rgba(174, 185, 196, .9)), to(rgba(110, 124, 140, .9)), color-stop(.5, rgba(152, 164, 176, .9)),color-stop(.501, rgba(132, 145, 159, .9)));
	background: -moz-linear-gradient(top, rgba(174, 185, 196, .9), rgba(152, 164, 176, .9) 50%, rgba(132, 145, 159, .9) 50.1%, rgba(110, 124, 140, .9));
	background: linear-gradient(top, rgba(174, 185, 196, .9), rgba(152, 164, 176, .9) 50%, rgba(132, 145, 159, .9) 50.1%, rgba(110, 124, 140, .9));
	cursor: default;
}

#playtoggle {
	position: absolute;
	/*top: 9px;
	left: 10px;*/
		top: 28px;
		left: 25px;
	width: 30px;
	height: 30px;
	background: url(/images/player.png) no-repeat -30px 0;
	cursor: pointer;
}

#playtoggle.playing {
	background-position: 0 0;
}

#playtoggle:active {
	/*top: 10px;*/
		top: 29px;
}

#timeleft {
	line-height: 48px;
	position: absolute;
	/*top: 0;*/
		top: 18px;
	right: 0;
	width: 50px;
	text-align: center;
	/*font-size: 11px;*/
		font-size: 15px;
	font-weight: bold;
	color: #fff;
	text-shadow: 0 1px 0 #546374;
}

#wrapper #timeleft {
	right: 35px;
}

#gutter {
	position: absolute;
	/*top: 19px;
	left: 50px;*/
		top: 40px;
		left: 60px;
	right: 50px;
	height: 6px;
	padding: 2px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
	border-radius: 5px;
	background: #546374;
	background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#242f3b), to(#516070));
	background: -moz-linear-gradient(top, #242f3b, #516070);
	background: linear-gradient(top, #242f3b, #516070);
	-webkit-box-shadow: 0 1px 4px rgba(20, 30, 40, .75) inset, 0 1px 0 rgba(176, 187, 198, .5);
	-moz-box-shadow: 0 1px 4px rgba(20, 30, 40, .75) inset, 0 1px 0 rgba(176, 187, 198, .5);
	-o-box-shadow: 0 1px 4px rgba(20, 30, 40, .75) inset, 0 1px 0 rgba(176, 187, 198, .5);
	box-shadow: 0 1px 4px rgba(20, 30, 40, .75) inset, 0 1px 0 rgba(176, 187, 198, .5);
}

#wrapper #gutter {
	right: 90px;
}

#loading {
	background: #fff;
	background: #939eaa;
	background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#eaeef1), to(#c7cfd8));
	background: -moz-linear-gradient(top, #eaeef1, #c7cfd8);
	background: linear-gradient(top, #eaeef1, #c7cfd8);
	-webkit-box-shadow: 0 1px 0 #fff inset, 0 1px 0 #141e28;
	-moz-box-shadow: 0 1px 0 #fff inset, 0 1px 0 #141e28;
	-o-box-shadow: 0 1px 0 #fff inset, 0 1px 0 #141e28;
	box-shadow: 0 1px 0 #fff inset, 0 1px 0 #141e28;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	-o-border-radius: 3px;
	border-radius: 3px;
	display: block;
	float: left;
	min-width: 6px;
	height: 6px;
}

#handle {
	position: absolute;
	/*top: -5px;*/
		top: -7px;
	left: 0;
	width: 20px;
	height: 20px;
	margin-left: -10px;
	background: url(/images/player.png) no-repeat -65px -5px;
	cursor: pointer;
}

section {
	/*width: 150px;*/
		width: 100px;
	height: auto;
	/*margin: 100px auto 0;*/
		margin: 4px 115px 0;
	/*position: relative;*/
		position: absolute;
}

#slider{
	border-width: 1px;
	border-style: solid;
	border-color: #333 #333 #777 #333;
	border-radius: 25px;
	width: 100px;
	position: absolute;
	height: 13px;
	background-color: #8e8d8d;
	background: url('/images/bg-track.png') repeat top left;
    box-shadow: inset 0 1px 5px 0px rgba(0, 0, 0, .5), 
    				  0 1px 0 0px rgba(250, 250, 250, .5);
    left: 20px;
}
.tooltip {
	position: absolute;
	display: block;
	top: -25px;
	width: 35px;
	height: 20px;
	color: #fff;
	text-align: center;
	font: 10pt Tahoma, Arial, sans-serif ;
	border-radius: 3px;
	border: 1px solid #333;
    -webkit-box-shadow:  1px 1px 2px 0px rgba(0, 0, 0, .3);
    box-shadow:  1px 1px 2px 0px rgba(0, 0, 0, .3);
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
	background: -moz-linear-gradient(top,  rgba(69,72,77,0.5) 0%, rgba(0,0,0,0.5) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(69,72,77,0.5)), color-stop(100%,rgba(0,0,0,0.5))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  rgba(69,72,77,0.5) 0%,rgba(0,0,0,0.5) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  rgba(69,72,77,0.5) 0%,rgba(0,0,0,0.5) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  rgba(69,72,77,0.5) 0%,rgba(0,0,0,0.5) 100%); /* IE10+ */
	background: linear-gradient(top,  rgba(69,72,77,0.5) 0%,rgba(0,0,0,0.5) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8045484d', endColorstr='#80000000',GradientType=0 ); /* IE6-9 */
}
.volume {
	content: "";
	display: inline-block;
	width: 25px;
	height: 25px;
	/*right: -5px;*/
		right: -60px;
	background: url('/images/volume.png') no-repeat 0 -50px;
	position: absolute;
	/*margin-top: -5px;*/
		margin-top: -6px;
}
.ui-slider-handle {
	position: absolute;
	z-index: 2;
	width: 25px;
	height: 25px;
	cursor: pointer;
	background: url('/images/handle.png') no-repeat 50% 50%;
	font-weight: bold;
	color: #1C94C4;
	outline: none;
	top: -7px;
	margin-left: -12px;
}
.ui-slider-range {
	background: #ffffff; /* Old browsers */
	background: -moz-linear-gradient(top,  #ffffff 0%, #eaeaea 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#eaeaea)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #ffffff 0%,#eaeaea 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #ffffff 0%,#eaeaea 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #ffffff 0%,#eaeaea 100%); /* IE10+ */
	background: linear-gradient(top,  #ffffff 0%,#eaeaea 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#eaeaea',GradientType=0 ); /* IE6-9 */
	position: absolute;
	border: 0;
	top: 0;
	height: 100%;
	border-radius: 25px;
}
/* @end */

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


			<div class="well col-lg-5">
				@if($track->path)
					
				
					<hr style="margin-top:60px 0px;"/>
					<?php $ctr= 0; ?>
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
</div>

<?php foreach ($tracks as $track) $x = '<source src="/tracks/'.$track->path.'.mp3" type="audio/mpeg" />'?>

@endsection

@section('customjs')

	<script>
		$(document).ready(function(){
			function initAudio() {
	
				var supportsAudio = !!document.createElement('audio').canPlayType,
						audio,
						loadingIndicator,
						positionIndicator,
						timeleft,
						loaded = false,
						manualSeek = false;

				if (supportsAudio) {

					  	
					var tracks = new Array();

					var path = '<?php echo $x;?>';

					var player = '<p class="player"><span id="playtoggle" /><span id="gutter"><span id="loading" /><span id="handle" class="ui-slider-handle" /></span><span id="timeleft" /><audio id ="audio" preload="metadata">'+path+'</source><section><span class="tooltip">50</span><div id="slider"></div><span class="volume"></span></section></audio></p>';

				  	$(player).insertBefore("hr");
				
					audio = $('.player audio').get(0);

					//console.log(audio[0]);

					audio.volume = 1;
					loadingIndicator = $('.player #loading');
					positionIndicator = $('.player #handle');
					timeleft = $('.player #timeleft');
					
					if ((audio.buffered != undefined) && (audio.buffered.length != 0)) {
						$(audio).bind('progress', function() {
							var loaded = parseInt(((audio.buffered.end(0) / audio.duration) * 100), 10);
							loadingIndicator.css({width: loaded + '%'});
						});
					}
					else {
						loadingIndicator.remove();
					}
					
					$(audio).bind('timeupdate', function() {
						
						var rem = parseInt(audio.duration - audio.currentTime, 10),
								pos = (audio.currentTime / audio.duration) * 100,
								mins = Math.floor(rem/60,10),
								secs = rem - mins*60;
						
						timeleft.text('-' + mins + ':' + (secs < 10 ? '0' + secs : secs));
						if (!manualSeek) { positionIndicator.css({left: pos + '%'}); }
						if (!loaded) {
							loaded = true;
							
							$('.player #gutter').slider({
									value: 0,
									step: 0.01,
									orientation: "horizontal",
									range: "min",
									max: audio.duration,
									animate: true,					
									slide: function(){							
										manualSeek = true;
									},
									stop:function(e,ui){
										manualSeek = false;					
										audio.currentTime = ui.value;
									}
								});
						}
						
					}).bind('play',function(){
						$("#playtoggle").addClass('playing');
					}).bind('pause ended', function() {
						$("#playtoggle").removeClass('playing');		
					});		
					
					$("#playtoggle").click(function() {	
						var newTrack = $('li.active a').attr('href'); //$(this).attr('href');
						var id = $('li.active a').attr('href').match('\\d+\.mp3')[0].split("\.mp3")[0]; //$('#audio source').attr('src',newTrack)[0]['src'].match('\\d+\.mp3')[0].split("\.mp3")[0];		
						if (audio.paused) {	
							audio.play();
					      	$.ajax({
					      		type: 'POST',
					      		url: '/track/addplay',
					      		data: {
					      			song_id: id
					      		}
							});
						} 
						else { audio.pause(); }			
					});



				}

				var playlist = $('#playlist');
	    		var tracks = playlist.find('li a');
	    		playlist.find('a').click(function(e){
					        //e.preventDefault();
	        	link = $(this);
	        //console.log('eow pfuh');
	        	current = link.parent().index();
	        	run(link, audio);
	    		});



				$(".well li a").click(
					function(e){
						e.preventDefault();
						var newTrack = $(this).attr('href');
						$('source').attr('src',newTrack);
								
											//console.log('ha!');
						audio.load();
						audio.play();
					
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


				function run(link, player){
		    	    player.src = link.attr('href');
		        	par = link.parent();
		        	par.addClass('active').siblings().removeClass('active');
		        	audio.load();
		        	audio.play();
				}
				
			}
			initAudio();

		    $.ajaxSetup({
			   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
			});
		
			
		});


		$(function() {

			//Store frequently elements in variables
			var slider  = $('#slider'),
				tooltip = $('.tooltip');

			//Hide the Tooltip at first
			tooltip.hide();

			//Call the Slider
			slider.slider({
				//Config
				range: "min",
				min: 1,
				value: 50,

				start: function(event,ui) {
				    tooltip.fadeIn('fast');
				},

				//Slider Event
				slide: function(event, ui) { //When the slider is sliding

					var value  = slider.slider('value'),
						volume = $('.volume');

						$('audio')[0].volume  = (parseInt($('span.tooltip').html())/100);

					tooltip.css('left', value).text(ui.value);  //Adjust the tooltip accordingly

					if(value <= 5) { 
						volume.css('background-position', '0 0');
					} 
					else if (value <= 25) {
						volume.css('background-position', '0 -25px');
					} 
					else if (value <= 75) {
						volume.css('background-position', '0 -50px');
					} 
					else {
						volume.css('background-position', '0 -75px');
					};

				},

				stop: function(event,ui) {
				    tooltip.fadeOut('fast');
				},
			});

		});
	</script>

	
@endsection