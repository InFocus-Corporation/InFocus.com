<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;

?>
<title>InFocus | Collaboration That Works</title>
<meta name="description" content="Discover advanced projection equipment offered by InFocus. Global leader in LCD projectors and DLP projection, Mondopad products and projector accessories." />
<meta name="keywords" content="infocus,mondopad,projector,projection,DLP,LCD,LCD display,digital display,visual communications,projector accessories,infocus company,digital technology,projection equipment,monopad, communication, touchscreen" />
<script type="text/Javascript" src="/resources/js/idangerous.swiper-2.4.min.js"></script>
<link rel="stylesheet" href="/resources/css/idangerous.swiper.css" />
<base target="_parent" />
<script>
var pagetype = "index";
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

.CTA li:nth-child(3), .CTA li:nth-child(4){
	padding-top:1%;
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

.large-CTA img{
	max-width: 95.5%;
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

.linkspan{
z-index:7;
}

</style>
<?php
if($_GET['edit']=="true"){CMSscript("/resources/overviews/$pn-$lang.src", $pn, $homedir.'/resources/overviews/', 'admin,salespublisher,saleseditor,marketingpublisher,marketingeditor,editor', ".src", "overview", "true", "SavePage","overview");}

?>

	</head>
	<body class="" style="">
		<?php include($homedir . "/resources/html/mainmenu.html"); ?>
<div class="content" style="width:100%;padding-top: 87px;">
<div id="ytplayer" class="player"></div>

<div class="device" style="width:100%;">
<a class="arrow-left" href="#"></a>
<a class="arrow-right" href="#"></a>
<div class="swiper-container" >
<div id="swiperwrap" class="swiper-wrapper"><!-- SwipeGenerated -->
<div class="swiper-slide sedit" style="position:relative"> <div style="position: relative;" class="crop cmsedit"><img alt="InFocus 1080p HD Projector Values" src="/resources/images/InFocus-1080p-HD-Projector-Low-Price.png"></div><a style="height: 28px;" href="http://www.infocusstore.com/High-Definition-Projectors/b/10483487011"><span class="linkspan" style="position: absolute; top: 83.2957%; width: 10.8011%; height: 9.25508%; left: 75.8941%; opacity: 0;"></span></a><a style="height: 28px;" href="/hd-projector-lineup"><span class="linkspan" style="position: absolute; top: 83.07%; width: 10.9442%; height: 9.25508%; left: 58.7983%; opacity: 0;"></span></a></div><div class="swiper-slide sedit" style="position:relative"> <div style="position: relative;" class="crop cmsedit"><img alt="InFocus Thunder Speakerphone" src="/resources/images/InFocus-Thunder-Speakerphone-Meetings.png"></div><a style="height: 28px;" href="/peripherals/INA-TH150"><span class="linkspan" style="position: absolute; top: 27.4419%; width: 11.8304%; height: 14.8837%; left: 25.2232%; opacity: 0;"></span></a></div><div class="swiper-slide" style="position:relative">
<img src="/resources/images/InFocus-MVP100-Video-Phone-Video-Marquee">
<div id="ytcover" class="" style="width: 35%;
height: 18%;
border-radius: 25%;
position: absolute;
z-index: 1000;
overflow: hidden;
top: 76%;
left: 0%;
cursor:pointer;"></div>

</div>
 
 <div class="swiper-slide" style="position:relative"> <div style="position: relative;" class="crop cmsedit sedit"><img alt="InFocus LightPro IN1146 Mobile LED Projector" src="/resources/images/InFocus-LightPro-IN1146-Reviews.png"></div><a style="height: 25px;" href="/projectors/IN1146"><span class="linkspan" style="position: absolute; top: 61.8037%; width: 9.79557%; height: 7.95756%; left: 73.2538%; opacity: 0;"></span></a><a style="height: 25px;" href="http://www.infocusstore.com/InFocus-LightPro-IN1146-Mobile-Projector/dp/B00H9SKMFE"><span class="linkspan" style="position: absolute; top: 74.8011%; width: 16.5247%; height: 13.5279%; left: 69.7615%; opacity: 0;"></span></a></div>
 




         <!-- EndSwipeGenerated --></div>
</div><div class="pagination"></div></div>



<?php
if($_GET['edit']=="true"){
echo '<div class="removeafter" style="position:fixed;bottom:0px;z-index:1111"><button onclick="addSlider($(this))">Add Another Slide</button><button onclick="submitCode()">Submit Changes</button><button onclick="RestoreBackup()">Restore Backup</button></div>
<script src="/resources/js/homepage.js"></script>
<style>
.linkspan{
background-color:orange !important;
opacity:.5 !important;
z-index:1007;
}
</style>
';} ?>

<script>
 var mySwiper;

if("true" != "<?php echo $_GET['edit']?>"){
$(document).ready(function() {

mySwiper = new Swiper('.swiper-container',{
    pagination: '.pagination',
    loop:true,
	speed:750, 
	autoplay: 5000,  
	calculateHeight: true,
	initialSlide:0,
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
  
    $('#ytcover').on('mousedown', function(e) {
    $(this).data('p0', { x: e.pageX, y: e.pageY });
}).on('mouseup', function(e) {
    var p0 = $(this).data('p0'),
        p1 = { x: e.pageX, y: e.pageY },
        d = Math.sqrt(Math.pow(p1.x - p0.x, 2) + Math.pow(p1.y - p0.y, 2));
if(e.which != 1){return;}
    if (d < 4) {
		if(typeof player === 'undefined'){
			loadPlayer();
			
			  }
		else{
		playVideo();
}
    }
	else{
	player.pauseVideo();
	}
	
	$('.pagination').on('click',function(e){player.pauseVideo();});

})

 
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

var qstr = "<?php echo $_SERVER['QUERY_STRING']; ?>";
  if(qstr.length>0){
$.get(
   "/resources/forms/" + qstr,
   function(data, textStatus, jqXHR) {
          $.colorbox({iframe: true, href: "/resources/forms/" + qstr, innerWidth: "80%", innerHeight: 860});
   }
);
}

});
}




  </script>

<div id="category" class="C9 cmsedit" style="padding-top:2.5em;max-width:1153px;"><!-- CTAGenerated -->
<div class="C4 Col image-set large-CTA">
<div><a href="/mondopad-live-demo"><img alt="See a Live Mondopad Demo" src="/resources/images/InFocus-Mondopad-Live-Demo.gif"></a></div>
</div>

<div class="C6 Col Col_child C5_child CTA">

	<li class="image-set" style=""><a href="/peripherals/INF-SPTZ-2"><img alt="InFocus RealCam PTZ Camera" src="/resources/images/InFocus-RealCam-PTZ-Camera.png"></a></li>
	<li class="image-set" style=""><a href="/product-finder"><img alt="Find a projector based on your needs" src="/resources/images/InFocus-Projector-Finder-Help-Choose.png"></a></li>
	<li class="image-set" style="text-align:center"><a href="http://www.infocusstore.com"><img alt="Shop at the InFocus Store" src="/resources/images/InFocus-Store-Free-Shipping-March.png"></a></li>
	<li class="image-set"><a href="/peripherals/INLITESHOW4"><img alt="Present wirelessly to any display with LiteShow 4" src="/resources/images/InFocus-LiteShow4-Wireless-Adapter.png"></a></li>

</div>
<!-- EndCTAGenerated --></div> 
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
      videoId: 'aGcZS6K92fk',
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
