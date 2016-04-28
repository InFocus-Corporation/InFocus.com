<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>
<title>InFocus | Projektoren & interaktive Smartboards BigTouch und Mondopad</title>
<meta name="description" content="InFocus Projektoren und Beamer sowie interaktive Touchdisplays BigTouch und Mondopad. Wählen Sie aus einer Vielzahl an Größen und Leistungsklassen das optimale Gerät." />
<script type="text/Javascript" src="/resources/js/idangerous.swiper-2.4.min.js"></script>
<link rel="stylesheet" href="/resources/css/idangerous.swiper.css" />
	<base target="_parent" />
<script>

function fixSwiperHeight(){
return "test";
var sHeight;
  return sHeight;

if($(".swiper-slide-active div").height() != null){
sHeight = $(".swiper-slide-active div").height();
}
else if($(".swiper-slide-active img").height() != null){
sHeight = $(".swiper-slide-active img").height();
}
else if($(".swiper-slide-active .player").height() != null){
sHeight = $(".swiper-slide-active .player").height();
}

else{
sHeight = $(".swiper-slide-active").height();
}
if(sHeight==0){sHeight='937px';}


 $('.device').stop();
 $('.swiper-slide-visible').stop();
 $('.device').animate({  height: sHeight  },500);
  $('.swiper-slide-visible').animate({
    height: sHeight
  },500);  
  
  mySwiper.reInit();
  
  return "test";
}
  

 "use strict"; 

(function($){
    var defaultOptions = {
        rotateText: null,
        padding: null,
        fontSizeFactor: 1,
		maximumFontSize: null,
        limitingDimension: "both"
    }
    
    $.fn.bigText = function(options) {
 			$(this).removeAttr('style');
       return this.each(function() {
            options = $.extend({}, defaultOptions, options);
            var $this= $(this);
            $this.css('display', "inline-block");
            $this.css('clear', "both");
            //$this.css('float', "left"); //the need to set this is very odd, its due to margin-collapsing. See https://developer.mozilla.org/en-US/docs/Web/CSS/margin_collapsing
            $this.css('font-size', (1000 * options.fontSizeFactor) + "px");
            $this.css('line-height', "1000px");
            $this.css('position', "relative");
            $this.css('white-space', "nowrap");
            //$this.css('top', "50%");
            //$this.css('left', "50%");
            $this.css('padding', 0);
            $this.css('margin', 0);
            
			$this.parent().css("overflow", "hidden");

            if (options.padding !== null) {
                if (typeof options.padding === "number") {
                    options.padding = options.padding;
                } else {
                    throw "bigText error: Padding value must be a number";
                }
                //$this.parent().css("padding", options.padding + "px");
            }


            var box = {};
            if (options.rotateText !== null) {
                if (typeof options.rotateText !== "number") {
                    throw "bigText error: Rotate value must be a number";
                }
                var rotate = "rotate(" + options.rotateText + "deg)";
                $this.css("-webkit-transform", rotate);
                $this.css("-ms-transform", rotate);
                $this.css("-moz-transform", rotate);
                $this.css("-o-transform", rotate);
                $this.css("transform", rotate);
                //calculating bounding box of the rotated element
                var w = $this.width();
                var h = $this.height();
                var sin = Math.abs(Math.sin(options.rotateText * Math.PI / 180));
                var cos = Math.abs(Math.cos(options.rotateText * Math.PI / 180));
                box.width = w * cos + h * sin;
                box.height = w * sin + h * cos;
            } else {
                box.width = $this.outerWidth();
                box.height = $this.outerHeight();
                //box.height = 1000; //we know this for sure because of line-height
            }

            var padding = {
                left: parseInt($this.parent().css('padding-left')),
                top: parseInt($this.parent().css('padding-top')),
                right: parseInt($this.parent().css('padding-right')),
                bottom: parseInt($this.parent().css('padding-bottom'))
            };
			
		
            var foo = ($this.parent().innerWidth() - padding.left - padding.right) / box.width;
            var bar = ($this.parent().innerHeight() - padding.top - padding.bottom) / box.height;
            var lineHeight;

			if (options.limitingDimension.toLowerCase() === "width") {
                lineHeight = Math.floor(foo * 1000);
				$this.parent().height(lineHeight);
			} else if (options.limitingDimension.toLowerCase() === "height") {
                lineHeight = Math.floor(bar * 1000);
			} else if (foo < bar) {
                lineHeight = Math.floor(foo * 1000);		
			} else if (foo >= bar) {
                lineHeight = Math.floor(bar * 1000);
			}

			var fontSize= lineHeight * options.fontSizeFactor;
			if (options.maximumFontSize !== null && fontSize > options.maximumFontSize) {
				fontSize= options.maximumFontSize;
				lineHeight= fontSize / options.fontSizeFactor;
			}
            $this.css('font-size', fontSize  + "px");
            $this.css('line-height', lineHeight  + "px");
            //centralizing text, top and left are defined as 50% on the CSS
            $this.css('margin-left', (-$this.width() / 2) + "px");
            //$this.css('margin-top', (-$this.height() / 2) + "px");
            //$this.css('margin-right', 0);
            $this.css('margin', 'auto');
			if (options.limitingDimension.toLowerCase() === "height") {
				$this.parent().width($this.width());
			}
        });
    } 
})(jQuery);
</script>
<style>
.swiper-slide img{
width:100%;
}
#ytplayer {
position:absolute;
z-index:100;
}

.device{
z-index:10;
}

.tout44 {
position: absolute;
bottom: 10%;
width: 12%;
left: 4%;
background: #404042;
padding: 1% 10%;
color:#1BA1E2;-webkit-box-shadow: 4px 7px 5px -3px rgba(0,0,0,0.75);
-moz-box-shadow: 4px 7px 5px -3px rgba(0,0,0,0.75);
box-shadow: 4px 7px 5px -3px rgba(0,0,0,0.75);
border-radius: 5px;
display:none;
}

.tout44:hover {
background: #F2F2F2;
}

.tout22 {
padding: 1% 6%;
position: absolute;
bottom: 10%;
width: 25%;
left: 57%;
background: #404042;
color: #E81469;
text-align: center;
-webkit-box-shadow: 4px 7px 5px -3px rgba(0,0,0,0.75);
-moz-box-shadow: 4px 7px 5px -3px rgba(0,0,0,0.75);
box-shadow: 4px 7px 5px -3px rgba(0,0,0,0.75);
border-radius: 5px;
display:none;
}

.tout22:hover{
background: #F2F2F2;
}

.crop {
    width: 100%;
    overflow: hidden;
}

.crop img {
    width: 100%;
    margin: 0 0 0 0%;
}
.arrow-left:hover{
opacity:0.5;
}

.arrow-right:hover{
opacity:0.5;
}

</style>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-35128719-1', 'infocus.de');
  ga ('set', 'anonymizeIp', true);
  ga('send', 'pageview');

</script>


	</head>
	<body class="" style="">
		<?php include($homedir . "/resources/html/mainmenu.html"); ?>
<div class="content" style="width:100%;padding-top: 85px;">
<div id="ytplayer" class="player"></div>

<div class="device" style="width:100%;">
<a class="arrow-left" href="#"></a>
<a class="arrow-right" href="#"></a>
<div class="swiper-container" >
<div class="swiper-wrapper">



  <div class="swiper-slide" style="position:relative">	
<div id="ytcover" onclick="coverClick();" style="
z-index: 1000;
position: absolute;
bottom: 3%;
background-color: #fff;
width: 12.9%;
height: 7%;
left: 43.5%;
opacity: 0;
cursor: pointer;"></div>	

	  
 <div id="ytcover2" class="crop"> <img id="ytcover3" style="" src="/upload/homepage/InFocus_04_Slider_480x150_RGB_300dpi.jpg" alt="Videokonferenzsystem"></div>
<a href="/accessories/CONX"><span style="position: absolute;
bottom: 12%;
background-color: #FFF;
width: 14.9%;
height: 9.5%;
left: 44%;
opacity: 0;"</span></a>

</div>

<div class="swiper-slide" style="position:relative"> <div class="crop"><img style="" src="/upload/homepage/InFocus_Projektoren_Sommer_Special.jpg" alt="Projektoren für Schulen"></div>
<a href="/upload/NL_Garantie_1/content.html" target="_blank"><span style="position: absolute;
bottom: 22%;
background-color: #FFF;
width: 16.9%;
height: 10.5%;
left: 25%;
opacity: 0;"</span></a>

</div>
	
<div class="swiper-slide" style="position:relative"> <div class="crop"><img style="" src="/upload/homepage/InFocus_05_Slider_Mondopad.jpg" alt="Collaboration"></div>
<a href="/mondopad20"><span style="position: absolute;
bottom: 12%;
background-color: #FFF;
width: 14.9%;
height: 9.5%;
left: 44%;
opacity: 0;"</span></a>

</div>
	
	

<div class="swiper-slide" style="position:relative"> <div class="crop"><img style="" src="/upload/homepage/InFocus_03_Slider_480x150_RGB_300dpi.jpg" alt="Präsentation "></div>
<a href="/displays/JTOUCH-SERIES" ><span style="position: absolute;
bottom: 25%;
background-color: #FFF;
width: 16.9%;
height: 10.5%;
left: 3.5%;
opacity: 0;"></span></a>
</div>
	
<div class="swiper-slide" style="position:relative"> <div class="crop"> <img style="" src="/upload/homepage/Thunder-Marquee-03FEB15.jpg" alt="Konferenztelefon"></div>
<a href="/accessories/INA-TH150"><span style="position: absolute;
  bottom: 59%;
  background-color: #FFF;
  width: 10.9%;
  height: 10.5%;
  left: 25.5%;
  opacity: 0;"></span></a>
</div>

</div>
</div>
<div class="pagination"></div>
</div>

<script>
 
 var mySwiper;



$(document).ready(function() {

mySwiper = new Swiper('.swiper-container',{
    pagination: '.pagination',
    loop:true,
	speed:2650, 
	autoplay: 5000,  
	calculateHeight: true,
	initialSlide:1,
	grabCursor:true,
    paginationClickable: true,
	onSlideChangeStart: function(){
		if(typeof player !== 'undefined'){
		player.pauseVideo();
		}
},
	onSlideChangeEnd: function(){
	$('.device .arrow-right').animate({'opacity':0.5},700).animate({'opacity':0},700);
	},
	onSlideClick: function(){
	  if(mySwiper.activeIndex==2){
	  

	}
	
	// if(mySwiper.activeIndex == 0 && (mySwiper.touches['current']-mySwiper.touches['start']) > 200){
	// mySwiper.swipeTo(mySwiper.slides.length-1,1000,false);
	// }
	// if(mySwiper.activeIndex == mySwiper.slides.length-1 && (mySwiper.touches['current']-mySwiper.touches['start']) < 200){
	// mySwiper.swipeTo(0,1000,false);
	// }
	}
  })
  $('.arrow-left').on('click', function(e){
    e.preventDefault()
	// if(mySwiper.activeIndex == 0){
	// mySwiper.swipeTo(mySwiper.slides.length-1,1000,false);
	// }
	// else{
	if(typeof player !== 'undefined'){
	player.pauseVideo();
	}
    mySwiper.swipePrev()
	// }

  })
  $('.arrow-right').on('click', function(e){
    e.preventDefault()
	// if(mySwiper.activeIndex == mySwiper.slides.length-1){
	// mySwiper.swipeTo(0,1000,false);
	// }
	// else{
	if(typeof player !== 'undefined'){
	player.pauseVideo();
	}
    mySwiper.swipeNext()
	// }
  })
  
	
	$('.pagination').on('click',function(e){player.pauseVideo();});

 
$(window).resize(function(){
  mySwiper.reInit();
})
  var hash = window.location.hash;
  hash = hash.substring(1);
  if(hash.length>0){
    
$.get(
   "/resources/forms/" + hash,
   function(data, textStatus, jqXHR) {
          $.colorbox({iframe: true, href: "/resources/forms/" + hash, innerWidth: "80%", innerHeight: 860});
   }
);

  }

});

  </script>

<div id="category" class="C9" style="padding-top:0.5em;max-width:1153px;padding-left: 3px;">
<div style="float:center; margin-top:20px;margin-bottom:-10px;">
<h1>InFocus Projektoren & Touch Displays</h1></div> 
<div style=" margin-bottom:0px;">
<p align="center"><strong>Projektoren & Beamer in allen Größen und Leistungsklassen. Touchscreen-Lösungen für interaktive Zusammenarbeit.</strong></p>
</div>

 <div class="C4 Col image-set"><a href="/projectors/"><div><img src="/resources/images/category-home-theater-projectors.png" alt="See a Live Mondopad Demo" /></div></a></div>

 
 <div class="C6 Col Col_child C5_child" style="margin-top:5.2%;">
 	<h5>Beamer und Projektoren</h5>
 	 InFocus Projektoren und Beamer können sowohl für den Heimgebrauch als auch für Veranstaltungen verwendet werden. Ob interaktiv oder Full HD 3D, unsere Projektoren decken jeden Bedarf ab.
Die Auswahl reicht dabei von kleinen handlichen und mobilen Projektoren bis hin zu Beamern für große Veranstaltungen.<br>
<a href="/projectors/">Weitere Informationen ></a>

</div>

<div style="height:20px;"></div>

 <div class="C4 Col image-set"><a href="/mondopad-live-demo"><div><img src="/resources/images/Mondopad_Conference.jpg" alt="See a Live Mondopad Demo" /></div></a></div>

 
 <div class="C6 Col Col_child C5_child" style="margin-top:5.2%;">
 	<h5>Touchscreen-Lösungen</h5>
 	Eine neue Dimensionen für Videokonferenzen und Präsentationen. Touchscreens in den Größen von 57 bis 80 Zoll und integrierter Hard- und Software als innovative Konferenz-Komplettlösung.<br>
<a href="/displays/">Weitere Informationen ></a>

</div>

<div style="height:20px;"></div>

 <div class="C4 Col image-set"><a href="/accessories/CONX"><div style="padding-top: 30px;
padding-left: 31px;"><img src="/resources/images/ConX-InFocus_Videoconferencing_Cloud.png" alt="Videokonferenz in der Cloud" /></div></a></div>

 
 <div class="C6 Col Col_child C5_child" style="margin-top:5.2%;">
 	<h5>Video und Kommunikation</h5>
 	Web-Meetings in HD-Qualität – die Videokonferenz-Lösung von InFocus. Cloudbasiert, einfach und verfügbar für alle Geräte: mit ConX von InFocus werden Videokonferenzen zur leichtesten Übung.<br>
<a href="/accessories/CONX">Weitere Informationen ></a>

</div>
	
	<div style="height:20px;"></div>

 <div class="C4 Col image-set"><a href="http://reseller.infocus.info" target="_blank"><div style="padding-top: 30px;
padding-left: 31px;"><img src="/upload/homepage/InFocus_Projektor_Beamer_LightPro_IN1146_2.jpg" alt="Unser Portal für Reseller" /></div></a></div>

 
 <div class="C6 Col Col_child C5_child" style="margin-top:5.2%;">
 	<h5>InFocus Reseller Portal</h5>
 	Starke Partnerschaft: Unsere Basis für Ihren Erfolg! Als einer der führenden Hersteller ist InFocus seit über 26 Jahren im Markt etabliert. Profitieren Sie von den vielen Vorteilen und Leistungen, mit denen wir unsere Handelspartner unterstützen.<br>
<a href="http://reseller.infocus.info" target="_blank">Weitere Informationen ></a>

</div>
	
	
	<div style="height:100px;"></div>
	<div style="display:none">
 <div class="C4 Col image-set"><a href="/mondopad-live-demo"><div><img src="/resources/images/CTA-Main.png" alt="See a Live Mondopad Demo" /></div></a></div>
 
 <div class="C6 Col Col_child C5_child" style="margin-top:5.2%;">
<li class="image-set" style=""><a href="/displays/JTOUCH-SERIES"><img src="/resources/images/InFocus_JTouch_digital_signage.jpg"  alt="Projector Finder" /></a></li>
<li class="image-set" style=""><a href="/projectors/product?pn=IN1146"><img src="/resources/images/CTA-Thumb-TR.png" alt="IN1146 Mobile LED Projector" /></a></li>        
<li  class="image-set" style="text-align:center"><a href="http://conx.infocus.info/"><img src="/resources/images/ConX-Group-Videoconferencing_System.png"  alt="InFocus Store" /></a></li>
<li class="image-set"><a href="/projectors/product?pn=IN3138HD"><img src="/resources/images/CTA-Thumb-BR.png"   alt="IN3138HD 1080p 3D Projector"/></a></li>
</div>
	</div>
</div>
 

<script type="text/javascript">
  // Load the IFrame Player API code asynchronously.
  function loadPlayer(){
  var tag = document.createElement('script');
  tag.src = "https://www.youtube.com/player_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
}
  // Replace the 'ytplayer' element with an <iframe> and
  // YouTube player after the API code downloads.
  var player;
  function onYouTubePlayerAPIReady() {
    player = new YT.Player('ytplayer', {
      width: '100%',
      height: $('.device').height(),
      videoId: 'SNMjzPRQUA8',
	  playerVars: {
	  'autoplay': 1,
	  'autohide': 1,
	  'modestbranding': 1,
	  'controls': 1,
	  'showinfo': 0,
	  'useCSS': 0,
	  'html5': 1}
    });
 			mySwiper.reInit();
			 player.addEventListener("onStateChange", "onytplayerStateChange");
			$('#ytplayer').animate({'opacity':'0'},0).animate({'opacity':'1'},500);
			 mySwiper.stopAutoplay()

			 
 }
  
      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();

		

      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
function onytplayerStateChange(newState) {

		if(newState.data == 2){
			$('#ytplayer').animate({'opacity':'0'},500).animate({'width':'0px'},0);
		}
}
      function onStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }

		}
      function stopVideo() {
        player.stopVideo();
      }
       function playVideo() {
	   
	   if(player.getPlayerState() == 1){
	    player.pauseVideo();
	   }
	   else{
			$('#ytplayer').animate({'width':'100%'},0).animate({'opacity':'1'},500);

			 player.playVideo();
		}
		
      }

function coverClick(){
		if(typeof player === 'undefined'){
		loadPlayer();
		
		  }
		else{
		playVideo();
		  }
}
</script>
				<footer id="site-info" >
				<?php include($homedir . "/resources/html/footer.html"); ?>
				</footer>
<script>

</script>


</body></html>