<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '"/>' . PHP_EOL;
?>

<title>InFocus | Jupiter Systems</title>
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
	<div class="hero_row hero_row--secondary hero-row--jupiter transparent-border-left-125-orange transparent-border-right-38-green">
		<div class="color_stripe_column">
			<div class="white color_stripe hide-for-small-only"></div>
		</div>
		<div class="row">
			<div class="small-12 medium-10 medium-offset-2 large-7 large-offset-5 columns">
				<h2 class="lead_text--headline text--white">Jupiter Systems is now part of InFocus Corporation</h2>
				<a href="/about#overview" class="button button--primary">About Infocus</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="small-12 medium-10 medium-offset-1 columns text-center">
			<h3 class="lead_text--secondary_headline">Same great products, plus more</h3>
      <br/>
			<h5>The combination of InFocus and Jupiter creates a company that can offer a more complete solution than anyone has in the market. We think it's a winning combination you'll love.</h5>
		</div>
	</div>

  <br><br>
  <div class="row text_module_a">
      <div class="small-12 large-4 columns text-center">
          <h4 class="text--gray">Learn more about InFocus' Jupiter line of products</h4>
          <p class="lead_text--paragraph">
              Find information about the entire line of Jupiter products at the links below:
          </p>
          <br>
          <a href="http://www.jupiter.com/solutions/canvas" class="text_module_link">Canvas</a>
          <br>
          <a href="http://www.jupiter.com/solutions/canvas-crs-4k" class="text_module_link">Canvas CRS 4k</a>
          <br>
          <a href="http://www.jupiter.com/solutions/canvas-touch" class="text_module_link">Canvas Touch</a>
          <br>
          <a href="/conx-wall-exec" class="text_module_link">ConX Exec and ConX Wall</a>
          <br>
          <a href="http://www.jupiter.com/solutions/fusion-catalyst" class="text_module_link">Fusion Catalyst</a>
          <br>
          <a href="http://www.jupiter.com/solutions/pixelnet" class="text_module_link">Pixelnet</a>
          <br>
          <a href="http://www.jupiter.com/solutions/streamcenter" class="text_module_link">StreamCenter</a>
          <br>
          <a href="http://www.jupiter.com/solutions/vizionplus-ii" class="text_module_link">VizionPlus II</a>
      </div>
      <div class="small-12 large-4 columns text-center">
          <h4 class="text--gray">The best training and expert support in the industry</h4>
          <p class="lead_text--paragraph">
              The superior support you've come to expect is still just a call or click away:
          </p>
          <br>
          <a href="http://www.jupiter.com/support/contact" class="text_module_link">Contact Support</a>
          <br>
          <a href="http://www.jupiter.com/support/jupiter-care" class="text_module_link">Jupiter Care</a>
          <br>
          <a href="http://www.jupiter.com/support/rma/intro" class="text_module_link">RMA</a>
          <br>
          <a href="http://www.jupiter.com/support/training/intro" class="text_module_link">Training</a>
          <br>
          <a href="http://www.jupiter.com/support/faq/general" class="text_module_link">FAQ</a>
      </div>
      <div class="small-12 large-4 columns text-center">
          <h4 class="text--gray"><br>We're here for you</h4>
          <p class="lead_text--paragraph">
              If you haven't found what you need, please call us at 877-388-8360
          </p>
          <br>
          <a href="http://www.jupiter.com/about/contact" class="text_module_link">Email Us</a>
      </div>
    </div>

    <div class="row collage collage--jupiter" data-equalizer data-equalize-on="medium">
      <div class="small-12 medium-7 columns" data-equalizer-watch>
        <img src="/resources/static/images/jupiter/jupiter-collage-a.jpg" alt="">
        <img src="/resources/static/images/jupiter/jupiter-collage-e.jpg" alt="">
      </div>
      <div class="small-12 medium-5 columns" data-equalizer-watch>
        <img src="/resources/static/images/jupiter/jupiter-collage-b.jpg" alt="">
        <img src="/resources/static/images/jupiter/jupiter-collage-c.jpg" alt="">
        <img src="/resources/static/images/jupiter/jupiter-collage-d.jpg" alt="">
      </div>
    </div>

    <div class="row"></div>
  	<script>
  	    $(document).foundation();
  	</script>
  	<footer id="site-info" >
  	<?php include($homedir . "/resources/html/footer.html"); ?>
  	</footer>
</body>
</html>
