<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>

<title>InFocus | Peripherals</title>
<meta name="description" content="Audio and video quality, and the ability to share your ideas can be the difference between a productive meeting and frustration. Our peripherals can help." />
<meta name="keywords" content="infocus,mondopad,projector,projection,DLP,LCD,LCD display,digital display,visual communications,projector accessories,infocus company,digital technology,projection equipment,monopad, communication, touchscreen" />

<link rel="stylesheet" href="/resources/css/vendor/foundation.min.css" />
<link rel="stylesheet" href="/resources/css/infocus.min.css" />

<?php
if($_GET['edit']=="true"){CMSscript("/resources/overviews/$pn-$lang.src", $pn, $homedir.'/resources/overviews/', 'admin,salespublisher,saleseditor,marketingpublisher,marketingeditor,editor', ".src", "overview", "true", "SavePage","overview");}

?>
</head>
<body class="peripherals_home" style="">
	<?php include($homedir . "/resources/html/mainmenu.html"); ?>
	<div class="hero_row transparent-border-right-40-orange solid-border-left-24-blue hero-row--peripherals_home">
		<div class="row hero_inner">
			<div class="hero_image"><img src="/resources/static/images/peripherals/peripherals_cam.jpg" /></div>
			<div class="small-6 medium-5 columns lead_text">
				<h2 class="lead_text--secondary_headline">
                    <img src="/resources/static/images/peripherals/peripherals_icon_temp.png" alt="" />
                    <br><br>
					Peripherals
				</h2>
				<p class="lead_text--paragraph">Audio and video quality, and the ability to share your ideas can be the difference between a productive meeting and frustration. Our peripherals can help. And they'll work with the technology you already use.</p>
			</div>
			<div class="small-3 color_stripe_column">
				<div class="dark_blue color_stripe"></div>
				<div class="white color_stripe"></div>
			</div>
		</div>

	</div>
    <br><br>
	<div class="row">
		<div class="small-12 medium-4 columns">
			<a href="/peripherals/INA-PTZ-3"><img src="/resources/static/images/peripherals/realcam.jpg" class="product_shot" alt="" style="max-height: 252px;"></a>
			<h4 class="lead_text--secondary_headline"><a href="/peripherals/INA-PTZ-3">RealCam PTZ Camera</a></h4>
			<p>Add a RealCam pan/tilt/zoom (PTZ) professional-quality HD camera to any PC, including a Mondopad, to make your video meetings or events shine.</p>
			<a href="/peripherals/INA-PTZ-3" class="button button--primary">learn more</a>
		</div>
		<div class="small-12 medium-4 columns">
      <a href="/peripherals/INA-TH150"><img src="/resources/static/images/peripherals/thunder.png" class="product_shot" alt=""></a>
			<h4 class="lead_text--secondary_headline"><a href="/peripherals/INA-TH150">Thunder Speakerphone</a></h4>
			<p>Have clear conversations even when people are across a large room with the Thunder speakerphone connected to your PC, phone or Mondopad.</p>
			<a href="/peripherals/INA-TH150" class="button button--primary">learn more</a>
		</div>
		<div class="small-12 medium-4 columns">
      <a href="/peripherals/INF-MCENTER2"><img src="/resources/static/images/peripherals/mondocenter.png" class="product_shot" alt=""></a>
			<h4 class="lead_text--secondary_headline"><a href="/peripherals/INF-MCENTER2">MondoCenter Collaboration PC</a></h4>
			<p>Connect a MondoCenter to any display device to visually present, capture and share ideas with participants in the room and around the world.</p>
			<a href="/peripherals/INF-MCENTER2" class="button button--primary">learn more</a>
		</div>
	</div>
    <hr>
	<div class="row">
		<div class="small-12 medium-4 columns">
      <a href="/peripherals/INLITESHOW4"><img src="/resources/static/images/peripherals/liteshow.png" class="product_shot" alt=""></a>
			<h4 class="lead_text--secondary_headline"><a href="/peripherals/INLITESHOW4">LiteShow Wireless Presentation Adapter</a></h4>
			<p>Add to any projector or other display with a VGA or HDMI input to share data, audio, and HD video over a secure wireless connection.</p>
			<a href="/peripherals/INLITESHOW4" class="button button--primary">learn more</a>
		</div>
		<div class="small-12 medium-4 columns">
      <a href="/accessories/software/INS-BCONNECT"><img src="/resources/static/images/peripherals/bigconnect.jpg" class="product_shot" alt="" style="height: 252px;"></a>
			<h4 class="lead_text--secondary_headline"><a href="/accessories/software/INS-BCONNECT">BigConnect Video Calling Software</a></h4>
			<p>Bring faces and data together using your Windows device with BigConnect video calling software.</p>
			<a href="/accessories/software/INS-BCONNECT" class="button button--primary">learn more</a>
		</div>
		<div class="small-12 medium-4 columns">
      <a href="/peripherals/INS-BIGNOTE"><img src="/resources/static/images/peripherals/bignote.png" class="product_shot" alt=""></a>
			<h4 class="lead_text--secondary_headline"><a href="/peripherals/INS-BIGNOTE">BigNote Whiteboarding Software</a></h4>
			<p>Add the BigNote whiteboard app to your Windows device and turn it into a powerful interactive whiteboard.</p>
			<a href="/peripherals/INS-BIGNOTE" class="button button--primary">learn more</a>
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
