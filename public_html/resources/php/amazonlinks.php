<?php 

$AmazonSearch = file_get_contents("http://www.infocusstore.com/Projectors/b/7288433011?searchSize=36&field_availability=-1&field_browse=7288433011&searchNodeID=7288433011&refinementHistory=brandtextbin%2Csubjectbin%2Ccolor_map%2Cprice%2Csize_name&searchRank=salesrank&searchPage=1");
$AmazonSearch = substr($AmazonSearch,strpos($AmazonSearch,'<div id="searchResultsContainer"'));
$AmazonSearch = explode(" <a href=",$AmazonSearch);
$lastValue = "";
foreach($AmazonSearch as &$Result){
$Result = substr($Result,0,strpos($Result,"?"));
if(strpos($Result,"InFocus-")>0){
if($Result != $lastValue){
$pn = str_replace("LightPro-","",str_replace('"http://www.infocusstore.com/InFocus-',"",$Result));
$pn = strtoupper(substr($pn,0,strpos($pn,"-")));
$products[$pn] = str_replace('"','',$Result);
}}
$lastValue = $Result;
}

$AmazonSearch = file_get_contents("http://www.infocusstore.com/Touch/b/7288440011?ie=UTF8&title=Touch&searchSize=36&field_availability=-1");
$AmazonSearch = substr($AmazonSearch,strpos($AmazonSearch,'<div id="searchResultsContainer"'));
$AmazonSearch = explode(" <a href=",$AmazonSearch);
$lastValue = "";
$searchA = 	array("LIGHTPRO-", '"HTTP://WWW.INFOCUSSTORE.COM/INFOCUS-', "Q-TABLET-FOR-BUSINESS", "Q-TABLET-FOR-HOME", "JTOUCH-70", "JTOUCH-55", "BIGTOUCH-55", "BIGTOUCH-70", "JTOUCH-65", "MONDOPAD-55", "MONDOPAD-70", "MONDOPAD-80", "BIGTOUCH-57","TABLET-SCHOOLS-10","TABLET-HOME-10","TABLET-BUSINESS-10");
$replaceA = array("", "", "INP~120Q~PR-", "INP~120Q-", "INF7001A", "INF5520A~NOPC", "INF55WIN8", "INF7011", "INF6501A", "INF5520A", "INF7021", "INF8021", "INF5711","INP~120Q~ED","INP~120Q","INP~120Q~PR");

foreach($AmazonSearch as &$Result){
$Result = substr($Result,0,strpos($Result,"?"));
$Resulttemp = strtoupper($Result);
if(strpos($Resulttemp,"INFOCUS-")>0){
if($Resulttemp != $lastValue){
$pn = str_replace($searchA,$replaceA,$Resulttemp);
$pn = str_replace("~","-",strtoupper(substr($pn,0,strpos($pn,"-"))));
$products[$pn] = str_replace('"','',$Result);
}}
$lastValue = $Result;
}

$AmazonSearch = file_get_contents("http://www.infocusstore.com/Communication/b/7288444011?ie=UTF8&title=Communication&searchSize=36&field_availability=-1");
$AmazonSearch = substr($AmazonSearch,strpos($AmazonSearch,'<div id="searchResultsContainer"'));
$AmazonSearch = explode(" <a href=",$AmazonSearch);
 
$lastValue = "";

foreach($AmazonSearch as &$Result){
$Result = substr($Result,0,strpos($Result,"?"));
$Resulttemp = strtoupper($Result);
if(strpos($Resulttemp,"INFOCUS-")>0){
if($Resulttemp != $lastValue){
$pn = str_replace($searchA,$replaceA,$Resulttemp);
$pn = str_replace("~","-",strtoupper(substr($pn,0,strpos($pn,"-"))));
$products[$pn] = str_replace('"','',$Result);
}}
$lastValue = $Result;
}


	$conn = mysqli_connect('67.43.0.33','InFocus','InF0cusP@ssw0rd', 'InFocus',3306);
	mysqli_set_charset($conn, "utf8");
	ini_set('default_charset', 'utf-8');

		$sql = "SELECT partnumber, link FROM InFocus.buylinks";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($result))
		{$products[strtoupper($row['partnumber'])] = $row['link'];}

file_put_contents("/home/ifcprod/public_html/resources/misc/links",serialize($products));
?>