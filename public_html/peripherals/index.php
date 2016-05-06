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
	<div class="hero_row transparent-border-right-40-orange hero-row--display_walls">
		<div class="row">
			<div class="small-11 medium-7 large-5 columns lead_text">
				<h2 class="lead_text--secondary_headline">
					<?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'].'/resources/static/images/svg/display-walls.svg'); ?>
					Peripherals
				</h2>
				<p class="lead_text--paragraph">Ver o eos et accusamus et iusto odio dignissimos ducimus qui blanditis praesent voluptatum. Dolores et quas molestais excepturi sint occaecati cupiditate</p>
			</div>
			<div class="small-1 medium-3 color_stripe_column">
				<div class="dark_blue color_stripe"></div>
				<div class="white color_stripe"></div>
			</div>
		</div>

	</div>

	<div class="row">
		<div class="small-12 medium-4 columns color_stripe_column">
			<img src="http://placehold.it/750x540" alt="">
			<h4 class="lead_text--secondary_headline">RealCam PTZ Camera</h4>
			<p>Mondopad provides you with ver o eos et accusamus et iusto odio dignissimos ducimus qui blanditis praesentium voluptatum. Dolores et quas molestais excepturi sint occaecati cupiditate.</p>
			<a href="#" class="button button--primary">learn more</a>
		</div>
		<div class="small-12 medium-4 columns color_stripe_column">
			<img src="http://placehold.it/750x540" alt="">
			<h4 class="lead_text--secondary_headline">RealCam PTZ Camera</h4>
			<p>Mondopad provides you with ver o eos et accusamus et iusto odio dignissimos ducimus qui blanditis praesentium voluptatum. Dolores et quas molestais excepturi sint occaecati cupiditate.</p>
			<a href="#" class="button button--primary">learn more</a>
		</div>
		<div class="small-12 medium-4 columns color_stripe_column">
			<img src="http://placehold.it/750x540" alt="">
			<h4 class="lead_text--secondary_headline">RealCam PTZ Camera</h4>
			<p>Mondopad provides you with ver o eos et accusamus et iusto odio dignissimos ducimus qui blanditis praesentium voluptatum. Dolores et quas molestais excepturi sint occaecati cupiditate.</p>
			<a href="#" class="button button--primary">learn more</a>
		</div>
	</div>

	<div class="row">
		<div class="small-12 medium-4 columns color_stripe_column">
			<img src="http://placehold.it/750x540" alt="">
			<h4 class="lead_text--secondary_headline">RealCam PTZ Camera</h4>
			<p>Mondopad provides you with ver o eos et accusamus et iusto odio dignissimos ducimus qui blanditis praesentium voluptatum. Dolores et quas molestais excepturi sint occaecati cupiditate.</p>
			<a href="#" class="button button--primary">learn more</a>
		</div>
		<div class="small-12 medium-4 columns color_stripe_column">
			<img src="http://placehold.it/750x540" alt="">
			<h4 class="lead_text--secondary_headline">RealCam PTZ Camera</h4>
			<p>Mondopad provides you with ver o eos et accusamus et iusto odio dignissimos ducimus qui blanditis praesentium voluptatum. Dolores et quas molestais excepturi sint occaecati cupiditate.</p>
			<a href="#" class="button button--primary">learn more</a>
		</div>
		<div class="small-12 medium-4 columns color_stripe_column">
			<img src="http://placehold.it/750x540" alt="">
			<h4 class="lead_text--secondary_headline">RealCam PTZ Camera</h4>
			<p>Mondopad provides you with ver o eos et accusamus et iusto odio dignissimos ducimus qui blanditis praesentium voluptatum. Dolores et quas molestais excepturi sint occaecati cupiditate.</p>
			<a href="#" class="button button--primary">learn more</a>
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
