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
		margin: auto 35% 0;
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
		<h1 class="page-header">Now Playing :: {{$track->track_name}}</h1>
		<div class="row">
			<div class="well col-lg-5">
			
				
				<hr style="margin-top:50px;"/>
				<p>
					<p><strong>Title</strong>: {{$track->track_name}}</p>
					<p><strong>Artist</strong>: {{$track->artist_name}}</p>
					<p><strong>Album</strong>: {{$track->album_name}}</p>
					<p style="margin-top:25px;">
						{!! Form::open(
							array('url' => 'track/recommend','class' => 'form', 'method' => 'POST'));!!}
						{!!Form::hidden('id', $track->track_id)!!}
						{!! Form::submit('Recommend', ['class'=>'btn btn-default']) !!}
						{!!Form::close()!!}
					</p>
				</p>
			</div>
		</div>
	</div>
</div>

@endsection

@section('customjs')
	<script type="text/javascript">

	function initAudio() {
		
		var supportsAudio = !!document.createElement('audio').canPlayType,
				audio,
				loadingIndicator,
				positionIndicator,
				timeleft,
				loaded = false,
				manualSeek = false;

		if (supportsAudio) {
					
			var player = '<p class="player"><span id="playtoggle" /><span id="gutter"><span id="loading" /><span id="handle" class="ui-slider-handle" /></span><span id="timeleft" /><audio preload="metadata"><source src="/tracks/<?php echo $track->track_id;?>.mp3" type="audio/mpeg"></source><section><span class="tooltip">50</span><div id="slider"></div><span class="volume"></span></section></audio></p>';

		  	$(player).insertBefore("hr");
		
			audio = $('.player audio').get(0);
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
				if (audio.paused) {	
					audio.play();	
			      	$.ajax({
			      		type: 'POST',
			      		url: '/track/addplay',
			      		data: {
			      			song_id: "<?php echo $track->track_id?>"
			      		}
					});
				} 
				else { audio.pause(); }			
			});

		}
		
		
	}
	initAudio();

    $.ajaxSetup({
	   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});

	</script>

	<script>
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