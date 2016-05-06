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
	<div class="hero_row transparent-border-right-30-green hero-row--homepage">
		<div class="row">
			<div class="small-11 medium-7 large-5 columns lead_text">
				<h2 class="lead_text--headline">A better way to work</h2>
				<p class="lead_text--paragraph">In a perfect world, every meeting is productive and every presentation engages the audience. We make the world a more perfect place.</p>
			</div>
			<div class="small-1 medium-3 color_stripe_column">
				<div class="dark_blue color_stripe"></div>
				<div class="white color_stripe hide-for-small-only"></div>
			</div>
		</div>

	</div>
	<div class="row">
		<div class="small-12 medium-10 medium-offset-1 columns text-center">
			<h3 class="lead_text--secondary_headline">Your work is important</h3>
			<h5>Whether you’re a schoolteacher or a CEO, a firefighter or a professor, people depend on you every day. At InFocus, we provide the tools you need to achieve your goals. Our innovative display, projection, and conferencing solutions open up new possibilities for sharing information and working together efficiently and effectively.</h5>
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns">
			<div class="vertical_accordian">
				<a class="anchor" id="public"></a>
				<div class="vertical_accordian--slide" id="slide3">
					<div class="vertical_accordian--slide--background">
					</div>
					<div class="vertical_accordian--slide--content">
						<div class="module--tag">
							<span>For Public Sector</span>
						</div>
						<a href="#public">
							<h2>Lorem ipsum dolor sit amet.</h2>
							<h5>Our visualization solutions help emergency, utility, military, and other critical sectors track their operations.</h5>
						</a>
						<div class="module--tag module--tag--bottom">
							<span>slide cta goes here</span>
						</div>
					</div>
				</div>
				<a class="anchor" id="education"></a>
				<div class="vertical_accordian--slide" id="slide2">
					<div class="vertical_accordian--slide--background">
					</div>
					<div class="vertical_accordian--slide--content">
						<div class="module--tag">
							<span>for education</span>
						</div>
						<a href="#education">
							<h2>Lorem ipsum dolor sit amet.</h2>
							<h5>Is it possible to share informations with students in a better, more engaging and powerful way? We think so.</h5>
						</a>
						<div class="module--tag module--tag--bottom">
							<span>slide cta goes here</span>
						</div>
					</div>
				</div>
				<a class="anchor" id="business"></a>
				<div class="vertical_accordian--slide" id="slide1">
					<div class="vertical_accordian--slide--background">
					</div>
					<div class="vertical_accordian--slide--content">
						<div class="module--tag">
							<span>for business</span>
						</div>
						<a href="#business">
							<h2>Lorem ipsum dolor sit amet.</h2>
							<h5>From the cubicle to the command center, our technologies can improve the way people at all levels of your company work.</h5>
						</a>
						<div class="module--tag module--tag--bottom">
							<span>slide cta goes here</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="hero_row hero_row--secondary transparent-border-left-60-orange transparent-border-right-38-green">
		<div class="color_stripe_column">
			<div class="white color_stripe hide-for-small-only"></div>
		</div>
		<div class="row">
			<div class="small-12 medium-10 medium-offset-2 large-7 large-offset-5 columns">
				<h2 class="lead_text--headline">"We have the power to collaborate anytime, anywhere"</h2>
				<h5 class="quote_source">- Jane Matthews Entrepreneur</h5>
				<a href="#TODO" class="button button--primary">watch case study video</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="small-12 medium-7 columns">
			<?php $latest_news = mysqli_fetch_array(mysqli_query($connection, 'SELECT id, title, teaser FROM articles WHERE postdate<NOW() AND lang="'.$lang.'" ORDER BY postdate DESC')); ?>
			<div class="callout">
				<div class="module--tag">
					<span>latest news</span>
				</div>
				<div class="callout--heading">
					<h3><?= $latest_news['title'] ?></h3>
				</div>
				<div class="callout--copy">
					<h5><?= $latest_news['teaser'] ?></h5>
					<a href="/articles?<?= $latest_news['id'] ?>" class="button button--primary">learn more</a>
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
