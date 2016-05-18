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
		<div class="row hero_inner">
			<div class="hero_image"><img src="/resources/static/images/homepage/homepage-hero-a--wb-bertlitz.jpg" /></div>
			<div class="small-6 medium-5 columns lead_text">
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
			<h2 class="lead_text--secondary_headline text-center">Supporting Your Success</h2>
			<br/>
			<h5>Whether you’re a schoolteacher or a CEO, a firefighter or someone who puts out fires every day at the office, people depend on you. We respect that and know the work you do is important.</h5>
			<br/>
			<h5>InFocus provides the tools you need for success. Our display, projection, and conferencing solutions improve communication and collaboration so you can make an even bigger impact every single day.</h5>
		</div>
	</div>
	<div class="row">
		<div class="small-12 columns">
			<div class="vertical_accordion">
				<a class="anchor" id="public"></a>
				<div class="vertical_accordion--slide" id="slide3">
					<div class="vertical_accordion--slide--background">
					</div>
					<div class="vertical_accordion--slide--content">
						<a href="#public">
							<div class="module--tag">
								<span>For Public Sector</span>
							</div>
							<h2>See everything, control everything</h2>
							<h5>Our video conference and visualization solutions enable emergency, utility, military and other critical operations to monitor and connect any time, all the time, from anywhere.</h5>
						</a>
						<div class="module--tag module--tag--bottom">
							<span><a class="cta" href="/visualize/">Solutions for visualization</a></span><br/>
							<span><a class="cta" href="/display-walls/">Our display walls</a></span>
						</div>
					</div>
				</div>
				<a class="anchor" id="education"></a>
				<div class="vertical_accordion--slide" id="slide2">
					<div class="vertical_accordion--slide--background">
					</div>
					<div class="vertical_accordion--slide--content">
						<a href="#education">
							<div class="module--tag">
								<span>for education</span>
							</div>
							<h2>Elevate the classroom experience</h2>
							<h5>Is it possible to share and inspire students in a better, more engaging and more impactful way? Absolutely.</h5>
						</a>
						<div class="module--tag module--tag--bottom">
								<span><a class="cta" href="/teach/">Solutions to teach & train</a></span><br/>
								<span><a class="cta" href="/inspire">Our Inspire education program</a></span>
						</div>
					</div>
				</div>
				<a class="anchor" id="business"></a>
				<div class="vertical_accordion--slide" id="slide1">
					<div class="vertical_accordion--slide--background">
					</div>
					<div class="vertical_accordion--slide--content">
						<a href="#business">
							<div class="module--tag">
								<span>for business</span>
							</div>
							<h2>Work smarter, better, faster</h2>
							<h5>From the cubicle to the conference room to the command center, our solutions improve the way people work at all levels of your company.</h5>
						</a>
						<div class="module--tag module--tag--bottom">
							<span><a class="cta" href="/present/">Solutions for presentations</a></span><br/>
							<span><a class="cta" href="/collaborate/">Solutions for collaboration</a></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="hero_row hero_row--secondary hero_row--secondary--homepage transparent-border-left-60-orange transparent-border-right-38-green">
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

	<div class="row homepage--callouts" data-equalizer data-equalize-on="medium">
		<div class="small-12 medium-7 columns" data-equalizer-watch>
			<?php $latest_news = mysqli_fetch_array(mysqli_query($connection, 'SELECT id, title, teaser FROM articles WHERE categories LIKE "%news%" AND postdate<NOW() AND lang="'.$lang.'" ORDER BY postdate DESC')); ?>
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
					<a href="/about#news" class="right">View All News</a>
				</div>
			</div>
		</div>
		<div class="small-12 medium-5 columns" data-equalizer-watch>
			<div class="callout callout--picture">
				<!-- <div class="callout--heading callout--heading--picture">
					<img src="http://placehold.it/1311x699" />
				</div> -->
				<div class="callout--copy">
					<h5><a href="http://www.infocommshow.org/">InfoComm</a><br> June 8 - 10, 2016<br> Las Vegas, NV</h5>
					<h5><a href="http://www.ifsec.co.uk/Content/Welcome">IFSEC</a><br> June 21 - 23, 2016<br> London, England</h5>
					<h5><a href="http://conference.iste.org/2016/">ISTE</a><br> June 27 - 29, 2016<br> Denver, CO</h5>
					<a href="/about#events" class="link link--primary">View all events</a>
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
