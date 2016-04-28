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


if(!empty($_REQUEST['rows'])){
foreach($_REQUEST['rows']	as	$rows){

$dataSet	=	$_REQUEST['data'][$rows];

$intFields = array('weight', 'shipweight', 'lumenshigh', 'lumenslow', 'contrast', 'lamphigh', 'lamplow');

$i=0;
$htaccess;

$htaccess .= "RewriteRule  " . implode(" ",$_REQUEST['data'][$rows]) . "
";

}

file_put_contents($_SERVER['DOCUMENT_ROOT']	. "/tmp/httest/.htaccess",$htaccess);

$file = 'http://www.infocus.com/tmp/httest/';
$file_headers = @get_headers($file);
if($file_headers[0] == 'HTTP/1.1 500 Internal Server Error') {
echo	json_encode("fail");
}
else {
echo	json_encode("success");
}

die();
}



?>