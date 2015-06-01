<?php
$groups_allowed = "admin,editor,saleseditor,marketingeditor";
require($_SERVER['DOCUMENT_ROOT'] . "/login/ublock.php");

ini_set('default_charset', 'utf-8');
if( substr($_SERVER['DOCUMENT_ROOT'],-11) == "public_html"){$lang = "en";}
else{$lang = substr($_SERVER['DOCUMENT_ROOT'],-2);}
global $localdir;
global $homedir; 
$localdir = dirname(__FILE__);
$homedir = substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"public_html")+11); 
require($_SERVER['DOCUMENT_ROOT'] . "/login/ubvars.php");
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");

$sourceProduct = $_POST['sourceProduct'];
$createdProduct = $_POST['createdProduct'];
$orglang = $lang;
$lang = $_POST['lang'];

$result = mysqli_query($connection,'SELECT productgroup FROM producttext WHERE partnumber = "' . $sourceProduct . '" AND lang = "' . $lang . '"');
if(mysqli_num_rows($result)==0)
{echo 'Source product not found!';	die();}

while($row = mysqli_fetch_array($result))
{$productGroup = $row[0];}

//Product Text

if($_POST['cloneText'] == 'on'){
$sourceProduct = mysqli_real_escape_string($connection, $sourceProduct);
$createdProduct = mysqli_real_escape_string($connection, $createdProduct);


$sql = 'INSERT INTO `InFocus`.`producttext`
(`partnumber`,
`title`,
`active`,
`price`,
`description`,
`header`,
`blurb`,
`list`,
`region`,
`lang`,
`category`,
`listtitle`,
`firmware`,
`productgroup`,
`additionalimages`)
SELECT
"' . $createdProduct . '",
`title`,
0,
`price`,
`description`,
`header`,
`blurb`,
`list`,
`region`,
"' . $lang . '",
`category`,
`listtitle`,
`firmware`,
`productgroup`,
`additionalimages`
FROM producttext 
WHERE partnumber = "' . $sourceProduct . '" AND lang = "' . $orglang . '"';


if(mysqli_error($connection) != null){echo mysqli_error($connection);}
else{echo "Product Text Updated<br>";}
$result = mysqli_query($connection,$sql);
}
//Specifications
if($_POST['cloneSpecs'] == 'on'){

if($productGroup == "Projector"){

$sql = 'INSERT INTO `InFocus`.`projectors`
(`partnumber`,
`lang`,
`technology`,
`resolution`,
`resolutionname`,
`resolutionvid`,
`resolutionmax`,
`lumenshigh`,
`lumenslow`,
`contrast`,
`noiselow`,
`noisehigh`,
`weight`,
`shipweight`,
`keystone`,
`offset`,
`throwl`,
`throwh`,
`class`,
`interactive`,
`lamphigh`,
`lamplow`,
`lamppn`,
`project`,
`snprefix`,
`accessories`,
`originalremote`,
`currentremote`,
`3d`,
`closecap`,
`speakers`,
`connections`,
`prodwarranty`,
`lampwarranty`,
`accwarranty`,
`nativeaspect`,
`lifestatus`,
`specfeatures`,
`dimensions`,
`shipdimensions`,
`otherspecs`)
SELECT
"' . $createdProduct . '",
"' . $lang . '",
`technology`,
`resolution`,
`resolutionname`,
`resolutionvid`,
`resolutionmax`,
`lumenshigh`,
`lumenslow`,
`contrast`,
`noiselow`,
`noisehigh`,
`weight`,
`shipweight`,
`keystone`,
`offset`,
`throwl`,
`throwh`,
`class`,
`interactive`,
`lamphigh`,
`lamplow`,
`lamppn`,
`project`,
`snprefix`,
`accessories`,
`originalremote`,
`currentremote`,
`3d`,
`closecap`,
`speakers`,
`connections`,
`prodwarranty`,
`lampwarranty`,
`accwarranty`,
`nativeaspect`,
`lifestatus`,
`specfeatures`,
`dimensions`,
`shipdimensions`,
`otherspecs`
FROM projectors
WHERE partnumber = "' . $sourceProduct . '" AND lang = "' . $orglang . '"';

if(mysqli_error($connection) != null){echo mysqli_error($connection);}
else{echo "Specifications Updated<br>";}
$result = mysqli_query($connection,$sql);
}
elseif($productGroup == "Display"){

$sql = 'INSERT INTO `InFocus`.`displays`
(`partnumber`,
`lang`,
`technology`,
`resolution`,
`resolutionname`,
`resolutionvid`,
`diagonalsize`,
`activearea`,
`nativeaspect`,
`pip`,
`refreshrate`,
`touchscreen`,
`pixelpitch`,
`viewingangle`,
`soundbaroutput`,
`speakers`,
`connections`,
`noisehigh`,
`harddrive`,
`software`,
`computerconnections`,
`lan`,
`memory`,
`os`,
`processor`,
`dimensions`,
`shippingdimensions`,
`weight`,
`shipweight`,
`prodwarranty`)
SELECT
"' . $createdProduct . '",
"' . $lang . '",
`technology`,
`resolution`,
`resolutionname`,
`resolutionvid`,
`diagonalsize`,
`activearea`,
`nativeaspect`,
`pip`,
`refreshrate`,
`touchscreen`,
`pixelpitch`,
`viewingangle`,
`soundbaroutput`,
`speakers`,
`connections`,
`noisehigh`,
`harddrive`,
`software`,
`computerconnections`,
`lan`,
`memory`,
`os`,
`processor`,
`dimensions`,
`shippingdimensions`,
`weight`,
`shipweight`,
`prodwarranty`
FROM displays
WHERE partnumber = "' . $sourceProduct . '" AND lang = "' . $orglang . '"';

if(mysqli_error($connection) != null){echo mysqli_error($connection);}
else{echo "Specifications Updated<br>";}
$result = mysqli_query($connection,$sql);
}
elseif($productGroup == "Accessory"){
$sql = 'REPLACE INTO InFocus.accessoryspecs (`partnumber`,`fieldname`,`fieldvalue`, `lang`) SELECT "' . $createdProduct . '",fieldname,fieldvalue, "' . $lang . '" FROM accessoryspecs WHERE partnumber = "' . $sourceProduct . '" AND lang = "' . $orglang . '"';
if(mysqli_error($connection) != null){echo mysqli_error($connection);}
else{echo "Specifications Updated<br>";}
$result = mysqli_query($connection,$sql);
}
}
//Overview
if($_POST['cloneOverview'] == 'on'){

$sql = 'REPLACE INTO `InFocus`.`productoverview` (`partnumber`,`lang`,`name`,`tagline`,`image`,`body`,`order`) SELECT "' . $createdProduct . '", "' . $lang . '" ,`name`,`tagline`,`image`,`body`,`order` FROM productoverview WHERE partnumber = "' . $sourceProduct . '" AND lang = "' . $orglang . '"';

$result = mysqli_query($connection,$sql);

if(mysqli_error($connection) != null){echo mysqli_error($connection);}
else{echo "Overview Created<br>";}
}

//Accessories

if($_POST['cloneAccessories'] == 'on'){

if($productGroup != "Accessory"){

$sql = 'REPLACE INTO `InFocus`.`acc_matrix` (`accessorypn`,`productpn`,`rank`) SELECT `accessorypn`,"' . $createdProduct . '",`rank` FROM acc_matrix WHERE productpn = "' . $sourceProduct . '"';
if(mysqli_error($connection) != null){echo mysqli_error($connection);}
else{echo "Accessories Updated<br>";}
$result = mysqli_query($connection,$sql);

}
else{


$sql = 'REPLACE INTO `InFocus`.`acc_matrix` (`accessorypn`,`productpn`,`rank`) SELECT "' . $createdProduct . '",`productpn`,`rank` FROM acc_matrix WHERE accessorypn = "' . $sourceProduct . '"';
if(mysqli_error($connection) != null){echo mysqli_error($connection);}
else{echo "Accessories Updated<br>";}
$result = mysqli_query($connection,$sql);

}
}

//Product Series

if($_POST['cloneSeries'] == 'on' AND $productGroup != "Accessory"){



$sql = 'REPLACE INTO `InFocus`.`productseries` (`series`,`partnumber`,`differencelist`,`lang`) SELECT `series`,"' . $createdProduct . '",`differencelist`, "' . $lang . '" FROM productseries WHERE partnumber = "' . $sourceProduct . '" AND lang = "' . $orglang . '"';
if(mysqli_error($connection) != null){echo mysqli_error($connection);}
else{echo "Series Updated<br>";}
$result = mysqli_query($connection,$sql);


$result = mysqli_query($connection,'SELECT series, differencelist FROM productseries WHERE partnumber = "' . $sourceProduct . '"');
if(mysqli_num_rows($result)==0)
{echo 'No Series Found!<br>';}

}
//Downloads

// if($_POST['cloneDownloads'] == 'on'){

// $sql = 'UPDATE `InFocus`.`Downloads`
// SET `relatedproducts` = CONCAT(`relatedproducts`,"' . $createdProduct . ';") 
// WHERE relatedproducts LIKE "%' . $sourceProduct . '%"';

// $result = mysqli_query($connection,$sql);
// if(mysqli_error($connection) != null){echo mysqli_error($connection);}
// else{echo "Downloads Updated<br>";}
// }


?>