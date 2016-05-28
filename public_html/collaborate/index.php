<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>
<title>InFocus | Connect & Collaborate</title>
<meta name="description" content="Great things can happen when everyone is informed and able to contribute. InFocus improves your ability to work and communicate as a team." />
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
<body class="" style="">
    <?php include($homedir . "/resources/html/mainmenu.html"); ?>
      <!-- HEADER MODULE C -->
    <div class="hero_row hero-row--header_module_c">
        <div class="row hero_inner_c">
            <div class="hero_image connect"><img src="/resources/static/images/collaborate/collaborate-hero-a.jpg" /></div>
            <div class="color_stripe_column">
                <div class="dark_blue color_stripe"></div>
                <div class="white color_stripe"></div>
            </div>
            <div class="small-6 small-offset-6 columns lead_text">
                <div class="module--tag">
                  <span>Connect &amp; Collaborate</span>
                </div>
                <h2 class="lead_text--secondary_headline">
                    Get it done together.
                </h2>
                <p class="lead_text--paragraph">Great things can happen when everyone is informed and able to contribute. InFocus improves your ability to work as a team.</p>
            </div>
        </div>
    </div>
    <!-- END HEADER MODULE C -->
    <!-- MULTICOLUMN TEXT MODULE -->
    <div class="row multicolumn_text_module">
        <div class="small-12 columns text-center lead_text">
            <h1 class="lead_text--headline">Seeing is believing</h1>
            <p class="lead_text--paragraph">
                Communicating with video and data provides so many benefits – better understanding, less cost, and more – that you’ll never want to call without it.
            </p>
            <p class="lead_text--paragraph">
                <a href="http://www.infocus.com/resources/documents/InFocus-ConX-Ecosystem-Datasheet-EN.pdf" class="text_module_link">ConX Video Communication Story</a>
            </p>
        </div>
    </div>
    <div class="row multicol_icon_text_module">
        <div class="small-12 large-4 columns text-center three_column_module">
            <img class="svg" src="/resources/static/images/svg/collaborate--low-cost.svg" alt="Collaborate" />
            <p class="lead_text--headline">
                Low cost
            </p>
            <p class="lead_text--paragraph">
                Start for a minimal cost since video conferencing is hosted in the cloud. Plus, quality is high due to today’s high bandwidth internet services.
            </p>
            <a href="https://www.infocusconx.com/" class="text_module_link">Free Trial of ConX Video Meeting</a>
        </div>
        <div class="small-12 large-4 columns text-center three_column_module">
              <img class="svg" src="/resources/static/images/svg/collaborate--easy-to-use.svg" alt="Collaborate" />
            <p class="lead_text--headline">
                Easy to use
            </p>
            <p class="lead_text--paragraph">
                Make a video call as easily as you would a voice call, maybe even easier. You can join a video meeting by dialing only 4 digits and entering a 4-digit passcode.
            </p>
            <a href="/peripherals/ConX-Series" class="text_module_link">ConX Video Meeting</a>
        </div>
        <div class="small-12 large-4 columns text-center three_column_module">
            <img class="svg" src="/resources/static/images/svg/collaborate--device-friendly.svg" alt="Collaborate" />
            <p class="lead_text--headline">
                Device-friendly
            </p>
            <p class="lead_text--paragraph">
                Call anyone with most any device, including with smartphones, tablets, laptops, video phones, and other SIP and H.323 devices – no matter where you are.
            </p>
            <a href="http://www.infocus.com/resources/documents/ConX/InFocus-Video-Collaboration-WhitePaper.pdf" class="text_module_link">Free Video Conferencing White Paper</a>
        </div>
    </div>
    <!-- END MULTICOLUMN TEXT MODULE -->
    <!-- FEATURE MODULE B -->
    <div class="row feature_module_b feature_module_b--collaborate">
        <div class="small-12 columns hero_inner">
            <div class="module_image"></div>
            <div class="feature_text text-center">
                <h2 class="lead_text--secondary_headline">Work better together</h2>
                <p class="lead_text--paragraph">Get more from your meetings with the award-winning touchscreen solution for presenting, video conferencing, whiteboarding, and more.</p>
                <div class="feature_links">
                    <a href="/displays/MONDOPAD-SERIES" class="feature_link">View Mondopad collaboration displays</a><br>
                </div>
            </div>
        </div>
    </div>
    <!-- END FEATURE MODULE B -->
    <!-- MULTICOLUMN TEXT MODULE -->
    <div class="row multicolumn_text_module">
        <div class="small-12 medium-10 medium-offset-1 columns lead_text">
            <h2 class="lead_text--headline text-center">
            You don’t have time for misunderstandings. Communicate with video and get more done.</h2>
        </div>
        <div class="small-12 large-4 columns text-center three_column_module">
            <p class="lead_text--paragraph">
                <b>Have more efficient meetings</b><br>when you can see faces, body language and objects. Reduce confusion, accelerate understanding, and ease your workload with video.
            </p>
        </div>
        <div class="small-12 large-4 columns text-center three_column_module">
            <p class="lead_text--paragraph">
                <b>Save time and money on travel</b><br>when you can have meaningful face-to-face conversations with people located anywhere in the world at any time.
            </p>
        </div>
        <div class="small-12 large-4 columns text-center three_column_module">
            <p class="lead_text--paragraph">
                <b>Develop stronger relationships</b><br>and build trust with remote colleagues and partners when you talk face to face. Great for sales and human resources.
            </p>
        </div>
    </div>
    <!-- END MULTICOLUMN TEXT MODULE -->
    <!-- VIDEO MODULE -->
    <div class="video_module video_module_collaborate-a">
        <a href="/videos_colorbox?G4RESM7h3KA" class="video-box1">
            <div class="video_link">
                <h2 class="lead_text--secondary_headline">See how ConX Video Meeting<br>brings teams together</h2>
            </div>
        </a>
    </div>
  	<script>
  	$(".video-box1").colorbox({iframe:true, innerWidth:'92%', innerHeight:'92%'});
  	</script>
    <!-- END VIDEO MODULE -->
    <!-- FEATURE MODULE A -->
    <div class="row feature_module_a feature_module_a--collaborate">
        <div class="small-6 columns feature_text">
            <h3 class="lead_text--secondary_headline">View & interact with all your critical information</h3>
            <p class="lead_text--paragraph">Display all of your data sources and HD video conferencing feeds on up to 96 screens – customized for your board room, CxO office, or training center.</p>
            <div class="feature_links">
                <a href="/conx-wall-exec" class="feature_link">View ConX Wall</a>
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
        <div class="small-12 medium-6 columns promo_module_d collaborate--promo_module_d">
            <div class="module_image"></div>
            <div class="module_text">
                <div class="module_text_inner">
                    <p class="lead_text--headline">
                        Video calling as easy as voice calling
                    </p>
                </div>
            </div>
            <div class="module_links">
                <div>
                    <a href="/peripherals/MVP100" class="promo_module_link">
                        conx phone
                    </a>
                </div>
            </div>
        </div>
        <div class="small-12 medium-6 columns promo_module_c collaborate--promo_module_c">
            <div class="module_image"></div>
            <div class="module_text">
                <div class="module_text_inner">
                    <p class="lead_text--headline">
                        Hear every word.<br/>See every face.
                    </p>
                </div>
            </div>
            <div class="module_links">
                <div class="module_link_l">
                    <a href="/peripherals/INA-TH150" class="promo_module_link first_link">
                        Thunder speakerphone
                    </a>
                </div>
                <div class="module_link_r">
                    <a href="/peripherals/INA-PTZ-3" class="promo_module_link">
                        realcam ptz camera
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END PROMO MODULES C & D -->

    <!-- VIDEO MODULE -->
    <div class="video_module video_module_collaborate-b">
        <a href="/videos_colorbox?SNMjzPRQUA8" class="video-box2">
            <div class="video_link">
                <h2 class="lead_text--secondary_headline">See how collaboration is done</h2>
            </div>
        </a>
    </div>
    <!-- END VIDEO MODULE -->
  	<script>
  	$(".video-box2").colorbox({iframe:true, innerWidth:'92%', innerHeight:'92%'});
  	</script>
    <script>
        $(document).foundation();
    </script>
    <footer id="site-info" >
    <?php include($homedir . "/resources/html/footer.html"); ?>
    </footer>
</body>
</html>
