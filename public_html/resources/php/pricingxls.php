<?php
if(empty($_REQUEST['sheetid'])){
$groups_allowed	=	"Executive,admin,Pricing";
require_once($_SERVER['DOCUMENT_ROOT']	.	"/login/ublock.php");
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/infocusscripts.php");

echo "
 <script>
$(function() {
$( '#datepicker' ).datepicker();
});
</script>

<form style='padding:20px;height:358px;width:89.5%;' method='POST' action=''>
<label for='datepicker'>Effective Date</label>
<input type='date' name='date' id='datepicker' value=''>
<input type='hidden' name='sheetid' value='ALL'><br><br>
<input type='submit' value='submit'>
</form";
die();
}

if($_REQUEST['sheetid'] == "ALL"){
 ob_end_clean();
 header("Connection: close");
 ignore_user_abort(true); // optional
 ob_start();
 echo ('Request Received.  Processing takes 1-2 minutes. <br> You may close this window in the meantime.');
 $size = ob_get_length();
 header("Content-Length: $size");
 ob_end_flush(); // Strange behaviour, will not work
 flush();            // Unless both are called !
 session_write_close(); // Added a line suggested in the comment
 ini_set('max_execution_time', 360);
 ini_set("memory_limit","512M");
}

$groups_allowed	=	"Executive,admin,Pricing";
require_once($_SERVER['DOCUMENT_ROOT']	.	"/login/ublock.php");

$server = '67.43.7.189';
$login = 'InternalAdmin';
$password = 'nIinmFd0Aclu';
$SelectDB = 'infocus_internal';
$connection = mysqli_connect($server,$login,$password, $SelectDB,3306);


require($_SERVER['DOCUMENT_ROOT'] . "/resources/plugins/PHPExcel.php");

function num_to_letter($num, $uppercase = FALSE)
{
$num -= 1;
$letter = chr(($num % 26) + 97);
$letter .= (floor($num/26) > 0) ? str_repeat($letter, floor($num/26)) : '';
return ($uppercase ? strtoupper($letter) : $letter);
}

function sheetScope($i, $j = NULL){
global $sheetScope;
if($j == NULL){$j = $i;}
return str_replace("~",$i,str_replace("`",$j,$sheetScope));
}


if($_REQUEST['sheetid'] != "ALL"){
$sql = 'SELECT * FROM infocus_internal.Pricing_Sheets WHERE ID LIKE "%' . $_REQUEST['sheetid'] . '%" LIMIT 1';
}
else{
$sql = 'SELECT * FROM infocus_internal.Pricing_Sheets';
}
$result	=	mysqli_query($connection,$sql);

while($row	=	mysqli_fetch_assoc($result))
{
foreach($row as $Key => &$Value){
$sheetsArray[$row['ID']][$Key] = $Value;
}
}

    // `Pricing_Sheets`.`Header`,
    // `Pricing_Sheets`.`Head_Description`,
    // `Pricing_Sheets`.`Head_Date`,
    // `Pricing_Sheets`.`Column_Headers`,
    // `Pricing_Sheets`.`Columns`,
    // `Pricing_Sheets`.`Notes_Key`,
    // `Pricing_Sheets`.`Category_Spacers`
	
	
$presql = "SELECT Field, Multiplier FROM infocus_internal.Pricing_Calc";
$result	=	mysqli_query($connection,$presql);
while($row	=	mysqli_fetch_assoc($result))
{
$Multiplier[$row['Field']] = $row['Multiplier'];
}

$presql = "SELECT partnumber, CONCAT(technology,' ',resolutionname, ' ', lumenshigh, ' lm') as description, weight, accessorypn FROM InFocus.projectors LEFT JOIN (SELECT * FROM InFocus.acc_matrix WHERE accessorypn LIKE '%LAMP%') as accmatrix ON partnumber = productpn 
UNION ALL SELECT producttext.partnumber, listtitle, weight, NULL FROM InFocus.producttext LEFT JOIN InFocus.displays ON producttext.partnumber = displays.partnumber WHERE productgroup != 'Projector' AND productgroup != 'Series' AND producttext.lang = 'en'";

$USAarray = array("");
$FreightAarray['INF55WIN8-KIT'] = 200;
$FreightAarray['INF5720-KIT'] = 200;
$FreightAarray['INF5520a-NOPC'] = 200;
$FreightAarray['INF5520a-KIT'] = 200;
$FreightAarray['INF6501a'] = 250;
$FreightAarray['INF7001'] = 250;
$FreightAarray['INF7011'] = 250;
$FreightAarray['INF7021-KIT'] = 250;
$FreightAarray['INF8021-KIT'] = 499;
$FreightAarray['INF8001'] = 499;
$FreightAarray['INF8011'] = 499;
$FreightAarray['INF7001a'] = 250;


$result	=	mysqli_query($connection,$presql);

while($row	=	mysqli_fetch_assoc($result))
{
$Description[strtoupper($row['partnumber'])] = $row['description'];
$Weight[strtoupper($row['partnumber'])] = $row['weight'];
$Lamp[strtoupper($row['partnumber'])] = $row['accessorypn'];
}

$projectorAccessoriesSQL ='SELECT accessorypn FROM infocus_internal.Pricing_Core JOIN InFocus.acc_matrix on REPLACE(PartNumber,"-KIT","") = productpn GROUP BY accessorypn HAVING accessorypn LIKE "LENS%" OR accessorypn LIKE "%LAMP%" OR accessorypn LIKE "PROJ-EW%"';

$pAccessories = array();
$result	=	mysqli_query($connection,$projectorAccessoriesSQL);
while($row	=	mysqli_fetch_assoc($result))
{array_push($pAccessories, $row['accessorypn']);}


$collaborationAccessoriesSQL = 'SELECT accessorypn FROM (
SELECT PartNumber, Category FROM infocus_internal.Pricing_Core WHERE 
Category != "Large Venue Projectors" AND 
Category != "Home Theater Projector" AND
Category != "Office & Classroom Projectors" AND
Category != "Portable Projectors" AND
Category != "Interactive Projectors" 
) AS Pricing_Core JOIN InFocus.acc_matrix on REPLACE(PartNumber,"-KIT","") = productpn GROUP BY accessorypn';


$cAccessories = array();
$result	= mysqli_query($connection,$collaborationAccessoriesSQL);
while($row	=	mysqli_fetch_assoc($result))
{array_push($cAccessories, $row['accessorypn']);}

	
	
foreach($sheetsArray AS $sheetOptions){

$objPHPExcel = new PHPExcel();
$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_in_memory;
PHPExcel_Settings::setCacheStorageMethod($cacheMethod);
$objPHPExcel->removeSheetByIndex(0);


$cHeaders = explode(",",$sheetOptions['Column_Headers']);
$cFields = explode(",",$sheetOptions['Columns']);
$sheetScope = "A~:" . num_to_letter(count($cHeaders)) . "`";

if($sheetOptions['MP'] == "Y"){$MPSheet = true;}

if($MPSheet){$whereStr = "WHERE Pricing_Table.`Status` !='EOL'";
}
else{
$whereStr = "WHERE Pricing_Table.Category NOT LIKE 'Mondo%' AND Pricing_Table.`Status` !='EOL'";
}

$whereStr .= " ORDER BY 
IF(Pricing_Table.Category LIKE 'Mondopad%',1,
IF(Pricing_Table.Category LIKE 'Modocenter & Mondopad PC Upgrades',2,
IF(Pricing_Table.Category = 'BigTouch & JTouch',3,
IF(Pricing_Table.Category = 'Q-Tablet',4,
IF(Pricing_Table.Category = 'Video Phone',5,
IF(Pricing_Table.Category = 'Portable Projectors',6,
IF(Pricing_Table.Category = 'Office & Classroom Projectors',7,
IF(Pricing_Table.Category = 'Large Venue Projectors',8,
IF(Pricing_Table.Category = 'Home Theater Projector',9,
IF(Pricing_Table.Category = 'Interactive Projectors',10,
11)))))))))),Pricing_Table.Category, Pricing_Table.PartNumber";



$sql = 'SELECT * FROM (SELECT Pricing_Table.*, Pricing_PrevMo.Dist AS PrevMoDist, Pricing_PrevMo.DistPubSec AS PrevDistPubSec, Pricing_PrevMo.DemoPricing AS PrevDemo, NULL AS UsedWith FROM infocus_internal.Pricing_Core AS Pricing_Table LEFT JOIN infocus_internal.Pricing_PrevMo ON Pricing_Table.PartNumber = Pricing_PrevMo.PartNumber 
) as Pricing_Table ' . $whereStr . '';



$result	=	mysqli_query($connection,$sql);
$pRows = null;
$aRows = null;
$cRows = null;
$allRows = null;
$paRows = null;
$caRows = null;

while($row	=	mysqli_fetch_assoc($result))
{
if(strpos(strtoupper("x".$row['Category']),"PROJECTOR")>0){$pRows[] = $row;}
else{$cRows[] = $row;}
$allRows[] = $row;

}

$sql ="SELECT 
PartNumber,
Category,
`Status`,
NotesKey,
CurrentBom,
MAP,
BaseX,
Null AS DemoPricing,
Null AS PubSecMultiplier,
InstRebate,
BaseX AS Dist,
BaseX AS DistPubSec,
BaseX AS DirResp,
BaseX AS DirRestPubSec,
BaseX AS ProAV,
BaseX AS ProAVPubSec,
BaseX AS Strategic,
BaseX AS StrategicDist,
MSContractPrice,
MSList,
NYContractPrice,
NYList,
NULL AS CDWStrat,
EasyMoney,
ClubEasyMoney,
RegRewards,
AltClaimers,
CDWSpiff,
TroxellSpiff,
Description,
OnSpiffSheet,
SpiffDescription,
SpiffCategory,
CDWPartNumber,
NULL AS PrevMoDist,
NULL AS PrevDistPubSec,
NULL AS PrevDemo,
UsedWith
FROM infocus_internal.CalculatedAccessory WHERE `Status` !='EOL' ORDER BY Category";

$result	=	mysqli_query($connection,$sql);

while($row	=	mysqli_fetch_assoc($result))
{

$aRows[] = $row;
$allRows[] = $row;

if(in_Array($row['PartNumber'], $pAccessories)){$paRows[] = $row;}
if(in_Array($row['PartNumber'], $cAccessories)){$caRows[] = $row;}
}

$eDate = strtotime('first day of next month');
if(!empty($_REQUEST['date'])){$eDate = strtotime($_REQUEST['date']);}


if($sheetOptions['ID'] == "EZip"){createTab($allRows,"All",$cFields,$cHeaders);}
else{
$projectorFields = $cFields;
$projectorHeaders = $cHeaders;


if(in_array("DemoPricing",$projectorFields)){array_splice($projectorHeaders,array_search("DemoPricing",$projectorFields),1);
array_splice($projectorFields,array_search("DemoPricing",$projectorFields),1);}
if(in_array("Freight",$projectorFields)){array_splice($projectorHeaders,array_search("Freight",$projectorFields),1);
array_splice($projectorFields,array_search("Freight",$projectorFields),1);}
if(in_array("PrevDemo",$projectorFields)){array_splice($projectorHeaders,array_search("PrevDemo",$projectorFields),1);
array_splice($projectorFields,array_search("PrevDemo",$projectorFields),1);}


$accessoryFields = $projectorFields;
$accessoryHeaders = $projectorHeaders;

$searchValue = 'PubSec';
$position = searchArray($searchValue, $accessoryFields);

if($position != FALSE){array_splice($accessoryHeaders,$position,1);
array_splice($accessoryFields,$position,1);
}

if(in_array("Country",$projectorFields)){array_splice($accessoryHeaders,array_search("Country",$accessoryFields),1,"Used With");
array_splice($accessoryFields,array_search("Country",$accessoryFields),1,"UsedWith");}
if(in_array("Weight",$projectorFields)){array_splice($accessoryHeaders,array_search("Weight",$accessoryFields),1);
array_splice($accessoryFields,array_search("Weight",$accessoryFields),1);}
if(in_array("Lamp",$projectorFields)){array_splice($accessoryHeaders,array_search("Lamp",$accessoryFields),1);
array_splice($accessoryFields,array_search("Lamp",$accessoryFields),1);}


$collaborationFields = $cFields;
$collaborationHeaders = $cHeaders;
if(in_array("Lamp",$collaborationFields)){array_splice($collaborationHeaders,array_search("Lamp",$collaborationFields),1);
array_splice($collaborationFields,array_search("Lamp",$collaborationFields),1);}

createTab($aRows,"Accessories",$accessoryFields,$accessoryHeaders);
createTab($pRows,"Projectors",$projectorFields,$projectorHeaders,$paRows);
createTab($cRows,"Collaboration Products",$collaborationFields,$collaborationHeaders,$caRows);
}






if($_REQUEST['sheetid'] != "ALL"){
// redirect output to client browser
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $sheetOptions['ID'] . date(' M jS, Y' , $eDate) . '.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output'); 
}
else{
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('/home/ifcprod/public_html/upload/Pricing-Incentives/' . $sheetOptions['ID'] . date(' M jS, Y' , $eDate) . '.xlsx'); 
}


}



function searchArray($search, $array)
{
    foreach($array as $key => $value)
    {
        if (stristr($value, $search))
        {
            return $key;
        }
    }
    return false;
}
 

function createTab($primaryRows,$TabTitle,$cFields,$cHeaders,$secondaryRows = NULL){
global $Description;
global $Weight;
global $Lamp;
global $FreightAarray;
global $USAarray;
global $Multiplier;
global $sheetOptions;
global $sheetScope;
global $objPHPExcel;
global $_REQUEST;
global $eDate;

$sheetScope = "A~:" . num_to_letter(count($cHeaders)) . "`";

// Create a new worksheet 
$myWorkSheet = new PHPExcel_Worksheet($objPHPExcel, $TabTitle);
// Attach the worksheet as the first worksheet in the PHPExcel object
$objPHPExcel->addSheet($myWorkSheet, 0);

$objPHPExcel->setActiveSheetIndex(0);

$ActiveSheet = $objPHPExcel->getActiveSheet();


for ($x=1; $x<=26; $x++) {
$ActiveSheet->getColumnDimension(num_to_letter($x))->setWidth(13);
} 
if(in_array('NotesKey',$cFields)){
    $index = num_to_letter(array_search('NotesKey', $cFields)+1);
	$ActiveSheet->getColumnDimension($index)->setWidth(9.5);
 $ActiveSheet->getStyle($index)->getNumberFormat()->setFormatCode('0;-0;;@');
}
if(in_array('Description',$cFields)){
    $index = num_to_letter(array_search('Description', $cFields)+1);
	$ActiveSheet->getColumnDimension($index)->setWidth(81);
}
if(in_array('UsedWith',$cFields)){
    $index = num_to_letter(array_search('UsedWith', $cFields)+1);
	$ActiveSheet->getColumnDimension($index)->setWidth(81);
}
if(in_array('PartNumber',$cFields)){
    $index = num_to_letter(array_search('PartNumber', $cFields)+1);
	$ActiveSheet->getColumnDimension($index)->setWidth(18.3);
}

$i=1;



if($sheetOptions['Header'] == 1){
$ActiveSheet->mergeCells(sheetScope($i));
$ActiveSheet->getStyle(sheetScope($i))->getFont()->setSize(22);
$ActiveSheet->setCellValue('A' . $i++, 'InFocus | Collaboration That Works');
}
if(strlen($sheetOptions['Head_Description']) > 1){
$ActiveSheet->mergeCells(sheetScope($i));
$ActiveSheet->getStyle(sheetScope($i))->getFont()->setSize(14);
$ActiveSheet->setCellValue('A' . $i++, $sheetOptions['Head_Description']);
}
if($sheetOptions['Head_Date'] == 1){
$ActiveSheet->mergeCells(sheetScope($i));
$ActiveSheet->setCellValue('A' . $i++, "Effective " . date('F jS, Y' , $eDate));
}



$styleArray = array(
	'font' => array(
		'bold' => true,
	),
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	),
);

$j = 1;
foreach($cHeaders as $Value){
if($Value == ""){continue;}
if($cFields[$j-1] != "Description" AND $cFields[$j-1] != "NotesKey" AND $cFields[$j-1] != "PartNumber" AND $cFields[$j-1] != "Country" AND $cFields[$j-1] != "Weight"){
 $ActiveSheet->getStyle(num_to_letter($j))->getNumberFormat()->setFormatCode('$#,##0;;;@');
 }
$ActiveSheet->setCellValue(num_to_letter($j++) . $i, $Value);
}


$ActiveSheet->getStyle(sheetScope(1,$i))->applyFromArray($styleArray);
$tableTop = $i;
$ActiveSheet->getStyle(sheetScope($i++))->getAlignment()->setWrapText(true);

foreach($primaryRows as $row){

$prevCategory;

$BaseX = $row['BaseX'];
$COM = $row['CurrentBom'];
$MAP = $row['MAP'];
$DISTI = $row['Disti'];

if($row['Category'] != $prevCategory AND $sheetOptions['Category_Spacers'] == 1){
	if($row['Category'] == "PORTABLE" OR $row['Category'] == "OFFICE & CLASSROOM" OR $row['Category'] == "LARGE VENUE" OR $row['Category'] == "HOME THEATER" OR $row['Category'] == "INTERACTIVE"){ 
		$ActiveSheet->setCellValue('A' . $i, $row['Category'] . ' PROJECTORS');
		$ActiveSheet->getStyle(sheetScope($i))->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$ActiveSheet->getStyle(sheetScope($i))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
	}
	else{
		$ActiveSheet->setCellValue('A' . $i, $row['Category'] );
		$ActiveSheet->getStyle(sheetScope($i))->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		$ActiveSheet->getStyle(sheetScope($i))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
	}
$i = $i+1;
$prevCategory = $row['Category'];
}

foreach($row as $Key => &$Value){

if($Value == NULL AND $Key == "DemoPricing"){$Value = ROUND($COM * $Multiplier[$Key]);}
if($Value === '0' AND $Key == "DemoPricing"){$Value = "";}
elseif($Value == NULL AND $Key == "PubSecMultiplier"){$Value = $Multiplier[$Key];}
elseif($Value == NULL AND $Key == "AccyPubSec"){$Value = ROUND($MAP * $Multiplier[$Key]);}
elseif($Value == NULL AND $Key == "NYContractPrice"){$Value = ROUND($MAP * $Multiplier[$Key]);}
// elseif($Value == NULL AND $Key == "NYContractAccy"){$Value = ROUND($MAP * $Multiplier[$Key]);}
elseif($Value == NULL AND $Key == "NYList"){$Value = ROUND($MAP * $Multiplier[$Key]);}
elseif($Value == NULL AND $Key == "CDWStrat"){$Value = ROUND($row['Strategic']-$row['RegRewards']);}
elseif($Value == NULL AND $Key == "Description"){$Value = $Description[strtoupper(str_replace("-KIT","",$row['PartNumber']))];}
elseif($Value == NULL AND $Key == "UsedWith"){$Value = "";}
elseif($Value == NULL AND $Key == "NotesKey"){$Value = "";}
elseif($Value === '0'  AND ($Key != 'NotesKey' AND $Key != 'UsedWith' AND $Key != 'Description' AND $Key != 'PartNumber' AND $Key != 'Country')){$Value = "N/A";}
elseif($Value == NULL){$Value = ROUND($BaseX * $Multiplier[$Key]);}


if($Key == "PubSecMultiplier"){
$currentPSMult = $Value;
}
elseif(strpos($Key,"PubSec")>0 AND $Value == NULL){
$Value = ROUND($lastValue * $currentPSMult);
}

$lastValue = $Value;

if(($Value === '' OR $Value === '0' OR $Value == NULL OR $Value === 0)  AND ($Key != 'NotesKey' AND $Key != 'UsedWith' AND $Key != 'Description' AND $Key != 'PartNumber' AND $Key != 'Country')){$Value = "N/A";}

}			

$manufacturCtry = "China";
if(in_array($row['PartNumber'],$USAarray)){$manufacturCtry = "USA";}
$Freight = $FreightAarray[$row['PartNumber']];
if($Freight == NULL){$Freight = "";}
$WeightVal = $Weight[strtoupper($row['PartNumber'])];
if($WeightVal == NULL){$WeightVal = "N/A";}


$j = 1;
foreach($cFields as $Field){
if($Field == "Country"){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, $manufacturCtry);}
elseif($Field == "Weight"){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, $WeightVal);}
elseif($Field == "Freight"){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, $Freight);}
elseif($Field == "Date"){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, date('Y-m-d' , $eDate));}
elseif(substr($Field,0,1) == "'" AND substr($Field,-1) == "'" ){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, substr($Field,1,-1));}
elseif($Field == "Lamp"){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, $Lamp[strtoupper(str_replace("-KIT","",$row['PartNumber']))]);}
else{$ActiveSheet->setCellValue(num_to_letter($j++) . $i, $row[$Field]);}
}
$i = $i+1;


if(strpos($row['PartNumber'],"-KIT")>0 AND $row['PartNumber'] != "INF-MCENTER-KIT"){

$fieldArray = array('DirRestPubSec', 'ProAVPubSec', 'DistPubSec', 'ProAV', 'DirResp', 'Dist','MSContractPrice','NYContractPrice');

$server = '67.43.7.189';
$login = 'InternalAdmin';
$password = 'nIinmFd0Aclu';
$SelectDB = 'infocus_internal';
$subconnection = mysqli_connect($server,$login,$password, $SelectDB,3306);


$sql = "SELECT * FROM infocus_internal.Pricing_Kits WHERE kitsku = '" . $row['PartNumber'] . "' ORDER BY sortorder";
$subresult	=	mysqli_query($subconnection,$sql);
$subarray='';
while($subrow = mysqli_fetch_assoc($subresult))
{
$subcost = $subcost + $subrow['cost'];
$subarray[] = $subrow;
}

foreach($subarray as $subRow){
$j = 1;
if($subRow['weight']<=0){$subRow['weight'] = $Weight[strtoupper($subRow['partnumber'])];}
foreach($cFields as $Field){
if($Field == "Country"){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, $manufacturCtry);}
elseif($Field == "Weight"){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, $subRow['weight']);}
elseif($Field == "Description"){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, $subRow['description']);}
elseif($Field == "Date"){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, date('Y-m-d' , $eDate));}
elseif(substr($Field,0,1) == "'" AND substr($Field,-1) == "'" ){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, substr($Field,1,-1));}
elseif($Field == "Lamp"){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, $Lamp[strtoupper(str_replace("-KIT","",$subRow['PartNumber']))]);}
elseif($Field == "PartNumber"){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, $subRow['partnumber']);}
elseif(in_array($Field, $fieldArray) AND !empty($subRow['cost'])){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, $subRow['cost']);}
elseif(in_array($Field, $fieldArray) AND empty($subRow['cost'])){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, $row[$Field]-$subcost);}
elseif($Key == 'NotesKey' OR $Key == 'UsedWith' OR $Key == 'Description' OR $Key == 'PartNumber' OR $Key == 'Country'){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, "");}
else{$ActiveSheet->setCellValue(num_to_letter($j++) . $i, "N/A");}
}
$i = $i+1;
}

}
}


$styleArray = array(
	'borders' => array(
		'outline' => array(
			'style' => PHPExcel_Style_Border::BORDER_THICK,
			'color' => array('argb' => '00000000'),
		),
		'inside' => array(
			'style' => PHPExcel_Style_Border::BORDER_THIN,
			'color' => array('argb' => '00000000'),
		)));

$ActiveSheet->getStyle(sheetScope($tableTop, $i))->applyFromArray($styleArray);

$styleArray = array(
	'alignment' => array(
		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	),
);

if(in_array('UsedWith',$cFields)){
    $index = num_to_letter(array_search('UsedWith', $cFields)+2);
	$ActiveSheet->getStyle($index . ($tableTop) . ':Z' . $i)->applyFromArray($styleArray);

}
elseif(in_array('Description',$cFields)){
    $index = num_to_letter(array_search('Description', $cFields)+2);
	$ActiveSheet->getStyle($index . ($tableTop) . ':Z' . $i)->applyFromArray($styleArray);

}
elseif(in_array('PartNumber',$cFields)){
    $index = num_to_letter(array_search('PartNumber', $cFields)+2);
	$ActiveSheet->getStyle($index . ($tableTop) . ':Z' . $i)->applyFromArray($styleArray);
}


if($sheetOptions['Notes_Key'] == 1){
$ActiveSheet->getStyle('A' . $i . ':C' . $i+15)->getFont()->setSize(8);

$i = $i+3;

$ActiveSheet->setCellValue('A' . $i++, 'NOTES KEY:');

$sql = "SELECT * FROM infocus_internal.Pricing_Notes ORDER BY notenumber";
$subresult	=	mysqli_query($subconnection,$sql);

while($subrow = mysqli_fetch_assoc($subresult))
{
$ActiveSheet->setCellValue('B' . $i, $subrow['notenumber']);
$ActiveSheet->setCellValue('C' . $i++, $subrow['description']);
}

$ActiveSheet->setCellValue('A' . $i, 'InFocus Confidential');
}

}
































//Secondary Row Code.  Not currently in use
// if($secondaryRows != NULL AND FALSE){
// foreach($secondaryRows as $row){

// $prevCategory;

// $BaseX = $row['BaseX'];
// $COM = $row['CurrentBom'];
// $MAP = $row['MAP'];

// if($row['Category'] != $prevCategory AND $sheetOptions['Category_Spacers'] == 1){
	// if($row['Category'] == "PORTABLE" OR $row['Category'] == "OFFICE & CLASSROOM" OR $row['Category'] == "LARGE VENUE" OR $row['Category'] == "HOME THEATER" OR $row['Category'] == "INTERACTIVE"){ 
		// $ActiveSheet->setCellValue('A' . $i, $row['Category'] . ' PROJECTORS');
		// $ActiveSheet->getStyle(sheetScope($i))->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		// $ActiveSheet->getStyle(sheetScope($i))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
	// }
	// else{
		// $ActiveSheet->setCellValue('A' . $i, $row['Category'] );
		// $ActiveSheet->getStyle(sheetScope($i))->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK);
		// $ActiveSheet->getStyle(sheetScope($i))->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_WHITE);
	// }
// $i = $i+1;
// $prevCategory = $row['Category'];
// }

// foreach($row as $Key => &$Value){

// if($Value == NULL AND $Key == "DemoPricing"){$Value = 'N/A';}
// elseif($Value == NULL AND $Key == "PubSecMultiplier"){$Value = $Multiplier[$Key];}
// elseif($Value == NULL AND $Key == "AccyPubSec"){$Value = ROUND($MAP * $Multiplier[$Key]);}
// elseif($Value == NULL AND $Key == "NYContractPrice"){$Value = ROUND($MAP * $Multiplier[$Key]);}
// elseif($Value == NULL AND $Key == "NYContractAccy"){$Value = ROUND($MAP * $Multiplier[$Key]);}
// elseif($Value == NULL AND $Key == "NYListAccy"){$Value = ROUND($MAP * $Multiplier[$Key]);}
// elseif($Value == NULL AND $Key == "CDWStrat"){$Value = ROUND($row['Strategic']-$row['RegRewards']);}
// elseif($Value == NULL AND $Key == "Description"){$Value = $Description[strtoupper(str_replace("-KIT","",$row['PartNumber']))];}
// elseif($Value == NULL AND $Key == "UsedWith"){$Value = "";}
// elseif($Value == NULL AND $Key == "NotesKey"){$Value = "";}
// elseif($Value === '0' AND ($Key != 'NotesKey' AND $Key != 'UsedWith' AND $Key != 'Description' AND $Key != 'PartNumber' AND $Key != 'Country')){$Value = "N/A";}
// elseif($Value == NULL){$Value = ROUND($BaseX * $Multiplier[$Key]);}


// if($Key == "PubSecMultiplier"){
// $currentPSMult = $Value;
// }
// elseif(strpos($Key,"PubSec")>0 AND $Value == NULL){
// $Value = ROUND($lastValue * $currentPSMult);
// }

// $lastValue = $Value;

// if(($Value === '' OR $Value === '0' OR $Value == NULL OR $Value === 0) AND ($Key != 'NotesKey' AND $Key != 'UsedWith' AND $Key != 'Description' AND $Key != 'PartNumber' AND $Key != 'Country')){$Value = "N/A";}

// }			

// $manufacturCtry = "China";
// if(in_array($row['PartNumber'],$USAarray)){$manufacturCtry = "USA";}
// $Freight = $FreightAarray[$row['PartNumber']];
// $Freight = $FreightAarray[$row['PartNumber']];
// if($Freight == NULL){$Freight = "";}
// $WeightVal = $Weight[strtoupper(str_replace("-KIT","",$row['PartNumber']))];
// if($WeightVal == NULL){$WeightVal = "N/A";}

// $j = 1;
// foreach($cFields as $Field){
// if($Field == "Country"){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, $manufacturCtry);}
// elseif($Field == "Weight"){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, $WeightVal);}
// elseif($Field == "Freight"){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, $Freight);}
// elseif($Field == "Date"){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, date('Y-m-d' , $eDate));}
// elseif(substr($Field,0,1) == "'" AND substr($Field,-1) == "'" ){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, substr($Field,1,-1));}
// elseif($Field == "Lamp"){$ActiveSheet->setCellValue(num_to_letter($j++) . $i, $Lamp[strtoupper(str_replace("-KIT","",$row['PartNumber']))]);}
// else{$ActiveSheet->setCellValue(num_to_letter($j++) . $i, $row[$Field]);}



// }
// $i = $i+1;

// }
// }



?>