<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
$localdir = dirname(__FILE__);

//pull series text data 
getSeriesText();
?>

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
<div class="breadcrumb"><?php echo $breadcrumb;?></div>
			<div class="C10 Col_child C7x3_child">

				<div class="info" style="float:left;">
<?php
		// product header, blurb, and feature list

		echo '<h2 class="name" id="pagetitle" >' . str_replace("-"," ",$series) . '</h2>';
		echo '<strong class="tagline mysqledit" id="header">' . $sheader . '</strong>';
		echo '<div class="mysqledit" id="blurb" >' . $sblurb . '</div>';
		echo '<div id="list" class="feature-list half mysqledit" style="font-size:80%">' . $newlist. '</div>';
	?>

				</div>
				<div class="image-set" style="height:100%;text-align:center;">
<?php 
$pn=str_replace("-SERIES","",$series);
getProductImages('False');
?>
				</div>
				<ul class="promo-set ui-fill-height" style="display:none" >
					<div class="container ui-center-vertical">
<?php
$result = mysqli_query($connection,'SELECT promohtml, appliestoproduct FROM promos WHERE promoactive <= CURDATE() AND promoinactive >= CURDATE()');
if(mysqli_num_rows ($result)>0){
while($row = mysqli_fetch_array($result))
	{
		$prodarray = explode(",",$row[1]);
		foreach($prodarray AS $pn){
			if($series == $pn){
				echo '<li>' . $row[0] . '</li>';
			}
		}
	}
}
?>
					</div>
				</ul>
	</div>
<div class="tabs">
  
  <nav role='navigation' class="C10 transformer-tabs tabs-wrapper">
    <ul>
				<li><a href="#models" class="active"><?php echo translate('Models'); ?></a></li>
				<li><a id="specstab" style="display:none" href="#specs"><?php echo translate('Specifications'); ?></a></li>
				<li><a href="#datasheets"><?php echo translate('Datasheets'); ?></a></li>
				<li id="vidsection"><a href="#videos"><?php echo translate('Videos'); ?></a></li>
			</ul>
	<div class="tab-shadow"></div>
  </nav>
  

		<div id="models" class="active" style="position:relative">
		<ul class="C10 panels resultsList">
<?PHP getSeriesPanels("/displays/"); ?>
			</ul>
		
		</div>
		<div id="specs" style="position:relative">
			<?php getSpecs("displays","displaycompare.php"); ?>
		</div>
		<div id="datasheets">
			<?php 

getProductDownloadnew('SELECT Downloadstmp.filename, Downloadstmp.lang, if(DownloadTrans.description is null,Downloadstmp.description,DownloadTrans.description) AS description, filelocation, relatedproducts, extension, if(DownloadTrans.category is null,Downloadstmp.category,DownloadTrans.category) AS category, if(rank is null,999,rank) AS rank, if(DownloadTrans.title is null,Downloadstmp.title,DownloadTrans.title) AS title  FROM Downloadstmp LEFT JOIN (SELECT * FROM DownloadTrans WHERE lang = "' .$lang . '") AS DownloadTrans ON DownloadTrans.filename = Downloadstmp.filename 
				WHERE Downloadstmp.filename LIKE "%Datasheet%" AND (' . $dsWhere . ') ORDER BY rank,title,description'); 
			?>
			
			</div>
			<?php getSeriesVideos(); ?>
		</div>
	</div>
</div>
				<footer id="site-info" >
				<?php include($homedir . "/resources/html/footer.html"); ?>
				</footer>
				<small id="mapdisclaim" style="font-size:70%;"></small>
			</section>
		</div>
<script>
</script>
</body>
</html>