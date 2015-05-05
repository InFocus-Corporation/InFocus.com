<?PHP

if(strpos(dirname(__FILE__),"dev")>0){


}

require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/langchk.php");
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/transfunc.php");

if(basename($_SERVER['PHP_SELF']) == "product.php" OR basename($_SERVER['PHP_SELF']) == "family.php" OR basename($_SERVER['PHP_SELF']) == "unknown.php"){
    $pn=strtoupper($_GET['series']);
    if(empty($pn)){$pn=strtoupper($_GET['pn']);}
    if(empty($pn)){$pn=strtoupper($_SERVER['QUERY_STRING']);}

require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/OOPproducts.php");

    $product = new IFCSeries($pn);
    $overview = $product->overview();
if($product->isSeries){
$list = $product->sList();
$models = $product->models();
}
else{
$priceBuyNow = $product->priceBuyNow($product->pn);
$thumbnails = $product->thumbnails();
$reviews = $product->reviews();
}
    $specs = $product->specs();
    $videos = $product->videos();
    $accessories = $product->accessories();
    $worksWith = $product->worksWith();
    $downloads = $product->downloads();
 }
elseif(basename($_SERVER['PHP_SELF']) == "custompage.php"){
    if(empty($_GET['pagename'])){$_GET['pagename'] = $_SERVER['QUERY_STRING'];}
    $pn = str_replace("_","-",$pn);
    if(strpos($pn,"$")>0){$pn = substr($pn,0,strpos($pn,"$")-1);}
    error_log("Test");

		$sql = "SELECT pagecontent FROM pages WHERE pagename = '" . $_GET['pagename'] . "' AND lang = '" . $lang . "'";
		$results = mysqli_query($connection,$sql);
		if(mysqli_num_rows($results)==0)
		{header("Location: /unknown.php?" . $_GET['pagename']); die();}
 }

$productLinks = unserialize(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/resources/misc/links"));


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

<?php 
 if(substr($_SERVER['HTTP_REFERER'],11,7) != "infocus" AND preg_match('/(?i)msie [2-8]/',$_SERVER['HTTP_USER_AGENT']) AND strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0') == false){
echo '</head><body style="background-color:#EAEAEA">

<div class="content" >

<div class="C9" style="max-width:1100px;background-color:white;text-align:center;padding:50px;">
<h2 style="font-size:150%">Please upgrade your browser to use InFocus.com</h2>
<p class="C8" style="text-align:center">The new InFocus website is built using the latest technology.  This makes InFocus.com faster, more compatible with mobile devices, and easier to use.  Unfortunately older browsers do not support these technologies. <br><br>Download one of these fantastic browsers and you will be on your way:</p>

<br><br>
<div class="C10 C2_child Col_child">

<div class="image-set"><a href="http://windows.microsoft.com/en-US/internet-explorer/download-ie"><img src="/resources/images/ie-icon">Internet Explorer<br><small>Version 9+</small></a></div>
<div class="image-set"><a href="http://www.mozilla.org/en-US/firefox/new/"><img src="/resources/images/firefox-icon">Mozilla Firefox<br><small>Version 4+</small></a></div>
<div class="image-set"><a href="https://www.google.com/intl/en/chrome/browser/features.html"><img src="/resources/images/chrome-icon">Google Chrome<br><small>Version 7+</small></a></div>
<div class="image-set"><a href="http://www.apple.com/safari/"><img src="/resources/images/safari-icon">Apple Safari<br><small>Version 5+</small></a></div>
</div><br><br>
<p><a href="/">Proceed to InFocus.com anyway</a></p>
</div>
</div></body></html>';
die();
}

?>
  <script>
window.onbeforeunload = function () {
$(".flexnav").flexNav();
}  
  </script>