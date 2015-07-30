<!DOCTYPE html>
<?php
$groups_allowed = "admin,editor,saleseditor,marketingeditor";
require($_SERVER['DOCUMENT_ROOT'] . "/login/ublock.php");

require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
$localdir = dirname(__FILE__);

require($_SERVER['DOCUMENT_ROOT'] . "/resources/cmsmainmenu.html");
mysqli_set_charset($connection, "utf8");


$pn = $_GET['pn'];
if(!empty($_GET['lang'])){$lang = $_GET['lang'];}

?>

    <div id="layout">
   <section id="content">
<div style="padding-top:40px;"></div>

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");


if(!empty($_POST[accessory])){

$accessory = mysqli_real_escape_string($connection, strtoupper($_POST["accessory"]));

 $recordcount = count($_POST[product]);
    for ($i=0; $i<$recordcount; $i++) {
if(in_array($_POST[product][$i],$_POST[checkoption])){
$prank=$_POST['rank'][$i];

 $result = mysqli_query($connection,'REPLACE INTO acc_matrix SET accessorypn = "' . $_POST[accessory] . '" , productpn = "' . $_POST[product][$i] . '" , rank = ' . $prank . '');

}
else{
 $result = mysqli_query($connection,'DELETE FROM acc_matrix WHERE accessorypn = "' . $_POST[accessory] . '" AND productpn = "' . $_POST[product][$i] . '"');

 }
}
}

?>

<form target="" method="GET" style="width:782px;margin-bottom:20px;">


  <br>
   <div class="ui-widget">
   <!--pulls all projectors from the database-->
   <input type="hidden" name="lang" value="<?php echo $lang; ?>" />
   <button id="btn" class="formbutton" style="position:relative;left:30px;top:-2px;" >Get Products</button><select id="combobox" name="pn" >
   <option value="" selected>Select Accessory...</option>
   <?php 
   $sql = 'SELECT partnumber FROM producttext GROUP BY partnumber,productgroup HAVING (productgroup = "Accessory" OR productgroup = "Peripheral") ORDER BY partnumber';
   $results = mysqli_query($connection,$sql);
   while($row = mysqli_fetch_array($results)){echo '<option value="'. $row['partnumber'] .'">'.$row['partnumber'] .'</option>';}
   ?>      
   </select>
   </div>

</form>
<form id="formid" action="" method="POST" style="width:400px;">
<?php

if(!empty($_GET[pn])){
echo $_GET[pn] .' Compatible with... ' .  '<br>Rank<br>';
echo '<input name="accessory" style="display:none" value="' . $_GET[pn] . '" />';

mysqli_set_charset($connection, "utf8");
$pn = mysqli_real_escape_string($connection, strtoupper($_GET["pn"]));

$result = mysqli_query($connection,'SELECT producttext.partnumber,  Acc.rank, Acc.accessorypn, producttext.active, producttext.lang
FROM (SELECT producttext.partnumber,  acc_matrix.rank, producttext.active, acc_matrix.accessorypn
FROM acc_matrix INNER JOIN producttext ON acc_matrix.productpn = producttext.partnumber
WHERE (producttext.active Is NOT Null AND producttext.active !="" AND producttext.active != 0)
AND (acc_matrix.accessorypn ="' . strtoupper($_GET[pn]) . '"
Or acc_matrix.accessorypn Is Null) AND lang = "' . $lang . '" ) 
AS Acc RIGHT JOIN producttext ON Acc.partnumber = producttext.partnumber
WHERE (producttext.active Is NOT Null AND producttext.active !="" AND producttext.active != 0) AND lang = "' . $lang . '" ORDER BY Acc.accessorypn DESC,producttext.partnumber');


echo '<div style="width:95%;height:362px;overflow:auto;padding-top:15px;padding-left:10px;">';
while($row = mysqli_fetch_array($result))
{

 echo '<input type="numeral" name="rank[]" value="';
 if($row[1] == null OR $row[1]==""){echo "20";}else{echo $row[1];}
 echo '" style="width:20px;float:left;" /> 
 
 <input class="css-checkbox"  id="' . $row[0] . '" name="checkoption[]" type="checkbox" value="' . $row[0] . '" ';
 if($row[2] != null AND $row[2]!=""){echo 'checked';}
 echo '>
 <label class="checkbox-label" style="float:left;" for="' . $row[0] . '"></label>
  <label class="clearfix" style="width:80%;margin-left:15%;" for="' . $row[0] . '">' . $row[0] .'</label>
<input type="text" style="display:none;" name="product[]" value="' . $row[0] . '" /><br> 
 ';
}
echo '</div>';
}

?>
<br>
<button id="btn" class="formbutton" >Submit Changes</button>
</form>

<script>
$( "#formid" ).change(function() {
  window.onbeforeunload = function(e) {
  return 'It looks like you may have unsaved changes, are you sure you want to leave the page?';
	};
});
$( "#formid" ).submit(function() {
  window.onbeforeunload = false;
});
</script>

</section>
</div>

</body>
</html>