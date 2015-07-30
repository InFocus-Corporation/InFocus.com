<?php
header("HTTP/1.0 404 Not Found");
//require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
    if( substr($_SERVER['DOCUMENT_ROOT'],-11) == "public_html"){$lang = "en";}
    else{$lang = substr($_SERVER['DOCUMENT_ROOT'],-2);}
?>

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