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
   <section id="content" style="padding-left:20px;">
<div style="padding-top:40px;"></div>

<?php
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");

if(empty($_GET[lang])){$_GET[lang]="en";}
if(!empty($_POST['product'])){

$product = mysqli_real_escape_string($connection, strtoupper($_POST["product"]));

 $recordcount = count($_POST['accessory']);
    for ($i=0; $i<$recordcount; $i++) {
if(in_array($_POST['accessory'][$i],$_POST[checkoption])){
$prank=$_POST['rank'][$i];

 $result = mysqli_query($connection,'REPLACE INTO acc_matrix SET productpn = "' . $product . '" , accessorypn = "' . $_POST['accessory'][$i] . '" , rank = ' . $prank . '');
}
else{
 $result = mysqli_query($connection,'DELETE FROM acc_matrix WHERE productpn = "' . $product . '" AND accessorypn = "' . $_POST['accessory'][$i] . '"');

 }
}
}

?>

<form target="" method="GET" style="width:782px;margin-bottom:20px;">


  <br>
   <div class="ui-widget">
   <!--pulls all projectors from the database-->
   <input type="hidden" name="lang" value="<?php echo $_GET[lang]; ?>" />
   <button id="btn" class="formbutton" style="position:relative;left:30px;top:-2px;">Get Products</button><select id="combobox" name="pn" style="float:left;">
   <option value="" selected>Select Accessory...</option>
   <?php 
   $sql = 'SELECT partnumber FROM producttext WHERE productgroup = "Projector" OR productgroup = "Display" OR productgroup = "Peripheral" ORDER BY partnumber';
   $results = mysqli_query($connection,$sql);
   while($row = mysqli_fetch_array($results)){echo '<option value="'. $row['partnumber'] .'">'.$row['partnumber'] .'</option>';}
   ?>      
   </select>
   </div>

</form>
<form id="formid" action="" method="POST" style="width:350px;float:left;">

<?php

if(!empty($_GET[pn])){
echo $_GET[pn] .' Compatible with... ' .  '<br>Rank<br>';
echo '<input name="product" style="display:none" value="' . $_GET[pn] . '" />';

mysqli_set_charset($connection, "utf8");
$pn = mysqli_real_escape_string($connection, strtoupper($_GET["pn"]));

$result = mysqli_query($connection,'SELECT producttext.partnumber,  optionalacc.rank, optionalacc.productpn
FROM producttext LEFT JOIN (SELECT acc_matrix.accessorypn, acc_matrix.productpn, acc_matrix.rank 
FROM acc_matrix
WHERE productpn = "' . $pn . '") AS optionalacc ON producttext.partnumber = optionalacc.accessorypn WHERE (producttext.productgroup = "Accessory" OR producttext.productgroup = "Peripheral") AND producttext.partnumber != "" AND lang="' . $lang . '" ORDER BY productpn DESC, partnumber');

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
<input type="text" style="display:none;" name="accessory[]" value="' . $row[0] . '" /><br> 
 
 ';
 
}
echo '</div>';
}

?>

<br>
<button id="btn" class="formbutton" >Submit Changes</button>
</form>

<form style="float:left;width:350px;margin-left:40px;">
<button type="button" style="width:325px;" onclick="add43screens()">Add all 4:3 NON-portable screens</button>
<button type="button" style="width:325px;" onclick="add43mobscreens()">Add all 4:3 Portable screens</button>
<button type="button" style="width:325px;" onclick="add16screens()">Add all 16:10 NON-portable screens</button>
<button type="button" style="width:325px;" onclick="add16mobscreens()">Add all 16:10 Portable screens</button>
<button type="button" style="width:325px;" onclick="addmount()">Add all normal mounting hardware</button>
<button type="button" style="width:325px;" onclick="addmountinstall()">Add all Installation mounting hardware</button>
<button type="button" style="width:325px;" onclick="adddiswar()">Add all Display Warranties</button>
<button type="button" style="width:325px;" onclick="addVwar()">Add all "V" Warranties</button>
<button type="button" style="width:325px;" onclick="addMCwar()">Add all "MC" Warranties</button>
<button type="button" style="width:325px;" onclick="addIwar()">Add all "I" Warranties</button>
<button type="button" style="width:325px;" onclick="addHwar()">Add all "H" Warranties</button>
</form>

</section>
</div>
<script>
function add43screens(){
document.getElementById('SC-FF-100').checked = true;
document.getElementById('SC-FF-120').checked = true;
document.getElementById('SC-FF-84').checked = true;
document.getElementById('SC-MAN-100').checked = true;
document.getElementById('SC-MAN-120').checked = true;
document.getElementById('SC-MAN-84').checked = true;
document.getElementById('SC-MOT-100').checked = true;
document.getElementById('SC-MOT-120').checked = true;
document.getElementById('SC-MOT-84').checked = true;
}
function add43mobscreens(){
document.getElementById('SC-PU-100').checked = true;
document.getElementById('SC-PU-60').checked = true;
document.getElementById('SC-PU-80').checked = true;
}
function add16screens(){
document.getElementById('SC-FFW-113').checked = true;
document.getElementById('SC-FFW-130').checked = true;
document.getElementById('SC-FFW-94').checked = true;
document.getElementById('SC-MOTW-113').checked = true;
document.getElementById('SC-MOTW-130').checked = true;
document.getElementById('SC-MOTW-94').checked = true;
document.getElementById('SC-PDW-109').checked = true;
document.getElementById('SC-PDW-94').checked = true;
}
function add16mobscreens(){
document.getElementById('SC-PUW-60').checked = true;
document.getElementById('SC-PUW-73').checked = true;
document.getElementById('SC-PUW-90').checked = true;
}
function addmount(){
document.getElementById('PRJ-ACP-ADPT').checked = true;
document.getElementById('PRJ-CEIL-ADPT').checked = true;
document.getElementById('PRJ-EXTARM-01').checked = true;
document.getElementById('PRJ-EXTARM-02').checked = true;
document.getElementById('PRJ-EXTARM-03').checked = true;
document.getElementById('PRJ-EXTARM-04').checked = true;
document.getElementById('PRJ-EXTARM-05').checked = true;
document.getElementById('PRJ-LIFT-UNIV').checked = true;
document.getElementById('PRJ-MNT-INST').checked = true;
document.getElementById('PRJ-PLTA').checked = true;
document.getElementById('PRJ-PLTB').checked = true;
document.getElementById('PRJ-STACK-UNIV').checked = true;
document.getElementById('SP-LTMT-PLTB').checked = true;
document.getElementById('PRJ-MNT-UNIV').checked = true;
}
function addmountinstall(){
document.getElementById('PRJ-ACP-ADPT').checked = true;
document.getElementById('PRJ-CEIL-ADPT').checked = true;
document.getElementById('PRJ-EXTARM-01').checked = true;
document.getElementById('PRJ-EXTARM-02').checked = true;
document.getElementById('PRJ-EXTARM-03').checked = true;
document.getElementById('PRJ-EXTARM-04').checked = true;
document.getElementById('PRJ-EXTARM-05').checked = true;
document.getElementById('PRJ-LIFT-UNIV').checked = true;
document.getElementById('PRJ-MNT-INST').checked = true;
document.getElementById('PRJ-PLTA').checked = true;
document.getElementById('PRJ-PLTB').checked = true;
document.getElementById('PRJ-STACK-UNIV').checked = true;
document.getElementById('SP-LTMT-PLTB').checked = true;
}
function adddiswar(){
document.getElementById('EPWINF1').checked = true;
document.getElementById('EPWINF2').checked = true;
}
function addVwar(){
// document.getElementById('LAMP-EW1YR-V').checked = true;
// document.getElementById('LAMP-EW2YR-V').checked = true;
document.getElementById('PROJ-EW1YR-V').checked = true;
document.getElementById('PROJ-EW2YR-V').checked = true;
}
function addMCwar(){
// document.getElementById('LAMP-EW1YR-MC').checked = true;
// document.getElementById('LAMP-EW2YR-MC').checked = true;
document.getElementById('PROJ-EW1YR-MC').checked = true;
document.getElementById('PROJ-EW2YR-MC').checked = true;
}
function addIwar(){
// document.getElementById('LAMP-EW1YR-I').checked = true;
// document.getElementById('LAMP-EW2YR-I').checked = true;
document.getElementById('PROJ-EW1YR-I').checked = true;
document.getElementById('PROJ-EW2YR-I').checked = true;
}
function addHwar(){
// document.getElementById('LAMP-EW1YR-H').checked = true;
// document.getElementById('LAMP-EW2YR-H').checked = true;
document.getElementById('PROJ-EW1YR-H').checked = true;
}



$( "#formid" ).change(function() {
  window.onbeforeunload = function(e) {
  return 'It looks like you may have unsaved changes, are you sure you want to leave the page?';
	};
});
$( "#formid" ).submit(function() {
  window.onbeforeunload = false;
});
</script>
</body>
</html>