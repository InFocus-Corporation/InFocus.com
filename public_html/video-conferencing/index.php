<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>

<title>InFocus | Collaboration That Works</title>
<meta name="description" content="Discover advanced projection equipment offered by InFocus. Global leader in LCD projectors and DLP projection, Mondopad products and projector accessories." />
<meta name="keywords" content="infocus,mondopad,projector,projection,DLP,LCD,LCD display,digital display,visual communications,projector accessories,infocus company,digital technology,projection equipment,monopad, communication, touchscreen" />

<link rel="stylesheet" href="/resources/css/vendor/foundation.min.css" />
<link rel="stylesheet" href="/resources/css/infocus.min.css" />

<?php
if($_GET['edit']=="true"){CMSscript("/resources/overviews/$pn-$lang.src", $pn, $homedir.'/resources/overviews/', 'admin,salespublisher,saleseditor,marketingpublisher,marketingeditor,editor', ".src", "overview", "true", "SavePage","overview");}

?>
</head>
<body class="" style="">
	<?php include($homedir . "/resources/html/mainmenu.html"); ?>
	<div class="hero_row">
		<div class="row">
			<div class="small-11 medium-7 large-5 columns lead_text">
				<h2 class="lead_text--secondary_headline">
					<?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/resources/static/images/svg/icon-video-conferencing.svg'); ?>
					Video Conferencing
				</h2>
				<p class="lead_text--paragraph">In a perfect world, every meeting is productive and every presentation engages the audience. We make the world a more perfect place.</p>
			</div>
			<div class="small-1 medium-3 color_stripe_column">
				<div class="dark_blue color_stripe"></div>
				<div class="white color_stripe"></div>
			</div>
		</div>

	</div>
	<div class="row">
		<div class="small-12 medium-7 columns">
			<div class="white color_stripe"></div>
			<img src="https://placehold.it/750x538" alt="">
		</div>
		<div class="small-12 medium-5 columns">
			<h2 class="lead_text--secondary_headline">Mondopad</h2>
			<p class="lead_text--paragraph">Instantlybring people together from anywhere in the world to visually collaborate on the same content and do better work in less time.</p>
			<a href="/displays/MONDOPAD-SERIES" class="button button--primary">learn more</a>
		</div>
	</div>

	<script>
	    $(document).foundation();
	</script>
	<footer id="site-info" >
	<?php include($homedir . "/resources/html/footer.html"); ?>
	</footer>
</body>
</html>
