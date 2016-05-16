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
	<div class="hero_row transparent-border-right-40-orange solid-border-left-24-blue hero-row--display_walls">
		<div class="row hero_inner">
			<div class="hero_image"><img src="/resources/static/images/display-walls/TMC_REMKES_AND_LUCERO_1.jpg" /></div>
			<div class="small-6 medium-5 columns lead_text">
				<h2 class="lead_text--secondary_headline">
					<?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/resources/static/images/svg/display-walls.svg'); ?>
					Display Walls
				</h2>
				<p class="lead_text--paragraph">The ability to see everything that’s important at once is invaluable. Our technologies display all your data sources and video-conferencing feeds together on a single wall.</p>
			</div>
			<div class="small-3 color_stripe_column">
				<div class="dark_blue color_stripe"></div>
				<div class="white color_stripe"></div>
			</div>
		</div>

	</div>
	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/display-walls/160775957.jpg" alt="">
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline">Canvas</h3>
			<p class="lead_text--paragraph">Canvas enables video, data, applications, and more to be shared with colleagues anywhere, on any device, delivering end-to-end collaboration.</p>
			<a href="/display-walls/canvas" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/display-walls/iStock_000049003822XLarge_test1170x500.jpg" alt="">
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline">Canvas CRS-4K</h3>
			<p class="lead_text--paragraph">The Canvas CRS-4K system is a small, quiet box that can be located anywhere in the room. What it enables is enormous.</p>
			<a href="/display-walls/canvas-crs4k" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/display-walls/InFocus-Lifestyle-Mondopad2-ConfRoom-WoodWall-300dpi-CMYK.jpg" alt="">
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline">Canvas Touch</h3>
			<p class="lead_text--paragraph">Canvas Touch extends the power of Canvas’ award-winning visualization solution to conference rooms, huddle spaces, personal offices, or anywhere else groups meet and collaborate.</p>
			<a href="/display-walls/canvas-touch" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/display-walls/ConXWall-Hero-Image-3x4-1B-96dpi-RGB.jpg" alt="">
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
			<img src="/resources/static/images/display-walls/BoM_Jupiter_People_07.jpg" alt="">
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline">Fusion Catalyst</h3>
			<p class="lead_text--paragraph">Fusion Catalyst™ ushers in a new era of performance and flexibility for display wall processors.</p>
			<a href="/display-walls/fusion-catalyst" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/display-walls/pixelnet_hero-1.jpg" alt="">
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline">PixelNet</h3>
			<p class="lead_text--paragraph">PixelNet adopts Gigabit Ethernet technology to create a network of input and output nodes to drive high resolution, real time video walls. </p>
			<a href="/display-walls/pixelnet" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/display-walls/BoM_Jupiter_Meeting_Room_1.jpg" alt="">
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline">StreamCenter</h3>
			<p class="lead_text--paragraph">StreamCenter™ is the most fully featured multistream decoder anywhere.</p>
			<a href="/display-walls/streamcenter" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/display-walls/169263611.jpg" alt="">
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline">VisionPlus II</h3>
			<p class="lead_text--paragraph">VizionPlus II™ is the newest version of the go-to display wall processor already deployed in thousands of US military installations worldwide.</p>
			<a href="/display-walls/vizionplus-ii" class="button button--primary">learn more</a>
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
