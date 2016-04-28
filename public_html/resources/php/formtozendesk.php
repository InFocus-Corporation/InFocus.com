<?php

function curlWrap($url, $json){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
	curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
	curl_setopt($ch, CURLOPT_URL, ZDURL.$url);
	curl_setopt($ch, CURLOPT_USERPWD, ZDUSER."/token:".ZDAPIKEY);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
	curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	$output = curl_exec($ch);

	$info = curl_getinfo($ch);
	// echo $output . '<br>';
	// print_r($info);

	curl_close($ch);
	$decoded = json_decode($output);
	return $decoded;
}

function post_files($url,$filearray) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
	    curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERPWD, ZDUSER."/token:".ZDAPIKEY);

	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/binary'));

	curl_setopt($ch, CURLOPT_POST, true);

	$file = fopen($filearray['tmp_name'], 'r');
	$size = filesize($filearray['tmp_name']);
	$fildata = fread($file,$size);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fildata);
	curl_setopt($ch, CURLOPT_INFILE, $file);
	curl_setopt($ch, CURLOPT_INFILESIZE, $size);
	curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_VERBOSE, true);
	    $response = curl_exec($ch);
	    return $response;
}
	
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");

	define("ZDAPIKEY", "srU2sx3OY0fK2TDn3CDGblU0yBxDBGIULwSWGVps");
	define("ZDUSER", "administrator@infocus.com");
	define("ZDURL", "https://infocuscorp.zendesk.com/api/v2");

	foreach($_POST as $key => $value){
	if($key != "Troubleshooting" AND $key != "symptom" ){
	$arr[strip_tags($key)] = strip_tags($value);
	}}

	$Symptom = split(",",$_POST['symptom']);
	$SympName = $Symptom[1];
	$Symptom = $Symptom[0];
	$type = 'question';
	$FName = (!empty($arr['first_name']) ? $arr['first_name'] : $arr['First_Name']);
	$LName = (!empty($arr['last_name']) ? $arr['last_name'] : $arr['Last_Name']);
	$name = $FName . ' ' . $LName;
	$email = (!empty($arr['email1']) ? $arr['email1'] : $arr['E-mail_Address']);
	$SName = (!empty($arr['second_name']) ? $arr['second_name'] : $arr['Alternate_Name']);
	$Semail = (!empty($arr['second_email']) ? $arr['second_email'] : $arr['Alternate_Email']);
	$serial = (!empty($arr['serial_number']) ? $arr['serial_number'] : $arr['Serial_Number']);
	$Phne = (!empty($arr['phone_work']) ? $arr['phone_work'] : $arr['Business_Phone']);
	$orgName = (!empty($arr['account_name']) ? $arr['account_name'] : $arr['Company']);
	$address = (!empty($arr['primary_address_street']) ? $arr['primary_address_street'] : $arr['Business_Street']);
	$city = (!empty($arr['primary_address_city']) ? $arr['primary_address_city'] : $arr['Business_City']);
	$Country = (!empty($arr['primary_address_country']) ? $arr['primary_address_country'] : $arr['Business_Country']);
	$state = (!empty($arr['primary_address_state']) ? $arr['primary_address_state'] : $arr['Business_State']);
	$zip = (!empty($arr['primary_address_zip']) ? $arr['primary_address_zip'] : $arr['Business_Postal_Code']);
	$productin = (!empty($arr['product']) ? $arr['product'] : $arr['Product']);
	$description = (!empty($args['description']) ? $args['description'] : $args['Description']) . '

	';
	$Channel = "email";
	$Subject = $name . "/" . $arr['product'] ." Question";
if($arr['type'] == "RMA"){
	$type = 'problem';
	$Subject = $arr['product'] . '/' . $SympName;
}

	$description .= "\r\r	Contact Name:" . $name . "\r";
	$description .= (empty($orgName) ? "" : "Org:" . $orgName . "\r");
	$description .= (empty($email) ? "" : "Email:" . $email) . "\r";
	$description .= (empty($Phne) ? "" : "Phone:" . $Phne) . "\r";
	$description .= (empty($SName) ? "" : "Secondary Contact:" . $SName) . "\r";
	$description .= (empty($Semail) ? "" : "Secondary Email:" . $Semail) . "\r";
	$description .= (empty($address) ? "" : "Address:\r" . $address) . "\r";
	$description .= (empty($city) ? "" : "City:" . $city) . "\r";
	$description .= (empty($state) ? "" : "State:" . $state) . "\r";
	$description .= (empty($zip) ? "" : "Zip:" . $zip) . "\r";
	$description .= (empty($Country) ? "" : "Country:" . $Country) . "\r";


	$Mondopadg = 22747639;
	$Prog = 22747659;
	$Projectorg = 22386119;
	$Salesg = 22811785;
	$Servicesg = 22747919;
	$Tabletg = 22811795;
	$VPhoneg = 22811805;

	$group = $Projectorg;

	$formnum = 34285;
	if(substr($productin,0,3) == "INF"){
	$formnum = 34505;
	$group = $Mondopadg;
	}

	if(substr($productin,0,3) == "EPW" OR substr($productin,0,5) == "IN121"  OR substr($productin,0,5) == "INF-V" ){
	$group = $Servicesg;
	}

	if(substr($productin,0,3) == "MVP"){
	$group = $VPhoneg;
	}

	if(substr($productin,0,3) == "INP"){
	$group = $Tabletg;
	}


	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, ZDURL.'/search.json?query=' . urlencode("type:user email:$email"));
	curl_setopt($ch, CURLOPT_USERPWD, ZDUSER."/token:".ZDAPIKEY);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($ch);
	curl_close($ch);
	$decoded = json_decode($output);

	$results = $decoded->results;
	$result = $results[0];
	if(!empty($result->id)){$uid = $result->id;}

	$Phne = str_replace("-","",str_replace(")","",str_replace("(","",str_replace("+","",$Phne))));

	if(empty($uid)){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, ZDURL.'/search.json?query=' . urlencode("type:user name:$name"));
		curl_setopt($ch, CURLOPT_USERPWD, ZDUSER."/token:".ZDAPIKEY);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($ch);
		curl_close($ch);
		$decoded = json_decode($output);

		$results = $decoded->results;
		foreach($results as $result){
		if('+' .$Phne ==  $result->phone OR '+1' .$Phne ==  $result->phone){
		$uid = $result->id;
		}
		}
	}

	if(empty($uid)){
		$create = json_encode(array('user' => array(
		'name' => $name, 
		'email' => $email, 
		'phone' => $Phne, 
		'user_fields' => array( 
							"first_name"=> $FName, 
							"last_name"=> $LName, 
							"organization"=> $orgName, 
							"shipping_address"=> $address, 
							"city"=> $city, 
							"state"=> $state, 
							"country"=> $Country, 
							"zip_code"=> $zip))));
		$return = curlWrap("/users.json", $create); 
		$decoded = $return->user;
		$uid = $decoded->id;
	}

	if(!empty($_FILES)){
		$output = post_files("https://infocuscorp.zendesk.com/api/v2/uploads.json?filename=" . urlencode($_FILES['file']['name']),$_FILES['file']);
		$output = json_decode($output);
		$ftoken = $output->upload->token;
	}


	if(!empty($uid)){
		$create = json_encode(array('ticket' => array(
		'type' => $type, 
		'subject' => $Subject, 
		'status' => 'new', 
		'group_id' => $group, 
		'comment' => array( "value"=> $description,"uploads" => array($ftoken)), 
		'requester_id' => $uid,
		'custom_fields' => 	array( array("id"=> 23473115, "value"=> $orgName), 
							array("id"=> 23338039, "value"=> $Symptom), 
							array("id"=> 23415649, "value"=> $productin), 
							array("id"=> 23278985, "value"=> $serial), 
							array("id"=> 23394275, "value"=> $productout), ))));
	}
	else{
		$create = json_encode(array('ticket' => array(
		'type' => $type, 
		'subject' => $Subject, 
		'status' => 'new', 
		'group_id' => $group, 
		'comment' => array( "value"=> $description,"uploads" => array($ftoken)), 
		'requester' => array('name' => $FName . ' ' . $LName, 'email' => $email),
		"uploads" => array($ftoken),
		'custom_fields' => 	array( array("id"=> 23473115, "value"=> $orgName), 
							array("id"=> 23338039, "value"=> $Symptom), 
							array("id"=> 23415649, "value"=> $productin), 
							array("id"=> 23278985, "value"=> $serial), 
							array("id"=> 23394275, "value"=> $productout), ))));
	}

	$return = curlWrap("/tickets.json", $create); 

echo "<script src='http://code.jquery.com/jquery-1.9.1.js'></script><br>Request submitted<br><br><script>$(function(){
    parent.$.colorbox.resize({
        innerWidth:'200px',
        innerHeight:'100px'
    });
});</script>";


?>