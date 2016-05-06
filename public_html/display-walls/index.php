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
	<div class="hero_row transparent-border-right-40-orange hero-row--display_walls">
		<div class="row">
			<div class="small-11 medium-7 large-5 columns lead_text">
				<h2 class="lead_text--secondary_headline">
					<?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/resources/static/images/svg/display-walls.svg'); ?>
					Display Walls
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
		<div class="small-12 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/display-walls/160775957.jpg" alt="">
		</div>
		<div class="small-12 medium-4 columns">
			<h3 class="lead_text--secondary_headline">Canvas</h3>
			<p class="lead_text--paragraph">Canvas enables video, data, applications, and more to be shared with colleagues anywhere, on any device, delivering end-to-end collaboration.</p>
			<a href="/displays/MONDOPAD-SERIES" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row">
		<div class="small-12 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/display-walls/iStock_000049003822XLarge_test1170x500.jpg" alt="">
		</div>
		<div class="small-12 medium-4 columns">
			<h3 class="lead_text--secondary_headline">Canvas CRS-4K</h3>
			<p class="lead_text--paragraph">The Canvas CRS-4K system is a small, quiet box that can be located anywhere in the room. What it enables is enormous. - See more at: http://www.jupiter.com/solutions/canvas-crs-4k#sthash.oxI9wDds.dpuf</p>
			<a href="/conx-wall-exec" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row">
		<div class="small-12 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/display-walls/InFocus-Lifestyle-Mondopad2-ConfRoom-WoodWall-300dpi-CMYK.jpg" alt="">
		</div>
		<div class="small-12 medium-4 columns">
			<h3 class="lead_text--secondary_headline">Canvas Touch</h3>
			<p class="lead_text--paragraph">Canvas Touch extends the power of Canvas’ award-winning visualization solution to conference rooms, huddle spaces, personal offices, or anywhere else groups meet and collaborate.</p>
			<a href="/peripherals/MVP100" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row">
		<div class="small-12 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/display-walls/ConXWall-Hero-Image-3x4-1B-96dpi-RGB.jpg" alt="">
		</div>
		<div class="small-12 medium-4 columns">
			<h3 class="lead_text--secondary_headline">ConX Wall and ConX Exec</h3>
			<p class="lead_text--paragraph">Two highly-configurable solutions — ConX Wall or ConX Exec — perfect for board rooms, conference rooms, huddle rooms, CxO offices, training centers, and almost any other facility.</p>
			<a href="/peripherals/MVP100" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row">
		<div class="small-12 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/display-walls/BoM_Jupiter_People_07.jpg" alt="">
		</div>
		<div class="small-12 medium-4 columns">
			<h3 class="lead_text--secondary_headline">Fusion Catalyst</h3>
			<p class="lead_text--paragraph">Fusion Catalyst™ ushers in a new era of performance and flexibility for display wall processors.</p>
			<a href="/peripherals/MVP100" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row">
		<div class="small-12 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/display-walls/pixelnet_hero-1.jpg" alt="">
		</div>
		<div class="small-12 medium-4 columns">
			<h3 class="lead_text--secondary_headline">PixelNet</h3>
			<p class="lead_text--paragraph">PixelNet adopts Gigabit Ethernet technology to create a network of input and output nodes to drive high resolution, real time video walls. </p>
			<a href="/peripherals/MVP100" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row">
		<div class="small-12 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/display-walls/BoM_Jupiter_Meeting_Room_1.jpg" alt="">
		</div>
		<div class="small-12 medium-4 columns">
			<h3 class="lead_text--secondary_headline">StreamCenter</h3>
			<p class="lead_text--paragraph">StreamCenter™ is the most fully featured multistream decoder anywhere.</p>
			<a href="/peripherals/MVP100" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row">
		<div class="small-12 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/display-walls/169263611.jpg" alt="">
		</div>
		<div class="small-12 medium-4 columns">
			<h3 class="lead_text--secondary_headline">VisionPlus II</h3>
			<p class="lead_text--paragraph">VizionPlus II™ is the newest version of the go-to display wall processor already deployed in thousands of US military installations worldwide.</p>
			<a href="/peripherals/MVP100" class="button button--primary">learn more</a>
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
