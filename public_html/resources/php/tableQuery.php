<?php


$groups_allowed	=	"admin,editor,saleseditor,marketingeditor";
require_once($_SERVER['DOCUMENT_ROOT']	.	"/login/ublock.php");

ini_set('default_charset',	'utf-8');
$lang	=	"en";
global	$localdir;
global	$homedir;	
$localdir	=	dirname(__FILE__);
$homedir	=	substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"public_html")+11);	
require_once($_SERVER['DOCUMENT_ROOT']	.	"/login/ubvars.php");
require_once($_SERVER['DOCUMENT_ROOT']	.	"/resources/php/connections.php");
mysqli_set_charset($connection,	"utf8");

if(!empty($_POST['fn']) OR !empty($_POST['where'])){

if(!empty($_POST['removerow'])){

if($_POST['table'] == "Downloadstmp" OR $_POST['table'] == "Downloads"){
$sql = "SELECT * FROM InFocus." . $_POST['table'] . " WHERE filename = '" . $_POST['fn'] . "'";
$result	=	mysqli_query($connection,$sql);

while($row	=	mysqli_fetch_assoc($result))
{
$dLangs = $row['lang'];
$dFile = $row['filename'];
$dLoc = $row['filelocation'];
$dExt = $row['extension'];
}
$dLangs = explode(",",$dLangs);
foreach($dLangs AS $dLang){
if($dLang != "EN"){unlink($_SERVER['DOCUMENT_ROOT'] . $dLoc . $dFile . "-" . $dLang . "." . $dExt);}
}
unlink($_SERVER['DOCUMENT_ROOT'] . $dLoc . $dFile . "." . $dExt);

$sql = "DELETE FROM InFocus." . $_POST['table'] . " WHERE filename = '" . $_POST['fn'] . "'";
$result	=	mysqli_query($connection,$sql);
}
elseif(empty($_POST['where'])){
$sql = "DELETE FROM InFocus." . $_POST['table'] . " WHERE filename = '" . $_POST['fn'] . "'";
$result	=	mysqli_query($connection,$sql);
}
else{
$sql = "DELETE FROM InFocus." . $_POST['table'] . " WHERE " . $_POST['where'];
$result	=	mysqli_query($connection,$sql);
}

echo "Success";
die();
}

if($_POST['language'] != "" AND $_POST['language'] != "EN" AND ($_POST['col'] == "description" OR $_POST['col'] == "category" OR $_POST['col'] == "title")){
	$_POST['table'] = "DownloadTrans";
	$cValue = "'" . $_POST['value'] . "'";

	$sql = "SELECT * FROM InFocus." . $_POST['table'] . " WHERE filename = '" . $_POST['fn'] . "' AND lang = '" . $_POST['language'] . "'";
	$result	=	mysqli_query($connection,$sql);
	$rowcount=mysqli_num_rows($result);

	if($rowcount == 0){
		$sql = "INSERT INTO InFocus." . $_POST['table'] . " SET " . $_POST['col'] . " = " . $cValue . ", filename = '" . $_POST['fn'] . "', lang = '" . $_POST['language'] . "'";
	}
	else{
		$sql = "UPDATE InFocus." . $_POST['table'] . " SET " . $_POST['col'] . " = " . $cValue . " WHERE filename = '" . $_POST['fn'] . "' AND lang = '" . $_POST['language'] . "'";
	}
}
else{
	$cValue = "'" . $_POST['value'] . "'";
	$sql = "UPDATE InFocus." . $_POST['table'] . " SET " . $_POST['col'] . " = " . $cValue . " WHERE filename = '" . $_POST['fn'] . "'";
}

$result	=	mysqli_query($connection,$sql);

if(mysqli_error($connection) == ""){echo "Success";}
else{ echo mysqli_error($connection);}
die();
}

if(!empty($_REQUEST['rows']) AND $_REQUEST['completereplace'] == "TRUE"){

$sql	=	"DELETE FROM "	.	$_REQUEST['table'];

$result	=	mysqli_query($connection,$sql);

foreach($_REQUEST['data']	as	$dataSet){

if($dataSet['To'] != ""){

$sql	=	"REPLACE INTO	"	.	$_REQUEST['table']	.	"	SET	";

foreach($dataSet	as	$key => $value){

$sql	.=	'`'	.	$key	.	'`	=	"'	.	mysqli_real_escape_string($connection,$value)	.	'",';
}
$sql	=	substr($sql,	0,	-1);	
$result	=	mysqli_query($connection,$sql);
}
}
echo	json_encode("success");

if($_REQUEST['htaccess'] == "TRUE"){



$htaccess_old = file_get_contents($_SERVER['DOCUMENT_ROOT']	. "/.htaccess");

$htopen = substr($htaccess_old,0,strpos($htaccess_old,"#Generated"));
$htclose = substr($htaccess_old,strpos($htaccess_old,"#EndGenerated")+14);

$sql = "SELECT * FROM redirects";
$result	=	mysqli_query($connection,$sql);
$htaccessmid = "#Generated
";
while($row	=	mysqli_fetch_assoc($result))
{
$htaccessmid .=  "RewriteRule  " . implode(" ",$row). "
";
}

$htaccessmid .= "#EndGenerated
";


file_put_contents($_SERVER['DOCUMENT_ROOT']	. "/.htaccess",$htopen . $htaccessmid . $htclose);

}

die();
}

if(!empty($_REQUEST['rows'])){
foreach($_REQUEST['rows']	as	$rows){

$dataSet	=	$_REQUEST['data'][$rows];

$intFields = array('weight', 'shipweight', 'lumenshigh', 'lumenslow', 'contrast', 'lamphigh', 'lamplow');

$i=0;
$sql	=	"REPLACE	INTO	"	.	$_REQUEST['table']	.	"	SET	";
foreach($dataSet	as	$value){

if(($_REQUEST['fields'][$i]	==	"id"	AND	$value		!=	"")	OR	$_REQUEST['fields'][$i]	!=	"id"){

if(in_array($_REQUEST['fields'][$i],$intFields)){
if($value == 0 OR $value == ""){$value = "null";}
$sql	.=	'`'	.	$_REQUEST['fields'][$i]	.	'`	=	'	.	mysqli_real_escape_string($connection,$value)	.	',';
}
else{
$sql	.=	'`'	.	$_REQUEST['fields'][$i]	.	'`	=	"'	.	mysqli_real_escape_string($connection,$value)	.	'",';
}

}
$i=$i+1;
}
$sql	=	substr($sql,	0,	-1);	
$result	=	mysqli_query($connection,$sql);
}
echo	json_encode("success");
die();
}

if(!empty($_REQUEST['dataset'])){
foreach($_REQUEST['dataset'] as $dataSet){

$intFields = array('weight', 'shipweight', 'lumenshigh', 'lumenslow', 'contrast', 'lamphigh', 'lamplow', 'rank');

$i=0;
$sql	=	"REPLACE	INTO	"	.	$_REQUEST['table']	.	"	SET	";
foreach($dataSet	as	$value){

if(($_REQUEST['fields'][$i]	==	"id"	AND	$value		!=	"")	OR	$_REQUEST['fields'][$i]	!=	"id"){

if(in_array($_REQUEST['fields'][$i],$intFields)){
if($value == 0 OR $value == ""){$value = "null";}
$sql	.=	'`'	.	$_REQUEST['fields'][$i]	.	'`	=	'	.	mysqli_real_escape_string($connection,$value)	.	',';
}
else{
$sql	.=	'`'	.	$_REQUEST['fields'][$i]	.	'`	=	"'	.	mysqli_real_escape_string($connection,$value)	.	'",';
}

}
$i=$i+1;
}
$sql	=	substr($sql,	0,	-1);	
$result	=	mysqli_query($connection,$sql);
}
echo	json_encode("success");
die();
}

if(!empty($sql)){
$result	=	mysqli_query($connection,$sql);

$colnameArray['partnumber']	=	"Part<br>Number";
$colnameArray['lang']	=	"Language";
$colnameArray['technology']	=	"Technology<br>(DLP,	LCD,	LED)";
$colnameArray['resolution']	=	"Native	Resolution<br>(1920x1080,	800x600,	1024x768)";
$colnameArray['resolutionname']	=	"Resolution	Name<br>(XGA,	SVGA,	WXGA)";
$colnameArray['resolutionvid']	=	"Video	Resolution<br>(480p,	576p,	720p,	1080i)";
$colnameArray['resolutionmax']	=	"Maximum	Compatable<br>Resolution";
$colnameArray['lumenshigh']	=	"Lumens	High/Bright";
$colnameArray['lumenslow']	=	"Lumens	Low/Econ";
$colnameArray['contrast']	=	"Contrast	Ratio";
$colnameArray['noiselow']	=	"Noise(Db)	Low";
$colnameArray['noisehigh']	=	"Noise(Db)	High";
$colnameArray['weight']	=	"Product	Weight";
$colnameArray['shipweight']	=	"Shipping	Weight";
$colnameArray['keystone']	=	"Keystone<br>(&plusmn;	30&ordm;V,+30&ordm;/-25&ordm;	V)";
$colnameArray['offset']	=	"Image	Offset";
$colnameArray['throwh']	=	"Throw	Ratio	High";
$colnameArray['throwl']	=	"Throw	Ratio	Low";
$colnameArray['class']	=	"Projector	Class<br>(Mobile,	Meeting,	Installation)";
$colnameArray['interactive']	=	"Interactive	Capability?";
$colnameArray['lamphigh']	=	"Lamp	Hours	High";
$colnameArray['lamplow']	=	"Lamp	Hours	Low";
$colnameArray['lamppn']	=	"Lamp	Part	Number";
$colnameArray['project']	=	"Project	Name";
$colnameArray['snprefix']	=	"Serial	Prefix";
$colnameArray['accessories']	=	"Included	Accessories";
$colnameArray['currentremote']	=	"Current	Remote	Part	Number<br>(if	different)";
$colnameArray['originalremote']	=	"Remote	Part	Number";
$colnameArray['3d']	=	"3D	Capable?";
$colnameArray['closecap']	=	"Closed	Captions?";
$colnameArray['speakers']	=	"Speakers<br>(#	and	Wattage)";
$colnameArray['connections']	=	"Connections	<br>(Display	Only!)";
$colnameArray['prodwarranty']	=	"Product	Warranty";
$colnameArray['lampwarranty']	=	"Lamp	Warranty";
$colnameArray['accwarranty']	=	"Accessory	Warranty";
$colnameArray['nativeaspect']	=	"Native	Aspect	Ratio<br>(16:9,	4:3,	16:10)";
$colnameArray['lifestatus']	=	"Life	Status<br>(blank	for	current,	EOL,	EOSL)";
$colnameArray['specfeatures']	=	"Special	Features";
$colnameArray['computerconnections']	=	"Computer	Connections";
$colnameArray['specfeatures']	=	"Special	Features";
$colnameArray['shippingdimensions']	=	"Shipping	Dimensions";
$colnameArray['Pixelpitch']	=	"Pixel	Pitch";
$colnameArray['viewingangle']	=	"Viewing	Angle";
$colnameArray['soundbaroutput']	=	"Soundbar	Output";
$colnameArray['diagonalsize']	=	"Diagonal	Size";
$colnameArray['activearea']	=	"Active	Area";


			$i	=	0;
			while	($i	<	mysqli_num_fields($result))	
			{
			$columnname	=	"";
			$columnname	=	$colnameArray[mysqli_fetch_field_direct($result,	$i)->name];
			if(empty($columnname)){
					if(strlen(mysqli_fetch_field_direct($result,	$i)->name)<4){$columnname	=	strtoupper(mysqli_fetch_field_direct($result,	$i)->name);}
					else{$columnname	=	ucfirst(mysqli_fetch_field_direct($result,	$i)->name);}
			}

			$fieldNames[$i]	=	mysqli_fetch_field_direct($result,	$i)->name;
			$colNames[$i]	=	$columnname;
			$i=$i+1;
			}


while($row	=	mysqli_fetch_assoc($result))
{
$javaArray[]	=	$row;
}			

}


?>