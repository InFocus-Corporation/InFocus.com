<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
$localdir = dirname(__FILE__);

getSeriesText();
?>
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
		<?php include($homedir . "/resources/html/mainmenu.html"); ?>
<?php
if($_GET['edit']=="true"){CMSHTML("SavePage",'admin,salespublisher,saleseditor,marketingpublisher,marketingeditor');}

?>


		<div class="content">
<div id="family" class="C9">
<div class="breadcrumb">
<a href="/"><?php echo $Home; ?></a> > 
</div>
			<div class="C10 Col_child C7x3_child">

				<div class="info" style="float:left;">
<?php

		echo '<h2 class="name" id="pagetitle" >' . $stitle . '</h2>';
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
				<li><a href="#models" class="active"><?php echo $Models; ?></a></li>
				<li><a href="#specs" style="display:none;"><?php echo $Specifications; ?></a></li>
				<li><a href="#datasheets" style="display:none;"><?php echo $Datasheets; ?></a></li>
			</ul>
	<div class="tab-shadow"></div>
  </nav>
  

		<div id="models" class="active" style="position:relative">
		<ul class="C10 panels resultsList">
<?PHP getSeriesPanels(); ?>
			</ul>
		
		</div>		
		<div id="specs" style="position:relative">
		<input id="modlist" style="display:none;" value="<?php echo $models;?>"><br/>
			<div class="ui-widget" style="padding-bottom:30px;">
<!--Trans-Marker-->Compare with other products<br>
			<INPUT type="button" id="btn" class="formbutton" style="display:inline;margin-right:10px;" value="Add" onclick=" updateSpecs(document.getElementById('modlist').value, 'speccompare.php');"  /><select id="combobox" style="height:90px;" >
			<option value="" selected></option>
			<?php 
			$sql = "SELECT partnumber FROM projectors";
			$results = mysqli_query($connection,$sql);
			while($row = mysqli_fetch_array($results)){echo '<option value=",'. $row['partnumber'] .'">'.$row['partnumber'] .'</option>';}
			?>      
			</select><br>
			</div>
			<div id="specFrame" style="width:300px">
			<!--Empty Frame for adding specification tables-->	
			</div>
		</div>
		<div id="datasheets">
			<?php 
			// getProductDownloads('SELECT filename, filelocation, description, lang, extension
				// FROM Downloads
				// WHERE filename LIKE "%Datasheet%" AND (' . $dsWhere . ')');

getProductDownloadnew('SELECT * FROM Downloadstmp
				WHERE filename LIKE "%Datasheet%" AND (' . $dsWhere . ') ORDER BY rank,title,description'); 
			?>
			</div>
		</div>
	</div>
</div>


				<footer id="site-info" >
				<?php include($homedir . "/resources/html/footer.html"); ?>
				</footer>
				<small style="font-size:70%;">*Manufacturer's Minimum Advertised Price (United States). MAP is for reference purposes only; consult your local Authorized InFocus Reseller for pricing. Pricing outside the United States may vary due to each country's tax schedule, tariffs, import/shipping charges, and duties imposed by customs.</small>
			</section>
		</div>
<script>
   	updateSpecs("<?php echo $models;?>", "speccompare.php");
</script>
	</body>
</html>