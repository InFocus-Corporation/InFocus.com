<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
?>
<?=$product->canonical ?>
<?=$product->productmeta ?>
<style>
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
			<div class="C10 Col_child C7x3_child">
				<div class="info" style="float:left;">
					<h2 class="name" id="pagetitle" ><?=$product->productText['title'] ?></h2>
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
				<div id="models" class="active" style="position:relative">
					<ul class="C10 panels resultsList">
						<?=$models ?>
					</ul>
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