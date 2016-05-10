<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>
<style>
    .hero_row{
        border-left:
    }
    .no-pad-left {
        padding-left: 0 !important;
    }
    .no-pad-right {
        padding-right: 0!important;
    }
    div.hero_row.hero-row--header_module_c {
        background-image: url('/resources/static/images/teach/InFocus-Lifestyle-JTouch-K12-MuscleDiagram-300dpi-CMYK.jpg');
    }
    .text_module_a a.text_module_link {
        font-weight: 700;
    }
    div.feature_module_a.orange {
        background: url('/resources/static/images/teach/distance-learning-fire.jpg') right -45px top no-repeat;
    }
    div.feature_module_a.blue {
        background: url('/resources/static/images/teach/166273198.jpg') right -45px top no-repeat;
    }
    .feature_module_a.orange .feature_text {
        background-color: rgba(232,119,34,.88);
    }
    .feature_module_a.blue .feature_text {
        background-color: rgba(194,227,238,.88);
        padding-left: 4em;
    }
    .feature_module_a.blue .feature_text .lead_text--secondary_headline, .feature_module_a.blue .feature_text .lead_text--paragraph {
        color: #333F48;
    }
    .feature_module_a .lead_text--secondary_headline {
        font-size: 3.75rem;
        line-height: 1em;
    }
    .feature_module_a.blue .feature_text .lead_text--paragraph {
        margin-bottom: 1.2em;
    }
    .feature_module_a.blue ul li {
        font-size: 1.2rem;
        line-height: 1.7rem;
    }
    .feature_module_a.blue .feature_links {
        left: 4em;
    }
    .feature_module_a .feature_links .feature_link {
        font-size: 14px;
    }
    .feature_module_a.blue .feature_links .feature_link {
        color: #006ba6;
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
    div.promo_modules .promo_module_c .module_image {
        background: url('/resources/static/images/teach/GettyImages-140872375.jpg') no-repeat;
        background-size: cover;
    }
    div.promo_modules .promo_module_d .module_image {
        background: url('/resources/static/images/teach/InFocus-IN1110A-IN1112A-Front-with-Hand-300dpi-CMYK.jpg') no-repeat;
        background-size: cover;
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
            <a href="/displays/INF6501w" class="text_module_link">View $1,999 (US) Whiteboard</a>
        </div>
        <div class="small-12 large-4 columns text-center">
            <p class="lead_text--paragraph">
                Connect devices wirelessly to your display and create a collaborative environment with an interactive whiteboard that also has a built-in web browser.
            </p>
            <br>
            <a href="/displays/JTOUCH-LightCast-SERIES" class="text_module_link">View Wireless Whiteboards</a>
        </div>
        <div class="small-12 large-4 columns text-center">
            <p class="lead_text--paragraph">
                Roll your whiteboard where it's needed most, within the room or between rooms, when you mount the display on a mobile cart.
            </p>
            <br>
            <a href="/accessories/mondopad-accessories" class="text_module_link">View Mobile Cart</a>
        </div>
    </div>
    <!-- END TEXT MODULE A -->
    <br><br><br>
    <!-- FEATURE MODULE JTOUCH -->
    <div class="video_module">
        <div class="row">
            <a href="/displays/JTOUCH-SERIES#videos">
                <h2 class="lead_text--secondary_headline">See how JTouch invigorated<br>a 5th grade classroom</h2>
            </a>
        </div>
    </div>
    <!-- END FEATURE MODULE JTOUCH -->
    <br><br>
    <!-- FEATURE MODULE A -->
    <div class="row feature_module_a orange">
        <div class="small-12 medium-6 columns feature_text">
            <h3 class="lead_text--secondary_headline">Distance<br>learning within<br>reach</h3>
            <p class="lead_text--paragraph">Students, teachers or guest speakers can join your class or training from remote locations with high-quality, reliable and affordable video conferencing solutions.</p>
            <div class="feature_links">
                <a href="/displays/MONDOPAD-SERIES" class="feature_link">View Mondopad Collaboration Displays</a><br>
                <a href="/peripherals/ConX-Series" class="feature_link">View CONX Video Meeting Rooms</a>
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
        <div class="small-12 medium-12 columns no-pad-left no-pad-right">
            <div class="module_image">
                
            </div>
            <div class="feature_text text-center grey">
                <h2 class="lead_text--secondary_headline">Utilize your hardware and software</h2>
    			<p class="lead_text--paragraph">Your IT and finance departments will appreciate that our JTouch Whiteboards and displays work with the computers, tablets and software you already use.</p>
                <br><br>
                <div class="feature_links">
                    <a href="/displays/JTOUCH-Whiteboard-SERIES" class="feature_link">View Whiteboard Displays</a><br>
                </div>

            </div>
        </div>
    </div>
    <!-- END FEATURE MODULE B -->
    <br>
    <!-- PROMO MODULES C & D-->
    <div class="row promo_modules">
        <div class="small-12 large-6 columns promo_module_d">
            <div class="module_image">

            </div>
            <div class="module_text">
                <p class="lead_text--headline">
                    Find the projector that's right for you.
                </p>
                <p class="lead_text--paragraph">
                    Search by your size, ambient light, connectivity, and more.
                </p>
            </div>
            <div class="module_links">
                <a href="/product-finder" class="promo_module_link">
                    Projector Finder
                </a>
            </div>
        </div>
        <div class="small-12 large-6 columns promo_module_c">
            <div class="module_image">

            </div>
            <div class="module_text">
                <p class="lead_text--headline">
                    Increase your brightness and resolution with a new projector for your interactive board.
                </p>
            </div>
            <div class="module_links">
                <a href="/projectors/short-throw" class="promo_module_link first_link">
                    View Short Throw <br>
                    Projectors
                </a>
                <a href="/accessories/mounts/INA-SMRTADPT" class="promo_module_link">
                    View Smart&trade; Mount <br>
                    Adapter
                </a>
            </div>
        </div>
    </div>
    <!-- END PROMO MODULES C & D -->

    <br><br><br><br>
    <!-- FEATURE MODULE A -->
    <div class="row feature_module_a blue">
        <div class="small-12 medium-6 columns feature_text">
            <h3 class="lead_text--secondary_headline">Wireless<br>freedom and<br>flexibility</h3>
            <p class="lead_text--paragraph">Share content wirelessly from computers and <br> tablets to any projector or display with a VGA or <br> HDMI input with our powerful wireless adapter.</p>
            <ul>
                <li>Display up to 4 devices at the same time</li>
                <li>Moderate who can share their screen</li>
                <li>Use your smartphone as a document camera</li>
                <li>Create a secure wireless network access point</li>
            </ul>
            <div class="feature_links">
                <a href="/peripherals/INLITESHOW4" class="feature_link">View Lightshow 4 Wireless Adapter</a><br>
                <a href="http://www.thenerdyteacher.com/2015/03/infocus-liteshow4-makes-collaboration.html" target="blank" class="feature_link">Read How A Teacher Uses Liteshow 4</a>
            </div>
        </div>
        <div class="small-12 medium-6 columns color_stripe_column">
            <div class="light_blue color_stripe float-right"></div>
        </div>
    </div>
    <!-- END FEATURE MODULE A -->
    <br><br><br>
    <!-- TEXT MODULE -->
    <div class="row text_module">
        <div class="small-8 small-offset-2 columns text-center lead_text">
            <h1 class="lead_text--headline">Inspire Education Program</h1>
            <p class="lead_text--paragraph">
                Your school can get special pricing, extended warranties and complimentary training when you buy select touchscreens or projectors from and authorized Inspire Dealer.
            </p>
            <a href="/inspire" class="text_module_link">
                Learn how your school can save
            </a>
        </div>
    </div>
    <!-- END TEXT MODULE -->
    <br><br><br><br>

	<script>
	    $(document).foundation();
	</script>
	<footer id="site-info" >
	<?php include($homedir . "/resources/html/footer.html"); ?>
	</footer>
</body>
</html>
