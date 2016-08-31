<?php
//spam filter
if($_POST['name']!=""){die();}
// the message
	$date = new DateTime();
	$result = $date->format('Y-m-d H:i:s');
	$msg = "
Created On:" . $result . "\r";
foreach($_POST as $key=>$value){
	if($key != "clear" AND $key != "eto" AND $key != "esub"  AND $key != "name" AND substr($key,0,3) != "ao_" AND $key != "type"){
		$key = ucwords(str_replace("_"," ",$key));
		if(is_array($value)) $value = print_r($value,TRUE);
		$msg .= "$key: $value\n";
		}
	}

	$from = $_POST['primary_address_country'] . " <" . $_POST['e_mail'] . ">";

	if($from == " <>"){$from = "No Reply <no_reply@infocus.com>";}

	if(!empty($_FILES['file']['tmp_name'])){
	$attachment = chunk_split(base64_encode(file_get_contents($_FILES['file']['tmp_name'])));
	$filename = $_FILES['file']['name'];
	}
	$boundary =md5(date('r', time())); 

	$headers = "From: $from";
	$headers .= "\r\nMIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"_1_$boundary\"";

	$message="$message\r\n";

	if(!empty($filename)){
	$message .= "--_1_$boundary
	Content-Type: application/octet-stream; name=\"$filename\" 
	Content-Transfer-Encoding: base64 
	Content-Disposition: attachment 

	$attachment
	--_1_$boundary--";}


// send email
mail($_REQUEST['eto'],$_REQUEST['esub'],$msg,$headers);
?>
