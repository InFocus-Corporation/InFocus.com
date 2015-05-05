<?php
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/resources/php/imageprocess.php"); 

if(!empty($_GET['lang'])){$lang=$_GET['lang'];}
else{
    if(substr($_SERVER['DOCUMENT_ROOT'], -4) == "html"){
        $lang = "en";
    }
    else{
        $lang = substr($_SERVER['DOCUMENT_ROOT'], -2);
    }
}
$result = mysqli_query($connection,'SELECT producttext.partnumber, listtitle, description, active FROM producttext WHERE category LIKE "%' . $_REQUEST['category'] . '%" AND lang="' . $lang . '" AND (productgroup = "Accessory" OR productgroup = "Peripheral") AND active is not null AND active != 0');
$data=array();
while($row = mysqli_fetch_array($result))
{
	$data[]['partnumber']=$row[0];
	$data[count($data)-1]['img']=imagethumb( $row[0], '132');
	$data[count($data)-1]['title']=$row[1];
	$data[count($data)-1]['desc']=$row[2];
}

echo json_encode($data);
?>