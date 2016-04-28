<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
$priceBuyNow = $product->priceBuyNow($product->pn);
?>
<?=$product->canonical ?>
<?=$product->productmeta ?>

<style>
	.blue_btn {
  padding: 0.1em 1em;
  max-width: 60%;
  margin-top: 0.3em;
  padding-top: 0.1em;
  padding-bottom: 0.1em;
  margin-bottom: 0em;
  font-size:0.7em;
}
.spec-list {
  text-align: left;
  margin: 1em 1em .4em 1em;
  font-size: 0.7em;
  line-height: 1.2em;
  padding: 8px 0;
  border-top: 1px solid #bababa;
  border-bottom: 1px solid #bababa;
}
.panels > li > div {
  padding: 1em .2em;
  margin: 0em .8em;
}
	.feature-list  ul {
		width:46%;  
		float:left;
	}​
</style>
<script>
	$(document).ready(function() {
		try{$( "#viddropdownbox" ).dropdownbox();}catch(e){}
		$(function() {$(".langlist").menu();});
	});
</script>
</head>
<body class="">
	<?php include($homedir . "/resources/html/mainmenu.html"); //insert menu?>
	<div class="content">
		<div id="family" class="C9">
			<div class="breadcrumb"><ol itemscope itemtype="https://schema.org/BreadcrumbList"><?=$product->breadcrumb ?></ol></div>
			<div class="productheader C10 Col_child C4x6_child">
			<div><h1 class="mysqledit h2" id="pagetitle" style=""  ><?=$product->productText['title'] ?></h1></div>
			<div>
			<ul class="action-links Col_child">
			<li></li>
 		<?=$product->justButtons?>
 		</ul></div></div>
			<div class="C10 Col_child C7x3_child">
				<div class="info" style="float:left;">
					
					<strong class="tagline mysqledit" id="header"><?=$product->productText['header'] ?></strong>
					<div class="mysqledit" id="blurb" ><?=$product->productText['blurb'] ?></div>
					<div id="list" class="feature-list half mysqledit" style="font-size:80%"><?=$list ?></div>
				</div>
				<div class="image-set" style="text-align:center;">
					<image src="<?= imagethumb(str_replace("-Series","",$product->pn) ,'550') ?>"/>
				</div>
			</div>
			<div class="tabs">
				<nav role='navigation' class="C10 transformer-tabs tabs-wrapper">
					<ul>
						<?=$product->productTabs ?>
					</ul>
					<div class="tab-shadow"></div>
				</nav>
<script>$('#modid').hide();</script>		

			<div id="overview" class="active">
			<div id="models" class="active" style="position:relative;top:1.5em;text-align:center;padding-bottom: 1.5em">
			<ul class="C10 panels resultsList">
				<?=$models ?>
			</ul>
			</div>	
				<?=$overview ?>
			</div>	
	
				<div id="specs" style="position:relative">
					<?=$specs ?>
				</div>
				<div id="datasheets">
					<?=$downloads ?>
				</div>
				<div id="accessories">
					<?=$accessories ?>
				</div>
				<div id="worksWith">
					<?=$worksWith ?>
				</div>
				<?=$videos ?>
			</div>
		</div>
		</div>
		<footer id="site-info" >
		<?php include($homedir . "/resources/html/footer.html"); ?>
		</footer>
		</section>
	</div>
</body>
</html>