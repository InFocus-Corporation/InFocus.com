<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>

<title>InFocus | Present</title>
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
    <!-- HEADER MODULE C -->
	<div class="hero_row hero-row--header_module_c">
        <div class="color_stripe_column">
            <div class="dark_blue color_stripe"></div>
            <div class="white color_stripe"></div>
        </div>
		<div class="row">
			<div class="small-11 small-offset-1 medium-7 medium-offset-2 large-7 large-offset-5 columns lead_text">
                <div class="module--tag">
                    <span>Present</span>
                </div>
				<h2 class="lead_text--secondary_headline">
					Your best meetings start now.
				</h2>
				<p class="lead_text--paragraph">Whether you're presenting to a handful of colleagues or a full auditorium, InFocus technology will make you shine.</p>
			</div>
		</div>
	</div>
    <!-- END HEADER MODULE C -->
    <br><br>
    <!-- TEXT MODULE A -->
    <div class="row text_module_a">
        <div class="small-12 columns text-center lead_text">
            <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/resources/static/images/present/present-icon.svg'); ?>
            <h1 class="lead_text--headline">Present from any device</h1>
            <p class="lead_text--paragraph">
                You don't have time to mess with technology in a meeting, InFocus lets you, and other in the room share content with flexible wired and wireless options to accommodate any device.
            </p>
        </div>
    </div>
    <div class="row text_module_a">
        <div class="small-12 large-4 columns text-center">
            <p class="lead_text--paragraph">
                Plug in any notebook, tablet or smartphone to an InFocus projector or display via HDMI, VGA, USB and more.
            </p>
            <br>
            <a href="#" class="text_module_link">View Projectors</a>
            <br>
            <a href="#" class="text_module_link">View Touchscreens</a>
        </div>
        <div class="small-12 large-4 columns text-center">
            <p class="lead_text--paragraph">
                Project wirelessly from any device with InFocus wireless-ready projectors or a wireless adapter connected to any projector.
            </p>
            <br>
            <a href="#" class="text_module_link">Wireless Projectors</a>
            <br>
            <a href="#" class="text_module_link">LiteShow 4 Wireless Adapter</a>
        </div>
        <div class="small-12 large-4 columns text-center">
            <p class="lead_text--paragraph">
                Share content on an LCD display in seconds with a wireless-equipped touchscreen display or any LCD display with a wireless adapter.
            </p>
            <br>
            <a href="#" class="text_module_link">Wireless Touchscreens</a>
            <br>
            <a href="#" class="text_module_link">LiteShow 4 Wireless Adapter</a>
        </div>
    </div>
    <!-- END TEXT MODULE A -->
    <br><br><br>
    <!-- FEATURE MODULE B -->
    <div class="row feature_module_b">
        <div class="small-12 columns">
            <div class="module_image">

            </div>
            <div class="feature_text text-center">
                <h2 class="lead_text--secondary_headline">Capture ideas on a digital canvas</h3>
    			<p class="lead_text--paragraph">Take notes, draw and save the work with the same touchscreen device you're presenting on. It's the efficient, economical, and odor-free answer to dry erase.</p>
                <br><br>
                <div class="feature_links">
                    <a href="#" class="feature_link">View Whiteboard Displays</a><br>
                </div>

            </div>
        </div>
    </div>
    <!-- END FEATURE MODULE B -->
    <br><br><br>
    <!-- FEATURE MODULE A -->
	<div class="row feature_module_a ">
        <div class="small-12 medium-6 columns feature_text">
			<h3 class="lead_text--secondary_headline">PC-less presenting</h3>
			<p class="lead_text--paragraph">Load your projector's internal memory with common or shared files and quickly present them without a computer. Or project files directly from a USB thumb drive, which is convenient for guests or when traveling.</p>
            <div class="feature_links">
                <a href="#" class="feature_link">IN2120A Network Projectors</a><br>
                <a href="#" class="feature_link">IN1110 Mobile Projectors</a><br>
                <a href="#" class="feature_link">IN1146 Mobile LED Projector</a>
            </div>
		</div>
		<div class="small-12 medium-6 columns color_stripe_column">
			<div class="white color_stripe"></div>
            <div class="light_blue color_stripe float-right"></div>

		</div>
	</div>
    <!-- END FEATURE MODULE A -->
	<div class="row">
		<div class="small-12 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/video-conferencing/video-conference-conx-wall-conx-exec--ConXWall-Hero-Image-3x4-1B-96dpi-RGB.jpg" alt="">
		</div>
		<div class="small-12 medium-4 columns">
			<h3 class="lead_text--secondary_headline">ConX Wall and ConX Exec</h3>
			<p class="lead_text--paragraph">Instantlybring people together from anywhere in the world to visually collaborate on the same content and do better work in less time.</p>
			<a href="/conx-wall-exec" class="button button--primary">learn more</a>
		</div>
	</div>


	<div class="row">
		<div class="small-12 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/video-conferencing/video-conferencing-conx-phone--ConXWall-Hero-Image-3x4-1B-96dpi-RGB.jpg" alt="">
		</div>
		<div class="small-12 medium-4 columns">
			<h3 class="lead_text--secondary_headline">ConX Phone</h3>
			<p class="lead_text--paragraph">Instantlybring people together from anywhere in the world to visually collaborate on the same content and do better work in less time.</p>
			<a href="/peripherals/MVP100" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row">
		<div class="small-12 columns text-center">
			<h3 class="lead_text--secondary_headline">Video Conferencing Services</h3>
		</div>
	</div>

	<div class="row">
		<div class="small-12 medium-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/video-conferencing/video-conferencing-video-conferencing--InFocus-Lifestyle-MVP100-Construction-96dpi-RGB.jpg" alt="">
		</div>
		<div class="small-12 medium-4 columns">
			<h3 class="lead_text--secondary_headline">ConX Video Meeting</h3>
			<p class="lead_text--paragraph">Instantlybring people together from anywhere in the world to visually collaborate on the same content and do better work in less time.</p>
			<a href="/peripherals/ConX-Series" class="paragraph-link">learn more</a>
		</div>
		<div class="small-12 medium-4 columns">
			<h3 class="lead_text--secondary_headline">121 Video Calling</h3>
			<p class="lead_text--paragraph">Instantlybring people together from anywhere in the world to visually collaborate on the same content and do better work in less time.</p>
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
