<?php
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");

$setList="";
foreach($_POST as $key=>$value)
{
if($key !="submit"){

if(mysqli_real_escape_string($connection,$value) == ""){$setList .=  "`$key`= NULL ,";
}
else{$setList .=  "`$key`=" . '"' . mysqli_real_escape_string($connection,$value) . '" ,';}
}
}

 $setList = substr($setList, 0, -1);
 
 
mysqli_set_charset($connection, "utf8");

$result = mysqli_query($connection,'REPLACE INTO producttext SET ' . $setList);

echo "<script>alert('Server Updated');</script>";
?>