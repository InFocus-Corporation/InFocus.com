<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>
<title>InFocus | Collaboration That Works</title>
<meta name="description" content="Discover advanced projection equipment offered by InFocus. Global leader in LCD projectors and DLP projection, Mondopad products and projector accessories." />
<meta name="keywords" content="infocus,mondopad,projector,projection,DLP,LCD,LCD display,digital display,visual communications,projector accessories,infocus company,digital technology,projection equipment,monopad, communication, touchscreen" />
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
<div class="swiper-slide" style="position:relative">
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
 
 <div class="swiper-slide sedit" style="position:relative">
<a style="height: 25px;" href="//www.infocusstore.com/InFocus-MVP100-Video-Promotional-2-Pack/dp/B00KWDSG6U "><span class="linkspan" style="position: absolute; bottom: 9%; background-color: rgb(255, 255, 255); width: 11.0643%; height: 9.14286%; left: 54.3596%; opacity: 0; top: 82.2857%;"></span></a>
<a style="height: 29px;" href="/mvp100-2pack-sale"><span class="linkspan" style="position: absolute; bottom: 24%; background-color: rgb(255, 255, 255); width: 8.53879%; height: 6.47619%; left: 55.7426%; opacity: 0; top: 69.9048%;"></span></a>	
<div spellcheck="false" tabindex="0" style="position: relative;" class="crop cmsedit"><img src="/resources/images/InFocus-MVP100-2Pack-Promo"></div>

</div>


<div class="swiper-slide sedit" style="position:relative"> <div style="position: relative;" class="crop cmsedit"><img src="/resources/images/HomePage-LED" style=""></div>

<a style="height: 29px;" href="/projectors/IN1140-Series">
<span class="linkspan" style="position: absolute; background-color: rgb(255, 255, 255); left: 26.1161%; top: 61.8605%; width: 8.85417%; height: 6.27907%; opacity: 0;"></span>
</a>
<a style="height: 29px;" href="//www.infocusstore.com/InFocus-LightPro-IN1146-Mobile-Projector/dp/B00H9SKMFE">
<span class="linkspan" style="position: absolute; background-color: rgb(255, 255, 255); left: 22.247%; top: 74.186%; width: 15.8482%; height: 12.093%; opacity: 0;"></span>
</a>
</div>

  <!-- EndSwipeGenerated --></div>
</div><div class="pagination"></div></div>



<?php
if($_GET['edit']=="true"){
echo '<div class="removeafter" style="position:fixed;bottom:0px;z-index:1111"><button onclick="addSlider($(this))">Add Another Slide</button><button onclick="submitCode()">Submit Changes</button></div>
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

<div id="category" class="C9 cmsedit" style="padding-top:0.5em;max-width:1153px;padding-left: 3px;"><!-- CTAGenerated -->
<div class="C4 Col image-set">
<div><a href="/mondopad-live-demo"><img alt="See a Live Mondopad Demo" src="/resources/images/InFocus-Mondopad-Live-Demo-Home.png"></a></div>
</div>

<div class="C6 Col Col_child C5_child" style="margin-top:5.2%;">

	<li class="image-set" style=""><a href="/product-finder"><img alt="Projector Finder" src="/resources/images/CTA-Thumb-TL.png"></a></li>
	<li class="image-set" style=""><a href="/accessories/CONX"><img alt="InFocus ConX Video Meeting" src="http://www.infocus.com/resources/images/InFocus-ConX-Video-Meeting-340x220.png"></a></li>
	<li class="image-set" style="text-align:center"><a href="http://www.infocusstore.com"><img alt="Shop at the InFocus Store" src="/resources/images/InFocus-Home-Store-340x220.png"></a></li>
	<li class="image-set"><a href="/projectors/IN3138HD"><img alt="IN3138HD 1080p 3D Projector" src="http://www.infocus.com/resources/images/InFocus-IN3138HD-Projector-HDMI-340x220.png"></a></li>

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