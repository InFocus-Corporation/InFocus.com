<?PHP
//$groups_allowed = "ASC";
//require($_SERVER['DOCUMENT_ROOT'] . "/login/ublock.php");

extract($_POST);

if ( isset($SN) ) {
$connection = mysqli_connect('67.43.0.33','partners_login','InF0cusP@ssw0rd', 'partners_IFC_IB',3306);
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

$result = mysqli_query($connection,"SELECT * FROM Contracts WHERE `Serial Number`='$SN'");

if(mysqli_num_rows($result)>0){
$Result .= "<br><strong>Additional Contracts:</strong>";
}
while($row = mysqli_fetch_array($result))
  {

$Result .= "<br>" . $row['Part Number'];
}

if (is_null($Result)){

echo "<strong>No Result Found<br></strong>";
echo "Older serial numbers (greater than 8 years) may no longer have a record in the database to increase efficiency.<br>";

if (substr($Serial,4,1) == 9){

$year = 2011;
$week = substr($SN,5,2);
$start = date("M jS, Y", strtotime("01 Jan ".$year." 00:00:00 GMT + ".$week." weeks"));
$end = date("M jS, Y", strtotime($start." + 1 week"));

echo "Based on the format of your serial number your warranty most likely expires " . $end;
}
else if (substr($Serial,0,1) == 'a' OR substr($Serial,0,1) == 'A'){

$year = 2002 + substr($SN,4,1);
$week = substr($SN,5,2);
$start = date("M jS, Y", strtotime("01 Jan ".$year." 00:00:00 GMT + ".$week." weeks"));
$end = date("M jS, Y", strtotime($start." + 1 week"));

if ($week >= 1)
{
echo "Based on the format of your serial number your warranty most likely expires " . $end;
}

}
else
{
$year = 2012 + substr($SN,4,1);
$week = substr($SN,5,2);
$start = date("M jS, Y", strtotime("01 Jan ".$year." 00:00:00 GMT + ".$week." weeks"));
$end = date("M jS, Y", strtotime($start." + 1 week"));

if ($week >= 1)
{
echo "Based on the format of your serial number your warranty most likely expires " . $end;
}

}
}
else {

echo $Result;

}
}
?> 