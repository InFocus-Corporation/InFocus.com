  <?php
$connection = mysqli_connect('67.43.0.33','partners','InF0cusP@ssw0rd', 'partners_IFC_IB',3306);
$response['key'] = $_REQUEST['key'];
$result = mysqli_query($connection,'
SELECT LEFT(`Validation Code`,3) AS vCode, "DisplayWarranties" FROM DisplayWarranties GROUP BY vCode 
UNION ALL SELECT LEFT(`Validation Code`,3) AS vCode, "ProjectorWarranties" FROM ProjectorWarranties GROUP BY vCode
UNION ALL SELECT LEFT(`Validation Code`,3) AS vCode, "LampWarranties" FROM LampWarranties GROUP BY vCode
UNION ALL SELECT LEFT(`Validation Code`,3) AS vCode, "Services" FROM Services GROUP BY vCode ');
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
		$response['type'] = $row['Expended'];
		}
}
else{
$response['type'] = "Not Valid";
}

echo json_encode($response);
?>
