<?PHP

if(strpos(dirname(__FILE__),"dev")>0){


}

// error_reporting (0);

require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");
mysqli_set_charset($connection, "utf8");
ini_set('default_charset', 'utf-8');

if(!empty($_GET['lang'])){$lang=$_GET['lang'];}
elseif(1==2){
// parse list of comma separated language tags and sort it by the quality value
function parseLanguageList($languageList) {
    if (is_null($languageList)) {
        if (!isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            return array();
        }
        $languageList = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    }
    $languages = array();
    $languageRanges = explode(',', trim($languageList));
    foreach ($languageRanges as $languageRange) {
        if (preg_match('/(\*|[a-zA-Z0-9]{1,8}(?:-[a-zA-Z0-9]{1,8})*)(?:\s*;\s*q\s*=\s*(0(?:\.\d{0,3})|1(?:\.0{0,3})))?/', trim($languageRange), $match)) {
            if (!isset($match[2])) {
                $match[2] = '1.0';
            } else {
                $match[2] = (string) floatval($match[2]);
            }
            if (!isset($languages[$match[2]])) {
                $languages[$match[2]] = array();
            }
            $languages[$match[2]][] = strtolower($match[1]);
        }
    }
    krsort($languages);
    return $languages;
}

// compare two parsed arrays of language tags and find the matches
function findMatches($accepted, $available) {
    $matches = array();
    $any = false;
    foreach ($accepted as $acceptedQuality => $acceptedValues) {
        $acceptedQuality = floatval($acceptedQuality);
        if ($acceptedQuality === 0.0) continue;
        foreach ($available as $availableQuality => $availableValues) {
            $availableQuality = floatval($availableQuality);
            if ($availableQuality === 0.0) continue;
            foreach ($acceptedValues as $acceptedValue) {
                if ($acceptedValue === '*') {
                    $any = true;
                }
                foreach ($availableValues as $availableValue) {
                    $matchingGrade = matchLanguage($acceptedValue, $availableValue);
                    if ($matchingGrade > 0) {
                        $q = (string) ($acceptedQuality * $availableQuality * $matchingGrade);
                        if (!isset($matches[$q])) {
                            $matches[$q] = array();
                        }
                        if (!in_array($availableValue, $matches[$q])) {
                            $matches[$q][] = $availableValue;
                        }
                    }
                }
            }
        }
    }
    if (count($matches) === 0 && $any) {
        $matches = $available;
    }
    krsort($matches);
    return $matches;
}

// compare two language tags and distinguish the degree of matching
function matchLanguage($a, $b) {
    $a = explode('-', $a);
    $b = explode('-', $b);
    for ($i=0, $n=min(count($a), count($b)); $i<$n; $i++) {
        if ($a[$i] !== $b[$i]) break;
    }
    return $i === 0 ? 0 : (float) $i / count($a);
}

$accepted = parseLanguageList($_SERVER['HTTP_ACCEPT_LANGUAGE']);
$available = parseLanguageList('en, de');
$matches = findMatches($accepted, $available);
if(empty($matches[0])){$lang="en";}
else{$lang=$matches[0];}
}
else{

if(substr($_SERVER['DOCUMENT_ROOT'], -4)=="html"){
$lang = "en";
}
else{
$lang = substr($_SERVER['DOCUMENT_ROOT'], -2);
} 
}

if(basename($_SERVER['PHP_SELF']) == "product.php" OR basename($_SERVER['PHP_SELF']) == "family.php" OR basename($_SERVER['PHP_SELF']) == "unknown.php")
{

$pn=strtoupper($_GET['series']);
if(empty($pn)){$pn=strtoupper($_GET['pn']);}
if(empty($pn)){$pn=strtoupper($_SERVER['QUERY_STRING']);}

$pn = str_replace("_","-",$pn);
if(strpos($pn,"$")>0){$pn = substr($pn,0,strpos($pn,"$")-1);}


$find = array("CLONE","PROJECTOR","SHORT","THROW","LEGACY","THEATER","HOME","THEATRE","DISPLAY","INFOCUS-","SCREENPLAY-","1080P","PROJEKTOR","LCD","LED","INTERACTIVE","INTERAC","INTERAKTIV","SERIES","--","-DE","LITESHOWII","LITESHOWIII"," ","%20");
$replace = array("","","","","","","","","","","","","","","","","","","-","","","LITESHOW2","LITESHOW3","","");
$producttest = str_replace($find,$replace,$pn);
if(substr($producttest,-1,1) == "-"){$producttest = substr($producttest,0,-1);}
if(substr($producttest,0,1) == "-"){$producttest = substr($producttest,1,99);}

if($_GET['edit']=="true" OR $_COOKIE["cmsedit"] == "Activate Edit Mode"){file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/test.txt", $producttest . "\n", FILE_APPEND);}


$sql = 'SELECT producttext.partnumber, producttext.active, producttext.productgroup, `productseries`.`series`, producttext.category FROM producttext LEFT JOIN productseries ON (`productseries`.`partnumber` = `producttext`.`partnumber` AND `productseries`.`lang` = `producttext`.`lang`) WHERE (producttext.partnumber = "' . $pn . '" OR producttext.partnumber = "IN' . $pn . '" OR producttext.partnumber = "INS-' . $pn . '") AND producttext.lang = "' . $lang . '" LIMIT 1';

$result = mysqli_query($connection,$sql);

 if(mysqli_num_rows($result)==0)
{
$producttest = mysqli_real_escape_string($connection, strtoupper($producttest));
$result = mysqli_query($connection,'SELECT producttext.partnumber, producttext.active, producttext.productgroup FROM producttext WHERE (producttext.partnumber = "' . $producttest . '" OR producttext.partnumber = "IN' . $producttest . '" OR producttext.partnumber = "INS-' . $producttest . '") AND producttext.lang = "' . $lang . '" LIMIT 1');

 if(mysqli_num_rows($result)==0)
{
$result = mysqli_query($connection,'SELECT producttext.partnumber, producttext.active, producttext.productgroup, `productseries`.`series` FROM producttext LEFT JOIN productseries ON (`productseries`.`partnumber` = `producttext`.`partnumber` AND `productseries`.`lang` = `producttext`.`lang`) WHERE (producttext.partnumber LIKE "' . $producttest . '-SERIES"  OR producttext.partnumber LIKE "' . $producttest . '") AND producttext.lang = "' . $lang . '" LIMIT 1');


 if(mysqli_num_rows($result)==0)
 {
 if($_GET['ref']=="doc"){
 header("Location: /FileNotFound"); die();
 }
 else{header("HTTP/1.0 404 Not Found");header("Location: /404"); die();}}
}
}



while($row = mysqli_fetch_array($result))
{
 if(strpos(strtoupper($row[0]),"SERIES")>0){$seriestest = $row[0];}
 $productresult = $row[0];
 $productgroup = $row[2];
 if($productgroup == "Series"){
	if($row[4] == "services"){$productgroup = "Peripheral";}
	elseif($row[4] == "peripheral"){$productgroup = "Peripheral";}
	elseif($row[4] == "display"){$productgroup = "Display";}
	else{$productgroup = "Projector";}
 }
}

 $productgroupa['projectors'] = "Projector";
 $productgroupa['displays'] = "Display";
 $productgroupa['accessories'] = "Accessory";
 $productgroupa['peripherals'] = "Peripheral";
 $productgroupa['Projector'] = "projectors";
 $productgroupa['Display'] = "displays";
 $productgroupa['Accessory'] = "accessories";
 $productgroupa['Peripheral'] = "peripherals";
 
 if($_GET['edit']=="true" OR $_COOKIE["cmsedit"] == "Activate Edit Mode"){file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/test.txt", "Series Test:" . $seriestest . "\n Product Result:" . $productresult . "\n", FILE_APPEND);}

$_GET['pn'] = $productresult;
$_GET['series'] = $seriestest;

if(strtoupper($seriestest) != strtoupper($pn) AND $seriestest != NULL )
{
header("HTTP/1.0 301 Moved Permanently");header("Location: /". $productgroupa[$productgroup] . "/" . $seriestest);die();}

 if($seriestest != NULL AND basename($_SERVER['PHP_SELF']) != "family.php")
{
header("HTTP/1.0 301 Moved Permanently");header("Location: /". $productgroupa[$productgroup] . "/" . $seriestest); die();}

 if($productgroupa[substr($_SERVER['REQUEST_URI'],1,strpos($_SERVER['REQUEST_URI'],"/",1)-1)] != $productgroup)
{
header("HTTP/1.0 301 Moved Permanently");header("Location: /". $productgroupa[$productgroup] . "/" . $productresult); die();}

}
elseif(basename($_SERVER['PHP_SELF']) == "custompage.php"){
if(empty($_GET['pagename'])){$_GET['pagename'] = $_SERVER['QUERY_STRING'];}
$pn = str_replace("_","-",$pn);
if(strpos($pn,"$")>0){$pn = substr($pn,0,strpos($pn,"$")-1);}
error_log("Test");

		$sql = "SELECT pagecontent FROM pages WHERE pagename = '" . $_GET['pagename'] . "' AND lang = '" . $lang . "'";
		$results = mysqli_query($connection,$sql);
		if(mysqli_num_rows($results)==0)
		{header("Location: /unknown.php?" . $_GET['pagename']); die();}
}


//deploy.io failed to push update.  Testing.
if((time()-filemtime($_SERVER['DOCUMENT_ROOT'] . "/resources/misc/links"))>86400){

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

$searchA = 	array("LIGHTPRO-", '"HTTP://WWW.INFOCUSSTORE.COM/INFOCUS-', "JTOUCH-70", "JTOUCH-55", "BIGTOUCH-55", "BIGTOUCH-70", "JTOUCH-65", "MONDOPAD-55", "MONDOPAD-70", "MONDOPAD-80", "Q-TABLET");
$replaceA = array("", "", "INF7001A", "INF5520A~NOPC", "INF55WIN8", "INF7011", "INF6501A", "INF5520A", "INF7021", "INF8021", "INP~110Q-");

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

$searchA = 	array("LIGHTPRO-", '"HTTP://WWW.INFOCUSSTORE.COM/INFOCUS-', "JTOUCH-70", "JTOUCH-55", "BIGTOUCH-55", "BIGTOUCH-70", "JTOUCH-65", "MONDOPAD-55", "MONDOPAD-70", "MONDOPAD-80", "Q-TABLET");
$replaceA = array("", "", "INF7001A", "INF5520A~NOPC", "INF55WIN8", "INF7011", "INF6501A", "INF5520A", "INF7021", "INF8021", "INP~110Q-");

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


file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/resources/misc/links",serialize($products));
}
else{
$productLinks = unserialize(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/resources/misc/links"));
}



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
require_once($homedir . "/resources/php/imagetest.php"); 

if($_GET['edit']=="true" OR $_COOKIE["cmsedit"] == "Activate Edit Mode"){
$_GET['edit']="true";
include($homedir . "/resources/php/infocusCMS.php");
}

function getSeriesText(){
global $pn;
global $lang;
global $connection;
global $title;
global $price;
global $header;
global $blurb;
global $list;
global $firmwaretext;
global $active;
global $stitle;
global $sheader;
global $sblurb;
global $slist;
global $sactive;
global $newlist;
global $product;
global $series;
global $translate;
global $breadcrumb;
global $productgroupa;
global $productgroup;

$pn=strtoupper($_GET[series]);
if(empty($pn)){$pn=strtoupper($_SERVER['QUERY_STRING']);}

// $find = array("CLONE","PROJECTOR","SHORT","THROW","DISPLAY","INFOCUS-","SCREENPLAY-","PROJEKTOR","LCD","LED","INTERACTIVE","INTERAC","INTERAKTIV","--","-DE","1080P","LEGACY");
// $replace = array("","","","","","","","","","","","","","-","","","");

// $pn = str_replace($find,$replace,$pn);
$series = mysqli_real_escape_string($connection, strtoupper($pn));

$result = mysqli_query($connection,'SELECT * FROM productseries WHERE `productseries`.`series` = "' . $series . '" AND productseries.lang = "' . $lang . '"');
 if(mysqli_num_rows($result)==0)
{
$tmplang = $lang;
$lang = "en";
}


$result = mysqli_query($connection,'SELECT title, price, header, blurb, differencelist, producttext.partnumber, producttext.active, producttext.productgroup FROM producttext JOIN productseries ON (`productseries`.`partnumber` = `producttext`.`partnumber` AND `productseries`.`lang` = `producttext`.`lang`) WHERE `productseries`.`series` = "' . $series . '" AND producttext.lang = "' . $lang . '"');

$i=0;
while($row = mysqli_fetch_array($result))
{
 $title[$i] = $row[0];
 $price[$i] = $row[1];
 $header[$i] = $row[2];
 $blurb[$i] = $row[3];
 $list[$i] = $row[4];
 $product[$i] = $row[5];
 $active[$i] = $row[6];
 $i=$i+1;
 $productmeta = $row[7];
}

$result = mysqli_query($connection,'SELECT title, header, blurb, list, partnumber, active, category FROM producttext WHERE `producttext`.`partnumber` = "' . $series . '" AND lang = "' . $lang . '"');
 
while($row = mysqli_fetch_array($result))
{
 $stitle = $row[0];
 $sheader = $row[1];
 $sblurb = $row[2];
 $slist = $row[3];
 $sactive = $row[5];
  $productcategory = $row[6];

}

if(!empty($tmplang)){$lang = $tmplang;}
$slist = explode("</li>",$slist);
$newlist="";
$slistcount = count($slist);
$i=1;
foreach($slist AS $listbullet){
$newlist .= $listbullet;
$i=$i+1;
if($i>($slistcount/2)){
$newlist .= "</ul><ul style='margin-left: 20px;'>";
$i=-20;
}
}

if($productmeta == "Projector"){$productmeta = translate('Projector') . ",Beamer";}
elseif($productmeta == "Display"){$productmeta = translate('Projector') . ",Touch,Touchscreen";}
else{$productmeta = $translate[$productmeta];}

$whereStr=" WHERE (";
foreach($product as $model){
$whereStr .= 'productpn = "' . $model . '" OR ';
}
$whereStr = substr($whereStr,0,-4) . ') AND (accessorypn like "SP-LAMP%" OR accessorypn like "LENS%")';

$result = mysqli_query($connection,'SELECT accessorypn FROM(SELECT accessorypn FROM acc_matrix ' . $whereStr . ') as groupacc GROUP BY accessorypn' );
while($row = mysqli_fetch_array($result))
{
$productmeta .= ",".$row[0];
}
$productmeta .= ",".$productcategory;

echo '
<title>' . $stitle . " | InFocus</title>";
echo '
<meta name="description" content="' . str_replace('"',"''", $sblurb) . '"/>';
echo '
<meta name="keywords" content="' . $stitle . ',Infocus' . $productmeta . '" />

';


switch ($productgroup) {
    case "Projector":
		$indexpage = '> <a href="/projectors">' . translate("Projectors") . '</a>';
        break;
    case "Display":
		$indexpage = '> <a href="/displays">' . translate("Interactive Displays") . '</a>';
        break;
    case "Accessory":
    case "Peripheral":
		$indexpage = ' > <a href="/accessories">' . translate("Accessories") . '</a>';
        break;
}

$breadcrumb = '<a href="/">' . translate('Home') . '</a>' . $indexpage . ' > <a href="/' . $productgroupa[$productgroup] . '/' . $pn . '">' . $pn . '</a>';

$breadcrumb = str_replace("A-SERIES","a-Series",$breadcrumb);
$breadcrumb = str_replace("SERIES","Series",$breadcrumb);

}


function getProductText(){
global $pn;
global $lang;
global $connection;
global $title;
global $price;
global $header;
global $blurb;
global $list;
global $firmwaretext;
global $active;
global $additionalimages;
global $productgroup;
global $translate;
global $breadcrumb;
global $productgroupa;

$pn=strtoupper($_GET['pn']);
if(empty($pn)){$pn=$_SERVER['QUERY_STRING'];}

 if($_GET['edit']=="true" OR $_COOKIE["cmsedit"] == "Activate Edit Mode"){file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/test.txt", "Series Test:" . $seriestest . "\n Product Result:" . $pn . "\n", FILE_APPEND);}


// $find = array("CLONE-","-PROJECTOR","-SHORT","-THROW","-DISPLAY","INFOCUS-","SCREENPLAY-","-PROJEKTOR","-LCD","-LED","-INTERACTIVE","-INTERAC","-INTERAKTIV","-SERIES","-DE","-1080P","-LEGACY");
// $replace = array("","","","","","","","","","","","","","","","","");

// $pn = str_replace($find,$replace,$pn);

$pn = mysqli_real_escape_string($connection, $pn);
$result = mysqli_query($connection,'SELECT title, price, header, blurb, list, firmware, active, additionalimages, productgroup, series FROM producttext LEFT JOIN productseries on productseries.partnumber = producttext.partnumber AND productseries.lang = producttext.lang  WHERE producttext.partnumber = "' . $pn . '" AND producttext.lang = "' . $lang . '"');

while($row = mysqli_fetch_array($result))
{
 $title = $row[0];
 $price = $row[1];
 $header = $row[2];
 $blurb = $row[3];
 $list = $row[4];
 $firmwaretext =  $row[5];
 $active =  $row[6];
 $additionalimages = $row[7];
 $productgroup = $row[8];
 $series = $row[9];
}

if($series != null){
$result = mysqli_query($connection,'SELECT category FROM producttext WHERE producttext.partnumber = "' . $series . '" AND lang = "' . $lang . '"');
}
else{
$result = mysqli_query($connection,'SELECT category FROM producttext WHERE producttext.partnumber = "' . $pn . '" AND lang = "' . $lang . '"');
}

while($row = mysqli_fetch_array($result))
{
 $productcategory = $row[0];
}

$productmeta = $productgroup;

if($productmeta == "Projector"){$productmeta = translate('Projector') . ",Beamer";}
elseif($productmeta == "Display"){$productmeta = translate('Projector') . ",Touch,Touchscreen";}
else{$productmeta = $translate[$productmeta];}

$whereStr=" WHERE (";
$whereStr .= 'productpn = "' . $pn . '") AND (accessorypn like "SP-LAMP%" OR accessorypn like "LENS%")';

$result = mysqli_query($connection,'SELECT accessorypn FROM(SELECT accessorypn FROM acc_matrix ' . $whereStr . ') as groupacc GROUP BY accessorypn' );
while($row = mysqli_fetch_array($result))
{
$productmeta .= ",".$row[0];
}
$productmeta .= ",".$productcategory;

echo '
<title>' . $title . " | InFocus</title>";
echo '
<meta name="description" content="' . str_replace('"',"''", $blurb) . '"/>';
echo '
<meta name="keywords" content="' . $pn . ',Infocus' . $productmeta . '" />

';

if($productgroup == "Projector"){
$pn = str_replace("A","a",$pn);
$series = str_replace("A","a",$series);
}


switch ($productgroup) {
    case "Projector":
		$indexpage = '> <a href="/projectors">' . translate("Projectors") . '</a>';
        break;
    case "Display":
		$indexpage = '> <a href="/displays">' . translate("Interactive Displays") . '</a>';
        break;
    case "Accessory":
    case "Peripheral":
		$indexpage = ' > <a href="/accessories">' . translate("Accessories") . '</a>';
        break;
}

if($series != NULL){
$familypage = ' > <a href="/' . $productgroupa[$productgroup] . '/' . $series . '">' . $series . '</a>';
}

$breadcrumb = '<a href="/">' . translate('Home') . '</a>' . $indexpage . $familypage . ' > <a href="/' . $productgroupa[$productgroup] . '/' . $pn . '">' . $pn . '</a>';

}


function getSeriesPanels($productType = ""){
global $product;
global $series;
global $list;
global $active;
global $price;
global $dsWhere;
global $models;
global $model;
global $sactive;
global $productLinks;
global $translate;

$i=0;
foreach($product as $model){

if(($sactive != 0 AND $sactive != null AND $active[$i] != 0 AND $active[$i] != null) OR ($sactive == 0 OR $sactive == null)){

echo   '<li >
     <a href="' . $productType . '' . $model . '"><img  style="margin:0 auto;" src="'. imagethumb($model,'135') . '"></a>
     <div >
      <a href="' . $productType . '' . $model . '"><h6 class="title">' . str_replace("A","a",$model) . '</h6></a>
      ' . str_replace("<ul>",'<ul class="spec-list">', $list[$i]) . '
      ';
      
switch($active[$i]){
case 1:
case 2:
case 5:
case 6:    
echo   '      <small class="price">';
if(strlen($price[$i])>0){echo $price[$i] . '<span id="price" style="display:none">******</span>'; }

if($active[$i] != 2 AND $productLinks[strtoupper($model)] != null){echo '<span class="infolink" title="InFocusStore.com price in US Dollars. Prices may vary elsewhere.
"></span> <a onclick = "ga('. "'send','event','button','click','Buy Now'" . ')" href="' . $productLinks[$model] . '" >' . translate('Buy Now') . ' <span style="font-size:70%">(US)</span> >></a>';}
else{echo '<span class="infolink" title="' . translate('Manufacturer\'s Suggested Retail Price (MSRP) in US Dollars. Actual price may vary by dealer and country; consult your local Authorized InFocus Reseller for details.') . '"></span>';}
echo '</small><br>';
break;

case 4:
echo   '      <small class="price"><a onclick = "ga('. "'send','event','button','click','Buy Now'" . ')" href="http://collaborate.infocus.com/' . $model . '">' . translate('Buy Now') . ' <span style="font-size:70%">(US)</span>  >></a></small><br>';
break;

case 9:
echo   '      <small class="price"><a onclick = "ga('. "'send','event','button','click','Buy Now'" . ')" href="http://outlet.infocus.com/s?defaultSearchTextValue=Search&searchKeywords=' . $model . '+-lamp+-filter&Action=submit">' . translate('Buy Now') . ' <span style="font-size:70%">(US)</span> >></a></small>';
break;

default:
echo   '      <small class="price"> </small><br>';
break;
}

echo   '      <a href="' . $productType . '' . $model . '" class="blue_btn" style="width:80%;">' . translate('Learn More') . '</a>
     </div>
     
    </li>';
$models .= $model . ",";
    }

if(empty($dsWhere)){$dsWhere .=  " relatedproducts LIKE '%" . $model . ";%'";}
else{$dsWhere .=  " OR relatedproducts LIKE '%" . $model . ";%'";}
$i=$i+1;
}
$models = substr($models,0 ,-1);
}


function getProductButtons(){
global $pn;
global $title;
global $price;
global $active;
global $translate;
global $series;
global $productLinks;
global $productgroup;

if(strtolower($series) == "bigtouch-series"){$resellerloc = "?Bigtouch";}
if(strtolower($series) == "jtouch-series"){$resellerloc = "?JTouch";}
if(strtolower($series) == "mondopad-series"){$resellerloc = "?Mondopad";}

  echo '<div style="vertical-align:bottom;"><h1 class="mysqledit h2" id="pagetitle" style=""  >' . $title . '</h1>
  Part Number: ' . $pn . '</div>';

if($productLinks[strtoupper($pn)] == null AND $productgroup != "Accessory" AND $productgroup != "Peripheral"){

switch($active){
case 6:
case 3:
$active = 3;
break;
case 0:
case 9:
break;
default:
$active = 2;
}
}  

switch($active){
case 1:
case 5:
case 6:
echo '<div class=""><ul class="action-links Col_child bnwp">';
echo '      <li><span  class="cost mysqledit" id="price" style="font-size:160%;">';
if(strlen($price)>0){echo $price . ' <span class="infolink" title="InFocusStore.com price in US Dollars. Prices may vary elsewhere.
"></span>'; }
echo '</span>';
break;

case 2:
case 7:

echo '<div class=""><ul class="action-links Col_child">';
echo '      <li  class="cost mysqledit" id="price" style="font-size:160%;">';
if(strlen($price)>0){echo $price . ' <span class="infolink" title="' . translate('Manufacturer\'s Suggested Retail Price (MSRP) in US Dollars. Actual price may vary by dealer and country; consult your local Authorized InFocus Reseller for details.') . '"></span>'; }
echo '</li>';

}

switch($active){
case 1:
case 5:
case 6:

if($productLinks[strtoupper($pn)] != null AND $productgroup != "Accessory"){echo '<a onclick = "ga('. "'send','event','button','click','Buy Now'" . ')" class="btn buy-now" href="' . $productLinks[strtoupper($pn)] . '" >' . translate('Buy Now') . ' <span style="font-size:70%">(US)</span></a></li>';}

if($productLinks[strtoupper($pn)] == null AND ($productgroup == "Accessory" OR $productgroup == "Peripheral" )){echo '<a onclick = "ga('. "'send','event','button','click','Buy Now'" . ')" class="btn buy-now" href="http://infocusstore.com/s?defaultSearchTextValue=Search&searchKeywords=' . $pn . '&Action=submit" >' . translate('Buy Now') . ' <span style="font-size:70%">(US)</span></a></li>';}
}


switch($active){
case 1:
echo '      <li><a class="form-box" style="display:block" href="/resources/forms/getaquote">' . $translate["Get a Quote"] . '</a>';
echo '      <a class="" href="/reseller-locator' . $resellerloc . '">' . $translate["Find a Reseller"]. '</a></li>';
break;
case 6:
echo '      <li><a class="" style="display:block" href="/reseller-locator' . $resellerloc . '">' . $translate["Find a Reseller"]. '</a>';
echo '      <a class=" form-box cboxElement" href="/resources/forms/mpdemo">' . $translate["Request a Demo"] . '</a></li>';
break;
case 4:
echo '<div class=""><ul class="action-links Col_child">';
echo   '      <li><a onclick = "ga('. "'send','event','button','click','Buy Now'" . ')" href="http://collaborate.infocus.com/' . $pn . '" class="btn learn-more">' . $translate["Buy Now"] . ' <span style="font-size:70%">(US)</span></a></li>';
break;
case 9:
echo '<div class=""><ul class="action-links Col_child">';
echo   '      <li><a href="http://outlet.infocus.com/s?defaultSearchTextValue=Search&searchKeywords=' . $pn . '+-lamp+-filter&Action=submit" class="btn learn-more">Available on Outlet Store</a></li>';
}

switch($active){
case 3:
echo '<div class=""><ul class="action-links Col_child">';
case 2:
case 4:
case 7:

echo '      <li><a class="btn form-box" href="/resources/forms/getaquote">' . $translate["Get a Quote"] . '</a></li>';
echo '      <li><a class="btn" href="/reseller-locator' . $resellerloc . '">' . $translate["Find a Reseller"]. '</a></li>';
}


switch($active){
case 3:
echo '      <li><a class="btn form-box cboxElement" href="/resources/forms/mpdemo">' . translate("Request a Demo") . '</a></li>';
break;

case 8:
echo '<div class=""><ul class="action-links Col_child">';
echo '      <li><a class="btn" href="#overview">' . $translate["Download"] . '</a></li>';
}
if($active != 0 AND $active != null){echo '</ul></div>'; }
}


function getProductFileName(){
global $pn;
global $product;
global $series;
global $suffix;
global $lang;
global $localdir;
global $homedir;
global $fileName;
global $connection;




$result = mysqli_query($connection,'SELECT `series` FROM productseries WHERE `productseries`.`partnumber` = "' . $pn . '"');
 
while($row = mysqli_fetch_array($result))
{
 $series = $row[0];
}



if(file_exists($localdir . "/" . $pn . "-" . $lang . '.src')){
$fileName = $localdir . "/" . $pn . "-" . $lang . '.src';
}
elseif(file_exists($localdir . "/" . $series . "-" . $lang . '.src')){
$fileName = $localdir . "/" . $series . "-" . $lang . '.src';
}
elseif(file_exists($homedir."/resources/overviews/" . $pn . "-" . $lang . '.src')) {
$fileName = $homedir."/resources/overviews/" . $pn . "-" . $lang . '.src';
}
elseif(file_exists($homedir."/resources/overviews/" . $series . "-" . $lang . '.src')) {
$fileName = $homedir."/resources/overviews/" . $series . "-" . $lang . '.src';
}
elseif(file_exists($homedir."/resources/overviews/" . str_replace("-Series","",$series) . '-' . $lang . '.src')) {
$fileName = $homedir."/resources/overviews/" . str_replace("-Series","",$series) . '-' . $lang . '.src';
}

}



function getProductImages($thumbs = 'True'){
global $homedir;
global $pn;
global $series;
global $imagethumb;
global $imgprod;
global $additionalimages;

$pn = strtoupper($pn);

 echo '<image src="';


 echo imagethumb($pn ,'550');
 
 echo '"/>';
 if($thumbs != "True"){return;}
 echo '<script>console.log("' . $pn . '");</script><div style="text-align:right;margin-top:15px;height:80px;padding-right:140px">';
  
//<!--Alternate product images labled -Back, -Side, and -Top-->




  if(!empty($additionalimages)){
  if(substr($additionalimages,-1)==";"){$additionalimages = substr($additionalimages,0,-1);}
  $additionalimages = explode(";", $additionalimages);
  foreach($additionalimages AS $image){
   $image = explode(",", $image);
   if(file_exists($homedir . "/resources/images/" . $image[0] )){
   echo '<a class="group1" href="' . imagethumb($image[0] ,'800') . '" title="' . $image[1] . '"><img class="thumb" src="' . imagethumb($image[0] ,null,'70'). '" alt="' . $image[1] . '" onerror="$(this).hide()"></a>';
   }
  }
  }

   
$standardpics = array("-Back.jpg","-Front.jpg","-Side.jpg","-Top.jpg","-Right.jpg");


  foreach($standardpics AS $imgend){

  if(file_exists($homedir . "/resources/images/InFocus-" . $pn . $imgend )){
  echo '<a class="group1" href="' . imagethumb("InFocus-" . $pn . $imgend,'800') . '" title="InFocus ' . $pn . ' (' . substr($imgend,1,-4) .')"><img class="thumb" src="' . imagethumb("InFocus-" . $pn . $imgend,'','70') . '"></a>
  
  ';
  }
  elseif(file_exists($homedir . "/resources/images/InFocus-" . $series . $imgend )){
  echo '<a class="group1" href="' . imagethumb("InFocus-" . $series . $imgend,'800') . '" title="InFocus ' . $series . ' (' . substr($imgend,1,-4) .')"><img class="thumb" src="' . imagethumb("InFocus-" . $series . $imgend,'','70') . '"></a>
  
  ';
  }

  
  }
  

  echo '</div>';
}

function getProductAccessories(){  
global $connection;
global $lang;
global $pn;

echo '<ul class="C10 resultsList" style="padding-top:4em;">';

mysqli_set_charset($connection, "utf8");
$result = mysqli_query($connection,'SELECT title, acc_matrix.accessorypn, producttext.partnumber, acc_matrix.rank
FROM acc_matrix LEFT JOIN producttext ON (producttext.partnumber = acc_matrix.accessorypn) WHERE producttext.lang = "'. $lang . '" AND acc_matrix.productpn = "' . $pn . '" ORDER BY acc_matrix.rank, acc_matrix.accessorypn');
 
	if(mysqli_num_rows ($result) ==0){
	echo '<script>
   $("#accessorysection").hide();
   </script>';
	}

 while($row = mysqli_fetch_array($result))
 {

 echo '<li>
     <a href="/accessories/' . strtoupper($row[1]) . '">
      <div class="image-set" style="margin:auto;"><img src="' . imagethumb(strtoupper($row[1]),null,'220') . '"></div>
      <h6>' . $row[0] . '</h6>
     </a>
   </li>
    ';

 }

echo '</ul>';

}


function getProductWorksWith(){  
global $connection;
global $lang;
global $pn;

echo '<ul class="C10 resultsList" style="padding-top:4em;">';

mysqli_set_charset($connection, "utf8");
$result = mysqli_query($connection,'SELECT title, acc_matrix.productpn, producttext.partnumber, acc_matrix.rank
FROM acc_matrix LEFT JOIN producttext ON (producttext.partnumber = acc_matrix.productpn) WHERE producttext.lang = "'. $lang . '" AND acc_matrix.accessorypn = "' . $pn . '" ORDER BY acc_matrix.rank, acc_matrix.productpn');
 
	if(mysqli_num_rows ($result) ==0){
	echo '<script>
   $("#workswithsection").hide();
   </script>';
	}

 while($row = mysqli_fetch_array($result))
 {

 echo '<li>
     <a href="/accessories/' . strtoupper($row[1]) . '">
      <div class="image-set" style="margin:auto;"><img src="' . imagethumb(strtoupper($row[1]),null,'220') . '"></div>
      <h6>' . $row[0] . '</h6>
     </a>
   </li>
    ';

 }

echo '</ul>';

}


function getProductDownloadnew($sql){
global $connection;
global $pn;
global $lang;
global $translate;


$languagelist['AA'] = 'Afár af';
$languagelist['AF'] = 'Afrikaans';
$languagelist['AK'] = 'Akan';
$languagelist['AM'] = 'ኣማርኛ (amarəñña)';
$languagelist['AN'] = 'Fabla / l\'Aragonés';
$languagelist['AR'] = '(al arabiya) العربية';
$languagelist['AS'] = 'অসমীয়া (asamīẏa)';
$languagelist['AY'] = 'Aymar aru';
$languagelist['AZ'] = 'Azərbaycan dili / Азәрбајҹан дили / آذربايجانجا ديلي';
$languagelist['BA'] = 'башҡорт теле (bašḵort tele)';
$languagelist['BE'] = 'Беларуская мова (Bielaruskaja mova)';
$languagelist['BG'] = 'български (bãlgarski) български език (bãlgarski ezik)';
$languagelist['BM'] = 'Bamanankan';
$languagelist['BN'] = 'বাংলা (baɛṅlā)';
$languagelist['BO'] = 'བོད་སྐད་ (pö-gay)';
$languagelist['BR'] = 'Ar brezhoneg / brezhoneg';
$languagelist['BS'] = 'Bosanski / босански / بۉسانسقى';
$languagelist['CE'] = 'Нохчийн мотт (Noxchiin mott)';
$languagelist['CH'] = '中文 (zhōngwén)';
$languagelist['CO'] = 'Aorsu';
$languagelist['CR'] = 'ᓀᐦᐃᔭᐍᐏᐣ (Nēhiyawēwin) ᓀᐦᐃᔭᐤ (Nēhiyaw)';
$languagelist['CS'] = 'čeština / český jazyk';
$languagelist['CY'] = 'Cymraeg / Y Gymraeg';
$languagelist['DA'] = 'Dansk';
$languagelist['DE'] = 'Deutsch';
$languagelist['EE'] = 'Eʋegbe';
$languagelist['EO'] = 'Esperanto';
$languagelist['ET'] = 'Eesti keel';
$languagelist['EU'] = 'Europe English';//'euskara';
$languagelist['FA'] = '(fārsī) فارسى';
$languagelist['FI'] = 'Suomi / suomen kieli';
$languagelist['FJ'] = 'Vakaviti';
$languagelist['FO'] = 'Føroyskt';
$languagelist['FR'] = 'Français';
$languagelist['GL'] = 'Galego';
$languagelist['GN'] = 'Avañe\'ẽ';
$languagelist['GU'] = 'ગુજરાતી (gujarātī)';
$languagelist['GV'] = 'Gaelg/Gailck (Vanninagh) / Yn Ghaelg / Y Ghailck';
$languagelist['HA'] = '(ḥawsa) حَوْسَ';
$languagelist['HE'] = '(ivrit) עברית / עִבְרִית';
$languagelist['HI'] = 'हिन्दी (hindī)';
$languagelist['HR'] = 'Hrvatski';
$languagelist['HU'] = 'Magyar / magyar nyelv';
$languagelist['HY'] = 'Հայերէն (Hayeren)';
$languagelist['HZ'] = 'Otjiherero';
$languagelist['ID'] = 'Bahasa Indonesia';
$languagelist['IG'] = 'Igbo';
$languagelist['IS'] = 'Íslenska';
$languagelist['IT'] = 'Italiano ';
$languagelist['IU'] = 'ᐃᓄᒃᑎᑐᑦ (inuktitut)';
$languagelist['JA'] = '日本語 (nihongo)';
$languagelist['JV'] = 'Basa Jawa';
$languagelist['KA'] = 'ქართული (kʻartʻuli) ქართული ენა (kʻartʻuli ena)';
$languagelist['KG'] = 'Kikongo';
$languagelist['KK'] = 'Қазақ тілі / Qazaq tili / قازاق ٴتىلى';
$languagelist['KN'] = 'ಕನ್ನಡ (kannaḍa)';
$languagelist['KO'] = '한국어 [韓國語] (han-guk-eo)';
$languagelist['KR'] = 'Kanuri';
$languagelist['KS'] = 'कॉशुर / كٲشُر';
$languagelist['KU'] = 'Kurdí / کوردی / к’öрди';
$languagelist['KV'] = 'коми кыв (komi kyv)';
$languagelist['KW'] = 'Kernewek / Kernowek / Kernuak / Curnoack';
$languagelist['LA'] = 'Lingua Latina';
$languagelist['LG'] = 'LùGáànda';
$languagelist['LN'] = 'lingála';
$languagelist['LO'] = 'ພາສາລາວ (pháasaa láo)';
$languagelist['LT'] = 'Lietuvių kalba';
$languagelist['LV'] = 'Latviešu valoda';
$languagelist['MG'] = 'Fiteny Malagasy';
$languagelist['MH'] = 'Kajin M̧ajeļ / Kajin Majōl';
$languagelist['MK'] = 'македонски (Makedonski) македонски јазик (makedonski jazik)';
$languagelist['ML'] = 'മലയാളം (malayāḷam)';
$languagelist['MN'] = 'монгол (mongol) монгол хэл (mongol hêl)';
$languagelist['MR'] = 'मराठी (marāṭhī)';
$languagelist['MS'] = 'Bahasa melayu';
$languagelist['MT'] = 'Malti';
$languagelist['MY'] = 'Bama saka';
$languagelist['NA'] = 'Ekakairũ Naoero';
$languagelist['NE'] = 'नेपाली (nēpālī)';
$languagelist['NO'] = 'Norsk';
$languagelist['OM'] = 'Afaan Oromo';
$languagelist['OR'] = 'ଓଡ଼ିଆ (ōṛiyā)';
$languagelist['PI'] = 'पालि (pāli)';
$languagelist['PL'] = 'Polski / język polski / polszczyzna';
$languagelist['PT'] = 'Português';
$languagelist['QU'] = 'Qhichwa';
$languagelist['RM'] = 'Rumantsch';
$languagelist['RU'] = 'Русский язык (Russkij jazyk)';
$languagelist['RW'] = 'Ikinyarwanda';
$languagelist['SA'] = 'संस्कृतम् (saṃskṛtam) संस्कृता भाषा (saṃskṛtā bhāṣā)';
$languagelist['SC'] = 'Limba Sarda / sardu';
$languagelist['SD'] = '(sindhī) سنڌي';
$languagelist['SG'] = 'Yângâ tî Sängö';
$languagelist['SK'] = 'Slovenčina';
$languagelist['SL'] = 'Slovenščina';
$languagelist['SM'] = 'Gagana Samoa';
$languagelist['SN'] = 'ChiShona';
$languagelist['SO'] = 'Af Soomaali';
$languagelist['SQ'] = 'Shqip / gjuha shqipe';
$languagelist['SQ'] = 'Shqip / gjuha shqipe';
$languagelist['SR'] = 'Cрпски (srpski) српски језик (srpski jezik)';
$languagelist['SS'] = 'SiSwati';
$languagelist['SU'] = 'Basa Sunda';
$languagelist['SV'] = 'Svenska';
$languagelist['SW'] = 'Kiswahili';
$languagelist['TA'] = 'தமிழ் (tamiḻ)';
$languagelist['TE'] = 'తెలుగు (telugu)';
$languagelist['TG'] = 'тоҷики / toçikī / تاجيكي';
$languagelist['TH'] = 'ภาษาไทย (paasaa-tai)';
$languagelist['TI'] = 'ትግርኛ (təgərəña)';
$languagelist['TK'] = 'түркmенче (türkmençe) түркмен дили (türkmen dili)';
$languagelist['TL'] = 'Tagalog';
$languagelist['TN'] = 'Setswana';
$languagelist['TR'] = 'Türkçe';
$languagelist['TS'] = 'XiTsonga';
$languagelist['TT'] = 'татарча / tatar tele / تاتارچا (tatarça)';
$languagelist['TW'] = 'Twi';
$languagelist['TY'] = 'Te reo tahiti / te reo Māʼohi';
$languagelist['UK'] = 'Українська (Ukrajins\'ka)';
$languagelist['UR'] = '(urdū) اردو';
$languagelist['UZ'] = 'أۇزبېك ﺗﻴﻠی o\'zbek tili ўзбек тили (o‘zbek tili)';
$languagelist['VE'] = 'TshiVenḓa';
$languagelist['VI'] = 'Tiếng việt (㗂越)';
$languagelist['VT'] = 'Tiếng việt (㗂越)';
$languagelist['WA'] = 'Talon';
$languagelist['WO'] = 'Wollof';
$languagelist['XH'] = 'IsiXhosa';
$languagelist['YI'] = '(Yidish) ײִדיש';
$languagelist['YO'] = 'Yorùbá';
$languagelist['ZH'] = '中文 (zhōngwén)';
$languagelist['ZU'] = 'IsiZulu';
$languagelist['EN'] = 'English';
$languagelist['ES'] = 'Español';
$languagelist['SP'] = 'Español';
$languagelist['NL'] = 'Nederlands';
$languagelist['ZHS'] = '中文 (zhōngwén)';
$languagelist['ZHT'] = '中文 (zhōngwén)';


   $result = mysqli_query($connection,$sql);

   $dlRows;
   
       while($row = mysqli_fetch_array($result))
    {
		$languages = explode(",",$row[1]);
		if(in_array(strtoupper($lang),$languages) AND $lang != "en"){$filename =  $row[0] . '-' . strtoupper($lang);}
			else{$filename = $row[0];}
		if($row[8] == null){$dTitle = $row[0];}
		else{$dTitle = $row[8];}
	     $dlRows[$row['category']][] = '<tr class="' . $row['category'] . '"><td><img  src="/resources/images/'.$row[5].'icon" style="width:45px;vertical-align:top;" /></td><td style="text-align:left;font-size:large;"><a onclick = "ga('. "'send','event','Link','click','" . $row[0] . "'" . ')" href="' . $row[3] . $filename . '.' . $row[5] . '"><span class="title">' . translate($dTitle) . '</span><br><span class="description">' . translate($row[2]) . '</span></a></td><td><ul class="langlist" >
		 <li>'.translate('Choose Language').'<ul>';
		foreach($languages as $language){
		
		if($language == "EN"){$dlRows[$row['category']][COUNT($dlRows[$row['category']])-1] .= '<li><a onclick = "ga('. "'send','event','Link','click','" . $row[0] . "'" .  ')" href="' . $row[3] . $row[0] . "." . $row[5] . '"' .">" . $languagelist[$language] . "</a></li>";}
		elseif($languagelist[$language] == null){$dlRows[$row['category']][COUNT($dlRows[$row['category']])-1] .= '<li><a onclick = "ga('. "'send','event','Link','click','" . $row[0] . "-$language'" .  ')" href="' . $row[3] . $row[0] . "-$language." . $row[5] . '"' .">$language</a></li>";}
		else{$dlRows[$row['category']][COUNT($dlRows[$row['category']])-1] .= '<li><a onclick = "ga('. "'send','event','Link','click','" . $row[0] . "-$language'" .  ')" href="' . $row[3] . $row[0] . "-$language." . $row[5] . '"' .">" . $languagelist[$language] . "</a></li>";}
		}
		$dlRows[$row['category']][COUNT($dlRows[$row['category']])-1] .= "</ul></ul></td></tr>";
    }
   
  if(COUNT($dlRows['Datasheets'])>0){
  echo "<h2 style='margin-top:40px;text-align:center;'>Datasheets</h2>";
//<!--Trans-Marker-->
    echo '<div class="rounded" style="margin:auto;max-wi
dth:960px;"><table><thead><tr class="HeaderRow"><th style="width:45px">' . translate('Type') . '</th><th>' . translate('File name & Description') . '</th><th style="width: 120px;">' . translate('Language') . '</th></tr></thead><tbody>';

foreach($dlRows['Datasheets'] as $row){
echo $row;
}
//space
      echo '</tbody>';
      echo '</table></div>';
}

  if(COUNT($dlRows['User Guides'])>0){
  echo "<h2 style='margin-top:40px;text-align:center;'>User Guides</h2>";
//<!--Trans-Marker-->
    echo '<div class="rounded" style="margin:auto;max-wi
dth:960px;"><table><thead><tr class="HeaderRow"><th style="width:45px">' . translate('Type') . '</th><th>' . translate('File name & Description') . '</th><th style="width: 120px;">' . translate('Language') . '</th></tr></thead><tbody>';

foreach($dlRows['User Guides'] as $row){
echo $row;
}
//space
      echo '</tbody>';
      echo '</table></div>';
}

  if(COUNT($dlRows['Firmware'])>0){
  echo "<h2 style='margin-top:40px;text-align:center;'>Firmware</h2>";
//<!--Trans-Marker-->
    echo '<div class="rounded" style="margin:auto;max-wi
dth:960px;"><table><thead><tr class="HeaderRow"><th style="width:45px">' . translate('Type') . '</th><th>' . translate('File name & Description') . '</th><th style="width: 120px;">' . translate('Language') . '</th></tr></thead><tbody>';

foreach($dlRows['Firmware'] as $row){
echo $row;
}
//space
      echo '</tbody>';
      echo '</table></div>';
}


foreach($dlRows as $othercat){

  if(COUNT($dlRows[$othercat])>0){
  echo "<h2 style='margin-top:40px;text-align:center;'>$othercat</h2>";
//<!--Trans-Marker-->
    echo '<div class="rounded" style="margin:auto;max-wi
dth:960px;"><table><thead><tr class="HeaderRow"><th style="width:45px">' . translate('Type') . '</th><th>' . translate('File name & Description') . '</th><th style="width: 120px;">' . translate('Language') . '</th></tr></thead><tbody>';

foreach($dlRows['$othercat'] as $row){
echo $row;
}
//space
      echo '</tbody>';
      echo '</table></div>';
}

}

  if(COUNT($dlRows[''])>0){
  echo "<h2 style='margin-top:40px;text-align:center;'>Other</h2>";
//<!--Trans-Marker-->
    echo '<div class="rounded" style="margin:auto;max-wi
dth:960px;"><table><thead><tr class="HeaderRow"><th style="width:45px">' . translate('Type') . '</th><th>' . translate('File name & Description') . '</th><th style="width: 120px;">' . translate('Language') . '</th></tr></thead><tbody>';

foreach($dlRows[''] as $row){
echo $row;
}
//space
      echo '</tbody>';
      echo '</table></div>';
}

}


function getProductDownloads($sql){
global $connection;
global $pn;
global $lang;
global $translate;

   $result = mysqli_query($connection,$sql);

//<!--Trans-Marker-->
    echo '<div class="rounded" style="margin-top:40px"><table><thead><tr class="HeaderRow"><th>' . translate('Type') . '</th><th>' . translate('File name & Description') . '</th><th >' . translate('Other Languages') . '</th></tr></thead><tbody>';

    if(mysqli_num_rows ($result)>0){
    while($row = mysqli_fetch_array($result))
    {
    $corearray[]=$row[0];
    $darray['0' . $row[0]] = $row[0];
    $darray['1' . $row[0]] = $row[1];
    $darray['2' . $row[0]] = $row[2];
    $darray['3' . $row[0]] = $row[3];
    $darray['4' . $row[0]] = $row[4];
    }
    $arrlength = count($corearray);
    sort($corearray);
    for($x=0;$x<$arrlength;$x++)
    {
     if(strpos($corearray[$x],$prevfile)!== false)
     {
     echo '<a onclick = "ga('. "'send','event','Link','click','Download'" . ')" href="' . $darray['1' . $corearray[$x]] . $darray['0' . $corearray[$x]] . '.' . $darray['4' . $corearray[$x]] . '" style="font-size:small;text-align:left;">' . $darray['3' . $corearray[$x]] . '</a> ';
     }
     else
     {
     if(!empty($prevfile)){echo '</td></tr>';}
     
     $filenamelang = $darray['0' . $corearray[$x]];
     if($lang!=="EN" AND !empty($darray['0' . $corearray[$x] . '-' . $lang])){$filenamelang .= '-' . $lang;}
     
     echo '<tr><td style="width:60px;"><img  src="/resources/images/'.$darray['4' . $corearray[$x]].'icon" style="width:55px;" /></td><td style="text-align:left;font-size:large;"><a onclick = "ga('. "'send','event','Link','click','Download'" . ')" href="' . $darray['1' . $corearray[$x]] . $filenamelang . '.' . $darray['4' . $corearray[$x]] . '">';
     echo $filenamelang;
     if($darray['3' . $filenamelang] == "EN"){echo "-EN";}
     echo '</a></br><span style="font-size:70%">';
     echo $darray['2' . $filenamelang];
     $prevfile = $darray['0' . $corearray[$x]];
     echo '</span></td><td style="width:140px;">';
     }
    }}
      echo '</td></tr></tbody>';
      echo '</table></div>';
     }

     
function getSeriesVideos(){
global $pn;
global $series;
global $connection;

$result = mysqli_query($connection, 'SELECT partnumber FROM productseries WHERE series = "' . $pn . '-SERIES" OR partnumber = "' . $pn . '"');
$whereStr = 'WHERE about LIKE "%' . str_replace("-SERIES","",$series) . '%"';
   while($row = mysqli_fetch_array($result))
    {
	$whereStr .= ' OR about LIKE "%' . $row[0] . '%"';
	}

	$result = mysqli_query($connection,'SELECT Summary, title, body, vidid, about, industry FROM videos ' . $whereStr  . ' ORDER BY rank , postdate DESC ');
   $x=0;

   if(mysqli_num_rows($result)>0){
   echo '<div id="videos" class="videos">
<a id="vidtop"></a>';
   while($row = mysqli_fetch_array($result))
    {
     
     if($x==0){


     echo '<div class="video" style="padding-bottom:30px">
              <h3 id="videoheader">' . $row[1] . '</h3>
       <p id="videosummary">' . $row[0] . '</p>
       <iframe id="main-video" src="//www.youtube.com/embed/' . $row[3] . '?vq=hd720" style="width:100%;height:600px" frameborder="0" allowfullscreen ></iframe></div>';
       $allvid = '<div  >
        <ul class="resultsList">';

     $x=1;

     }
     
      $allvid .=  '     <li style="height:400px;" class="' . $row[5] . '"><div class="cover';
      if($x==1){$allvid .=  " nowplaying";$x=2;$y=2;}
      $allvid .= '"><img src="http://img.youtube.com/vi/' . $row[3] . '/mqdefault.jpg" style="width:100%;height:auto"  onclick="openVid(' . "'" . $row[3] . "'" . ');"/></div>
      <div class="about">
       <strong class="abouthead"><a href="/videos?' . $row[3] . '">' . $row[1] . '</a></strong>

       <p class="aboutsumm">' . $row[0] . '</p>
      </div>
     </li>';
     $x=2;

     
    }
   $allvid .= '</ul></div>';
   echo $allvid;
      echo '<script>

$( document ).ready(function() {
$("#dropdowninput").change(function(){

  $(this).blur();
});
});

 $(".cover img").click(function(){
  var nextElem;

  nextElem = $(this).parent().next().find(".abouthead").first();
document.getElementById("videoheader").innerHTML = nextElem.text();

  nextElem = $(this).parent().next().find(".aboutsumm").first();
document.getElementById("videosummary").innerHTML = nextElem.text();

$("#" + $(this).parent().parent().parent().parent().parent().attr("id") + " div").removeClass("nowplaying");



$(this).parent().addClass("nowplaying");

    });
 
function openVid(vid){

document.getElementById("main-video").setAttribute("src","//www.youtube.com/embed/" + vid + "?vq=hd720&rel=0&autoplay=1");

$("html, body").animate({
           "scrollTop":   $("#vidtop").offset().top-20
         }, 2000);
}
</script></div>
';
   }
   if($x==0){
   echo '<script>
   $("#vidsection").hide();
   </script>';
   }
} 


function getSpecs($tableName,$fileName){
global $pn;
global $translate;
global $homedir;
global $connection;
global $models;

$count = explode(",",$models);
$count = count($count);
$count = 250 + (215*$count);

echo'		<input id="modlist" style="display:none;" value="' . $models . '" ><br/>
		<div class="ui-widget" style="padding-bottom:30px;">
' . translate('Compare with other products') . '<br>
		<select id="combobox" style="height:90px;">
		<option value=" " selected></option>
		'; 
		$sql = "SELECT partnumber FROM " . $tableName;
		$results = mysqli_query($connection,$sql);
		while($row = mysqli_fetch_array($results)){echo '<option value=",'. $row['partnumber'] .'">'.$row['partnumber'] .'</option>';}
echo '		      
		</select><INPUT type="button" id="btn" class="formbutton" style="display:inline;margin-right:10px;" value="+" onclick=" updateSpecs(document.getElementById(' . "'" . 'combobox' . "'" . ').value,' . "'" . $fileName . "'" . ');"  /><br>
		</div>
		<div id="specFrame" style="width:' . $count . 'px">
		';
		$_REQUEST['pn'] = $models;
		include($homedir."/resources/php/" . $fileName);
echo '		   
		</div>';
		
}

function translate($key){
global $translate;

if($translate[$key] == NULL){return $key;}
else{return $translate[$key];}
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php echo $lang; ?>" dir="ltr" class="wf-pragmaticawebcondensed-n3-active wf-pragmaticawebcondensed-n4-active wf-pragmaticawebcondensed-n9-active wf-active"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="UTF-8">
<link rel="icon" href="/favicon.png" type="image/gif" sizes="32x32">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<script type="text/Javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/Javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script type="text/javascript" src="//use.typekit.net/lbn0ick.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<script type="text/Javascript" src="/resources/js/InFocusCollection.js"></script>
<script type="text/Javascript" src="/resources/js/jquery.colorbox.js"></script>
<link rel="stylesheet" href="/resources/css/colorbox.css" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" href="/resources/css/core.css" />
<?php if($lang != "en"){echo '<link rel="stylesheet" href="/resources/css/Non-en.css" />'; }?>
<link rel="stylesheet" href="/resources/css/flexnav.css" />
<script type="text/Javascript" src="/resources/js/jquery.hoverIntent.min.js"></script>
<script type="text/Javascript" src="/resources/js/jquery.flexnav.min.js"></script>
<script src="/resources/js/jquery.fitvids.js"></script>
<!--[if IE]>
    <link href="/resources/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
  <![endif]-->

<?php 

 

 if(substr($_SERVER['HTTP_REFERER'],11,7) != "infocus" AND preg_match('/(?i)msie [2-8]/',$_SERVER['HTTP_USER_AGENT']) AND strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0') == false){
echo '</head><body style="background-color:#EAEAEA">

<div class="content" >

<div class="C9" style="max-width:1100px;background-color:white;text-align:center;padding:50px;">
<h2 style="font-size:150%">Please upgrade your browser to use InFocus.com</h2>
<p class="C8" style="text-align:center">The new InFocus website is built using the latest technology.  This makes InFocus.com faster, more compatible with mobile devices, and easier to use.  Unfortunately older browsers do not support these technologies. <br><br>Download one of these fantastic browsers and you will be on your way:</p>

<br><br>
<div class="C10 C2_child Col_child">

<div class="image-set"><a href="http://windows.microsoft.com/en-US/internet-explorer/download-ie"><img src="/resources/images/ie-icon">Internet Explorer<br><small>Version 9+</small></a></div>
<div class="image-set"><a href="http://www.mozilla.org/en-US/firefox/new/"><img src="/resources/images/firefox-icon">Mozilla Firefox<br><small>Version 4+</small></a></div>
<div class="image-set"><a href="https://www.google.com/intl/en/chrome/browser/features.html"><img src="/resources/images/chrome-icon">Google Chrome<br><small>Version 7+</small></a></div>
<div class="image-set"><a href="http://www.apple.com/safari/"><img src="/resources/images/safari-icon">Apple Safari<br><small>Version 5+</small></a></div>
</div><br><br>
<p><a href="/">Proceed to InFocus.com anyway</a></p>
</div>
</div></body></html>';
die();
}

?>
  <script>
window.onbeforeunload = function () {
$(".flexnav").flexNav();
}  

  
  </script>
