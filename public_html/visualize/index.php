<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>
<title>InFocus | Visualize</title>
<meta name="description" content="Video tells a story. Multiple, stunningly-detailed video streams together with data streams reveal the whole story, effectively engaging your teams for a faster, more effective response." />
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
        var newMargin = featureTextHeight + textMargin/2;
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
            <div class="hero_image visualize"><img src="/resources/static/images/visualize/visualize-hero-a.jpg" /></div>
            <div class="color_stripe_column">
                <div class="dark_blue color_stripe"></div>
                <div class="white color_stripe"></div>
            </div>
						<div class="small-6 small-offset-6 columns lead_text">
                <div class="module--tag">
                  <span>Visualize</span>
                </div>
								<h2 class="lead_text--secondary_headline">
									See everything.<br/> Work anywhere.
								</h2>
								<p class="lead_text--paragraph">Video tells a story. Multiple stunningly-detailed video streams, together with data streams, reveal the whole story, effectively engaging your teams for faster, more effective response.</p>
						</div>
        </div>
	</div>
    <!-- END HEADER MODULE C -->
    <!-- MULTICOLUMN TEXT MODULE -->
    <div class="row multicol_icon_text_module">
        <div class="small-12 large-4 columns text-center three_column_module">
            <img class="svg" src="/resources/static/images/svg/visualize-instant.svg" alt="Visualize" />
            <p class="lead_text--paragraph">
				<strong>Instant connections</strong><br/>
              	View a display wall from your computer, tablet or smartphone so you can stay connected to multiple information sources affecting the situation at hand from wherever you are.
            </p>
            <a href="/collaborative-visualization/canvas" class="text_module_link">Learn About Jupiter Canvas</a>
        </div>
        <div class="small-12 large-4 columns text-center three_column_module">
              <img class="svg" src="/resources/static/images/svg/visualize-flexible.svg" alt="Visualize" />
            <p class="lead_text--paragraph">
				<strong>Flexible and secure</strong><br/>
				Scale up or re-configure your control wall or video stream displays with no loss of functionality. Object-level security keeps your data and access points safe.
            </p>
            <a href="/collaborative-visualization/canvas" class="text_module_link">Learn About Jupiter Canvas</a><br/>
            <a href="/collaborative-visualization/fusion-catalyst" class="text_module_link">Learn About Jupiter Fusion Catalyst</a>
        </div>
        <div class="small-12 large-4 columns text-center three_column_module">
            <img class="svg" src="/resources/static/images/svg/visualize-insight.svg" alt="Visualize" />
            <p class="lead_text--paragraph">
				<strong>Superb insight, great performance</strong><br/>
				Waiting can slow decision response. Low resolution casts uncertainty when detail matters. Collaborate with 4K-quality sources in real time to get ahead of the competition.
            </p>
            <a href="/collaborative-visualization/canvas-crs4k" class="text_module_link">Learn About Jupiter Canvas CRS-4K</a>
        </div>
    </div>
    <!-- END MULTICOLUMN TEXT MODULE -->
    <!-- FEATURE MODULE B -->
    <div class="row feature_module_b feature_module_b--visualize">
        <div class="small-12 columns hero_inner">
            <div class="module_image"></div>
            <div class="feature_text text-center">
                <h2 class="lead_text--secondary_headline">Engage every corner of<br>your global enterprise</h2>
    			<p class="lead_text--paragraph">Make well-informed decisions faster when your teams understand and share a common operating picture consisting of real-time video and data. </p>
                <div class="feature_links">
                    <a href="http://www.infocus.com/videos?kjVCe1-mZ9g" class="feature_link">Watch Video</a><br>
                </div>
            </div>
        </div>
    </div>
    <!-- END FEATURE MODULE B -->
	<!-- FEATURE MODULE A -->
	<div class="row feature_module_a feature_module_a--visualize">
		<div class="small-6 columns feature_text">
			<h3 class="lead_text--secondary_headline">Powering command and control </h3>
			<p class="lead_text--paragraph">Command and control operations that share real-time video and data bi-directionally with their first response and field teams save lives. Teams can share and annotate on live video streams, communicating and collaborating as events unfold.</p>
			<div class="feature_links">
					<a href="http://www.avnetwork.com/av-technology/0002/crime-on-display/84800" class="feature_link">Read Los Angeles Police Department Case Study</a>
			</div>
		</div>
		<div class="small-6 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<div class="light_blue color_stripe float-right"></div>
		</div>
	</div>
	<!-- END FEATURE MODULE A -->
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

		<script>
		    $(document).foundation();
		</script>
		<footer id="site-info" >
		<?php include($homedir . "/resources/html/footer.html"); ?>
		</footer>
</body>
</html>
