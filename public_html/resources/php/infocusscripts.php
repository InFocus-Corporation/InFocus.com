<?PHP
// TODO: Update press release time
define('PRESS_RELEASE_2016JUNE2', $_REQUEST['june2'] || (1464870600 < time()));


if(strpos(dirname(__FILE__),"dev")>0){

}
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/langchk.php");
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/transfunc.php");

$contactTables = '<table class="contact-table">
<tr><th colspan="2">'. translate('US &amp; Canada') . '</th></tr>
<tr><td>' . translate('Mon-Fri') . ',</td><td> ' . translate('6am - 5pm PST') . '</tr>
<tr><td colspan="2">877-388-8360</td></tr>
</table>

<table class="contact-table">
<tr><th colspan="2">' . translate('Asia-Pacific Region') . '</th></tr>
<tr><td>' . translate('Mon-Fri') . ':</td><td>' . translate('9am -5pm Local Time') . '</tr>
<tr><td>' . translate('Singapore') . '<td>+65 6506-3196</td></tr>
<tr><td>' . translate('Australia') . '<td>1300-290-922</td></tr>
<tr><td>' . translate('China') . '<td>800-888-9288</td></tr>
</table>

<table class="contact-table">
<tr><th colspan="2">' . translate('Europe, Middle-East &amp; Africa') . '</th></tr>
<tr><td>Mon-Fri:</td><td>' . translate('08:00 - 17:00 local time') . '</tr>
<tr><td>' . translate('France') . '<td>0800 905-993</td></tr>
<tr><td>' . translate('Germany') . '<td>0800 181-3649</td></tr>
<tr><td>' . translate('Italy') . '<td>0800 877-238</td></tr>
<tr><td>' . translate('Spain') . '<td>+34 902 366 592</td></tr>
<tr><td>' . translate('Sweden') . '<td>020-791251</td></tr>
<tr><td>' . translate('UK') . '<td>0800 028-6470</td></tr>
<tr><td>' . translate('Other') . '<td>008000 463-6287</td></tr>
</table>';

$countryList = array('AF' => 'Afghanestan','SA' => 'Al Arabiyah as Suudiyah','BH' => 'Al Bahrayn','AE' => 'Al Imarat al Arabiyah al Muttahidah','IQ' => 'Al Iraq','DZ' => 'Al Jaza\'ir','KW' => 'Al Kuwayt','MA' => 'Al Maghrib','JO' => 'Al Urdun','YE' => 'Al Yaman','AD' => 'Andorra','AO' => 'Angola','AG' => 'Antigua and Barbuda','AR' => 'Argentina','SD' => 'As-Sudan','AU' => 'Australia','AZ' => 'Azarbaycan Respublikasi','BD' => 'Bangladesh','BB' => 'Barbados','PW' => 'Belau','BE' => 'Belgique (French) or Belgie (Flemish)','BZ' => 'Belice','BJ' => 'Benin','BO' => 'Bolivia','BA' => 'Bosna i Hercegovina','BW' => 'Botswana','BR' => 'Brasil','BF' => 'Burkina Faso','BI' => 'Burundi','BY' => 'Byelarus','CV' => 'Cabo Verde','CM' => 'Cameroon or Cameroun (French)','CA' => 'Canada','CZ' => 'Ceska Republika','CL' => 'Chile','KR' => 'Choson or Choson-minjujuui-inmin-konghwaguk','CO' => 'Colombia','KM' => 'Comores','CR' => 'Costa Rica','CI' => 'Cote d\'Ivoire','CU' => 'Cuba','DK' => 'Danmark','DE' => 'Deutschland','MV' => 'Dhivehi Raajje','DJ' => 'Djibouti','DM' => 'Dominica','BT' => 'Drukyul','EC' => 'Ecuador','EE' => 'Eesti','SV' => 'El Salvador','GR' => 'Ellas','ER' => 'Ertra','ES' => 'Espana','FM' => 'Federated States of Micronesia','FJ' => 'Fiji','FR' => 'France or Republique Francaise','GA' => 'Gabon','GH' => 'Ghana','GD' => 'Grenada','GT' => 'Guatemala','GQ' => 'Guinea Ecuatorial','GW' => 'Guine-Bissau','GN' => 'Guinee','GY' => 'Guyana','HT' => 'Haiti','AM' => 'Hayastan','HN' => 'Honduras','HR' => 'Hrvatska','IN' => 'India, Bharat','ID' => 'Indonesia','IR' => 'Iran, Persia','IE' => 'Ireland or Eire','IS' => 'Island','IT' => 'Italia','JM' => 'Jamaica','TJ' => 'Jumhurii Tojikistan','KH' => 'Kampuchea','KE' => 'Kenya','KI' => 'Kiribati','CY' => 'Kypros (Greek) or Kibris (Turkish)','KG' => 'Kyrgyz Respublikasy','LV' => 'Latvija','LS' => 'Lesotho','LR' => 'Liberia','LY' => 'Libya','LI' => 'Liechtenstein','LT' => 'Lietuva','LB' => 'Lubnan','LU' => 'Luxembourg','MG' => 'Madagascar','HU' => 'Magyarorszag','MK' => 'Makedonija','MW' => 'Malawi','MY' => 'Malaysia','ML' => 'Mali','MT' => 'Malta','MH' => 'Marshall Islands','MU' => 'Mauritius','MX' => 'Mexico','EG' => 'Misr','MZ' => 'Mocambique','MD' => 'Moldova','MC' => 'Monaco','MN' => 'Mongol Uls','TH' => 'Muang Thai','MR' => 'Muritaniyah','MM' => 'Myanma Naingngandaw','NA' => 'Namibia','NR' => 'Nauru','NL' => 'Nederland','NP' => 'Nepal','NZ' => 'New Zealand','NI' => 'Nicaragua','NE' => 'Niger','NG' => 'Nigeria','JP' => 'Nippon','NO' => 'Norge','AT' => 'Oesterreich','PK' => 'Pakistan','PA' => 'Panama','PG' => 'Papua New Guinea','PY' => 'Paraguay','PE' => 'Peru','PH' => 'Pilipinas','PL' => 'Polska','PT' => 'Portugal','QA' => 'Qatar','KZ' => 'Qazaqstan','DO' => 'Republica Dominicana','BG' => 'Republika Bulgariya','CF' => 'Republique Centrafricaine','CD' => 'Republique Democratique du Congo','CG' => 'Republique du Congo','RO' => 'Romania','RU' => 'Rossiya','RW' => 'Rwanda','KN' => 'Saint Kitts and Nevis','LC' => 'Saint Lucia','GE' => 'Sak\'art\'velo','WS' => 'Samoa','SM' => 'San Marino','VA' => 'Santa Sede (Citta del Vaticano)','ST' => 'Sao Tome e Principe','LA' => 'Sathalanalat Paxathipatai Paxaxon Lao','CH' => 'Schweiz (German), Suisse (French), Svizzera (Italian)','SN' => 'Senegal','SC' => 'Seychelles','AL' => 'Shqiperia','SL' => 'Sierra Leone','SG' => 'Singapore','SI' => 'Slovenija','SK' => 'Slovensko','SB' => 'Solomon Islands','SO' => 'Somalia','ZA' => 'South Africa','RS' => 'Srbija-Crna Gora','LK' => 'Sri Lanka','FI' => 'Suomi','SR' => 'Suriname','SY' => 'Suriyah','SE' => 'Sverige','SZ' => 'Swaziland','KP' => 'Taehan-min\'guk','TW' => 'T\'ai-wan','TZ' => 'Tanzania','TD' => 'Tchad','BS' => 'The Bahamas','GM' => 'The Gambia','TG' => 'Togo','TO' => 'Tonga','TT' => 'Trinidad and Tobago','TN' => 'Tunis','TR' => 'Turkiye','TM' => 'Turkmenistan','TV' => 'Tuvalu','UG' => 'Uganda','UA' => 'Ukrayina','OM' => 'Uman','GB' => 'United Kingdom','US' => 'United States','UY' => 'Uruguay','UZ' => 'Uzbekiston Respublikasi','VU' => 'Vanuatu','VE' => 'Venezuela','VN' => 'Viet Nam','ET' => 'YeItyop\'iya','IL' => 'Yisra\'el','ZM' => 'Zambia','CN' => 'Zhong Guo','ZW' => 'Zimbabwe');
$displayedCountries = array('AF','SA','BH','AE','IQ','DZ','KW','MA','JO','YE','AD','AO','AG','AR','SD','AU','AZ','BD','BB','PW','BE','BZ','BJ','BO','BA','BW','BR','BF','BI','BY','CV','CM','CA','CZ','CL','KR','CO','KM','CR','CI','CU','DK','DE','MV','DJ','DM','BT','EC','EE','SV','GR','ER','ES','FM','FJ','FR','GA','GH','GD','GT','GQ','GW','GN','GY','HT','AM','HN','HR','IN','ID','IR','IE','IS','IT','JM','TJ','KH','KE','KI','CY','KG','LV','LS','LR','LY','LI','LT','LB','LU','MG','HU','MK','MW','MY','ML','MT','MH','MU','MX','EG','MZ','MD','MC','MN','TH','MR','MM','NA','NR','NL','NP','NZ','NI','NE','NG','JP','NO','AT','PK','PA','PG','PY','PE','PH','PL','PT','QA','KZ','DO','BG','CF','CD','CG','RO','RU','RW','KN','LC','GE','WS','SM','VA','ST','LA','CH','SN','SC','AL','SL','SG','SI','SK','SB','SO','ZA','RS','LK','FI','SR','SY','SE','SZ','KP','TW','TZ','TD','BS','GM','TG','TO','TT','TN','TR','TM','TV','UG','UA','OM','GB','US','UY','UZ','VU','VE','VN','ET','IL','ZM','CN','ZW');
$emeaCountries=array("AF", "AL", "DZ", "AD", "AO", "AQ", "AM", "AT", "AZ", "BH", "BY", "BE", "BJ", "BM", "BA", "BW", "BV", "IO", "BG", "BF", "BI", "CM", "CV", "CF", "TD", "CX", "CC", "KM", "CG", "CK", "CI", "HR", "CY", "CZ", "DK", "DJ", "EG", "GQ", "ER", "EE", "ET", "FK", "FO", "FI", "FR", "GF", "PF", "TF", "GA", "GM", "GE", "DE", "GH", "GI", "GR", "GL", "GN", "GW", "HM", "HU", "IS", "IR", "IQ", "IE", "IL", "IT", "JO", "KZ", "KE", "KI", "KW", "KG", "LV", "LB", "LS", "LR", "LY", "LI", "LT", "LU", "MK", "MG", "MW", "MV", "ML", "MT", "MR", "MU", "YT", "MD", "MC", "MN", "MA", "MZ", "MM", "NA", "NR", "NL", "AN", "NC", "NE", "NG", "NU", "NF", "MP", "NO", "OM", "PG", "PY", "PL", "PT", "QA", "RE", "RO", "RU", "RW", "KN", "LC", "VC", "SM", "ST", "SA", "SN", "SC", "SL", "SK", "SI", "SB", "SO", "ZA", "GS", "ES", "SD", "SR", "SJ", "SZ", "SE", "CH", "SY", "TJ", "TZ", "TG", "TO", "TN", "TR", "TM", "TC", "UA", "AE", "UK", "UZ", "EH", "YE", "ZM", "ZW", "GB");
$apacCountries=array("AS", "AI", "AG", "AR", "AW", "MO", "TW", "AU", "BD", "BT", "BN", "KH", "FJ", "IN", "JP", "KP", "KR", "LA", "FM", "NP", "NZ", "PK", "PW", "PN", "SG", "TH", "TP", "TK", "VN","CN");
$stateList = array('AB' => 'Alberta ','AK' => 'ALASKA','AL' => 'ALABAMA','AR' => 'ARKANSAS','AS' => 'AMERICAN SAMOA','AZ' => 'ARIZONA','BC' => 'British Columbia','CA' => 'CALIFORNIA','CO' => 'COLORADO','CT' => 'CONNECTICUT','DC' => 'WASHINGTON, DC','DE' => 'DELAWARE','FL' => 'FLORIDA','FM' => 'FEDERATED STATES OF MICRONESIA','GA' => 'GEORGIA','GU' => 'GUAM','HI' => 'HAWAII','IA' => 'IOWA','ID' => 'IDAHO','IL' => 'ILLINOIS','IN' => 'INDIANA','KS' => 'KANSAS','KY' => 'KENTUCKY','LA' => 'LOUISIANA','MA' => 'MASSACHUSETTS','MB' => 'Manitoba ','MD' => 'MARYLAND','ME' => 'MAINE','MH' => 'MARSHALL ISLANDS','MI' => 'MICHIGAN','MN' => 'MINNESOTA','MO' => 'MISSOURI','MP' => 'NORTHERN MARIANA ISLANDS','MS' => 'MISSISSIPPI','MT' => 'MONTANA','NB' => 'New Brunswick','NC' => 'NORTH CAROLINA','ND' => 'NORTH DAKOTA','NE' => 'NEBRASKA','NF' => 'Newfoundland ','NH' => 'NEW HAMPSHIRE','NJ' => 'NEW JERSEY','NM' => 'NEW MEXICO','NS' => 'Nova Scotia','NT' => 'Northwest Territories','NV' => 'NEVADA','NY' => 'NEW YORK','OH' => 'OHIO','OK' => 'OKLAHOMA','ON' => 'Ontario ','OR' => 'OREGON','PA' => 'PENNSYLVANIA','PE' => 'Prince Edward Island','PR' => 'PUERTO RICO','PW' => 'PALAU','QC' => 'Quebec','RI' => 'RHODE ISLAND','SC' => 'SOUTH CAROLINA','SD' => 'SOUTH DAKOTA','SK' => 'Saskatchewan','TN' => 'TENNESSEE','TX' => 'TEXAS','UT' => 'UTAH','VA' => 'VIRGINIA','VI' => 'VIRGIN ISLANDS','VT' => 'VERMONT','WA' => 'WASHINGTON','WI' => 'WISCONSIN','WV' => 'WEST VIRGINIA','WY' => 'WYOMING','YT' => 'Yukon ');

if(basename($_SERVER['PHP_SELF']) == "product.php" OR basename($_SERVER['PHP_SELF']) == "family.php" OR basename($_SERVER['PHP_SELF']) == "unknown.php") {
    $pn=strtoupper($_GET['series']);
    if(empty($pn)){$pn=strtoupper($_GET['pn']);}
    if(empty($pn)){$pn=strtoupper($_SERVER['QUERY_STRING']);}

    require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/OOPproducts.php");
    $product = new IFCSeries($pn);
    $overview = $product->overview();
    if($product->isSeries) {
        $list = $product->sList();
        $models = $product->models();
    } else {
        $thumbnails = $product->thumbnails();
        $reviews = $product->reviews();
        $priceBuyNow = $product->priceBuyNow($product->pn);
    }
    $specs = $product->specs();
    $videos = $product->videos();
    $accessories = $product->accessories();
    $worksWith = $product->worksWith();
    $downloads = $product->downloads();
 } elseif(basename($_SERVER['PHP_SELF']) == "custompage.php") {
    if(empty($_GET['pagename'])){$_GET['pagename'] = $_SERVER['QUERY_STRING'];}
    $pn = str_replace("_","-",$pn);
    if(strpos($pn,"$")>0){$pn = substr($pn,0,strpos($pn,"$")-1);}
    error_log("Test");

		$sql = "SELECT pagecontent FROM pages WHERE pagename = '" . $_GET['pagename'] . "' AND lang = '" . $lang . "'";
		$results = mysqli_query($connection,$sql);
		if(mysqli_num_rows($results)==0)
		{			header("HTTP/1.0 404 Not Found");
			include($_SERVER['DOCUMENT_ROOT'] . '/404.php');
			exit;
}
 }

$productLinks = unserialize(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/resources/misc/links"));


?>


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


