<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;


?>
<title>InFocus | First Responders</title>
<meta name="description" content="Discover advanced projection equipment offered by InFocus. Global leader in LCD projectors and DLP projection, Mondopad products and projector accessories." />
<meta name="keywords" content="infocus,mondopad,projector,projection,DLP,LCD,LCD display,digital display,visual communications,projector accessories,infocus company,digital technology,projection equipment,monopad, communication, touchscreen" />
<script type="text/Javascript" src="/resources/js/idangerous.swiper-2.4.min.js"></script>
<link rel="stylesheet" href="/resources/css/idangerous.swiper.css" />
	<base target="_parent" />
<script>
var pagetype = "first-responders";
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

.slide-info{
font-size:215%;
width:30%;
position:absolute;
left:65.5%;
top:2em;
}
.slide-info h3 {
font-weight:700;
text-shadow:none;
font-size:210%;
margin-bottom:0;
text-align:right;
}

.slide-info h6{
position:relative;
color:#1BA1E2;
font-size:90%;
font-weight:400;
text-shadow: 3px 3px 4px rgba(0,0,0,.25);
}

.slide-info p {
font-weight:100;text-shadow:none;line-height:1.2em;
}

.edu-btns {
position:absolute;
bottom:35px;
right:100px;
text-align:left;
font-size:200%;
width:30%;
}

.wider {width:55%; left:44%;}


img.bgimage, img.wider  {
width:100%;
box-shadow:0px 0px 5px #000;
}

.Mobile-Color-Swap{
color:white;
}


.swiper-slide img{
width:100%;
}

.swiper-slide{
position:relative;
}

.swiper-pagination-switch,swiper-visible-switch, swiper-active-switch {
width: 20px;
height: 20px;
border-radius: 50%;
}

.pagination{
bottom:20px;
}

.btn {
-webkit-border-radius: 3;
-moz-border-radius: 3;
border-radius: 3px;
font-family: pragmatica-web-condensed;
color: #ffffff;
font-size:50%;
padding: 5px 20px;
text-decoration: none;
border:0px;
display:table-cell;
vertical-align:baseline;
margin-bottom:10px;
-webkit-box-shadow: 0px 1px 3px #000000;
-moz-box-shadow: 0px 1px 3px #000000;
box-shadow: 0px 1px 3px #000000;
cursor:pointer;
}


.greybtn {
background: #626262;
background-image: -webkit-linear-gradient(top, #626262, #636363);
background-image: -moz-linear-gradient(top, #626262, #636363);
background-image: -ms-linear-gradient(top, #626262, #636363);
background-image: -o-linear-gradient(top, #626262, #636363);
background-image: linear-gradient(to bottom, #626262, #636363);
-webkit-box-shadow: 0px 4px 10px  rgba(0, 0, 0, 0.5);
-moz-box-shadow: 0px 4px 10px  rgba(0, 0, 0, 0.5);
box-shadow: 0px 4px 10px  rgba(0, 0, 0, 0.5);
color: #ADD238;
}

.greybtn:hover {
background: #a3a3a3;
background-image: -webkit-linear-gradient(top, #a3a3a3, #a6a6a6);
background-image: -moz-linear-gradient(top, #a3a3a3, #a6a6a6);
background-image: -ms-linear-gradient(top, #a3a3a3, #a6a6a6);
background-image: -o-linear-gradient(top, #a3a3a3, #a6a6a6);
background-image: linear-gradient(to bottom, #a3a3a3, #a6a6a6);
text-decoration: none;
}

.greybtn:active {
position: relative;
top: 2px;
left: 0px;
}

.orangebtn {
background: #f66d26;
}

.orangebtn:hover {
background: #ff8c57;
text-decoration: none;
}

.orangebtn:active {
position: relative;
top: 2px;
left: 0px;
}

.bluebtn {
background: #29A0DA;
}

.bluebtn:hover {
background: #7FD8FF;
text-decoration: none;
}

.bluebtn:active {
position: relative;
top: 2px;
left: 0px;
}

.verticals > li{
padding-top:40px;
padding-bottom:20px;
}

.headlines-bar{
position: relative;
top: -10px;
width: 100%;
display: inline-block;
background-color: rgba(0, 0, 0, 0.25);
text-align: center;
margin: 0px auto 15px;
font-size: 80%;
vertical-align: middle;
color: #FFF;
padding-top: 20px;
}



.headlines-bar < div, .headlines-bar img{
display:inline-block;
vertical-align:middle;
min-width:220px;
}

.snippet a{
color:#f66d26;
} 
.snippet a:hover{
color:white;
}


@media only screen and (min-width:1020px) and  (max-width: 1400px) {
.slide-info{
font-size:180%;
width:39%;
position:absolute;
left:59%;
top:2.2em;

}

.wider {width:60%; left:39%;}


.orangebtn {
font-size:45%;
width:350px
}
}

@media only screen and (min-width:770px) and  (max-width: 1019px) {
.slide-info{
font-size:140%;
width:44%;
position:absolute;
left:54%;
top:2em;

}
.wider {width:65%; left:34%;}

.orangebtn {
font-size:40%;
width:300px
}
}

@media only screen and  (max-width: 769px) {
.slide{
overflow:hidden;
}
#four-prod {display:none;}
.slide img.wider{width:120%;}

.slide img.bgimage{width:140%;}


.slide-info{
font-size:200%;
position:static;
width:95%;
margin-top:40px;
padding:15px 5px;

}
#layout #content #education #hero #slider ul.thumbs {
position:static;
}


.edu-btns {
position:static;
text-align:right;
padding-right:10px;
font-size:200%;
padding-bottom:35px;
}

.Mobile-Color-Swap{
color:black;
}

}


  
@media only screen and  (max-width: 840px) {
.headlines-bar img{ display:none;}
.snippet{ width:235px;}
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
<div class="swiper-slide slide sedit" style="position:relative">				
			<img class="bgimage" src="/resources/images/FRE_1">
					<div class="slide-info">

							<div class="info cmsedit" style="text-align:right;">
								<h3 style="color:#1BA1E2;font-size:170%">FIRST RESPONDERS</h3>
								<p style="color:white;">Fire, law enforcement and EMT professionals use Mondopad to stay sharp and be ready.
<br><a href="/displays?MONDOPAD-Series"><button class="btn bluebtn" style="width:300px;display:block;margin-left:auto;">Mondopad collaboration solution</button></a>
<a href="/resources/documents/Mondo/InFocus-Mondopad-CaseStudy-AddisonFireProtection.pdf"><button class="btn bluebtn" style="width:300px;display:block;margin-left:auto;">Read success story (PDF)</button></a>
</p>
<div style="position:relative"><img id="four-prod" style="width:100%;padding-top:.5em" src="/resources/images/FRE_1_Object_2">
<a href="/displays/family?series=MONDOPAD-Series"><div style="position:absolute;width:50%;height:47%;top:.5em;left:0"></div></a>
<a href="/displays/family?series=BIGTOUCH-Series"><div style="position:absolute;width:50%;height:47%;top:.5em;right:0"></div></a>
<a href="/displays/family?series=JTOUCH-Series"><div style="position:absolute;width:50%;white;height:47%;bottom:0;left:0"></div></a>
<a href="/projectors/"><div style="position:absolute;width:50%;height:47%;bottom:0;right:0"></div></a></div>
						</div>
					</div>
					</div>
					
<div class="swiper-slide slide sedit" style="position:relative">
<div>				<img class="bgimage" src="/resources/images/FRE_3">
					<div class="slide-info wider">
					<div style="text-align:right" class="info adjust-right cmsedit">
								<h6 style="">FIRST RESPONDERS</h6>
								<h3 style="color:#ADD238;font-size:300%;font-weight:200;text-shadow: 4px 4px 4px rgba(0,0,0,.25);">TRAIN IN PLACE</h3>
								<p class="Mobile-Color-Swap" style="text-shadow: 5px 5px 15px rgba(0, 0, 0, 0.75);">Have face-to-face training sessions with video, maps and annotation while personnel and equipment remain at-the-ready.</p>
								<br><a href="/displays?MONDOPAD-Series/"><button class="btn greybtn" style="width:430px;margin-left: auto;display:block;">Mondopad videoconferencing, annotation and more</button></a>
								<a href="/video-communication/product?pn=MVP100"><button class="btn greybtn" style="width:430px;margin-left: auto;display:block;">MVP100 Video Phones</button></a>
								<a href="/accessories/product?pn=CONX"><button class="btn greybtn" style="width:430px;margin-left: auto;display:block;">ConX Group Videoconferencing</button></a>
							</div>
					</div>
</div></div>

<div class="swiper-slide slide sedit" style="position:relative">
<div>				<img class="wider" src="/resources/images/FRE_4">
					<div style="" class="slide-info">

							<div style="text-align:right;" class="info cmsedit">
								<h6 style="">FIRST RESPONDERS</h6>
								<h3 style="color:#EC126D;font-size:300%;font-weight:200;text-shadow: 4px 4px 4px rgba(0,0,0,.25);">SAVE</h3>
								<p class="Mobile-Color-Swap" style="text-shadow: 5px 5px 15px rgba(0, 0, 0, 0.75);">Be it saving time, money or lives, InFocus technology helps you do your job better. </p>
								<br><a href="/displays/family?series=MONDOPAD-Series"><button class="btn greybtn" style="color:#EC126D;width:415px;margin-left: auto;display:block;">Learn about Mondopad</button></a>
								<a href="/projectors"><button class="btn greybtn" style="color:#EC126D;width:415px;margin-left: auto;display:block;">Browse projectors</button></a>
								<a href="/resources/documents/Mondo/InFocus-Mondopad-CaseStudy-AddisonFireProtection.pdf"><button class="btn greybtn" style="color:#EC126D;width:415px;margin-left: auto;display:block;">Read fire protection district success story (PDF)</button></a>
								
							</div>
					</div>
</div></div>

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

<div id="category" class="cmsedit" style=""><!-- CTAGenerated -->
  					<div class="headlines-bar" id="headlines-bar">
									<div class="snippet" style="display:inline-block;text-align:left;">
									<a href="/videos?QwL9nQa4CGM"><img style="float:left;padding-right:5px;" src="/resources/images/first-responders-tout-1">
										<span class="title cmsedit">FIRE DISTRICT SUCCESS</span></a>
										<p class="cmsedit">Watch how Chicago-area fire district uses Mondopads to save time, money and lives.<br>
<a href="/videos?QwL9nQa4CGM">PLAY VIDEO</a></p>
									</div>	

									<div class="snippet" style="padding-top:15px;display:inline-block;text-align:left;">
									<a href="/mondopad-live-demo"><img style="float:left;padding-right:5px;" src="/resources/images/first-responders-tout-2.png">
										<span class="title cmsedit">LIVE MONDOPAD DEMO</span></a>
										<p class="cmsedit">Get a personal, interactive Mondopad demo online from an InFocus expert.<br>
<a href="/mondopad-live-demo">GET YOUR DEMO HERE</a></p>
									</div>
					</div>
<div class="content" style="padding-top:1em;">
<div class="C9" id="first-responders">

				<ul class="verticals">
					<li class="C10 C5_child Col_child ui-shadow-after">
						<div class="image-set cmsedit"><p><a href="/displays/family?series=MONDOPAD-SERIES"><img src="/resources/images/vid-conference-low"></a></p>
</div>
						<div class="info cmsedit"><h3 class="name">TRAIN EFFICIENTLY</h3>

<h5 class="name">Communicate with video using Mondopad and ConX</h5>

<div class="description">
<p>Connect your locations with easy-to-use, cloud-based video communications and save time and money over travelling to meet in-person.</p>

<ul class="feature-list">
	<li>Convey information more clearly</li>
	<li>Reduce errors and misunderstanding</li>
	<li>Save time and money</li>
	<li>Improve safety and readiness</li>
</ul>
<br>
<a class="btn" href="/displays/family?series=MONDOPAD-Series">Learn more about Mondopad</a><br>
<br>
<a class="btn" href="/conx">Learn more about ConX video meeting rooms</a></div>
</div>
					</li>
					<li class="C10 C4x6_child Col_child ui-dots-after">
						<div class="image-set cmsedit" style="float:right;"><a href="/displays/family?series=MONDOPAD-SERIES"><img src="/resources/images/Web-Edit-Center"></a></div>
						<div class="info cmsedit"><h3 class="name" style="text-transform:capitalize;">EDUCATE AND ANNOTATE</h3>

<h5 class="name">Annotate on shared web-based content</h5>

<div class="description"><a href="/displays/family?series=MONDOPAD-SERIES">Mondopad</a> enables everyone in the videoconference to see and annotate on the same content, such as maps, videos or other web-based content.</div>

<ul class="feature-list" style="padding-bottom:50px;">
	<li>Whiteboard on an endless canvas</li>
	<li>Annotate on documents, web pages and video</li>
	<li>Save changes and email files to participants</li>
</ul>

<table id="table-comparison" style="text-align:center;border:1px solid #006699">
	<thead>
		<tr>
			<th class="model">INF5520a</th>
			<th class="model">INF7021</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>55” multi-touch screen</td>
			<td>70” multi-touch screen</td>
		</tr>
		<tr>
			<td colspan="2">Video conferencing, interactive whiteboard, document annotation, web browser, file sharing</td>
		</tr>
		<tr>
			<td colspan="2">LCD display with touch overlay, Mondopad collaboration software, MS Office Suite, 720p camera, microphone array, sound bar, wireless keyboard and mouse</td>
		</tr>
		<tr>
			<td colspan="2">Built-in PC running Windows 7 Pro, 120 GB SSD, multiple USB and HDMI inputs, and more</td>
		</tr>
		<tr class="footer">
			<td><a class="learn-more" href="/displays/product?pn=INF5520A">Learn More</a></td>
			<td><a class="learn-more" href="/displays/product?pn=INF7021">Learn More</a></td>
		</tr>
	</tbody>
</table>
</div>
					</li>
					<li class="C10 C4x6_child Col_child ui-shadow-after">
						<div class="image-set cmsedit"><p><img src="/resources/images/Mondopad-Addison-Safety"></p>
</div>
						<div class="info cmsedit"><h3 class="name">ON-DEMAND COMMUNICATION</h3>

<h5 class="name">Talk face-to-face from station-to-station</h5>

<div class="description">
<p>The infocus.net network provides affordable high-quality video calls and service you can count on at a moment’s notice.</p>

<ul class="feature-list" style="padding-bottom:50px;">
	<li>InFocus <a href="/video-communication/121-Series">121 video calling</a> service</li>
	<li>InFocus <a href="/accessories/CONX">ConX group videoconferencing</a> rooms</li>
	<li>Manage accounts and services on infocus.net</li>
</ul>
<a class="btn" href="/videos?NR2miS6yU7Q">Watch first responders webinar recording</a></div>
</div>
					</li>

					</ul>
		</div>

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