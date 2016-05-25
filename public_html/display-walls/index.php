<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>

<title>InFocus | Display Walls</title>
<meta name="description" content="Technology that displays all your data sources and video conferencing feeds together in a single wall. Includes Canvas, Canvas Touch, ConX, Fusion Catalyst, PixelNet, StreamCenter, and VizionPlus II." />
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
			<a href="/display-walls/canvas"><img src="/resources/static/images/display-walls/160775957.jpg" alt=""></a>
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline"><a href="/display-walls/canvas">Canvas</a></h3>
			<p class="lead_text--paragraph">Share video, data, applications, and more with colleagues anywhere, on any device, for end-to-end collaboration.</p>
			<a href="/display-walls/canvas" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<a href="/display-walls/canvas-crs4k"><img src="/resources/static/images/display-walls/iStock_000049003822XLarge_test1170x500.jpg" alt=""></a>
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline"><a href="/display-walls/canvas-crs4k">Canvas CRS-4K</a></h3>
			<p class="lead_text--paragraph">Extend the power of Canvas' award-winning solution to teams working together on up to four HD displays or one 4K display in conference rooms and huddle rooms.</p>
			<a href="/display-walls/canvas-crs4k" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<a href="/display-walls/canvas-touch"><img src="/resources/images/InFocus-Canvas-Touch-Architecture.jpg" alt=""></a>
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline"><a href="/display-walls/canvas-touch">Canvas Touch</a></h3>
			<p class="lead_text--paragraph">Collaborate on this touchscreen endpoint for your Canvas environment in your conference rooms, huddle spaces, personal offices, or anywhere else groups meet.</p>
			<a href="/display-walls/canvas-touch" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<a href="/conx-wall-exec"><img src="/resources/static/images/display-walls/ConXWall-Hero-Image-3x4-1B-96dpi-RGB.jpg" alt=""></a>
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline"><a href="/conx-wall-exec">ConX Wall and ConX Exec</a></h3>
			<p class="lead_text--paragraph">Display all of your data sources and HD video conferencing feeds on up to 96 screens with this highly-configurable collaboration solution for board rooms, CxO offices, training centers and more.</p>
			<a href="/conx-wall-exec" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<a href="/display-walls/fusion-catalyst"><img src="/resources/static/images/display-walls/BoM_Jupiter_People_07.jpg" alt=""></a>
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline"><a href="/display-walls/fusion-catalyst">Fusion Catalyst</a></h3>
			<p class="lead_text--paragraph">Incorporate all of the visual data sources found in a control room environment and display them in movable, scalable windows on a virtual display comprised of multiple output devices.</p>
			<a href="/display-walls/fusion-catalyst" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<a href="/display-walls/pixelnet"><img src="/resources/static/images/display-walls/pixelnet_hero-1.jpg" alt=""></a>
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline"><a href="/display-walls/pixelnet">PixelNet</a></h3>
			<p class="lead_text--paragraph">Create a network of input and output nodes to show information sources on any display, such as a window on a single display, or a window spanning multiple displays in a display wall.</p>
			<a href="/display-walls/pixelnet" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<a href="/display-walls/streamcenter"><img src="/resources/static/images/display-walls/BoM_Jupiter_Meeting_Room_1.jpg" alt=""></a>
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline"><a href="/display-walls/streamcenter">StreamCenter</a></h3>
			<p class="lead_text--paragraph">Decode multiple video streams, including standard and high definition IP streams from cameras, encoders, NVRs, and PCs.</p>
			<a href="/display-walls/streamcenter" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<a href="/display-walls/vizionplus-ii"><img src="/resources/static/images/display-walls/169263611.jpg" alt=""></a>
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline"><a href="/display-walls/vizionplus-ii">VizionPlus II</a></h3>
			<p class="lead_text--paragraph">US military installations worldwide use VizionPlus II to run mission-critical apps, access data through the network, engage the information, and collaborate on a wall-sized desktop.</p>
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
