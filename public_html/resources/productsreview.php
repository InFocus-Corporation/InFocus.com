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

    <div id="layout" style="padding:2%;">
   <section id="content">
<style>
table {
    width: 716px; /* 140px * 5 column + 16px scrollbar width */
    border-spacing: 0;
}

tbody, thead tr { display: block; }

tbody {
    height: 600px;
    overflow-y: auto;
    overflow-x: hidden;
}

tbody td, thead th {
    width: 130px;
}

thead th:last-child {
    width: 146px; /* 140px + 16px scrollbar width */
}
.fltrow {
height: 30px;
}
.fltrow td {
    width: 130px;
}

</style>
<table id="table6" class="square" style="" cellpadding="0" cellspacing="0">
<?php
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");
mysqli_set_charset($connection, "utf8");
$pn = mysqli_real_escape_string($connection, strtoupper($_GET["pn"]));

$result = mysqli_query($connection,'SELECT * FROM producttext ORDER BY productgroup, partnumber');





   echo '<thead><tr style="color:white"><th>Product Group</th><th>Part Number</th><th>Lang</th><th>Active</th><th style="text-align:center;">Overview</th><th style="text-align:center;">Specifications</th><th style="text-align:center;">Accessories</th><th style="text-align:center;">Datasheet</th><th style="text-align:center;">Downloads</th></tr></thead>';

 while($row = mysqli_fetch_array($result))
   {
   echo '<tr><td>' . $row['productgroup'] . '</td><td>' . $row['partnumber'] . '</td><td>' . $row['lang'] . '</td><td>';
if($row['active'] == null OR $row['active'] == 0 OR $row['active'] ==9){echo "Inctive";} else{ echo "Active";}
   echo '</td><td style="text-align:center">';
   
   if($row['productgroup'] == "Series"){ echo "N/A";}
   else{
   if(getProductFileName($row['partnumber'], $row['lang']) != null){echo "X";} 
   else{ 
    if($row['productgroup'] != "Accessories"){
   echo "Missing";}
   }
   }
   echo '</td><td style="text-align:center">';

switch($row['productgroup']){
Case "Projector":
 $table = "projectors";
 break;
Case "Display":
 $table = "displays";
 break;
Case "Accessory":
 $table = "accessoryspecs";
 break;
Default:
 $table = "N/A";
}

if($table != "N/A"){
$subresult = mysqli_query($connection,"SELECT * FROM " . $table . " WHERE partnumber = '" . $row['partnumber'] . "'");
if(mysqli_num_rows($subresult)>0){echo "X";} 
   else{ 
   echo "Missing";
   }
}
else{ echo "N/A";}
   
   echo '</td><td style="text-align:center">';

   if($row['productgroup'] == "Series"){ echo "N/A";}
elseif($row['productgroup'] != "Accessory"){
 $subresult = mysqli_query($connection,"SELECT * FROM acc_matrix WHERE productpn = '" . $row['partnumber'] . "'");
 if(mysqli_num_rows($subresult)>6){echo "X";} else{ echo "Missing";}
 }
   echo '</td><td style="text-align:center">';
   
   if($row['productgroup'] == "Series"){ echo "N/A";}
elseif($row['productgroup'] != "Accessory"){
$subresult = mysqli_query($connection,"SELECT * FROM Downloads WHERE relatedproducts LIKE '%" . $row['partnumber'] . "%' AND filename LIKE '%atasheet%'");
if(mysqli_num_rows($subresult)>0){echo "X";} else{ echo "Missing";}
 }
   
   echo '</td><td style="text-align:center">';
   
   if($row['productgroup'] == "Series"){ echo "N/A";}
elseif($row['productgroup'] != "Accessory"){
$subresult = mysqli_query($connection,"SELECT * FROM Downloads WHERE relatedproducts LIKE '%" . $row['partnumber'] . "%'");
if(mysqli_num_rows($subresult)>2){echo "X";} else{ echo "Missing";}
 }
   
   echo '</td></tr>';
   }
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
function getProductFileName($pn, $lang){
$homedir = $_SERVER['DOCUMENT_ROOT']; 

//Locates an overview file for either the product or the product family
$product=$pn;
$series=$pn;
$suffix="";
if(substr($pn,-2)=="HD"){
$product = substr($pn,0,-2);
$suffix = "HD";
$series = substr($pn,0,-3) . "0" . $suffix;
}
elseif(substr($pn,-3)=="UST"){
$product = $pn;
$suffix = "UST";
$series = substr($pn,0,-4) . "0" . $suffix;
}
elseif(substr($pn,-2)=="ST"){
$product = $pn;
$suffix = "ST";
$series = substr($pn,0,-3) . "0" . $suffix;
}
elseif(substr($pn,-1)=="A"){
$product = $pn;
$suffix = "A";
$series = substr($pn,0,-2) . "0" . $suffix;
}
elseif(substr($pn,-1)=="L"){
$product = substr($pn,0,-1);
$suffix = "L";
$series = substr($pn,0,-2) . "0" . $suffix;
}
else{
$series = substr($pn,0,-1) . "0";
}


if(file_exists($localdir . "/" . $pn . "-" . $lang . '.src')){
$fileName = $localdir . "/" . $pn . "-" . $lang . '.src';
}
elseif(file_exists($localdir . "/" . $product . "-" . $lang . '.src')){
$fileName = $localdir . "/" . $product . "-" . $lang . '.src';
}
elseif(file_exists($homedir."/resources/overviews/" . $pn . "-" . $lang . '.src')) {
$fileName = $homedir."/resources/overviews/" . $pn . "-" . $lang . '.src';
}
elseif(file_exists($homedir."/resources/overviews/" . $product . "-" . $lang . '.src')) {
$fileName = $homedir."/resources/overviews/" . $product . "-" . $lang . '.src';
}
elseif(file_exists($homedir."/resources/overviews/" . substr($product,0,strlen($product)-1) . '0-series' . $lang . '.src')) {
$fileName = $homedir."/resources/overviews/" . substr($product,0,strlen($product)-1) . '0-series' . $lang . '.src';
}
elseif(file_exists($homedir."/resources/overviews/" . $series . '-series' . $lang . '.src')) {
$fileName = $homedir."/resources/overviews/" . $series . "-" . $lang . '.src';
}
return $fileName;
}


?>
</table>
   </section>
</div>
<script>

var table6_Props = {
 alternate_rows: true,  
    rows_counter: true,
    rows_counter_text: "Rows:",
    btn_reset: true,
    loader: true,
    loader_text: "Filtering data...",
    col_0: "select",
    col_2: "select",
    col_3: "select",
    col_4: "select",
    col_5: "select",
    col_6: "select",
    col_7: "select",
    col_8: "select",
    display_all_text: " [ Show all ] ",
    sort_select: true
};
var tf6 = setFilterGrid("table6", table6_Props);


</script>
</body>
</html>