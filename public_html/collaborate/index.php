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
        <div class="row hero_inner_c">
            <div class="hero_image"><img src="/resources/static/images/collaborate/collaborate-hero-a.jpg" /></div>
            <div class="color_stripe_column">
                <div class="dark_blue color_stripe"></div>
                <div class="white color_stripe"></div>
            </div>
			<div class="small-6 small-offset-6 columns lead_text">
                <div class="module--tag">
                  <span>Connect & Collaborate</span>
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
        <div class="small-11 small-offset-1 medium-8 medium-offset-2 columns text-center lead_text">
            <h1 class="lead_text--headline">Seeing is believing</h1>
            <p class="lead_text--paragraph">
                Communicating with video and data provides so many benefits – better understanding, less cost, and more – that you’ll never want to call without it.
            </p>
            <p class="lead_text--paragraph">
							<a href="/peripherals/ConX-Series#videos" class="text_module_link">ConX Video Communication Story</a>
						</p>
        </div>
    </div>
    <div class="row multicolumn_text_module">
        <div class="small-12 large-4 columns text-center">
            <img class="svg" src="/resources/static/images/svg/collaborate--low-cost.svg" alt="Collaborate" />
            <p class="lead_text--paragraph">
								<strong>Low cost</strong><br/>
              	Start for a minimal cost since video conferencing is hosted in the cloud. Plus, quality is high due to today’s high bandwidth internet services.
								<br/>
		      			<a href="https://www.infocusconx.com/" class="text_module_link">Free Trial of ConX Video Meeting</a>
            </p>
        </div>
        <div class="small-12 large-4 columns text-center">
              <img class="svg" src="/resources/static/images/svg/collaborate--easy-to-use.svg" alt="Collaborate" />
            <p class="lead_text--paragraph">
								<strong>Easy to use</strong><br/>
								Make a video call as easily as you would a voice call, maybe even easier. You can join a video meeting by dialing only 4 digits and entering a 4-digit passcode.
								<br/>
		      			<a href="/peripherals/ConX-Series" class="text_module_link">ConX Video Meeting</a>
            </p>
        </div>
        <div class="small-12 large-4 columns text-center">
            <img class="svg" src="/resources/static/images/svg/collaborate--device-friendly.svg" alt="Collaborate" />
            <p class="lead_text--paragraph">
								<strong>Device-friendly</strong><br/>
								Call anyone with most any device, including with smartphones, tablets, laptops, video phones, and other SIP and H.323 devices – no matter where you are.
								<br/>
		      			<a href="/peripherals/ConX-Series#datasheets" class="text_module_link">Free Video Conferencing White Paper</a>
            </p>
        </div>
    </div>
    <!-- END MULTICOLUMN TEXT MODULE -->
    <!-- FEATURE MODULE B -->
    <div class="row feature_module_b feature_module_b--collaborate">
        <div class="small-12 columns">
            <div class="module_image"></div>
            <div class="feature_text text-center">
                <h2 class="lead_text--secondary_headline">Work better together</h3>
    						<p class="lead_text--paragraph">Get more from your meetings with the award-winning touchscreen solution for presenting, video conferencing, whiteboarding, and more.</p>
                <br><br>
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
							You don’t have time for misunderstandings.
							</br/>Communicate with video and get more done.</h2>
        </div>
        <div class="small-12 large-4 columns text-center">
            <p class="lead_text--paragraph">
              	Have more efficient conversations when you can see faces, body language and objects. Reduce confusion, accelerate understanding, and ease your workload with video.
            </p>
        </div>
        <div class="small-12 large-4 columns text-center">
            <p class="lead_text--paragraph">
								Save time and money on travel when you can have meaningful face-to-face conversations with people located anywhere in the world at any time.
            </p>
        </div>
        <div class="small-12 large-4 columns text-center">
            <p class="lead_text--paragraph">
								Develop stronger relationships and build trust with remote colleagues and partners when you talk face to face. Great for sales and human resources.
            </p>
        </div>
    </div>
    <!-- END MULTICOLUMN TEXT MODULE -->
    <!-- VIDEO MODULE -->
		<div class="hero_row hero-row--video_row hero-row--video_row_collaborate-a">
			<div class="row">
				<div class="small-12 medium-10 medium-offset-1 columns lead_text">
					<h2 class="lead_text--secondary_headline">
						<a href="http://www.infocus.vagrant.internal/videos?aGcZS6K92fk">
							<img src="/resources/static/images/video-icon.png" />
							See how ConX Video Meeting brings teams together
						</a>
					</h2>
				</div>
			</div>
		</div>
    <!-- END VIDEO MODULE -->
    <!-- FEATURE MODULE A -->
	<div class="row feature_module_a feature_module_a--collaborate">
        <div class="small-6 columns feature_text">
			<h2 class="lead_text--secondary_headline">View & interact with all your critical information</h2>
			<p class="lead_text--paragraph">Display all of your data sources and HD video conferencing feeds on up to 96 screens – customized for your board room, CxO office, or training center.</p>
            <div class="feature_links">
                <a href="/projectors/IN2120a-Series" class="feature_link">View ConX Wall</a>
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
        <div class="small-12 large-6 columns promo_module_c collaborate--promo_module_d">
            <div class="module_image">

            </div>
            <div class="module_text">
                <p class="lead_text--headline">
                    Video calling as easy as voice calling
                </p>
            </div>
            <div class="module_links">
                <a href="/product-finder" class="promo_module_link">
                    conx phone
                </a>
            </div>
        </div>
        <div class="small-12 large-6 columns promo_module_c collaborate--promo_module_c">
            <div class="module_image">

            </div>
            <div class="module_text">
                <p class="lead_text--headline">
                    Hear every word.<br/>
										See every face.
                </p>
            </div>
            <div class="module_links">
                <a href="/teach/" class="promo_module_link">
                    Thunder speakerphone
                </a>
                <a href="/collaborate/" class="promo_module_link">
                    realcam ptz camera
                </a>
            </div>
        </div>
    </div>
    <!-- END PROMO MODULES C & D -->

    <!-- VIDEO MODULE -->
		<div class="hero_row hero-row--video_row hero-row--video_row_collaborate-b">
			<div class="row">
				<div class="small-12 medium-10 medium-offset-1 columns lead_text">
					<h2 class="lead_text--secondary_headline">
						<a href="http://www.infocus.vagrant.internal/videos?SNMjzPRQUA8">
							<img src="/resources/static/images/video-icon.png" />
							<span class="single_line_span">See how collaboration is done</span>
						</a>
					</h2>
				</div>
			</div>
		</div>
    <!-- END VIDEO MODULE -->
		<script>
		    $(document).foundation();
		</script>
		<footer id="site-info" >
		<?php include($homedir . "/resources/html/footer.html"); ?>
		</footer>
</body>
</html>
