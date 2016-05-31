<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>

<title>InFocus | Touchscreens</title>
<meta name="description" content="InFocus large collaboration touchscreen displays break down visual communication barrier to transform the conference room into a visual collaboration workspace with cloud-based video conferencing." />
<meta name="keywords" content="infocus,mondopad,projector,projection,DLP,LCD,LCD display,digital display,visual communications,projector accessories,infocus company,digital technology,projection equipment,monopad, communication, touchscreen" />

<link rel="stylesheet" href="/resources/css/vendor/foundation.min.css" />
<link rel="stylesheet" href="/resources/css/infocus.min.css" />

<?php
if($_GET['edit']=="true"){CMSscript("/resources/overviews/$pn-$lang.src", $pn, $homedir.'/resources/overviews/', 'admin,salespublisher,saleseditor,marketingpublisher,marketingeditor,editor', ".src", "overview", "true", "SavePage","overview");}

?>
</head>
<body class="" style="">
	<?php include($homedir . "/resources/html/mainmenu.html"); ?>
	<div class="hero_row transparent-border-right-40-orange solid-border-left-24-blue hero-row--touchscreens">
		<div class="row hero_inner">
			<div class="hero_image"><img src="/resources/static/images/touchscreens/InFocus-Mondopad-INF5720-Lifestyle-Whiteboard-Architect-300dpi-CMYK.jpg" /></div>
			<div class="small-6 medium-5 columns lead_text">
				<h2 class="lead_text--secondary_headline">
					<?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/resources/static/images/svg/icon-touchscreens.svg'); ?>
					Touchscreens
				</h2>
				<p class="lead_text--paragraph">Boost collaboration and engage your audience in the meeting room, the classroom, and beyond with a touchscreen display perfectly suited to your needs.</p>
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
			<a href="/displays/MONDOPAD-SERIES"><img src="/resources/static/images/touchscreens/InFocus-Lifestyle-Mondopad-HallwayMeeting-Arch-Annotation-300dpi-CMYK.jpg" alt=""></a>
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline"><a href="/displays/MONDOPAD-SERIES">Mondopad</a></h3>
			<p class="lead_text--paragraph">Work better together with Mondopad, the smart and easy touchscreen system for video conferencing, whiteboarding, data sharing and more.</p>
			<a href="/displays/MONDOPAD-SERIES" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<a href="/displays/JTOUCH-Series"><img src="../resources/static/images/touchscreens/InFocus-Lifestyle-JTouch-K12-MuscleDiagram-300dpi-CMYK.jpg" alt=""></a>
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline"><a href="/displays/JTOUCH-Series">JTouch</a></h3>
			<p class="lead_text--paragraph">Share your content on a bright, colorful touch experience that engages audiences in the classroom or meeting room with a JTouch flat panel touchscreen display.</p>
			<a href="/displays/JTOUCH-Series" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<a href="/displays/BIGTOUCH-Series"><img src="/resources/static/images/touchscreens/InFocus-Lifestyle-BigTouch-INF8012-Win10-2-300dpi-CMYK.jpg" alt=""></a>
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline"><a href="/displays/BIGTOUCH-Series">BigTouch</a></h3>
			<p class="lead_text--paragraph">Utilize your software to customize this giant touch display with built-in PC for the specific needs of your shared work space.</p>
			<a href="/displays/BIGTOUCH-Series" class="button button--primary">learn more</a>
		</div>
	</div>
	<div class="row product_module">
		<div class="small-7 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<a href="/displays/Q-Tablet-Series"><img src="/resources/static/images/touchscreens/InFocus-Lifestyle-QTablet-Construction-300dpi-CMYK.jpg" alt=""></a>
		</div>
		<div class="small-5 medium-4 columns product_text">
			<h3 class="lead_text--secondary_headline"><a href="/displays/Q-Tablet-Series">QTablet</a></h3>
			<p class="lead_text--paragraph">Be productive at work or school and entertained at home with a powerful, portable and feature-rich QTablet from InFocus.</p>
			<a href="/displays/Q-Tablet-Series" class="button button--primary">learn more</a>
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
