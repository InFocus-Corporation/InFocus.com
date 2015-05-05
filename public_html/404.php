<?php
header("HTTP/1.0 404 Not Found");
//require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
    if( substr($_SERVER['DOCUMENT_ROOT'],-11) == "public_html"){$lang = "en";}
    else{$lang = substr($_SERVER['DOCUMENT_ROOT'],-2);}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?= $lang; ?>" dir="ltr" class="wf-pragmaticawebcondensed-n3-active wf-pragmaticawebcondensed-n4-active wf-pragmaticawebcondensed-n9-active wf-active"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="UTF-8">
<link rel="icon" href="/favicon.png" type="image/gif" sizes="32x32">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<script type="text/Javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/Javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script type="text/javascript" src="//use.typekit.net/lbn0ick.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<script type="text/Javascript" src="/resources/js/InFocusCollection.js"></script>
<script type="text/Javascript" src="/resources/js/jquery.colorbox.js"></script>
<link rel="stylesheet" href="/resources/css/colorbox.css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" href="/resources/css/core.css" />
<?php if($lang != "en"){echo '<link rel="stylesheet" href="/resources/css/Non-en.css" />'; }?>
<link rel="stylesheet" href="/resources/css/flexnav.css" />
<script type="text/Javascript" src="/resources/js/jquery.hoverIntent.min.js"></script>
<script type="text/Javascript" src="/resources/js/jquery.flexnav.min.js"></script>
<script src="/resources/js/jquery.fitvids.js"></script>
<!--[if IE]>
    <link href="/resources/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
  <![endif]-->
  
<!-- Start Visual Website Optimizer Asynchronous Code -->
<script type='text/javascript'>
var _vwo_code=(function(){
var account_id=19382,
settings_tolerance=2000,
library_tolerance=2500,
use_existing_jquery=false,
// DO NOT EDIT BELOW THIS LINE
f=false,d=document;return{use_existing_jquery:function(){return use_existing_jquery;},library_tolerance:function(){return library_tolerance;},finish:function(){if(!f){f=true;var a=d.getElementById('_vis_opt_path_hides');if(a)a.parentNode.removeChild(a);}},finished:function(){return f;},load:function(a){var b=d.createElement('script');b.src=a;b.type='text/javascript';b.innerText;b.onerror=function(){_vwo_code.finish();};d.getElementsByTagName('head')[0].appendChild(b);},init:function(){settings_timer=setTimeout('_vwo_code.finish()',settings_tolerance);this.load('//dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&r='+Math.random());var a=d.createElement('style'),b='body{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}',h=d.getElementsByTagName('head')[0];a.setAttribute('id','_vis_opt_path_hides');a.setAttribute('type','text/css');if(a.styleSheet)a.styleSheet.cssText=b;else a.appendChild(d.createTextNode(b));h.appendChild(a);return settings_timer;}};}());_vwo_settings_timer=_vwo_code.init();
</script>
<!-- End Visual Website Optimizer Asynchronous Code -->

<style>
body {
background-color:black;
  }
div.error, .error p, .error span{
  padding: 40px;
  font-size: 75px;
  font-family: 'Monoton', cursive;
  text-align: center;
  text-transform: uppercase;
  text-shadow: 0 0 80px red,0 0 30px FireBrick,0 0 6px DarkRed;
  color: red;
  padding:0px;
}
div.error p,  { margin:0; }
#error, #error span{
  color: #fff;
  text-shadow: 0 0 80px #ffffff,0 0 30px #008000,0 0 6px #0000ff;
}
#error span {
  -webkit-animation: upper 11s linear infinite;
  animation: upper 11s linear infinite;
}
#code span:nth-of-type(2) {
  -webkit-animation: lower 10s linear infinite;
  animation: lower 10s linear infinite;
}
#code span:nth-of-type(1) {
  text-shadow: none;
  opacity:.4;
}
@keyframes upper {
  0%,19.999%,22%,62.999%,64%, 64.999%,70%,100% {
    opacity:.99; text-shadow: 0 0 80px #ffffff,0 0 30px #008000,0 0 6px #0000ff;
  }
  20%,21.999%,63%,63.999%,65%,69.999% {
    opacity:0.4; text-shadow: none; 
  }
}
@keyframes lower {
  0%,12%,18.999%,23%,31.999%,37%,44.999%,46%,49.999%,51%,58.999%,61%,68.999%,71%,85.999%,96%,100% {
    opacity:0.99; text-shadow: 0 0 80px red,0 0 30px FireBrick,0 0 6px DarkRed;
  }
  19%,22.99%,32%,36.999%,45%,45.999%,50%,50.99%,59%,60.999%,69%,70.999%,86%,95.999% { 
    opacity:0.4; text-shadow: none; 
  }
}
@-webkit-keyframes upper {
  0%,19.999%,22%,62.999%,64%, 64.999%,70%,100% {
    opacity:.99; text-shadow: 0 0 80px #ffffff,0 0 30px #008000,0 0 6px #0000ff;
  }
  20%,21.999%,63%,63.999%,65%,69.999% {
    opacity:0.4; text-shadow: none; 
  }
}
@-webkit-keyframes lower {
  0%,12%,18.999%,23%,31.999%,37%,44.999%,46%,49.999%,51%,58.999%,61%,68.999%,71%,85.999%,96%,100% {
    opacity:0.99; text-shadow: 0 0 80px red,0 0 30px FireBrick,0 0 6px DarkRed;
  }
  19%,22.99%,32%,36.999%,45%,45.999%,50%,50.99%,59%,60.999%,69%,70.999%,86%,95.999% { 
    opacity:0.4; text-shadow: none; 
  }
}
</style>
	</head>
	<body>
		<?php include($_SERVER['DOCUMENT_ROOT'] . "/resources/html/mainmenu.html"); ?>

<link href='http://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css'>
<section class="fade">
<div class="content">
<div class="C9">
<div class="error" style="height:300px;padding-top:150px;">
  <p id="error">E<span>r</span>ror</p><br><br>
  <p id="code">4<span>0</span><span>4</span></p>
</div>
</div>
		</div>
			</section>
				
				<footer id="site-info" >
				<?php include($_SERVER['DOCUMENT_ROOT'] ."/resources/html/footer.html"); ?>
				</footer>

<script>
				$(".form-box").colorbox({iframe:true, innerWidth:"80%", innerHeight:400});
$(".colorbox-inline").colorbox({inline:true});

</script>


</body></html>