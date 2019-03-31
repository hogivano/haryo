@extends('layout.master')
@section('title')
Haryo Ramadityo
@endsection
@section('link')
<style>
    .overlay-slide {

    }

    .img-slide{
        object-fit: cover;
        width: 100%;
        filter: blur(3px);
    }

    .fp-bg {
        top: 0;
        bottom: 0;
        width: 100%;
        position: absolute;
        z-index: -1;
        transform: translateX(0px) translateY(0px);
        background-position: center 80%;
        background-repeat: no-repeat;
        object-fit: fill;
        object-position: center;
        background-position: left;
        filter: blur(2px);
    }

    .text-center {
        text-align: center;
        vertical-align: middle;
    }

    #section2 {
        background-color: white;
    }

    #section2 h2 {
        border-bottom: 2px solid black;
        display: inline;
    }

    .about-me {
        vertical-align: middle;
    }

    .detail-about {
        display: block;
        margin-top: auto;
        margin-bottom: auto;
    }

    .detail-about p {
        font-family: 'Mukta', sans-serif;
        font-size: 17px;
        margin-bottom: 10px !important;
    }
    .detail-about p  b{
        font-weight: 600;
    }

    #myVideo {
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%;
        min-height: 100%;
    }

    #section4 {
        background-color: black;
    }

    .video-background {
        background: #000;
        position: fixed;
        top: 0; right: 0; bottom: 0; left: 0;
        z-index: 6;
    }
    .video-foreground,
    .video-background iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }
    .vcenter {
        position: absolute;
        top: 50%;
  left:50%;
  transform: translate(-50%,-50%);
    }
</style>
@endsection
@section('content')
<div class="splash" style="position:absolute; width: 100%; height: 100vh; display: table; background-color: #f2ad0e; z-index:9999">
    <img src="{{ asset('img/logo.png') }}" style="width: 500px;" class="vcenter" alt="">
</div>
<div id="fullpage">
    <div class="section active" id="home">
        <div class="slide" id="slide2-1">
            <div class="fp-bg" style="background-image:url({{ asset('img/album/hd.jpg') }});"></div>
        </div>
        <div class="slide" id="slide2-2">
            <div class="fp-bg" style="background-image:url({{ asset('img/album/home.jpg') }});"></div>
        </div>
    </div>
    <div class="section" id="section2">
        <div class="container">
            <div class="row about-me">
                <div class="col-md-5 col-sm-12">
                    <img src="{{ asset('img/album/home.jpg') }}" style="object-fit: cover; height: 60vh; width: 300px" class="img-responsive center-block" alt="">
                </div>
                <div class="col-md-7 col-sm-12">
                    <div class="detail-about">
                        <h2>About Me</h2>
                        <p style="margin-top: 25px">I was born in indonesia culture. My parent very exaited about my passion in technology</p>
                        <div class="row" style="margin-top: 20px; margin-bottom: 15px;">
                            <div class="col-sm-12 col-md-6">
                                <p><b>Nama : </b> Hendriyan Ogivano</p>
                                <p><b>Email : </b> ogivano06@gmail.com</p>
                                <p><b>Phone : </b> (082) 244430796</p>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <p><b>Nama : </b> Hendriyan Ogivano</p>
                                <p><b>Email : </b> ogivano06@gmail.com</p>
                                <p><b>Phone : </b> (082) 244430796</p>
                            </div>
                        </div>
                        <div class="btn-about">
                            <button type="button" class="btn btn-success" style="margin: 0px 5px;" name="button">Resume</button>
                            <button type="button" class="btn btn-success" style="margin: 0px 5px;" name="button">Collaborate</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <embed width="100%" height="100%" src="https://www.youtube.com/v/tgbNymZ7vqY">
    </div>
    <div class="section" id="section4">

    </div>
</div>
@endsection
@section('script')
<script>
$(document).on('load', function(){
    $('.splash').hide();
});
$(document).ready(function(){
    initialize(false);
    $('.splash').hide();
    $('.fp-controlArrow').remove();
    $('#fp-nav').css('right', '30px');
    $('#fp-nav ul li .fp-tooltip').css('right', '20px');
    $('.fp-slidesNav').css('bottom', '20px');
    $('.fp-slidesNav').css('text-align', 'center');
});

function initialize(hasScrollBar){
    $('#fullpage').fullpage({
        lockAnchors: false,
        anchors: ['home', 'about-me', 'my-viedo', 'my-photos'],
        menu: '#menu',
        slidesNavigation: true,
		slidesNavPosition: 'bottom',
        parallax: true,
        parallaxKey: 'YWx2YXJvdHJpZ28uY29tXzlNZGNHRnlZV3hzWVhnPTFyRQ==',
        parallaxOptions: {
            type: 'reveal',
            percentage: 62,
            property: 'translate'
        },
        scrollingSpeed: 1000,
        autoScrolling: false,
        scrollBar: hasScrollBar,
        fitToSection:false
    });
}
</script>
@endsection
