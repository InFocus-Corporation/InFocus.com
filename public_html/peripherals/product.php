<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
$localdir = dirname(__FILE__);
//Check if logged in user in edit mode for WYSIWYG editor
if($_GET['edit']=="true"){CMSscript("/resources/overviews/$pn-$lang.src", $pn, $homedir.'/resources/overviews/', 'admin,editor', ".src", "overview", "true", "SavePage","overview");}
 ?>

 <?=$product->canonical ?>
<?=$product->productmeta ?>

<script>
$(document).ready(function() {
try{$( "#viddropdownbox" ).dropdownbox();}catch(e){}
$(function() {$(".langlist").menu();});
});

</script>

	</head>
	<body>
		<?php include($_SERVER['DOCUMENT_ROOT']. "/resources/html/mainmenu.html"); //insert menu?>
<?php
//Check if logged in user in edit mode, activate WYSIWYG editor
if($_GET['edit']=="true"){CMSHTML("SavePage",'admin,editor');}
?>
		<div class="content">
<div id="product" class="C9">
<div class="breadcrumb"><?=$product->breadcrumb ?></div>
	<div class="productheader C10 Col_child C4x6_child" >
 		<?=$priceBuyNow?>
 		</ul></div>

			<div class="C10 Col_child C5_child">

				<div class="image-set" style="padding-bottom:10px;text-align:center;">
				<image src="<?= imagethumb($pn ,'550') ?>"/>
		<?=$thumbnails?>
    <script>
		$(".group1").colorbox({photo:true, className: "colorclass2"});
	</script>
	</div>
				<div class="info" style="float:left;">
	<strong class="tagline mysqledit" id="header"><?=$product->productText['header'] ?></strong>
	<div class="mysqledit" id="blurb" ><?=$product->productText['blurb'] ?></div>
	<div id="list" class="feature-list mysqledit"><?=$product->productText['list'] ?></div>
				</div>
	</div>
<div class="tabs">
  
  <nav role='navigation' class="C10 transformer-tabs tabs-wrapper">
    <ul>
<?=$product->productTabs ?>
<li><a href="#support">Support</a></li>
   </ul>
	<div class="tab-shadow"></div>
  </nav>
  
		<?=$overview ?>

		<div id="specs" style="position:relative">
		<?=$specs ?>
		</div>
		<?=$reviews ?>
			<?=$videos ?>
		<div id="accessories">
		<?=$accessories ?>
			</div>
		<div id="downloads">
		<?=$downloads ?>
			</div>
		<div id="workswith">
		<?=$worksWith ?>
		</div>
		<div id="support">
<?PHP include($_SERVER['DOCUMENT_ROOT']."/resources/html/support-tab-" . $product->lang . ".html"); ?>
		</div>
		</div>
	</div>
</div>

<div id="processpanel" style="display:none"></div>
				<footer id="site-info" >
				<?php include($_SERVER['DOCUMENT_ROOT']. "/resources/html/footer.html"); ?>
				</footer>
			</section>
		</div>
<script>
	$(".form-box").colorbox({iframe:true, innerWidth:"80%", innerHeight:400});
				$(".colorbox-inline").colorbox({inline:true});
$( "#details" ).tabs();
</script>


</body></html>