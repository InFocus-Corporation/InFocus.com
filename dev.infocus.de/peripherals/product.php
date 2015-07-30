<?php
preg_match_all('/\//', $_SERVER['SCRIPT_FILENAME'],$matches, PREG_OFFSET_CAPTURE);  
$rootdir = substr($_SERVER['SCRIPT_FILENAME'],$matches[0][2][1]+1,$matches[0][3][1]-$matches[0][2][1]-1);
require_once(str_replace($rootdir,"public_html",$_SERVER['SCRIPT_FILENAME']));
die();
?>