<?php
$user="Service-ISU";
$password="IUnSFI0-ceuc";
$database="partners_IFC_IB";
mysql_connect(localhost,$user,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query="SELECT * FROM servicesxxxx";
$result=mysql_query($query);

echo $result;
mysql_close();
?>