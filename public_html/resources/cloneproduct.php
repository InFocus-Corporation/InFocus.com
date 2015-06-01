<!DOCTYPE html>
<?php
$groups_allowed = "admin,editor,saleseditor,marketingeditor";
require($_SERVER['DOCUMENT_ROOT'] . "/login/ublock.php");

require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
$localdir = dirname(__FILE__);

require($_SERVER['DOCUMENT_ROOT'] . "/resources/cmsmainmenu.html");
mysqli_set_charset($connection, "utf8");


$pn = $_GET['pn'];
if(!empty($_GET['lang'])){$lang = $_GET['lang'];}

?>

<script src="/resources/plugins/jquery-handsontable/dist/jquery.handsontable.full.js"></script>
<link rel="stylesheet" media="screen" href="/resources/plugins/jquery-handsontable/dist/jquery.handsontable.full.css">
<link rel="stylesheet" media="screen" href="/resources/css/core.css">

<style>

#selectable3 .ui-selecting { background: #f7f7f7; }
#selectable3 .ui-selected { background: #fff; color: #565656; }
#selectable3 { list-style-type: none; margin: 0; padding: 0;  }

#selectable3 li {
 outline: none;
 border: 1px solid #cccccc;
 box-shadow: 0px 0px 0px 4px rgba(0, 0, 0, 0.1), inset 0px 1px 0px 0px rgba(255, 255, 255, 1), inset 0px 1px 6px 0px rgba(0, 0, 0, 0.05);
 border-radius: 3px;
 padding: 7px 10px;
 background: #f1f1f1;
 color: #b5b5b5;
 margin-bottom: 10px;
 margin-right: 10px;
 float: left;
 }

#selectable4 .ui-selecting { background: #f7f7f7; }
#selectable4 .ui-selected { background: #fff; color: #565656; }
#selectable4 { list-style-type: none; margin: 0; padding: 0;  }

#selectable4 li {
 outline: none;
 border: 1px solid #cccccc;
 box-shadow: 0px 0px 0px 4px rgba(0, 0, 0, 0.1), inset 0px 1px 0px 0px rgba(255, 255, 255, 1), inset 0px 1px 6px 0px rgba(0, 0, 0, 0.05);
 border-radius: 3px;
 padding: 7px 10px;
 background: #f1f1f1;
 color: #b5b5b5;
 margin-bottom: 10px;
 margin-right: 10px;
 float: left;
 }

.colHeader{
color:white;
}

table tbody tr:last-child td {
border-bottom:1px solid #ccc;
}


</style>
    <div id="content" class="content">

		<form Target="cloneFrame" action="/resources/php/cloneproduct.php"  method="post" style="padding:10px;margin-top:40px;">
		<div style="width:300px;display:inline-block;vertical-align:top;">	
			<label class="top">Clone Part Number (from)</label>
			<input type="text" name="sourceProduct" id="sourceProduct" value =""><br>
			<label class="top">Language</label>
			<input type="text" name="lang" value="<?= $lang?>">			<label class="top">New Part Number (to)</label>
			<input type="text" id="createdProduct" name="createdProduct" >
</div>

			<div style="width:400px;display:inline-block">
			<input type="checkbox" class="css-checkbox" id="cloneText" name="cloneText" style="float:left" checked><label for="cloneText" class="checkbox-label" style="float:left"></label><label for="cloneText">Clone Product Text</label>

			<input type="checkbox" class="css-checkbox" id="cloneSpecs" name="cloneSpecs" style="float:left" checked><label for="cloneSpecs" class="checkbox-label" style="float:left"></label><label for="cloneSpecs">Clone Specifications</label>

			<input type="checkbox" class="css-checkbox" id="cloneOverview" name="cloneOverview" style="float:left" checked><label for="cloneOverview" class="checkbox-label" style="float:left"></label><label for="cloneOverview">Clone Overview</label>

			<input type="checkbox" class="css-checkbox" id="cloneAccessories" name="cloneAccessories" style="float:left" checked><label for="cloneAccessories" class="checkbox-label" style="float:left"></label><label for="cloneAccessories">Clone Accessories (or associated products)</label>

			<input type="checkbox" class="css-checkbox" id="cloneSeries" name="cloneSeries" style="float:left" checked><label for="cloneSeries" class="checkbox-label" style="float:left"></label><label for="cloneSeries">Clone Series</label>

			<input type="checkbox" class="css-checkbox" id="cloneDownloads" name="cloneDownloads" style="float:left" checked><label for="cloneDownloads" class="checkbox-label" style="float:left"></label><label for="cloneDownloads">Clone Downloads</label></div>
			
			<input type="submit" name="submit" value="Clone" onclick="$('#cloneFrame').delay(1500).slideDown(1000);">
			
			<iframe style="display:none;right:0;position:absolute;overflow:auto;width:240px;height:155px;" src="#" name="cloneFrame" id="cloneFrame" scrolling="no"></iframe>
		</form>
	</div>
	
<div style="display:none">
<iframe name="hiddenFrame" ></iframe>
</div>
</section>
</div>

</body>
</html>
