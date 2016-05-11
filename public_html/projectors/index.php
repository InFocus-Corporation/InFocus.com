<?php
$homedir = $_SERVER['DOCUMENT_ROOT'];
$categories = array("ultra-portable","office-classroom","short-throw","large-venue","home-theater");

$catarray = array();
$catarray['ultra-portable']=array('alt'=>'Ultra Portable','url'=>'Mobile-Projectors/b/7448589011');
$catarray['office-classroom']=array('alt'=>'Office/Classroom','url'=>'Office-Classroom-Projectors/b/7288437011');
$catarray['short-throw']=array('alt'=>'Short Throw','url'=>'Short-Throw-Projectors/b/7288438011');
$catarray['large-venue']=array('alt'=>'Large Venue','url'=>'Large-Venue-Projectors/b/7448590011');
$catarray['home-theater']=array('alt'=>'Home Theater','url'=>'Home-Theater-Projectors/b/7920742011');
$catarray['interactive']=array('alt'=>'Interactive','url'=>'Interactive-Projectors/b/7288439011');

if(in_array($_REQUEST['cat'], $categories)){
	$category = $_REQUEST['cat'];
	$mTitle = substr($pageText[$category.'meta'],7,strpos($pageText[$category.'meta'],"</title>")-7);
	$mDesc = substr(
				$pageText[$category.'meta'],
				strpos($pageText[$category.'meta'],'<meta name="description" content="')+34,
				strpos($pageText[$category.'meta']," />")-(strpos($pageText[$category.'meta'],'<meta name="description" content="')+34));
}

if($_REQUEST['content']=='true') {
	require($homedir."/resources/php/connections.php");
	require($homedir."/resources/php/langchk.php");
	require($homedir."/resources/php/transfunc.php");
} else {
	require_once($homedir."/resources/php/infocusscripts.php");
	require_once($homedir."/resources/php/header.php");

	if(!empty($category)) {
		echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '/projectors/' . $category . '"/>' . PHP_EOL;
	} else {
		echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '/projectors/"/>' . PHP_EOL;
	}

	echo $pageText[$category.'meta'] .'
	<link rel="stylesheet" href="/resources/css/vendor/foundation.min.css" />
	<link rel="stylesheet" href="/resources/css/infocus.min.css" />
	<base target="_parent" />
</head>
<body class="proj">';
	include($homedir."/resources/html/mainmenu.html");
}


if($category) { 
	$result = mysqli_query($connection,'SELECT producttext.partnumber, listtitle, description, category FROM producttext WHERE `active` != 0 and `active` IS NOT NULL AND category LIKE "%' . $category . '%" AND lang="' . $lang . '" ORDER BY partnumber');

	?><script id="metaValues">
		var mTitle = '<?=$mTitle?>';
		var mDesc = '<?=$mDesc?>';
	</script>
	<style>
		.title{
			transition:right 1s ease-out;
			webkit-transition:right 1s ease-out;
			moz-transition:right 1s ease-out;
			position:relative;
		}
		#catdesc{
			transition:right 1s ease-out;
			webkit-transition:right 1s ease-out;
			moz-transition:right 1s ease-out;
		}
		#details{
			transition:right 1s ease-out;
			webkit-transition:right 1s ease-out;
			moz-transition:right 1s ease-out;
		}
	</style>
	<div class='content'>
		<div id='category' class='C9' style='overflow:hidden;'>
			<h2 id="cattitle" class="title" style="text-transform:capitalize;"><?= $catarray[$category]['alt'] .' '. translate('Projectors');?></h2>
			<div class="C10 Col_child C5_child" id="catdesc">
				<div class="image-set" style="float:right;"><img src="<?= imagethumb("category-$category-projectors",'520');?>"/></div>
				<div class="info">
					<h4 class="tagline"><?= $pageText[$category . 'tag'];?></h4>
					<div><?= $pageText[$category . 'desc'];?></div>
					<ul class="action-links Col_child" style="padding:1em;text-align:left;">
						<li><a class="btn form-box" href="/resources/forms/projectioncalculator"><?= translate('Projection Calculator');?></a></li>
						<li><a class="btn" href="/product-finder"><?= translate('Product Finder');?></a></li>
					</ul>
				</div>
			</div>
			<a id="categoriesstart"></a>
			<div id="details" class="C10 tabs-wrapper" style="min-height:600px;overflow:hidden;">
				<h6 class="sub-title" id="choosetitle"><?= $pageText['choosecategory'];?></h6>
				<div class="tab-shadow"></div>
				<div id="catlist"><a style="font-size:110%;padding-bottom:5px;" onclick="backUp();">&lt;<?= translate('Back') ?></a>
					<ul class="floatList">
						<?php while($row = mysqli_fetch_array($result)) {
							$subject = $row[0];
							$subject = strtoupper(str_replace('-Series','',$subject));
							$cat = explode(",",str_replace(", ",",",$row[3]));
							?><li class="model">
								 <div class="meta">
									<a href="<?= $cat[0].'/'.$row[0] ?>">
										<section class="stretch-wrap60">
											<div class="">
												<img src="<?= imagethumb($subject, '132') ?>" alt="InFocus <?= $row[0].' Projector' ?>" />
											</div>
										</section>
										<span class="title"><?= $row[1] ?></span>
									</a>
									<div class="description"><?= $row[2] ?></div>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>

<?php } else { ?>

	<div class="hero_row transparent-border-right-40-orange hero-row--projectors">
		<div class="row hero_inner">
			<div class="small-6 medium-5 columns lead_text">
				<h2 class="lead_text--secondary_headline">
					<?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/resources/static/images/svg/icon-projectors.svg'); ?>
					Projectors
				</h2>
				<p class="lead_text--paragraph">Ver o eos accusamus et iusto odio dignissimos ducimus qui blanditis praesent volumptatum. Dolores et quas molestais excepturi sint occaecati cupiditate.</p>
			</div>
			<div class="small-3 color_stripe_column">
				<div class="dark_blue color_stripe"></div>
				<div class="white color_stripe"></div>
			</div>
		</div>

	</div>
	<div class="row product_module">
		<div class="small-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/projectors/InFocus-IN1110A-IN1112A-Front-with-Hand-300dpi-CMYK.jpg" alt="">
		</div>
		<div class="small-4 columns product_text">
			<h3 class="lead_text--secondary_headline">Ultra Portable Projectors</h3>
			<p class="lead_text--paragraph">You're on the move. Your taste calls for exceptional, but your budget calls for frugal. You'll find the right mobile projector here.</p>
			<a href="/projectors/ultra-portable" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/projectors/InFocus-Lifestyle-IN118HDx-96dpi-RGB.jpg" alt="">
		</div>
		<div class="small-4 columns product_text">
			<h3 class="lead_text--secondary_headline">Office/Classroom Projectors</h3>
			<p class="lead_text--paragraph">Office and classroom projectors with wireless and networking, broad connectivity, and prices your budget will love.</p>
			<a href="/projectors/office-classroom" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/projectors/GettyImages-508065611.jpg" alt="">
		</div>
		<div class="small-4 columns product_text">
			<h3 class="lead_text--secondary_headline">Short Throw Projectors</h3>
			<p class="lead_text--paragraph">Get a big image from a short distance and reduce shadows with a low-cost, high-quality short throw projector.</p>
			<a href="/projectors/short-throw" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/projectors/GettyImages-172209295.jpg" alt="">
		</div>
		<div class="small-4 columns product_text">
			<h3 class="lead_text--secondary_headline">Large Venue Projectors</h3>
			<p class="lead_text--paragraph">InFocus leads the way with HD color performance, installation flexibility, and dynamic design for demanding installations.</p>
			<a href="/projectors/large-venue" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row product_module">
		<div class="small-8 columns color_stripe_column">
			<div class="white color_stripe"></div>
			<img src="/resources/static/images/projectors/GettyImages-507832233.jpg" alt="">
		</div>
		<div class="small-4 columns product_text">
			<h3 class="lead_text--secondary_headline">Home Theater Projectors</h3>
			<p class="lead_text--paragraph">Bring home the cinematic experience with a 1080p projector from the legend in digital projection.</p>
			<a href="/projectors/home-theater" class="button button--primary">learn more</a>
		</div>
	</div>
<?php }

if($_REQUEST['content']!='true') { ?>

	<script>
		$(document).foundation();
	</script>
	<footer id="site-info" >
	<?php include($homedir . "/resources/html/footer.html"); ?>
	</footer>
</body>
</html>
<?php }