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
<body class="peripherals_home" style="">
	<?php include($homedir . "/resources/html/mainmenu.html"); ?>
	<div class="hero_row transparent-border-right-40-orange hero-row--peripherals_home">
		<div class="row hero_inner">
			<div class="small-6 medium-5 columns lead_text">
				<h2 class="lead_text--secondary_headline">
                    <img src="/resources/static/images/peripherals/peripherals_icon_temp.png" alt="" />
                    <br><br>
					Peripherals
				</h2>
				<p class="lead_text--paragraph">Ver o eos et accusamus et iusto odio dignissimos ducimus qui blanditis praesent voluptatum. Dolores et quas molestais excepturi sint occaecati cupiditate</p>
			</div>
			<div class="small-3 color_stripe_column">
				<div class="dark_blue color_stripe"></div>
			</div>
		</div>

	</div>
    <br><br>
	<div class="row">
		<div class="small-12 medium-4 columns">
			<img src="/resources/static/images/peripherals/pealcam.png" class="product_shot" alt="">
			<h4 class="lead_text--secondary_headline">PealCam PTZ Camera</h4>
			<p>
                Add the InFocus RealCam pan/tilt/zoom (PTZ) professional-quality HD camera to any PC, including a Mondopad to make your video meetings or events shine.
            </p>
			<a href="#" class="button button--primary">learn more</a>
		</div>
		<div class="small-12 medium-4 columns">
            <img src="/resources/static/images/peripherals/thunder.png" class="product_shot" alt="">
			<h4 class="lead_text--secondary_headline">Thunder Speakerphone</h4>
			<p>
                Have clear conversations even when people are across a large room with the InFocus Thunder speakerphone.
            </p>
			<a href="#" class="button button--primary">learn more</a>
		</div>
		<div class="small-12 medium-4 columns">
            <img src="/resources/static/images/peripherals/mondocenter.png" class="product_shot" alt="">
			<h4 class="lead_text--secondary_headline">MondoCenter Collaboration PC</h4>
			<p>
                Connect an InFocus MondoCenter to any display device to visually present, capture and share ideas with participants in the room and around the world.
            </p>
			<a href="#" class="button button--primary">learn more</a>
		</div>
	</div>
    <hr>
	<div class="row">
		<div class="small-12 medium-4 columns">
            <img src="/resources/static/images/peripherals/liteshow.png" class="product_shot" alt="">
			<h4 class="lead_text--secondary_headline">Liteshow Wireless Presentation Adaptor</h4>
			<p>
                Add the InFocus LiteShow 4 wireless presentation adapter to any projector or other display with a VGA or HDMI input to quickly and easily share data, audio, and HD video over a secure wireless connection.
            </p>
			<a href="#" class="button button--primary">learn more</a>
		</div>
		<div class="small-12 medium-4 columns">
            <img src="/resources/static/images/peripherals/bigconnect.png" class="product_shot" alt="">
			<h4 class="lead_text--secondary_headline">Big Connect Video Calling Software</h4>
			<p>
                InFocus BigConnect video calling software brings faces and ideas together using your Windows device.
            </p>
			<a href="#" class="button button--primary">learn more</a>
		</div>
		<div class="small-12 medium-4 columns">
            <img src="/resources/static/images/peripherals/bignote.png" class="product_shot" alt="">
			<h4 class="lead_text--secondary_headline">BigNote Whiteboarding Software</h4>
			<p>
                Add the BigNote 1.2 whiteboard app to your Windows device and turn it into a powerful interactive whiteboard.
            </p>
			<a href="#" class="button button--primary">learn more</a>
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
