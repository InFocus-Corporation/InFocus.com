<?php



if(!empty($_POST['searchString'])){
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");

if(substr($_SERVER['SERVER_NAME'], -2)!="om"){
$lang = substr($_SERVER['SERVER_NAME'], -2);
}
else{
$lang = "en";
} 

$sql = "SELECT * FROM InFocus.searchterms";
$results = mysqli_query($connection,$sql);

while($row = mysqli_fetch_array($results)){
$search[$row[0]] = $row[1];
}

$searchString = mysqli_real_escape_string($connection, mb_strtoupper($_POST['searchString'], 'UTF-8'));

$sql = 'INSERT INTO search SET SearchString = "' . $searchString .'"';
$result = mysqli_query($connection,$sql);

$searchString = str_replace(" ","",$searchString);
$searchString = str_replace("-","",$searchString);


if(array_key_exists($searchString,$search)){
echo $search[$searchString];
die();
}

$searchString = str_replace("SERIES","",$searchString);
$searchString = str_replace("FAMILY","",$searchString);

if(strrpos($searchString , "CASE")>0) {$accessorytrue = '#overview-accessories';}
$searchString = str_replace("CASE","",$searchString);
if(strrpos($searchString , "MOUNT")>0) {$accessorytrue = '#overview-accessories';}
$searchString = str_replace("MOUNT","",$searchString);
if(strrpos($searchString , "CEILINGMOUNT")>0) {$accessorytrue = '#overview-accessories';}
$searchString = str_replace("CEILINGMOUNT","",$searchString);
if(strrpos($searchString , "REMOTE")>0) {$accessorytrue = '#overview-accessories';}
$searchString = str_replace("REMOTE","",$searchString);
if(strrpos($searchString , "WARRANTY")>0) {$accessorytrue = '#overview-accessories';}
$searchString = str_replace("WARRANTY","",$searchString);
if(strrpos($searchString , "WARRANTIE")>0) {$accessorytrue = '#overview-accessories';}
$searchString = str_replace("WARRANTIE","",$searchString);
if(strrpos($searchString , "WARRANTEE")>0) {$accessorytrue = '#overview-accessories';}
$searchString = str_replace("WARRANTEE","",$searchString);
if(strrpos($searchString , "SCREEN")>0) {$accessorytrue = '#overview-accessories';}
$searchString = str_replace("SCREEN","",$searchString);

if(strrpos($searchString , "LAMP")>0) {$lamptrue = true;}
$searchString = str_replace("LAMP","",$searchString);
if(strrpos($searchString , "BULB")>0) {$lamptrue = true;}
$searchString = str_replace("BULB","",$searchString);
if(strrpos($searchString , "LIGHT")>0) {$lamptrue = true;}
$searchString = str_replace("LIGHT","",$searchString);



$sql = 'SELECT productgroup, category, partnumber FROM producttext WHERE (
partnumber LIKE "' . $_POST['searchString'] . '" OR 
partnumber LIKE "' . $searchString . '" OR 
partnumber LIKE "' . $searchString . '-Series" OR 
partnumber LIKE "IN' . $searchString . '" OR 
partnumber LIKE "IN' . $searchString . '-Series" OR 
partnumber LIKE "INS-' . $searchString . '" OR 
partnumber LIKE "INS-' . $searchString . '-Series" OR 
partnumber LIKE "INF-' . $searchString . '" OR 
partnumber LIKE "INF' . $searchString . '" OR 
partnumber LIKE "INF' . $searchString . '-Series") 
AND lang = "' . $lang . '" AND producttext.active != 86';
$result = mysqli_query($connection,$sql);
if(mysqli_num_rows($result)==0)
{

$searchString = str_replace("EP","",$searchString);
$sql = 'SELECT productgroup, category, partnumber FROM producttext WHERE (
partnumber LIKE "' . $_POST['searchString'] . '%" OR 
partnumber LIKE "' . $searchString . '%" OR 
partnumber LIKE "' . $searchString . '%-Series" OR 
partnumber LIKE "IN' . $searchString . '%" OR 
partnumber LIKE "IN' . $searchString . '%-Series" OR 
partnumber LIKE "INS-' . $searchString . '%" OR 
partnumber LIKE "INS-' . $searchString . '%-Series" OR 
partnumber LIKE "INF' . $searchString . '%" OR 
partnumber LIKE "INF' . $searchString . '%-Series") 
AND lang = "' . $lang . '" AND producttext.active != 86';
$result = mysqli_query($connection,$sql);
if(mysqli_num_rows($result)==0)
{echo 'No Results';
die();}
}

while($row = mysqli_fetch_array($result))
{
$partnumber = $row[2];

switch($row[0]){

	case 'Display':
	echo '/displays/' . $partnumber . $accessorytrue ;	
	die();
	Break;

	case 'Projector':
	if($lamptrue){
	$result2 = mysqli_query($connection,'SELECT accessorypn FROM acc_matrix WHERE (productpn = "' . $partnumber . '" AND accessorypn LIKE "%LAMP%")');
	if(mysqli_num_rows($result2)==0)
	{echo 'nada';}
	while($row = mysqli_fetch_array($result2))
	{echo '/accessories/' . $row[0];	die();}
	
	}
	echo '/projectors/' . $partnumber . $accessorytrue ;	
	die();
	Break;

	case 'Accessory':
	echo '/accessories/' . $partnumber ;	
	die();
	Break;

	case 'Peripheral':
	echo '/peripherals/' . $partnumber ;	
	die();
	Break;

	case 'Series':
	if($row[1] == "display"){
	echo '/displays/' . $partnumber;	
	die();
	}
	else{
	echo '/projectors/' . $partnumber;
	die();	
	}
	Break;
}

}




}


?>

