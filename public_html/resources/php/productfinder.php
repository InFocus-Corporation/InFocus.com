<?PHP

$localdir = dirname(__FILE__);
$homedir = $_SERVER['DOCUMENT_ROOT']; 
require_once($homedir . "/resources/php/imagetest.php"); 

//if(!empty($_REQUEST['Q1'])){

$screen = $_REQUEST['Q1'];
$position1 = $_REQUEST['Q2'];
$position2 = $_REQUEST['Q2a'];
$bright = $_REQUEST['Q3'];
$content = $_REQUEST['Q4'];
$installed = $_REQUEST['Q5'];
$inputs = $_REQUEST['Q6'];
$aspect = $_REQUEST['Q7'];
$inputs2 = $_REQUEST['Q8'];
$specfeat = $_REQUEST['Q9'];
$lang =  $_REQUEST['lang'];



if(empty($_REQUEST['Q1'])){$screen = "screen7";}
if(empty($_REQUEST['Q2'])){$position1 = 0;}
if(empty($_REQUEST['Q2a'])){$position2 = 99;}



//0.3048 echo $screen;
// echo $position;
// echo $position2;
// echo $lighting;
// echo $content;
// echo $installed;
// echo $inputs;
// echo $aspect;



if($installed=="Installed"){
$weight=">=4.5";
}
elseif($installed=="Portable"){
$weight="<=10";
}
elseif($installed=="Mobile"){
$weight="<=5";
}
else{
$weight=">0";
}
switch($screen){

 case "screen5":
  $screensize = 5;
  break;
 case "screen6":
  $screensize = 6;
  break;
 case "screen7":
  $screensize = 8;
  break;
 case "screen8":
  $screensize = 10;
  break;
 case "screen9":
  $screensize = 12;
  break;
}


$throwl = $position1/$screensize;
$throwh = $position2/$screensize;

$inputs=str_replace("1","VGA",$inputs);
$inputs=str_replace("2","HDMI",$inputs);
$inputs=str_replace("3","USB",$inputs);
$inputs=str_replace("4","Component",$inputs);
$inputs=str_replace("5","Composite",$inputs);

if(strpos($inputs2,"1")>0 AND strpos($inputs2,"2")>0){
$inputs2=str_replace("1,","",$inputs2);
$inputs2=str_replace("2","landis",$inputs2);
}

$inputs2=str_replace("1","lanman",$inputs2);
$inputs2=str_replace("2","landis",$inputs2);
$inputs2=str_replace("3","rs232",$inputs2);
$inputs2=str_replace("4","scrntrg",$inputs2);
$inputs2=str_replace("5","mic",$inputs2);
$inputs2=str_replace("6","3dsync",$inputs2);

if(strpos($specfeat,"1")>0 AND strpos($specfeat,"2")>0){
$specfeat=str_replace("8,","",$specfeat);
$specfeat =str_replace("9","br3d",$specfeat);
}

$specfeat =str_replace("1","lensshift",$specfeat);
$specfeat =str_replace("2","motorizedlens",$specfeat);
//$specfeat =str_replace("3","24/7 operation",$specfeat);
$specfeat =str_replace("3","interactive",$specfeat);
//$specfeat =str_replace("5","Wireless display capability",$specfeat);
$specfeat =str_replace("4","memory",$specfeat);
$specfeat =str_replace("5","usbdis",$specfeat);
$specfeat =str_replace("6","pc3d",$specfeat);
$specfeat =str_replace("7","br3d",$specfeat);


$inputs = explode(",",$inputs);
foreach($inputs as $inpt){

$sqlinputs .= ' AND Connections LIKE "%' . $inpt . '%"';

}

$inputs2 = explode(",",$inputs2);
foreach($inputs2 as $inpt){

$sqlinputs .= ' AND specfeatures LIKE "%' . $inpt . '%"';

}

$specfeat = explode(",",$specfeat);
foreach($specfeat as $specf){

if($specf == 8){
$specfeats .= ' AND resolutionname = "1080p"';
}
else {
$specfeats .= ' AND specfeatures LIKE "%' . $specf . '%"';
}
}


if( $aspect == "4:3"){
$aspect = ' AND nativeaspect = "4x3"';
$screensize = ($screensize*0.8)*($screensize*0.6);
$lumens = ROUND(($screensize*intval($bright))/500)*500;
}
else{
$aspect = ' AND ( nativeaspect = "16x9" OR nativeaspect = "16x10")';
$screensize = ($screensize*0.847998)*($screensize*0.529999);
$lumens = ROUND(($screensize*intval($bright))/500)*500;
}


$connection = mysqli_connect('67.43.0.33','InFocus','InF0cusP@ssw0rd', 'InFocus',3306);

//$result = mysqli_query($connection,'SELECT ' . $screen . ' FROM brightness WHERE brightval = ' . $lighting . ' AND content = "' . $content . '"');

 
//while($row = mysqli_fetch_array($result))

//$lumens= $row[0];

 
mysqli_set_charset($connection, "utf8");

$sql='SELECT projectors.partnumber, CONCAT(if(optionallenses.`Lens Description` is null,"",CONCAT(" With ",optionallenses.`Lens Description`," (",optionallenses.`Lens Part Number`,")"))), 
lumenshigh, 
weight, 
if(optionallenses.throwl is null,projectors.throwl,optionallenses.throwl) AS `Throw Low`, 
if(optionallenses.throwh is null,projectors.throwh,optionallenses.throwh) AS `Throw High`, 
Connections, 
nativeaspect, 
Technology, 
resolution, 
resolutionname, 
Contrast, 
list, 
price FROM projectors LEFT JOIN (optionallenses) ON (optionallenses.`Projector Model`=projectors.partnumber) LEFT JOIN (producttext) ON (producttext.partnumber = projectors.partnumber) 
WHERE producttext.lang = "' . $lang . '" 
AND ' . $throwh . ' >= if(optionallenses.throwl is null,projectors.throwl,optionallenses.throwl)  
AND ' . $throwl . ' <= if(optionallenses.throwh is null,projectors.throwh,optionallenses.throwh)  
AND weight ' . $weight . ' 
AND lifestatus != "EOSL"
AND lifestatus != "EOL"
AND lumenshigh >= ' . $lumens . $sqlinputs . $aspect . $specfeats;

$result = mysqli_query($connection,$sql);

//echo "Part Number,Lumens,Weight,Throw low,Throw high,Connections,Aspect Ratio;";

//while($row = mysqli_fetch_array($result))
//{
//echo $row[0] . "," . $row[1] . "," . $row[2] . "," . $row[3] . "," . $row[4] . "," . str_replace(","," ",$row[5]) . "," . $row[6] . ";";

//}

 echo '<ul class="" style="list-style:none">';

 while($row = mysqli_fetch_array($result))
 {

 echo '<li class="liresults" style="position:relative"><a href="/projectors/product?pn=' . strtoupper($row[0]) . '">
     ';
    
$prod = strtoupper($row[0]);

 echo '<img style="float:left;max-width:49%;padding-top:15px;" src="'. imagethumb($prod,'320') . '" width="50%">';
      
      
 echo ' </a><div style="display:inline-block;vertical-align:top;margin-left:20px;max-width:45%;text-align:left;"><a href="/projectors/product?pn=' . strtoupper($row[0]) . '"><h4 class="tagline">InFocus ' . $row[0] . " " . $row[8] . " Projector" . '</h4></a><span style="font-size:70%">' . $row[1] . '</span><div class="feature-list" style="font-size:80%;">
     
   ' . str_replace('<ul>','<ul>',$row[12]) . ' </div></div>';
   if(strlen($row[13])>1){ echo '<div style="position:absolute;bottom:20px;color:darkgrey;font-weight:400;">MSRP: ' . $row[13] . '
   </div>';}
   echo '</li>';

 }
 echo '</ul>';




if(mysqli_num_rows($result)==0){
echo "<br>No projectors match your query.  Try widening the installation range, or changing the screen size.";
}

?> 