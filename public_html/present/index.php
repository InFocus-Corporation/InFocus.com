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

<script>
var moduleBHeight = function() {
    var width = $(window).width();
    var featureModule = $('.feature_module_b');
    var featureTextHeight = featureModule.find('.feature_text').height();
    var featureTextMarginTop = featureModule.find('.feature_text').css('margin-top');

    if (width < 1025) {
        var textMargin = parseInt(featureTextMarginTop);
        var newMargin = featureTextHeight + textMargin/3;
        featureModule.css('margin-bottom', newMargin);
    } else {
        featureModule.css('margin-bottom','');
    }
}

$(function() {
    moduleBHeight();
    $(window).resize(function() {
        moduleBHeight();
    });
});
</script>
</head>
<body id="present_page" class="present_page" style="">
	<?php include($homedir . "/resources/html/mainmenu.html"); ?>

    <!-- HEADER MODULE C -->
	<div class="hero_row hero-row--header_module_c">
        <div class="row hero_inner_c">
            <div class="hero_image present"><img src="/resources/static/images/present/present-hero.jpg" /></div>
            <div class="color_stripe_column">
                <div class="dark_blue color_stripe"></div>
                <div class="white color_stripe"></div>
            </div>
			<div class="small-6 small-offset-6 columns lead_text">
                <div class="module--tag">
                    <span>Present</span>
                </div>
				<h2 class="lead_text--secondary_headline widelight">
					Your best meetings start now.
				</h2>
				<p class="lead_text--paragraph">Whether you're presenting to a handful of colleagues or a full auditorium, InFocus technology will make you shine.</p>
			</div>
        </div>
	</div>
    <!-- END HEADER MODULE C -->

    <!-- MULTICOLUMN TEXT MODULE -->
    <div class="row multicolumn_text_module">
        <div class="small-12 columns text-center lead_text">
            <img src="/resources/static/images/present/present-icon.svg" alt="Present" />
            <h1 class="lead_text--headline widelight">Present from any device</h1>
            <p class="lead_text--paragraph">
                You don't have time to mess with technology in a meeting. InFocus lets you, and anyone in the room, share content with flexible wired and wireless options to accommodate any device.
            </p>
        </div>
    </div>
    <div class="row multicolumn_text_module">
        <div class="small-12 large-4 columns text-center three_column_module">
            <p class="lead_text--paragraph">
                Plug in any notebook, tablet or smartphone to an InFocus projector or display via HDMI, VGA, USB and more. 
            </p>
            <a href="/projectors/" class="text_module_link">View Projectors</a>
            <a href="/displays/" class="text_module_link">View Touchscreens</a>
        </div>
        <div class="small-12 large-4 columns text-center three_column_module">
            <p class="lead_text--paragraph">
                Project wirelessly from any device with InFocus wireless projectors and adapters.
            </p>
            <a href="/wireless-projector-lineup/" class="text_module_link">Wireless Projectors</a>
            <a href="/peripherals/INLITESHOW4" class="text_module_link">LiteShow 4 Wireless Adapter</a>
        </div>
        <div class="small-12 large-4 columns text-center three_column_module">
            <p class="lead_text--paragraph">
                Share content on an LCD display in seconds with an InFocus wireless touch display or any LCD display with a wireless adapter.
            </p>
            <a href="/displays/JTOUCH-LightCast-SERIES" class="text_module_link">Wireless Touchscreens</a>
            <a href="/peripherals/INLITESHOW4" class="text_module_link">LiteShow 4 Wireless Adapter</a>
        </div>
    </div>
    <!-- END MULTICOLUMN TEXT MODULE -->
    <!-- FEATURE MODULE B -->
    <div class="row feature_module_b">
        <div class="small-12 columns hero_inner">
            <div class="module_image"></div>
            <div class="feature_text text-center">
                <h2 class="lead_text--secondary_headline widelight">Capture ideas on a<br>digital canvas</h2>
    			<p class="lead_text--paragraph">Take notes, draw, save and share the work with the same touchscreen you're presenting on. It's the efficient, economical, and odor-free answer to dry erase.</p>
                <div class="feature_links">
                    <a href="/displays/JTOUCH-Series" class="feature_link">View Whiteboard Displays</a><br>
                </div>
            </div>
        </div>
    </div>
    <!-- END FEATURE MODULE B -->

    <!-- MULTICOLUMN ICON AND TEXT MODULE -->
    <div class="row multicol_icon_text_module">
        <div class="small-12 large-4 columns text-center three_column_module">
            <img src="/resources/static/images/present/present-huddle.svg" alt="" class="present-page-icon"/>
            <p class="lead_text--headline">
                Huddle Spaces
            </p>
            <p class="lead_text--paragraph">
                Share and capture vital information with compact short throw projectors or 40" landscape and portrait whiteboard displays.
            </p>
            <a href="/projectors/short-throw" class="text_module_link">Short Throw Projectors</a>
            <br>
            <a href="/displays/DigiEasel-Series" class="text_module_link">DigiEasel Whiteboard Display</a>
        </div>
        <div class="small-12 large-4 columns text-center three_column_module">
            <img src="/resources/static/images/present/present-conference.svg" alt="" class="present-page-icon"/>
            <p class="lead_text--headline">
                Conference Rooms
            </p>
            <p class="lead_text--paragraph">
                Find the ideal display from our broad selection to fit your unique meeting room, budget, and workflow.
            </p>
            <a href="/projectors/office-classroom" class="text_module_link">Office Projectors</a>
            <br>
            <a href="/displays/" class="text_module_link">Touchscreen Displays</a>
        </div>
        <div class="small-12 large-4 columns text-center three_column_module">
            <img src="/resources/static/images/present/present-auditoriums.svg" alt="" class="present-page-icon"/>
            <p class="lead_text--headline">
                Large Venues
            </p>
            <p class="lead_text--paragraph">
                Install these powerfully bright and feature-packed projectors in large rooms that demand the best image quality.
            </p>
            <a href="/projectors/large-venue" class="text_module_link">Large Venue Projectors </a>
        </div>
    </div>
    <!-- END MULTICOLUMN ICON AND TEXT MODULE -->
    <!-- FEATURE MODULE A -->
    <div class="row feature_module_a ">
        <div class="small-6 columns feature_text">
            <h3 class="lead_text--secondary_headline">Device-less presenting</h3>
            <p class="lead_text--paragraph">Load your projector's internal memory with common or shared files and quickly present them without a computer. Or project files directly from a USB thumb drive, which is ideal for guests and travelers.</p>
            <div class="feature_links">
                <a href="/projectors/IN2120a-Series" class="feature_link">IN2120A Network Projectors</a>
                <a href="/projectors/ultra-portable/IN1110-Series" class="feature_link">IN1110 Mobile Projectors</a>
                <a href="/projectors/IN1146" class="feature_link">IN1146 Mobile LED Projector</a>
            </div>
        </div>
        <div class="small-6 columns color_stripe_column">
            <div class="white color_stripe"></div>
            <div class="light_blue color_stripe float-right"></div>
        </div>
    </div>
    <!-- END FEATURE MODULE A -->

    <!-- PROMO MODULES C & D-->
    <div class="row promo_modules">
        <div class="small-12 medium-6 columns promo_module_d">
            <div class="module_image"></div>
            <div class="module_text">
                <div class="module_text_inner">
                    <p class="lead_text--headline">
                        Find the projector that's right for you.
                    </p>
                    <p class="lead_text--paragraph">
                        Search by your room size, ambient light, connectivity, and more.
                    </p>
                </div>
            </div>
            <div class="module_links">
                <div>
                    <a href="/product-finder" class="promo_module_link">
                        Projector Finder
                    </a>
                </div>
            </div>
        </div>
        <div class="small-12 medium-6 columns promo_module_c">
            <div class="module_image"></div>
                <div class="module_text">
                    <div class="module_text_inner">
                        <p class="lead_text--headline">
                            Explore solutions for teachers or video conferencing
                        </p>
                    </div>
                </div>
            <div class="module_links">
                <div class="module_link_l">
                    <a href="/teach/" class="promo_module_link first_link">
                        Teaching &amp; <br>
                        Training Solutions
                    </a>
                </div>
                <div class="module_link_r">
                    <a href="/collaborate/" class="promo_module_link">
                        Collaboration <br>
                        Solutions
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END PROMO MODULES C & D -->
    <!-- TEXT MODULE -->
    <div class="row text_module">
        <div class="small-12 columns text-center lead_text">
            <h1 class="lead_text--headline widelight">Making the meeting room a productive place to be</h1>
            <p class="lead_text--paragraph">
                Sharing your ideas takes courage. Our technology works with you and helps you do your best. Plus, our US-based support team is here to help you, as we have been since we pioneered the digital projector nearly 30 years ago.
            </p>
            <a href="/about" class="text_module_link">
                Learn more about us
            </a>
        </div>
    </div>
    <!-- END TEXT MODULE -->
	<script>
	    $(document).foundation();
	</script>
	<footer id="site-info" >
	<?php include($homedir . "/resources/html/footer.html"); ?>
	</footer>
</body>
</html>
