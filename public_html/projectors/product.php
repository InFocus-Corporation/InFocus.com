<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
$localdir = dirname(__FILE__);
?>

<?php 
//pull product text data 
getProductText();
//Set Canonical
echo PHP_EOL . '<link rel="canonical" href="http://' .  $_SERVER['SERVER_NAME'] . '/projectors/' . $pn . '"/>' . PHP_EOL;
//Check if logged in user in edit mode for WYSIWYG editor
if($_GET['edit']=="true"){CMSscript("/resources/overviews/$pn-$lang.src", $pn, $homedir.'/resources/overviews/', 'admin,salespublisher,saleseditor,marketingpublisher,marketingeditor,editor', ".src", "overview", "true", "SavePage","overview");}
 ?>
<script>
$(document).ready(function() {
try{$( "#viddropdownbox" ).dropdownbox();}catch(e){}
$(function() {$(".langlist").menu();});
});
</script>
	</head>
	<body>

		<?php include($homedir . "/resources/html/mainmenu.html"); //insert menu?>
<?php
//Legacy function.  Pulls product Series
getProductFileName();
//Check if logged in user in edit mode, activate WYSIWYG editor
if($_GET['edit']=="true"){CMSHTML("SavePage",'admin,salespublisher,saleseditor,marketingpublisher,marketingeditor');}
?>
		<div class="content">
<div id="product" class="C9">
<div class="breadcrumb"><?php echo $breadcrumb;?></div>
				<div class="productheader C10 Col_child C4x6_child" >
 	<?php getProductButtons(); //Product buttons (get a quote, buy now, demo, etc). ?>
			</div>
			<div class="C10 Col_child C5_child">

				<div class="image-set" style="padding-bottom:10px;text-align:center;">
<?php getProductImages(); //Get product images?>
    <script>
		$(".group1").colorbox({photo:true, className: "colorclass2"});
	</script>
	</div>
				<div class="info" style="float:left;">
 	<?php
		// product header, blurb, and feature list
		echo '<strong class="tagline mysqledit" id="header">' . $header . '</strong>
		<div class="mysqledit" id="blurb" >' . $blurb . '</div>
		<div id="list" class="feature-list mysqledit" >' . $list. '</div>';
	?>
				</div>
	</div>
	

<div class="tabs" >
  
  <nav role='navigation' class="C10 transformer-tabs tabs-wrapper">
    <ul>
	<?PHP 
//Navigation tabs.  Depending on what sections have details can contain overview, specs, accessories, videos, downloads, support, (and "used with" for accessories)
	
		$sql = "SELECT `name`, tagline, `image`, `body` FROM productoverview WHERE `lang` = '$lang' AND partnumber = '$pn' ORDER BY `order`";
		$results = mysqli_query($connection,$sql);
		if(mysqli_num_rows($results)==0){ 
		$sql = "SELECT `name`, tagline, `image`, `body` FROM productoverview WHERE `lang` = 'en' AND partnumber = '$pn' ORDER BY `order`";
		$results = mysqli_query($connection,$sql);
		}
	
	if(mysqli_num_rows($results)!=0){ 
	echo '<li><a href="#overview" class="active">' . translate('Overview') . '</a></li>
					<li><a href="#specs">' . translate('Specifications') . '</a></li>
	';
	}
	else{
	echo '<li><a href="#specs" class="active">' . translate('Specifications') . '</a></li>';
	}
	?>
 				<li id="vidsection"><a href="#videos"><?php echo translate('Videos'); ?></a></li>
				<li><a href="#accessories"><?php echo translate('Accessories'); ?></a></li>
				<li><a href="#downloads"><?php echo translate('Downloads'); ?></a></li>
				<li><a href="#support"><?php echo translate('Support'); ?></a></li>
    </ul>
	<div class="tab-shadow"></div>
  </nav>
  
<?PHP 

		if(mysqli_num_rows($results)!=0){
echo '<div id="overview" class="active">	
<ul class="C10 alternateDivChildL2">';
		while($row = mysqli_fetch_array($results)){

echo '<li>
<div class="image-set cmsedit">
' . $row['image'] . '
</div>
<div class="info cmsedit">
<h2 class="name">' . $row['name'] . '</h2>
<strong class="tagline">' . $row['tagline'] . '</strong>
' . $row['body'] . '
</div>
</li>';

		}
echo '</ul></div>';
		}
?>
		<div id="specs" style="position:relative" <?PHP if(mysqli_num_rows($results)==0){ echo 'class="active"';} ?> >
			<?php 
			$models = $pn;
	//Accessories and Peripherals use "accessoryspecs" table, Projectors and Displays use product specific tables.		
			getSpecs("projectors","speccompare.php"); 
			?>
		</div>

			<?php getSeriesVideos(); ?>
		<div id="accessories">
<?PHP getProductAccessories(); ?>
		</div>
		<div id="downloads">
<?php 
//new downloads section replaced original in mid 2014
getProductDownloadnew('SELECT Downloadstmp.filename, Downloadstmp.lang, if(DownloadTrans.description is null,Downloadstmp.description,DownloadTrans.description) AS description, filelocation, relatedproducts, extension, if(DownloadTrans.category is null,Downloadstmp.category,DownloadTrans.category) AS category, if(rank is null,999,rank) AS rank, if(DownloadTrans.title is null,Downloadstmp.title,DownloadTrans.title) AS title  FROM Downloadstmp LEFT JOIN (SELECT * FROM DownloadTrans WHERE lang = "' .$lang . '") AS DownloadTrans ON DownloadTrans.filename = Downloadstmp.filename WHERE relatedproducts like "%' . $pn . ';%" ORDER BY rank,title,description'); 
				
				
				?>
		</div>
		<div id="support">
<?PHP include($homedir."/resources/html/support-tab-" . $lang . ".html"); ?>
		</div>
		</div>
	</div>
</div>

<div id="processpanel" style="display:none"></div>
				<footer id="site-info" >
				<?php include($homedir . "/resources/html/footer.html"); ?>
				</footer>
			</section>
		</div>
<script>
				$(".form-box").colorbox({iframe:true, innerWidth:"80%", innerHeight:400});
$(".colorbox-inline").colorbox({inline:true});

</script>


</body></html>
