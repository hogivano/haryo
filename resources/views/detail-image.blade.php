@extends('layout.master')
@section('link')
<style>
@font-face {
  font-family: 'Roboto Slab';
  font-style: normal;
  font-weight: 400;
  src: local('Roboto Slab Regular'), local('RobotoSlab-Regular'), url(http://fonts.gstatic.com/s/robotoslab/v8/BngMUXZYTXPIvIBgJJSb6ufN5qA.ttf) format('truetype');
}
body {
  background: #000;
}
a {
  color: #ff0;
}
.cover {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 2;
  width: 100%;
  height: 100%;
}
.cover .hi {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: #fff;
  font-family: 'Roboto Slab', serif;
  font-size: 24px;
  line-height: 26px;
  text-align: center;
}
.cover .hi span {
  color: #ff0;
  cursor: pointer;
  text-decoration: underline;
}
.cover .hi em {
  font-style: normal;
}
.cover .hi em.hidden {
  display: none;
}
.tv {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1;
  width: 100%;
  height: 100%;
  overflow: hidden;
}
.tv .screen {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1;
  margin: auto;
  opacity: 0;
  transition: opacity 0.5s;
}
.tv .screen.active {
  opacity: 1;
}

</style>
@endsection
@section('content')
<div class="cover">
  <div class="hi">This is fully responsive & mobile friendly YouTube video background scaled with 16/9 aspect ratio. Actually bunch of videos - js loads randomly 1 of 4 with different start/end times, then it loops through all the vids.<br><br> Click <span>here</span> to <em>un</em>mute & <span>here</span> to see another vid (<em>0</em> of <em>0</em>). Check all of them! They're quite awesome. ;]</div>
</div>
	<div class="tv">
		  <div class="screen mute" id="tv"></div>
	</div>
@endsection
@section('script')
<script>
var tag = document.createElement('script');
		tag.src = 'https://www.youtube.com/player_api';
var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var tv,
		playerDefaults = {autoplay: 0, autohide: 1, modestbranding: 0, rel: 0, showinfo: 0, controls: 0, disablekb: 1, enablejsapi: 0, iv_load_policy: 3};
var vid = [
    {'videoId': '2b5QNj-BVhs', 'startSeconds': 515, 'endSeconds': 690, 'suggestedQuality': 'hd720'},
    {'videoId': '9ge5PzHSS0Y', 'startSeconds': 465, 'endSeconds': 657, 'suggestedQuality': 'hd720'},
    {'videoId': 'OWsCt7B-KWs', 'startSeconds': 0, 'endSeconds': 240, 'suggestedQuality': 'hd720'},
    {'videoId': 'qMR-mPlyduE', 'startSeconds': 19, 'endSeconds': 241, 'suggestedQuality': 'hd720'}
],
		randomVid = Math.floor(Math.random() * vid.length),
    currVid = randomVid;

$('.hi em:last-of-type').html(vid.length);

function onYouTubePlayerAPIReady(){
  tv = new YT.Player('tv', {events: {'onReady': onPlayerReady, 'onStateChange': onPlayerStateChange}, playerVars: playerDefaults});
}

function onPlayerReady(){
  tv.loadVideoById(vid[currVid]);
  tv.mute();
}

function onPlayerStateChange(e) {
  if (e.data === 1){
    $('#tv').addClass('active');
    $('.hi em:nth-of-type(2)').html(currVid + 1);
  } else if (e.data === 2){
    $('#tv').removeClass('active');
    if(currVid === vid.length - 1){
      currVid = 0;
    } else {
      currVid++;
    }
    tv.loadVideoById(vid[currVid]);
    tv.seekTo(vid[currVid].startSeconds);
  }
}

function vidRescale(){

  var w = $(window).width()+200,
    h = $(window).height()+200;

  if (w/h > 16/9){
    tv.setSize(w, w/16*9);
    $('.tv .screen').css({'left': '0px'});
  } else {
    tv.setSize(h/9*16, h);
    $('.tv .screen').css({'left': -($('.tv .screen').outerWidth()-w)/2});
  }
}

$(window).on('load resize', function(){
  vidRescale();
});

$('.hi span:first-of-type').on('click', function(){
  $('#tv').toggleClass('mute');
  $('.hi em:first-of-type').toggleClass('hidden');
  if($('#tv').hasClass('mute')){
    tv.mute();
  } else {
    tv.unMute();
  }
});

$('.hi span:last-of-type').on('click', function(){
  $('.hi em:nth-of-type(2)').html('~');
  tv.pauseVideo();
});
</script>
@endsection
