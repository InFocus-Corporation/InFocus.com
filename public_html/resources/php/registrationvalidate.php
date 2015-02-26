<?PHP
$connection = mysqli_connect('67.43.0.33','partners_login','InF0cusP@ssw0rd', 'partners_IFC_IB',3306);
mysqli_set_charset($connection, "utf8");
$Serial = $_POST['serialNumber'];
$result = mysqli_query($connection,'SELECT 
    `InstallBase`.`Model`,
    `InstallBase`.`First Name`,
    `InstallBase`.`Last Name`,
    `InstallBase`.`Organization`,
    `InstallBase`.`Phone`,
    `InstallBase`.`Email`,
    `InstallBase`.`Address`,
    `InstallBase`.`City`,
    `InstallBase`.`State`,
    `InstallBase`.`Zip`,
    `InstallBase`.`RegCountry`,
    `InstallBase`.`Secondary Name`,
    `InstallBase`.`Secondary Email`,
    `InstallBase`.`Registered` FROM InstallBase WHERE SerialNumber = "' . $Serial . '" AND Registered = "TRUE"' );

if(mysqli_num_rows($result)==0)
{echo "NotRegistered";
die();}

while($row = mysqli_fetch_array($result))
{
echo $row[0] . "^";
echo $row[1] . "^";
echo $row[2] . "^";
echo $row[3] . "^";
echo $row[4] . "^";
echo $row[5] . "^";
echo $row[6] . "^";
echo $row[7] . "^";
echo $row[8] . "^";
echo $row[9] . "^";
echo $row[10] . "^";
echo $row[11] . "^";
echo $row[12];

}

?> 

