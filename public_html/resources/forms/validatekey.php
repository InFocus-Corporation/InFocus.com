  <?php
  
  include_once($_SERVER['DOCUMENT_ROOT'] ."/resources/php/connections.php");
$connection = mysqli_connect($convar["WWW-SVE"]["server"],$convar["WWW-SVE"]["user"],$convar["WWW-SVE"]["pw"], 'partners_IFC_IB',3306);

//$connection = mysqli_connect('localhost','InternalAdmin','nIinmFd0Aclu', 'partners_IFC_IB',3306);
$_REQUEST['key'] = strtoupper($_REQUEST['key']);
$response['key'] = $_REQUEST['key'];
$response['type'] = "Valid";
$result = mysqli_query($connection,'
SELECT LEFT(`Validation Code`,3) AS vCode, "DisplayWarranties" FROM DisplayWarranties GROUP BY vCode 
UNION ALL SELECT LEFT(`Validation Code`,3) AS vCode, "ProjectorWarranties" FROM ProjectorWarranties GROUP BY vCode
UNION ALL SELECT LEFT(`Validation Code`,3) AS vCode, "LampWarranties" FROM LampWarranties GROUP BY vCode
UNION ALL SELECT LEFT(`Validation Code`,3) AS vCode, "Services" FROM Services GROUP BY vCode ');
error_log(mysqli_error($connection));
while($row = mysqli_fetch_array($result)){
$table[$row[0]] = $row[1];
}

$result = mysqli_query($connection,'SELECT Expended FROM `' . $table[substr($_REQUEST['key'],0,3)] . '` WHERE `Validation Code` = "' . $_REQUEST['key'] . '"');
if($result == false){
$response['type'] =  "Not Valid";
echo json_encode($response);
die();
}

if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result)){
		if($row['Expended'] == "True"){$response['type'] = $row['Expended'];}
		}
}
else{
$response['type'] = "Not Valid";
}

echo json_encode($response);
?>
