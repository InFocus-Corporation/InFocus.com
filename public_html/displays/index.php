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
	<div class="hero_row transparent-border-right-40-orange hero-row--touchscreens">
		<div class="row hero_inner">
			<div class="small-6 medium-5 columns lead_text">
				<h2 class="lead_text--secondary_headline">
					<?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/resources/static/images/svg/icon-touchscreens.svg'); ?>
					Touchscreens
				</h2>
				<p class="lead_text--paragraph">Ver o eos accusamus et iusto odio dignissimos ducimus qui blanditis praesent volumptatum. Dolores et quas molestais excepturi sint occaecati cupiditate.</p>
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
			<img src="/resources/static/images/touchscreens/InFocus-Lifestyle-Mondopad-DualScreen-LightOffice-300dpi-CMYK.jpg" alt="">
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline">Mondopad</h3>
			<p class="lead_text--paragraph">Work better together with Mondopad, the smart and easy touchscreen system for video conferencing, whiteboarding, data sharing and more.</p>
			<a href="/displays/MONDOPAD-SERIES" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="../resources/static/images/touchscreens/InFocus-Lifestyle-JTouch-K12-MuscleDiagram-300dpi-CMYK.jpg" alt="">
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline">JTouch</h3>
			<p class="lead_text--paragraph">Connect the InFocus JTouch touchscreen display to your notebook to create a bright, colorful touch experience that engages audiences in classrooms and beyond.</p>
			<a href="/displays/JTOUCH-Series" class="button button--primary">learn more</a>
		</div>
	</div>
	
	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/touchscreens/InFocus-DigiEasel-Business-Presentation.jpg" alt="">
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline">DigiEasel</h3>
			<p class="lead_text--paragraph">Draw, write, and capture notes or share your device’s screen on a professional, high-tech interactive touch display that's affordable, fun to use and impressive to visitors.</p>
			<a href="/displays/DigiEasel-Series" class="button button--primary">learn more</a>
		</div>
	</div>
	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/touchscreens/InFocus-Lifestyle-QTablet-Construction-300dpi-CMYK.jpg" alt="">
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline">QTablet</h3>
			<p class="lead_text--paragraph">InFocus Q Tablets have the power and features to be productive at work or school and entertained at home – all at great low prices.</p>
			<a href="/displays/Q-Tablet-Series" class="button button--primary">learn more</a>
		</div>
	</div>
	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/touchscreens/InFocus-INF5711-Win8-Front.jpg" alt="">
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline">BigTouch</h3>
			<p class="lead_text--paragraph">Windows 8 combines the fun of a tablet with the productivity of a PC, and the InFocus BigTouch amplifies that beautiful, fast and fluid touch experience for your shared work space.</p>
			<a href="/displays/BIGTOUCH-Series" class="button button--primary">learn more</a>
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
