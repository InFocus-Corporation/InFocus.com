<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;


?>
<title>InFocus | Business</title>
<meta name="description" content="Discover advanced projection equipment offered by InFocus. Global leader in LCD projectors and DLP projection, Mondopad products and projector accessories." />
<meta name="keywords" content="infocus,mondopad,projector,projection,DLP,LCD,LCD display,digital display,visual communications,projector accessories,infocus company,digital technology,projection equipment,monopad, communication, touchscreen" />
<script type="text/Javascript" src="/resources/js/idangerous.swiper-2.4.min.js"></script>
<link rel="stylesheet" href="/resources/css/idangerous.swiper.css" />
	<base target="_parent" />
<script>
var pagetype = "business";
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
.snippet{
vertical-align:top;
padding-top:15px;
display:inline-block;
text-align:left;
min-width:25%;
}

.snippet img{
padding-right:5px;
}


.snippet img{
padding-right:5px;
}

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
			<img class="bgimage" src="/resources/images/BUS_1">
					<div class="slide-info">

							<div class="info cmsedit" style="text-align: right; position: relative;"><h3 style="color:#1BA1E2;">BUSINESS</h3>

<p style="color:black;">Increase your productivity and profitability with cost-effective technology that improves how you communicate and collaborate.<br>
<button class="btn bluebtn">Get a live Mondopad demo</button></p>

<div style="position:relative"><img alt="" id="four-prod" src="/resources/images/EDU_1_Object_2" style="width: 100%; padding-top: 0.5em;">
<div style="position:absolute;width:50%;height:47%;top:.5em;left:0">&nbsp;</div>

<div style="position:absolute;width:50%;height:47%;top:.5em;right:0">&nbsp;</div>

<div style="position:absolute;width:50%;white;height:47%;bottom:0;left:0">&nbsp;</div>

<div style="position:absolute;width:50%;height:47%;bottom:0;right:0">&nbsp;</div>
</div>
</div>
					</div>
					</div>
					
<div class="swiper-slide slide sedit" style="position:relative">
<div>				<img class="bgimage" src="/resources/images/BUS_2">
					<div class="slide-info">
					<div style="text-align: right; position: relative;" class="info adjust-right cmsedit"><h6 style="">BUSINESS</h6>

<h3 style="color:#ADD238;font-size:300%;font-weight:200;text-shadow: 4px 4px 4px rgba(0,0,0,.25);">PRODUCTIVITY</h3>

<p class="Mobile-Color-Swap" style="text-shadow: 5px 5px 15px rgba(0, 0, 0, 0.75);">Communicating with clarity reduces errors and saves time. Share ideas and solve problems with technology that makes it easy.</p>
<br>
<button class="btn greybtn" style="width:260px;float:right;">See all touch displays</button><br>
<button class="btn greybtn" style="width:260px;float:right;">See all projectors</button></div>
					</div>
</div></div>

<div class="swiper-slide slide sedit" style="position:relative">
<div>				<img class="wider" src="/resources/images/BUS_3">
					<div style="" class="slide-info wider">

							<div style="text-align: right; position: relative;" class="info cmsedit"><h6 style="">BUSINESS</h6>

<h3 style="color:#EC126D;font-size:300%;font-weight:200;text-shadow: 4px 4px 4px rgba(0,0,0,.25);">STAY WHERE YOU ARE</h3>

<p class="Mobile-Color-Swap" style="text-shadow: 5px 5px 15px rgba(0, 0, 0, 0.75);">Have meaningful face-to-face meetings with your colleagues at the drop of a hat and save money and time on travel.</p>
<br>
<button class="btn greybtn" style="color:#EC126D;width:280px;margin-left: auto;display:block;">Mondopad in conference rooms</button><button class="btn greybtn" style="color:#EC126D;width:280px;margin-left: auto;display:block;">Video Phones on desks</button><button class="btn greybtn" style="color:#EC126D;width:280px;margin-left: auto;display:block;">ConX Video Meeting</button></div>
					</div>
</div></div>
<div class="swiper-slide slide sedit" style="position:relative">
<div>

				<img class="wider" src="/resources/images/BUS_4">
					<div class="slide-info" style="">

							<div style="text-align: right; height: 100%; position: relative;" class="info cmsedit"><h6 style="">BUSINESS</h6>

<h3 style="color:#f66d26;font-size:300%;font-weight:200;text-shadow: 4px 4px 4px rgba(0,0,0,.25);">SUCCEED</h3>

<p class="Mobile-Color-Swap" style="text-shadow: 5px 5px 15px rgba(0, 0, 0, 0.75);">From bringing people closer together to making your ideas shine bigger and brighter – we’re here to make you successful.</p>
<button class="btn orangebtn" style="width:340px;margin-left: auto;display:block;">FIND THE PROJECTOR YOU NEED</button><button class="btn orangebtn" style="width:340px;margin-left: auto;display:block;">COMPARE TOUCH SCREEN SOLUTIONS</button></div>
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
<div class="snippet" style=""><a href="/resources/documents/InFocus-Touchscreen-Solutions-Datasheet-EN.pdf"><img alt="" src="/resources/images/business-tout-1.png" style="float:left"> <span class="title cmsedit" >COMPARE TOUCHSCREENS</span></a>
<p class="cmsedit" >See the Mondopad, BigTouch and JTouch solutions and their accessories together in one brochure.<br>
<a href="/resources/documents/InFocus-Touchscreen-Solutions-Datasheet-EN.pdf">DOWNLOAD NOW (PDF)</a></p>
</div>

<div class="snippet" style=""><a href="/mondopad-live-demo"><img alt="" src="/resources/images/business-tout-2.png" style="float:left"> <span class="title cmsedit" >LIVE MONDOPAD DEMO</span></a>

<p class="cmsedit" >Get a personal, interactive Mondopad demo online from an InFocus expert.<br>
<a href="/mondopad-live-demo">GET YOUR DEMO HERE</a></p>
</div>
</div>

<div class="content" style="padding-top:1em;">
<div class="C9" id="business">
<ul class="verticals">
	<li class="C10 C5_child Col_child ui-shadow-after">
	<div class="image-set cmsedit" >
	<p><a href="/displays/MONDOPAD-SERIES"><img alt="InFocus Mondopad" src="/resources/images/InFocus-Mondopad-20-INF5720-Annotate-Stack.jpg"></a></p>
	</div>

	<div class="info cmsedit" >
	<h3 class="name">MAXIMIZE PROFITABILITY</h3>

	<h5 class="name">Save thousands on travel and waste no time</h5>

	<div class="description">Organizations with multiple offices or remote workers can now communicate and collaborate face-to-face without costly travel. <a href="/displays/MONDOPAD-SERIES">Mondopad</a> allows multiple parties to see and annotate on the same documents and see each other – creating more productive meetings.</div>

	<ul class="feature-list" style="padding-bottom:50px;">
		<li>Video conference with high quality audio and video</li>
		<li>Whiteboard on an endless canvas</li>
		<li>Annotate on documents, web pages and video</li>
		<li><a class="btn" href="/displays/MONDOPAD-Series">Learn more about Mondopad</a></li>
	
	</div>
	</li>
	<li class="C10 C3x7_child Col_child ui-dots-after">
	<div class="image-set cmsedit" style="float:right;" ><a href="/peripherals/ConX-Series"><img alt="InFocus ConX Video Meeting" src="/resources/images/InFocus-CONX-Meeting.jpeg"></a></div>

	<div class="info cmsedit" >
	<h3 class="name" style="text-transform:capitalize;">DIAL AND SEE</h3>

	<h5 class="name">Video conferencing made easy</h5>

	<div class="description">Having a video meeting with <a href="/peripherals/ConX-Series">InFocus ConX cloud-based video meeting service</a> is as easy as dialing an audio conference. Your team can dial into the meeting room from any SIP device, H.323 device or any audio phone with a meeting room number and PIN.</div>

	<ul class="feature-list" style="padding-bottom:50px;">
		<li>See your co-workers and customers in real time</li>
		<li>Share and collaborate on the same data</li>
		<li>Buy and expand as you need; up to 25 participants</li>
		<li><a href="http://infocusconx.com" target="_blank">Free 60-day trial</a></li>
	</ul>
	<a class="btn" href="/peripherals/ConX-Series">Learn More About Conx Video Meeting</a></div>
	</li>
	<li class="C10 ui-shadow-after">
	<div class="info cmsedit" >
	<h3 class="name">BUSINESS PROJECTORS</h3>

	<div class="description">
	<p>From on-the-road mobility to large conference rooms and small offices, InFocus has the full projector line-up for tight budgets and high expectations.</p>
	</div>

	<div class="image-set cmsedit C3_child Col_child" >
	<div><a href="/projectors/ultra-portable">Mobile Projectors<img alt="" src="/resources/images/InFocus-IN1146"></a></div>

	<div><a href="/projectors/office-classroom">Office Projectors<img alt="" src="/resources/images/InFocus-IN110A-Hero"></a></div>

	<div><a href="/projectors/large-venue">Large Venue Projectors<img alt="" src="/resources/images/InFocus-IN5550-Hero"></a></div>
	</div>
	</div>
	</li>
	<li class="C10 ui-shadow-after">
	<div class="info cmsedit" >
	<h3 class="name">1080p RESOLUTION</h3>

	<h5 class="name">HD content deserves HD resolution</h5>

	<div class="description">
	<p>If your organization displays HD content, you need a display that can show it off accurately without manual adjustments or scaling. InFocus has several models with native 1080p or WUXGA resolution to match many budgets, room sizes and content sources.</p>

	<table id="table-comparison">
		<thead>
			<tr>
				<th class="model">IN2128HDa</th>
				<th class="model">IN3138HDa</th>
				<th class="model">IN5316HDa</th>
				<th class="model">IN5555L</th>
				<th class="model">JTouch 65-inch</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1080p Resolution</td>
				<td>1080p Resolution</td>
				<td>1080p Resolution</td>
				<td>WUXGA Resolution</td>
				<td>1080p Resolution</td>
			</tr>
			<tr>
				<td>3500 lumens</td>
				<td>4000 lumens</td>
				<td>5000 lumens</td>
				<td>7000 lumens</td>
				<td>65-inch LCD Panel</td>
			</tr>
			<tr>
				<td>Built-in file storage, screen blanking, optional wireless</td>
				<td>1.5x zoom, enhanced 3D features, screen trigger</td>
				<td>Lens options, lens shift, compact size for 2x2’ ceiling tile</td>
				<td>Optional lenses, two color wheels, dual lamps, motorized lens shift</td>
				<td>Multi-point interactive touchscreen, built-in whiteboard</td>
			</tr>
			<tr>
				<td>HDMI, USB, LAN, wireless USB option</td>
				<td>HDMI, HDMI w/MHL, screen trigger, LAN</td>
				<td>HDMI 1.4, DVI-D, DisplayPort, USB Power Port, LAN</td>
				<td>HDMI, DVI-D, 3G-SDI inputs</td>
				<td>HDMI, USB and Component inputs</td>
			</tr>
			<tr class="footer">
				<td><a class="learn-more" href="/projectors/product?pn=IN2128HDa">Learn More</a></td>
				<td><a class="learn-more" href="/projectors/product?pn=IN3138HDa">Learn More</a></td>
				<td><a class="learn-more" href="/projectors/product?pn=IN5316HDa">Learn More</a></td>
				<td><a class="learn-more" href="/projectors/product?pn=IN5555L">Learn More</a></td>
				<td><a href="/displays/INF6501wp">Learn More</a></td>
			</tr>
		</tbody>
	</table>
	</div>
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