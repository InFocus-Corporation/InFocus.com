<?php header('Access-Control-Allow-Origin: https://infocuscorp.zendesk.com');
//$groups_allowed = "ASC";
//require($_SERVER['DOCUMENT_ROOT'] . "/login/ublock.php");

extract($_REQUEST);

if ( isset($SN) ) {$connection = mysqli_connect('localhost','partners_login','InF0cusP@ssw0rd', 'partners_IFC_IB',3306);$SN = mysqli_real_escape_string($connection,$SN);
mysqli_set_charset($connection, "utf8");

$Serial = $SN;
$result = mysqli_query($connection,"SELECT * FROM InstallBase WHERE SerialNumber='$SN'");

while($row = mysqli_fetch_array($result))
  {

if($row['Registered'] == "TRUE"){
$Result = "<strong>Name:</strong> " . $row['First Name'];
$Result .= " " . $row['Last Name'];
$Result .= "<br><strong>Organization:</strong> " . $row['Organization'];
}
else{
$Result .= "<strong>Not Registered</strong>";
}

$Result .= "<br><strong>Factory Warranty:</strong> From ". $row['FromDate'];
$Result .= " To " . $row['ToDate'];
}

$result = mysqli_query($connection,"SELECT ITEMNAME FROM partners_IFC_IB.Contracts JOIN partners_external.items ON `Part Number` = ITEMID WHERE `Serial Number`='$SN'");

if(mysqli_num_rows($result)>0){
$Result .= "<br><strong>Additional Contracts:</strong>";
}
while($row = mysqli_fetch_array($result))
  {

$Result .= "<br>" . $row['ITEMNAME'];
}

if (is_null($Result)){

echo "<strong>No Result Found<br></strong>";
echo "Older serial numbers (greater than 8 years) may no longer have a record in the database to increase efficiency.<br>";

preg_match_all("/[0-9]/", $Serial, $matches);if ($matches[0][0] == 9){$year = 2011;$week = $matches[0][1].$matches[0][2];$start = date("M jS, Y", strtotime("01 Jan ".$year." 00:00:00 GMT + ".$week." weeks"));$end = date("M jS, Y", strtotime($start." + 1 week"));echo "Based on the format of your serial number your warranty most likely began " . $start . ".  Standard warranties are 1-2 years depending on the product.";}else if (substr($Serial,0,1) == 'a' OR substr($Serial,0,1) == 'A'){$year = 2002 + $matches[0][0];$week = $matches[0][1].$matches[0][2];$start = date("M jS, Y", strtotime("01 Jan ".$year." 00:00:00 GMT + ".$week." weeks"));$end = date("M jS, Y", strtotime($start." + 1 week"));if ($week >= 1){echo "Based on the format of your serial number your warranty most likely began " . $start . ".  Standard warranties are 1-2 years depending on the product.";}}else{$year = 2012 + $matches[0][0];$week = $matches[0][1].$matches[0][2];$start = date("M jS, Y", strtotime("01 Jan ".$year." 00:00:00 GMT + ".$week." weeks"));$end = date("M jS, Y", strtotime($start." + 1 week"));if ($week >= 1){
echo "Based on the format of your serial number your warranty most likely began " . $start . ".  Standard warranties are 1-2 years depending on the product.";
}}
}else {echo $Result;}}
?> 