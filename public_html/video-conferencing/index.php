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
	<div class="hero_row transparent-border-right-40-orange solid-border-left-40-blue hero-row--video_conferencing">
		<div class="row hero_inner">
			<div class="hero_image"><img src="/resources/static/images/video-conferencing/video-conferencing-hero-a--InFocus-Lifestyle-ConX-Exec-Mtg1-300dpi-CMYK.jpg" /></div>
			<div class="small-6 medium-5 columns lead_text">
				<h2 class="lead_text--secondary_headline">
					<?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/resources/static/images/svg/icon-video-conferencing.svg'); ?>
					Video Conferencing
				</h2>
				<p class="lead_text--paragraph">In a perfect world, every meeting is productive and every presentation engages the audience. We make the world a more perfect place.</p>
			</div>
			<div class="small-3 color_stripe_column">
				<div class="dark_blue color_stripe"></div>
				<div class="white color_stripe hide-for-small-only"></div>
			</div>
		</div>

	</div>
	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/video-conferencing/video-conferencing-mondopad--InFocus-Lifestyle-Mondopad-DualScreen-LightOffice-300dpi-CMYK.jpg" alt="">
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline">Mondopad</h3>
			<p class="lead_text--paragraph">Instantly bring people together from anywhere in the world to visually collaborate on the same content and do better work in less time.</p>
			<a href="/displays/MONDOPAD-SERIES" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/video-conferencing/video-conference-conx-wall-conx-exec--ConXWall-Hero-Image-3x4-1B-96dpi-RGB.jpg" alt="">
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline">ConX Wall and ConX Exec</h3>
			<p class="lead_text--paragraph">Two highly-configurable solutions — ConX Wall or ConX Exec — perfect for board rooms, conference rooms, huddle rooms, CxO offices, training centers, and almost any other facility.</p>
			<a href="/conx-wall-exec" class="button button--primary">learn more</a>
		</div>
	</div>


	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/video-conferencing/video-conferencing-conx-phone--ConXWall-Hero-Image-3x4-1B-96dpi-RGB.jpg" alt="">
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline">ConX Phone</h3>
			<p class="lead_text--paragraph">This HD video phone enables effective visual communication with the ease of a standard phone so you can be more productive in your business interactions.</p>
			<a href="/peripherals/MVP100" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-12 columns text-center">
			<h3 class="lead_text--secondary_headline">Video Conferencing Services</h3>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/video-conferencing/video-conferencing-video-conferencing--InFocus-Lifestyle-MVP100-Construction-96dpi-RGB.jpg" alt="">
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline">ConX Video Meeting</h3>
			<p class="lead_text--paragraph">InFocus ConX™ provides simple, cost-effective, cloud-based video meetings for your organization. Make important visual connections with people on the devices they already use and save time and money.</p>
			<a href="/peripherals/ConX-Series" class="paragraph-link">learn more</a>
		</div>
		<div class="small-5 small-offset-7 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline">121 Video Calling</h3>
			<p class="lead_text--paragraph">InFocus 121 is a cloud-based video calling service to give you all of the power and functionality of video collaboration with none of the cost and overhead of managing premises-based systems.</p>
			<a href="/peripherals/121-Series" class="paragraph-link">learn more</a>
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
