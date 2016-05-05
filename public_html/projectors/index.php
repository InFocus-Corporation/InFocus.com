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
					<?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/resources/static/images/svg/icon-projectors.svg'); ?>
					Projectors
				</h2>
				<p class="lead_text--paragraph">Ver o eos accusamus et iusto odio dignissimos ducimus qui blanditis praesent volumptatum. Dolores et quas molestais excepturi sint occaecati cupiditate.</p>
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
			<img src="../resources/static/images/InFocus-IN1110A-IN1112A-Front-with-Hand-300dpi-CMYK.jpg" alt="">
		</div>
		<div class="small-12 medium-5 columns">
			<h2 class="lead_text--secondary_headline">Ultra Portable Projectors</h2>
			<p class="lead_text--paragraph">You're on the move. Your taste calls for exceptional, but your budget calls for frugal. You'll find the right mobile projector here.</p>
			<a href="/displays/MONDOPAD-SERIES" class="button button--primary">learn more</a>
		</div>
	</div>
	<div class="row">
		<div class="small-12 medium-7 columns">
			<div class="white color_stripe"></div>
			<img src="../resources/static/images/InFocus-Lifestyle-IN118HDx-96dpi-RGB.jpg" alt="">
		</div>
		<div class="small-12 medium-5 columns">
			<h2 class="lead_text--secondary_headline">Office/Classroom Projectors</h2>
			<p class="lead_text--paragraph">Office and classroom projectors with wireless and networking, broad connectivity, and prices your budget will love.</p>
			<a href="/displays/MONDOPAD-SERIES" class="button button--primary">learn more</a>
		</div>
	</div>
	<div class="row">
		<div class="small-12 medium-7 columns">
			<div class="white color_stripe"></div>
			<img src="../resources/static/images/GettyImages-508065611.jpg" alt="">
		</div>
		<div class="small-12 medium-5 columns">
			<h2 class="lead_text--secondary_headline">Short Throw Projectors</h2>
			<p class="lead_text--paragraph">Get a big image from a short distance and reduce shadows with a low-cost, high-quality short throw projector.</p>
			<a href="/displays/MONDOPAD-SERIES" class="button button--primary">learn more</a>
		</div>
	</div>
	<div class="row">
		<div class="small-12 medium-7 columns">
			<div class="white color_stripe"></div>
			<img src="../resources/static/images/GettyImages-172209295.jpg" alt="">
		</div>
		<div class="small-12 medium-5 columns">
			<h2 class="lead_text--secondary_headline">Large Venue Projectors</h2>
			<p class="lead_text--paragraph">InFocus leads the way with HD color performance, installation flexibility, and dynamic design for demanding installations.</p>
			<a href="/displays/MONDOPAD-SERIES" class="button button--primary">learn more</a>
		</div>
	</div>
	<div class="row">
		<div class="small-12 medium-7 columns">
			<div class="white color_stripe"></div>
			<img src="../resources/static/images/GettyImages-507832233.jpg" alt="">
		</div>
		<div class="small-12 medium-5 columns">
			<h2 class="lead_text--secondary_headline">Home Theater Projectors</h2>
			<p class="lead_text--paragraph">Bring home the cinematic experience with a 1080p projector from the legend in digital projection.</p>
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
