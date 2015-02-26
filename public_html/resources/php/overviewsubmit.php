<?php


$groups_allowed	=	"admin,editor,saleseditor,marketingeditor";
require_once($_SERVER['DOCUMENT_ROOT']	.	"/login/ublock.php");

ini_set('default_charset',	'utf-8');
global	$localdir;
global	$homedir;	
$localdir	=	dirname(__FILE__);
$homedir	=	substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"public_html")+11);	
require_once($_SERVER['DOCUMENT_ROOT']	.	"/login/ubvars.php");
require_once($_SERVER['DOCUMENT_ROOT']	.	"/resources/php/connections.php");
mysqli_set_charset($connection,	"utf8");

$i=0;

$sql = 'DELETE FROM productoverview WHERE partnumber = "' . $_REQUEST['pn'] . '" AND `lang` = "' . $_REQUEST['lang'] .'"';

$result	=	mysqli_query($connection,$sql);
$errors = mysqli_error($connection);

foreach($_REQUEST['html'] as $body){
$sql = 'REPLACE INTO productoverview SET `lang` = "' . $_REQUEST['lang'] . '", `partnumber` = "' . $_REQUEST['pn'] . '", `name` = "' . mysqli_real_escape_string($connection,$_REQUEST['name'][$i]) . '", `tagline` = "' . mysqli_real_escape_string($connection,$_REQUEST['tag'][$i]) . '", `image` = "' . mysqli_real_escape_string($connection,$_REQUEST['image'][$i]) . '", `body` = "' . mysqli_real_escape_string($connection,$body) . '", `order` =  ' . $i;  

$result	=	mysqli_query($connection,$sql);

$i = $i+1;
$errors .= mysqli_error($connection);
}

if(strlen($errors)>0){echo "Some errors occurred.  Check with your administrator before proceeding.";}
else{echo "Changes Saved";}

?>