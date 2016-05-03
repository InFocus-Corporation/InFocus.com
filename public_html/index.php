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
<body class="" style="">
	<?php include($homedir . "/resources/html/mainmenu.html"); ?>

	<div class="hero_row">
		<div class="row">
			<div class="small-12 medium-5 columns lead_text">
				<h2 class="lead_text--headline">Focus on what matters</h2>
				<p class="lead_text--paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lea commodo consequat. Duis aute irure dolor in reprehenderit in v fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
			</div>
			<div class="dark_blue color_stripe"></div>
			<div class="light_blue color_stripe"></div>
		</div>

	</div>
	<div class="row">
		<div class="small-12 medium-10 medium-offset-1 columns text-center">
			<h3 class="lead_text--secondary_headline">Introductory Brand Handshake</h3>
			<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lea commodo consequat. Duis aute irure dolor in reprehenderit in v fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </h5>
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns">
			<div class="vertical_accordian">
				<div class="vertical_accordian--slide" id="slide3">
					<div class="vertical_accordian--slide--background">
					</div>
					<div class="vertical_accordian--slide--content">
						<div class="module--tag">
							<span>for public sector</span>
						</div>
						<a href="#slide3">
							<h2>Lorem ipsum dolor sit amet.</h2>
							<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur similique deleniti temporibus dolorum facere maxime, officiis, voluptatem quasi minus accusamus, voluptates blanditiis quaerat cupiditate. Modi consequatur, magni! Explicabo, commodi, nisi!</h5>
						</a>
						<div class="module--tag module--tag--bottom">
							<span>slide cta goes here</span>
						</div>
					</div>
				</div>
				<div class="vertical_accordian--slide" id="slide2">
					<div class="vertical_accordian--slide--background">
					</div>
					<div class="vertical_accordian--slide--content">
						<div class="module--tag">
							<span>for education</span>
						</div>
						<a href="#slide2">
							<h2>Lorem ipsum dolor sit amet.</h2>
							<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur similique deleniti temporibus dolorum facere maxime, officiis, voluptatem quasi minus accusamus, voluptates blanditiis quaerat cupiditate. Modi consequatur, magni! Explicabo, commodi, nisi!</h5>
						</a>
						<div class="module--tag module--tag--bottom">
							<span>slide cta goes here</span>
						</div>
					</div>
				</div>
				<div class="vertical_accordian--slide" id="slide1">
					<div class="vertical_accordian--slide--background">
					</div>
					<div class="vertical_accordian--slide--content">
						<div class="module--tag">
							<span>for business</span>
						</div>
						<a href="#slide1">
							<h2>Lorem ipsum dolor sit amet.</h2>
							<h5>Lorem ihsum dolor sit amet, consectetur adipisicing elit. Pariatur similique deleniti temporibus dolorum facere maxime, officiis, voluptatem quasi minus accusamus, voluptates blanditiis quaerat cupiditate. Modi consequatur, magni! Explicabo, commodi, nisi!</h5>
						</a>
						<div class="module--tag module--tag--bottom">
							<span>slide cta goes here</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="hero_row hero_row--secondary">
		<div class="white color_stripe"></div>
		<div class="row">
			<div class="small-12 medium-7 medium-offset-5 columns">
				<h2 class="lead_text--headline">"We have the power to collaborate anytime, anywhere"</h2>
				<h5 class="quote_source">- Jane Matthews Entrepeneur</h5>
				<a href="#TODO" class="button button--primary">watch case study video</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="small-12 medium-7 columns">
			<div class="callout">
				<div class="module--tag">
					<span>latest news</span>
				</div>
				<div class="callout--heading">
					<h3>InFocus Unveils ConX, the New Solution for Enterprise Conferencing &amp; Collaboration</h3>
				</div>
				<div class="callout--copy">
					<h5>The world’s first scalable HD video conferencing and data visualization system combines endh5oints, software, and cloud services to enable easy and powerful connection, collaboration and sharing ideas in real time.</h5>
					<a href="#TODO" class="button button--primary">learn more</a>
				</div>
			</div>
		</div>
		<div class="small-12 medium-5 columns">
			<div class="callout callout--picture">
				<div class="callout--heading callout--heading--picture">
					<img src="http://placehold.it/1311x699" />
				</div>
				<div class="callout--copy">
					<h5>Visit us at InfoComm 2016 Las Vegas Convention Center, June 8-10 Booth N1417</h5>
					<a href="#TODO" class="link link--primary">learn more</a>
				</div>
			</div>
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
