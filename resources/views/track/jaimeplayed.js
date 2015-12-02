in track details


<!--
				<audio id="audio" loop="loop" onclick="init()" preload="auto">
						<source src="/tracks/{{$track->track_id}}.mp3" type="audio/mpeg" />
						<a href="/tracks/{{$track->track_id}}.mp3">song</a>
				</audio>

				<div>
    				<input type="button" class="play btn btn-default" value="Play">
    				<input type="button" class="pause btn btn-default" value="Pause">
				</div>
				-->

<script type="text/javascript">

// init();
// for(var i=0;i<100;i--){
// 	init();
// )
	
	//http://tutsnare.com/post-data-using-ajax-in-laravel-5/
	//via global way

     $(".play").click(function(){
		var z = document.getElementById('audio');
		
		if(z.paused){
			//console.log($('audio').trigger('play')==false);
			$('audio').trigger('play');
	      	$.ajax({
	      		type: 'POST',
	      		url: '/track/addplay',
	      		//datatype: 'text',
	      		data: {
	      			song_id: "<?php echo $track->track_id?>"
	      		}
	      		/*
	      		,success: function(data){
	      			//yung napiprint dito ay defined kay tracks controller addPlay method
			        alert(data);
			    }
			    //*/
			});
      	}
     		//alert("<?php echo $track->track_id?>");
      		//alert($('#audio source').attr('src')); 	
     });

    $(".pause").click(function(){
         $('audio').trigger('pause');
     });


	
	</script>

------------------------------------------------------------------------------------------------------

in playlist details


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

