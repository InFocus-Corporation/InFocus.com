<?php



require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");
if(!empty($_POST)){
$where='AND ' . $_POST['wheretxt'];
}




$sql = 'SELECT listtitle, productgroup, category, partnumber, active FROM producttext WHERE lang = "en" ' . $where . ' ORDER BY listtitle';
$result = mysqli_query($connection,$sql);
if(mysqli_num_rows($result)==0)
{echo $sql;
die();}

echo "<option value=''>Select a product...</option>";
echo $_POST['inserttxt'];

while($row = mysqli_fetch_array($result))
{
$listtitle = $row[0];
$partnumber = $row[3];

echo "<option value='$partnumber'>$listtitle</option>
";
}







?>

