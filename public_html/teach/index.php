<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>
<style>
    .hero_row{
        border-left:
    }
    div.hero_row.hero-row--header_module_c {
        background-image: url('/resources/static/images/teach/InFocus-Lifestyle-JTouch-K12-MuscleDiagram-300dpi-CMYK.jpg');
    }
    div.feature_module_jtouch {
        position: relative;
        background: url('/resources/static/images/teach/JTouch-classroom.jpg');
        background-size: cover;
        height: 825px;
    }
    div.feature_module_jtouch h2.lead_text--secondary_headline {
        position: absolute;
        top: 50%;
        margin: -70px 2em 0;
        color: #FFF;
        background: url('/resources/static/images/teach/play_button.png') left center no-repeat;
        padding-left: 2em;
    }
    div.feature_module_a {
        background: url('/resources/static/images/teach/distance-learning-fire.jpg') right -45px top no-repeat;
    }
    .feature_module_a .feature_text.orange {
        background-color: rgba(232,119,34,.88);
    }
    .feature_module_a .lead_text--secondary_headline {
        font-size: 3.75rem;
    }
    .feature_module_a .feature_links .feature_link {
        font-size: 14px;
    }
    h4.lead_text--paragraph {
        font-size: 2.3rem;
        font-weight: 300;
        padding: 0 1em;
    }
    div.feature_module_b .module_image {
        background: url('/resources/static/images/teach/InFocus-Lifestyle-JTouch-Whiteboard-Classroom-Molecules-300dpi-CMYK.jpg') no-repeat;
        background-size: cover;
        height: 615px;
    }
    div.feature_module_b .medium-12 {
        padding-left: 0;
        padding-right: 0;
    }
    div.feature_module_b .feature_text.grey {
        padding-top: 30px;
        margin-top: -290px;
        background-color: rgba(63,74,84,.88)      
    }
    div.feature_module_b .feature_links {
        margin-bottom: 35px;
    }
    div.feature_module_b .lead_text--secondary_headline {
        margin-bottom: 1.3rem;
    }
    div.feature_module_b .lead_text--paragraph {
        line-height: 1.4;
    }
    .text_module_a h1.lead_text--headline {
        font-weight: 300;
    }
</style>

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
            <div class="orange color_stripe"></div>
            <div class="white color_stripe"></div>
        </div>
		<div class="row">
			<div class="small-11 small-offset-1 medium-7 medium-offset-2 large-7 large-offset-5 columns lead_text">
                <div class="module--tag">
                    <span>Teach & Train</span>
                </div>
				<h2 class="lead_text--secondary_headline">
					Your students will thank you
				</h2>
				<p class="lead_text--paragraph">Create an engaged classroom or training room with affordable technology that brings out the best in you and your students.</p>
			</div>
		</div>
	</div>
    <!-- END HEADER MODULE C -->
    <br><br>
    <!-- TEXT MODULE A -->
    <div class="row text_module_a">
        <div class="small-12 medium-10 medium-offset-1 columns text-center lead_text">
            <h4 class="lead_text--paragraph">
                See engagement and grades go up when the touch technology your students know and love occupies the front of your classroom.
            </h4>
        </div>
    </div>
    <div class="row text_module_a">
        <div class="small-12 large-4 columns text-center">
            <p class="lead_text--paragraph">
                Engage your students and please the staff of your K-12 school with the most affordable 65" interactive whiteboard display on the market.
            </p>
            <br>
            <a href="#" class="text_module_link">View $1,999 (US) Whiteboard</a>
        </div>
        <div class="small-12 large-4 columns text-center">
            <p class="lead_text--paragraph">
                Connect devices wirelessly to your display and create a collaborative environment with an interactive whiteboard that also has a built-in web browser.
            </p>
            <br>
            <a href="#" class="text_module_link">View Wireless Whiteboards</a>
        </div>
        <div class="small-12 large-4 columns text-center">
            <p class="lead_text--paragraph">
                Roll your whiteboard where it's needed most, within the room or between rooms, when you mount the display on a mobile cart.
            </p>
            <br>
            <a href="#" class="text_module_link">View Mobile Cart</a>
        </div>
    </div>
    <!-- END TEXT MODULE A -->
    <br><br><br>
    <!-- FEATURE MODULE JTOUCH -->
    <div class="feature_module_jtouch">
        <div class="row">
            <h2 class="lead_text--secondary_headline">See how JTouch invigorated<br>a 5th grade classroom</h2>
        </div>
    </div>
    <!-- END FEATURE MODULE JTOUCH -->
    <br><br>
    <!-- FEATURE MODULE A -->
    <div class="row feature_module_a">
        <div class="small-12 medium-6 columns feature_text orange">
            <h3 class="lead_text--secondary_headline">Distance<br>learning within<br>reach</h3>
            <p class="lead_text--paragraph">Students, teachers or guest speakers can join your class or training from remote locations with high-quality, reliable and affordable video conferencing solutions.</p>
            <div class="feature_links">
                <a href="#" class="feature_link">View Mondopad Collaboration Displays</a><br>
                <a href="#" class="feature_link">View CONX Video Meeting Rooms</a>
            </div>
        </div>
        <div class="small-12 medium-6 columns color_stripe_column">
            <div class="white color_stripe"></div>
            <div class="light_blue color_stripe float-right"></div>

        </div>
    </div>
    <!-- END FEATURE MODULE A -->
    <br><br><br>
    <!-- FEATURE MODULE B -->
    <div class="row feature_module_b">
        <div class="small-12 medium-12 columns">
            <div class="module_image">
                
            </div>
            <div class="feature_text text-center grey">
                <h2 class="lead_text--secondary_headline">Utilize your hardware and software</h3>
    			<p class="lead_text--paragraph">Your IT and finance departments will appreciate that our JTouch Whiteboards and displays work with the computers, tablets and software you already use.</p>
                <br><br>
                <div class="feature_links">
                    <a href="#" class="feature_link">View Whiteboard Displays</a><br>
                </div>

            </div>
        </div>
    </div>
    <!-- END FEATURE MODULE B -->

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

    <div class="row text_module_a">
        <div class="small-12 columns text-center lead_text">
            <h1 class="lead_text--headline">Inspire Education Program</h1>
            <p class="lead_text--paragraph">
                See engagement and grades go up when the touch technology your students know and love occupies the front of your classroom.
            </p>
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
