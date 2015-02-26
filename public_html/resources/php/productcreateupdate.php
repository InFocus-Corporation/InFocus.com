<?php
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");

$setList="";
foreach($_POST as $key=>$value)
{

if($key != "table"){$setList .=  "`$key`=" . '"' . mysqli_real_escape_string($connection,$value) . '" ,';}

}

 $setList = substr($setList, 0, -1);
 
 
mysqli_set_charset($connection, "utf8");

$result = mysqli_query($connection,'REPLACE INTO ' . $_POST['table'] . ' SET ' . $setList);

echo "<script>alert('Server Updated');</script>";
?>