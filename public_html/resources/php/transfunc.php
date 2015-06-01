<?php
$sql = "SELECT keygroup, transtext FROM (SELECT transkey as keygroup FROM InFocus.labeltranslation GROUP BY transkey) as KeyList LEFT JOIN (SELECT transkey, transtext FROM InFocus.labeltranslation where labeltranslation.lang = '" . $lang . "') as labeltrans ON keygroup = transkey;";
$results = mysqli_query($connection,$sql);

while($row = mysqli_fetch_array($results)){
if($row[1] == null){$translate[$row[0]] = $row[0];}
else{$translate[$row[0]] = $row[1];}
}

$replaceArray = array(".php",".htm",".html","/","-");
$pagename = str_replace($replaceArray,"",$_SERVER['PHP_SELF']);
		$sql = 'SELECT EngText.textkey, if(LangText.`text` is null,EngText.`text`,LangText.`text`) as Text FROM (SELECT * FROM InFocus.sitetext WHERE lang = "en") AS EngText LEFT JOIN (SELECT * FROM InFocus.sitetext WHERE lang = "' . $lang . '") AS LangText ON (EngText.textkey = LangText.textkey AND EngText.pagename = LangText.pagename) WHERE EngText.pagename = "' . $pagename . '"';
		$results = mysqli_query($connection,$sql);
		while($row = mysqli_fetch_array($results)){
		$pageText[$row[0]] = $row[1];
		}
		
$localdir = dirname(__FILE__);
$homedir = $_SERVER['DOCUMENT_ROOT']; 
require_once($homedir . "/resources/php/imageprocess.php"); 

if($_GET['edit']=="true" OR $_COOKIE["cmsedit"] == "Activate Edit Mode"){
$_GET['edit']="true";
include($homedir . "/resources/php/infocusCMS.php");
}

function translate($key){
global $translate;

if($translate[$key] == NULL){return $key;}
else{return $translate[$key];}
}
?>