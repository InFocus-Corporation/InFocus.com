<?php
header("HTTP/1.0 404 Not Found");
//require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
    if( substr($_SERVER['DOCUMENT_ROOT'],-11) == "public_html"){$lang = "en";}
    else{$lang = substr($_SERVER['DOCUMENT_ROOT'],-2);}
?>
<link rel="stylesheet" href="/resources/css/404.css" />
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
</body>
</html>
