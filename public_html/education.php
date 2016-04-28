<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;


?>
<title>InFocus | Education</title>
<meta name="description" content="Discover advanced projection equipment offered by InFocus. Global leader in LCD projectors and DLP projection, Mondopad products and projector accessories." />
<meta name="keywords" content="infocus,mondopad,projector,projection,DLP,LCD,LCD display,digital display,visual communications,projector accessories,infocus company,digital technology,projection equipment,monopad, communication, touchscreen" />
<script type="text/Javascript" src="/resources/js/idangerous.swiper-2.4.min.js"></script>
<link rel="stylesheet" href="/resources/css/idangerous.swiper.css" />
	<base target="_parent" />
<script>
var pagetype = "education";
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
font-weight:100;
text-shadow:none;
line-height:1.2em;
text-align:right;
}

.edu-btns {
position:absolute;
bottom:35px;
right:100px;
text-align:left;
font-size:200%;
width:30%;
}

.wider {width:39%; left:60%;}


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


.greyoverlaybtn {
background: #626262;
background-image: -webkit-linear-gradient(top, #626262, #636363);
background-image: -moz-linear-gradient(top, #626262, #636363);
background-image: -ms-linear-gradient(top, #626262, #636363);
background-image: -o-linear-gradient(top, #626262, #636363);
background-image: linear-gradient(to bottom, #626262, #636363);
-webkit-border-radius: 3;
-moz-border-radius: 3;
border-radius: 3px;
-webkit-box-shadow: 0px 4px 10px  rgba(0, 0, 0, 0.5);
-moz-box-shadow: 0px 4px 10px  rgba(0, 0, 0, 0.5);
box-shadow: 0px 4px 10px  rgba(0, 0, 0, 0.5);
color: #ADD238;
font-size:50%;
padding: 6px 30px;
text-decoration: none;
border:0px;
}

.greyoverlaybtn:hover {
background: #a3a3a3;
background-image: -webkit-linear-gradient(top, #a3a3a3, #a6a6a6);
background-image: -moz-linear-gradient(top, #a3a3a3, #a6a6a6);
background-image: -ms-linear-gradient(top, #a3a3a3, #a6a6a6);
background-image: -o-linear-gradient(top, #a3a3a3, #a6a6a6);
background-image: linear-gradient(to bottom, #a3a3a3, #a6a6a6);
text-decoration: none;
}

.greyoverlaybtn:active {
position: relative;
top: 1px;
left: 0px;
}



.orangebtn {
-webkit-border-radius: 3;
-moz-border-radius: 3;
border-radius: 3px;
-webkit-box-shadow: 0px 1px 3px #000000;
-moz-box-shadow: 0px 1px 3px #000000;
box-shadow: 0px 1px 3px #000000;
font-family: pragmatica-web-condensed;
color: #ffffff;
font-size:50%;
background: #f66d26;
padding: 5px 20px;
text-decoration: none;
border:0px;
width:400px;
display:table-cell;
vertical-align:baseline;
margin-bottom:10px;
}

.orangebtn:hover {
background: #ff8c57;
text-decoration: none;
}

.orangebtn:active {
position: relative;
top: 1px;
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



.headlines-bar > div, .headlines-bar img{
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
			<img class="bgimage" src="/resources/images/EDU_1">
					<div class="slide-info">

							<div style="position: relative;" class="info cmsedit"><h3 style="color:#1BA1E2;">EDUCATION</h3>

<p style="color:black;">Helping students engage, teachers connect and administrators succeed with technology that’s effective, easy and affordable.<br>
<a href="/videos?wMbxkvcaeXo"><img alt="" img="" src="/resources/images/roosevelt-high-play" style="width: 100%; padding-top: 0.5em;"></a></p>

<div style="position:relative"><img alt="" id="four-prod" src="/resources/images/EDU_1_Object_2" style="width: 100%; padding-top: 0.5em;">
<div style="position:absolute;width:50%;height:47%;top:.5em;left:0">&nbsp;</div>

<div style="position:absolute;width:50%;height:47%;top:.5em;right:0">&nbsp;</div>

<div style="position:absolute;width:50%;white;height:47%;bottom:0;left:0">&nbsp;</div>

<div style="position:absolute;width:50%;height:47%;bottom:0;right:0">&nbsp;</div>
</div>
</div>
					</div>
					<a style="height: 28px;" href="/displays/MONDOPAD-SERIES"><span class="linkspan" style="position: absolute; top: 59.7625%; width: 11.8175%; height: 17.942%; left: 62.7524%; opacity: 0;"></span></a><a style="height: 28px;" href="/displays/BIGTOUCH-SERIES"><span class="linkspan" style="position: absolute; top: 61.2137%; width: 12.2663%; height: 16.6227%; left: 81.7502%; opacity: 0;"></span></a><a style="height: 28px;" href="/displays/JTOUCH-SERIES"><span class="linkspan" style="position: absolute; top: 81.3984%; width: 11.9671%; height: 15.8311%; left: 62.8272%; opacity: 0;"></span></a><a style="height: 28px;" href="/projectors/"><span class="linkspan" style="position: absolute; top: 79.9472%; width: 11.4435%; height: 17.942%; left: 81.8998%; opacity: 0;"></span></a></div>
<div class="swiper-slide slide sedit" style="position:relative">
<div>				<img class="bgimage" src="/resources/images/EDU_2">
					<div class="slide-info">
					<div style="text-align: right; position: relative;" class="info adjust-right cmsedit"><h6 style="">EDUCATION</h6>

<h3 style="color:#ADD238;font-size:300%;font-weight:200;text-shadow: 4px 4px 4px rgba(0,0,0,.25);">ENGAGE</h3>

<p class="Mobile-Color-Swap" style="text-shadow: 5px 5px 15px rgba(0, 0, 0, 0.75);">Bright, fun and interactive touchscreen computers and displays get students involved – it’s technology they know and want to touch<br>
<button class="greyoverlaybtn">SEE ALL TOUCH DISPLAYS</button></p>
</div>
					</div>
</div></div>
<div class="swiper-slide slide sedit" style="position:relative">
<div>				<img class="wider" src="/resources/images/EDU_3">
					<div style="" class="slide-info wider">

							<div style="text-align: right; position: relative;" class="info cmsedit"><h6 style="">EDUCATION</h6>

<h3 style="color:#EC126D;font-size:300%;font-weight:200;text-shadow: 4px 4px 4px rgba(0,0,0,.25);">EXPAND</h3>

<p class="Mobile-Color-Swap" style="text-shadow: 5px 5px 15px rgba(0, 0, 0, 0.75);">Bring a world of thought, leaders, and information into the classroom with the flexible video conferencing features of Mondopad.<br>
<button class="greyoverlaybtn" style="color:#EC126D">LEARN ABOUT MONDOPAD</button></p>
</div>
					</div>
</div></div>
<div class="swiper-slide slide sedit" style="position:relative">
<div>

				<img class="wider" src="/resources/images/EDU_6">
					<div class="slide-info" style="">

							<div style="text-align: right; height: 100%; position: relative;" class="info cmsedit"><h6 style="">EDUCATION</h6>

<h3 style="color:#f66d26;font-size:300%;font-weight:200;text-shadow: 4px 4px 4px rgba(0,0,0,.25);">SUCCEED</h3>

<p class="Mobile-Color-Swap" style="text-shadow: 5px 5px 15px rgba(0, 0, 0, 0.75);">From interactive solutions that get students involved to projecting bright images the whole class can see<br>
<strong style="font-size:100%;font-weight:400;color:white;">We’re here to make you successful.</strong></p>
</div>
					</div>
					<div class="edu-btns cmsedit"><button class="orangebtn">FIND THE PROJECTOR YOU NEED</button><button class="orangebtn">COMPARE TOUCH SCREEN SOLUTIONS</button><button class="orangebtn">VIEW INTERACTIVE PROJECTORS</button></div>
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
<div class="snippet" style="display:inline-block;text-align:left;"><a href="/resources/documents/Mondo/InFocus-Mondopad-CaseStudy-BirminghamSouthernCollege.pdf"><img alt="InFocus Mondopad at College" src="/resources/images/education-tout-1" style="padding-right:5px; float:left"> <span class="title cmsedit" >HIGHER ED SUCCESS</span></a>

<p class="cmsedit" >Alabama college creates a global collaboration classroom with Mondopad<br>
<a href="/resources/documents/Mondo/InFocus-Mondopad-CaseStudy-BirminghamSouthernCollege.pdf">Read a case study (PDF)</a></p>
</div>

<div class="snippet" style="padding-top:5px;display:inline-block;text-align:left;"><a href="/inspire"><img alt="InFocus Inspire Education Program" src="/resources/images/InFocus-Inspire-Education-Program-BlueLogo-163.jpg" style="padding-right:5px; padding-bottom:5px; padding-left:25px; float:left"> <span class="title cmsedit" >EDUCATION DISCOUNTS</span></a>

<p class="cmsedit" >Education customers get discounts from our Inspire Education Program dealers. Find a dealer and start saving today!<br>
<a href="/inspire">Learn about Inspire &gt;</a></p>
</div>
</div>

<div class="content" style="padding-top:1em;">
<div class="C9" id="education">
<div class="tabs" style="text-align:center;">
<h3 class="title-choose">See Products Tailored For:</h3>

<nav class="C6 transformer-tabs tabs-wrapper" role="navigation" style="padding-bottom:30px">

	<li><a class="active" href="#products-k12" style="min-width:120px;">K-12</a></li>
	<li><a href="#products-uni" style="min-width:120px;">Higher Education</a></li>

</nav>

<div class="tab-shadow">&nbsp;</div>

<div class="active" id="products-k12">
<ul class="verticals">
	<li class="C10 C5_child Col_child ui-shadow-after">
	<div class="image-set cmsedit" >
	<p><a href="/displays/JTOUCH-LightCast-Series/INF6501w"><img alt="InFocus 65-inch JTouch Whiteboard and Display" src="/resources/images/InFocus-INF6501W-Hero"></a></p>
	</div>

	<div class="info cmsedit" >
	<h3 class="name">ENGAGE WITH TOUCH</h3>

	<h5 class="name">Affordable JTouch 65” Touchscreen Whiteboard and Display</h5>

	<div class="description">
	<p>Display your PC’s content on a bright, colorful <a href="/displays/JTOUCH-LightCast-Series/INF6501w">65-inch touch display with built-in whiteboard</a> that every student in the class can see and interact with.</p>

	<p>Create an exciting and engaging classroom that utilizes the assets you already have for a fraction of the cost.</p>

	<p><span style="color:#339900;">$1,999</span> on the <a href="/displays/JTOUCH-LightCast-Series/INF6501w">65-inch JTouch Whiteboard </a>for K-12 schools only!</p>

	<p>Video: <a href="/videos?3NRe5yzKNPI">JTouch in K-12 FAQ</a></p>
	<a class="btn" href="/displays/family?series=JTOUCH-Series">Learn more about JTouch</a></div>
	</div>
	</li>
	<li class="C10 C3x7_child Col_child ui-dots-after">
	<div class="image-set cmsedit" style="float:right;" >
	<p style="padding:0 45px;"><a href="/projectors/IN120A-Series"><img alt="InFocus IN120a Projector Series with wireless option" src="/resources/images/InFocus-IN124A-Hero" height="523" width="896"><img alt="" src="/resources/images/InFocus-IN120A-Back"><img alt="" src="/resources/images/svga-xga-wxga_3"></a></p>
	</div>

	<div class="info cmsedit" >
	<h3 class="name" style="text-transform:capitalize;">Go Wireless!</h3>

	<div class="description">The new <a href="/projectors/IN122A">IN122a</a>, <a href="/projectors/IN124A">IN124a</a> and <a href="/projectors/IN126A">IN126a</a> are low-cost, high-brightness projectors with HDMI connectivity, 2GB internal storage, USB wireless option, and more. Optional <a href="/accessories/SP-WIFIUSB-2">wireless USB adapter</a> lets you present from tablets, annotate on documents, and even use your mobile device like a document camera.</div>

	<ul class="feature-list" style="padding-bottom:50px;">
		<li>3500 lumens of brightness</li>
		<li>Long-life lamp of up to 6,000 hours for long-term savings</li>
		<li>High 15000:1 contrast ratio and BrilliantColor technology</li>
		<li>Wireless connectivity with <a href="/accessories/SP-WIFIUSB-2">optional USB adapter</a></li>
		<li>Display over HDMI or USB</li>
		<li>PC-less display from USB drive or 2GB of internal memory</li>
		<li>Present Office docs, video, audio, photos and more wirelessly from your mobile device</li>
		<li>Display 3D content from Blu-ray, PCs and more</li>
	</ul>

	<table id="table-comparison">
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th class="model">IN122a</th>
				<th class="model">IN124a</th>
				<th class="model">IN126a</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="category">Price (U.S.)*</td>
				<td>$409</td>
				<td>$469</td>
				<td>$569</td>
			</tr>
			<tr>
				<td class="category">Resolution</td>
				<td>SVGA (800 x 600)</td>
				<td>XGA (1024 x 768)</td>
				<td>WXGA (1280 x 800)</td>
			</tr>
			<tr>
				<td class="category">Brightness</td>
				<td>3500 Lumens</td>
				<td>3500 Lumens</td>
				<td>3500 Lumens</td>
			</tr>
			<tr>
				<td class="category">Aspect Ratio</td>
				<td>4:3</td>
				<td>4:3</td>
				<td>16:10</td>
			</tr>
			<tr class="footer">
				<td>&nbsp;</td>
				<td><a class="btn buy-now" href="https://www.infocusdirect.com/projectors/in122a-svga-wireless-ready-projector">Buy Now</a> <a class="learn-more" href="/projectors/product?pn=IN122A">Learn More</a></td>
				<td><a class="btn buy-now" href="https://www.infocusdirect.com/projectors/in124a-xga-wireless-ready-projector">Buy Now</a> <a class="learn-more" href="/projectors/product?pn=IN124A">Learn More</a></td>
				<td><a class="btn buy-now" href="https://www.infocusdirect.com/projectors/in126a-wxga-wireless-ready-projector">Buy Now</a> <a class="learn-more" href="/projectors/product?pn=IN126A">Learn More</a></td>
			</tr>
		</tbody>
	</table>
	</div>
	</li>
	<li class="C10 C4x6_child Col_child ui-shadow-after">
	<div class="image-set cmsedit" >
	<p><a href="/projectors/office-classroom/IN110X-Series"><img alt="InFocus IN119HDx HD projector" src="/resources/images/InFocus-IN119HDX-Face-Right" height="524" width="898"></a></p>
	</div>

	<div class="info cmsedit" >
	<h3 class="name">Best Low-Cost Options</h3>

	<h5 class="name">Incredible projector values, including HD models</h5>

	<div class="description">
	<p><a href="/projectors/office-classroom/IN110X-Series">InFocus IN110x projectors</a> start at prices as low as $289 (USD)! They have HDMI connectivity and cut through ambient light with 3200 lumens.</p>

	<p>HD projectors from InFocus are also an incredible value with two low-cost models to choose from, starting at an incredible $499 (US).</p>
	<a class="btn" href="/projectors/office-classroom/IN110X-Series">View IN110x Projectors</a></div>
	</div>
	</li>
</ul>
</div>

<div id="products-uni">
<ul class="verticals">
	<li class="C10 C5_child Col_child ui-shadow-after">
	<div class="image-set cmsedit" >
	<p><a href="/displays/MONDOPAD-SERIES"><img alt="InFocus Mondopad in Higher Ed" src="/resources/images/InFocus-Mondopad-Higher-Ed-Medical"></a></p>
	</div>

	<div class="info cmsedit" >
	<h3 class="name">CLOSING THE DISTANCE GAP</h3>

	<h5 class="name">Mondopad brings the world’s resources to you</h5>

	<div class="description">
	<p>Cost and quality of video conferencing are no longer barriers to creating a high-tech, collaborative classroom or huddle room with a worldwide reach. <a href="/displays/family?series=MONDOPAD-SERIES">Mondopad</a> combines multiple functions into one affordable PC-based system that’s easy for students and faculty to use every day.</p>

	<p><a href="http://www.higheredtechdecisions.com/photos/10_infcomm_products_highereducation_techdecisions_recommends_for_your_colle/5" target="_blank">Read why HigherEdTechDecisions recommends Mondopad for your college</a></p>

	<p><a href="http://www.svconline.com/news/education/satellite-collaboration/402642" target="_blank">Read how Brenau University uses Mondopad to reach more students</a></p>
	<br>
	<a class="btn" href="/displays/MONDOPAD-Series">Learn more about Mondopad</a></div>
	</div>
	</li>
	<li class="C10 C5_child Col_child ui-dots-after">
	<div class="image-set cmsedit" style="float:right;" >
	<p><a href="/resources/documents/Mondopad_Higher_Education_Whitepaper.pdf"><img alt="" src="/resources/images/Olin205-Web-Ready"></a></p>
	</div>

	<div class="info cmsedit" >
	<h3 class="name">HIGHER ED WHITE PAPER</h3>

	<h5 class="tagline">More efficient, cost-effective collaboration in higher education</h5>

	<div class="description">
	<p>This brief and informative report examines the benefits and challenges of various video conferencing and collaboration use cases in higher education, including administrative and faculty collaboration, huddle rooms, and distance learning and collaboration.</p>

	<p>Video: <a href="/videos?iFJa8NuS52g">Mondopad in Higher Education FAQ</a></p>
	<a class="btn" href="/resources/documents/Mondopad_Higher_Education_Whitepaper.pdf">Download White Paper (PDF)</a></div>
	</div>
	</li>
	<li class="C10 C3x7_child Col_child ui-shadow-after">
	<div class="image-set cmsedit" >
	<p><a href="/projectors/IN5550-Series"><img alt="" src="/resources/images/InFocus-IN5550-Right"></a><a href="/projectors/IN5140-Series"><img alt="" src="/resources/images/InFocus-IN5140-Back"></a></p>
	</div>

	<div class="info cmsedit" >
	<h3 class="name" style="text-transform:capitalize;">Large Venue Projectors</h3>

	<h5 class="tagline">Powerful and flexible DLP and LCD projectors to fit any lecture hall or auditorium.</h5>

	<div class="description">&nbsp;</div>

	<table id="table-comparison">
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th class="model">IN5140 Series</th>
				<th class="model">IN5310a Series</th>
				<th class="model">IN5550 Series</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="category">Resolution</td>
				<td>XGA, WXGA, WUXGA</td>
				<td>XGA, 1080</td>
				<td>XGA, WXGA, WUXGA</td>
			</tr>
			<tr>
				<td class="category">Technology</td>
				<td>3LCD</td>
				<td>DLP</td>
				<td>DLP with 2 color wheels</td>
			</tr>
			<tr>
				<td class="category">Brightness</td>
				<td>Up to 6000 lumens</td>
				<td>Up to 6000 lumens</td>
				<td>Up to 8300 lumens</td>
			</tr>
			<tr>
			</tr>
			<tr>
				<td class="category">Lenses</td>
				<td>Standard lens, plus 4 optional lenses</td>
				<td>Standard lens, plus 2 optional lenses</td>
				<td>6 optional lenses</td>
			</tr>
			<tr class="footer">
				<td>&nbsp;</td>
				<td><a class="btn buy-now" href="/projectors/family?series=IN5140-Series">Learn More</a></td>
				<td><a class="btn buy-now" href="/projectors/IN5310A-Series">Learn More</a></td>
				<td><a class="btn buy-now" href="/projectors/family?series=IN5550-Series">Learn More</a></td>
			</tr>
		</tbody>
	</table>
	</div>
	</li>
</ul>
</div>
</div>
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