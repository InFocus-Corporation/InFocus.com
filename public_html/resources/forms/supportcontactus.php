<?php

require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");


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


if(!empty($_POST['first_name'])){



if(in_array($_POST['primary_address_country'],array("AF", "AL", "DZ", "AD", "AO", "AQ", "AM", "AT", "AZ", "BH", "BY", "BE", "BJ", "BM", "BA", "BW", "BV", "IO", "BG", "BF", "BI", "CM", "CV", "CF", "TD", "CX", "CC", "KM", "CG", "CK", "CI", "HR", "CY", "CZ", "DK", "DJ", "EG", "GQ", "ER", "EE", "ET", "FK", "FO", "FI", "FR", "GF", "PF", "TF", "GA", "GM", "GE", "DE", "GH", "GI", "GR", "GL", "GN", "GW", "HM", "HU", "IS", "IR", "IQ", "IE", "IL", "IT", "JO", "KZ", "KE", "KI", "KW", "KG", "LV", "LB", "LS", "LR", "LY", "LI", "LT", "LU", "MK", "MG", "MW", "MV", "ML", "MT", "MR", "MU", "YT", "MD", "MC", "MN", "MA", "MZ", "MM", "NA", "NR", "NL", "AN", "NC", "NE", "NG", "NU", "NF", "MP", "NO", "OM", "PG", "PY", "PL", "PT", "QA", "RE", "RO", "RU", "RW", "KN", "LC", "VC", "SM", "ST", "SA", "SN", "SC", "SL", "SK", "SI", "SB", "SO", "ZA", "GS", "ES", "SD", "SR", "SJ", "SZ", "SE", "CH", "SY", "TJ", "TZ", "TG", "TO", "TN", "TR", "TM", "TC", "UA", "AE", "UK", "UZ", "EH", "YE", "ZM", "ZW", "GB"))){$to = "emea.support@infocus.com";}
elseif(in_array($_POST['primary_address_country'],array("AS", "AI", "AG", "AR", "AW", "MO", "TW", "AU", "BD", "BT", "BN", "KH", "FJ", "IN", "JP", "KP", "KR", "LA", "FM", "NP", "NZ", "PK", "PW", "PN", "SG", "TH", "TP", "TK", "VN"))){$to = "Jill.Neo@infocus.com";}

if(!empty($to)){
	$date = new DateTime();
	$result = $date->format('Y-m-d H:i:s');


	$subject = "Online Request";
	$message = "
	Created On:" . $result . "
	First Name:" . $_POST['first_name'] . "
	Last Name:" . $_POST['last_name'] . "
	Phone Number:" . $_POST['phone_number'] . "
	Organization:" . $_POST['organization'] . "
	Email:" . $_POST['e_mail'] . "
	Serial Number:" . $_POST['serial_number'] . "
	Symptom:" . $_POST['symptom'] . "
	Product" . $_POST['product'] . "
	Purchase Date:" . $_POST['purchasedate'] . "
	Notes:" . $_POST['notes'] . "
	Address:" . $_POST['address'] . "
	City:" . $_POST['city'] . "
	State:" . $_POST['state'] . "
	Postal Code:" . $_POST['zip_postal_code'] . "
	Country:" . $_POST['primary_address_country'] ;
	$from = $_POST['primary_address_country'] . " <" . $_POST['e_mail'] . ">";


	    	if(!empty($_FILES['file']['tmp_name'])){
			$attachment = chunk_split(base64_encode(file_get_contents($_FILES['file']['tmp_name'])));
	    	$filename = $_FILES['file']['name'];
			}
	    	$boundary =md5(date('r', time())); 

	    	$headers = "From: $from";
	    	$headers .= "\r\nMIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"_1_$boundary\"";


	    	$headers = "From: $from";
	    	$headers .= "\r\nMIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"_1_$boundary\"";

	    	$message="

	--_1_$boundary\r\n"
	        . "Content-Type: text/html; charset=ISO-8859-1\r\n"
	        . "Content-Transfer-Encoding: 7bit\r\n"
	        . "\r\n"
			. "$message\r\n";

	if(!empty($filename)){
	$message .= "--_1_$boundary
	Content-Type: application/octet-stream; name=\"$filename\" 
	Content-Transfer-Encoding: base64 
	Content-Disposition: attachment 

	$attachment
	--_1_$boundary--";}

	    	mail($to, $subject, $message, $headers);

}
else{
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
	$Subject = $arr['product'] . '/' . $SympName;
	$type = 'problem';
	$FName = $arr['first_name'];
	$LName = $arr['last_name'];
	$orgName = $arr['organization'];
	$email = $arr['e_mail'];
	$Country = $arr['primary_address_country'];
	$Phne = $arr['phone_number'];
	$serial = $arr['serial_number'];
	$address = $arr['address'];
	$city = $arr['city'];
	$state = $arr['state'];
	$zip = $arr['zip_postal_code']; 
	$productin = $arr['product']; 
	$Channel = "email";
	$name = $FName . ' ' . $LName;
	$description = $arr['notes'] . '

	';

	$description .= '

	' . $name . '
	' . $orgName . '
	' . $email . '
	' . $Phne . '
	' . $address . '
	' . $city . '
	' . $state . '
	' . $zip . '
	' . $Country;


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
	}

echo "<script src='http://code.jquery.com/jquery-1.9.1.js'></script><br>Request submitted<br><br><script>$(function(){
    parent.$.colorbox.resize({
        innerWidth:'200px',
        innerHeight:'100px'
    });
});</script>";


die();
}
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");

?>

<script>

if(self==top){
var sPath=window.location.pathname;
var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
if(sPage.lastIndexOf('.')>0){sPage = sPage.substring(0,sPage.lastIndexOf('.'));}

window.location = "/support/#supportcontactus";
}

function submit_form(){
var required = document.getElementById('reqfields').value;
required = required.split(",");

var index;

for (index = 0; index < required.length; ++index) {
    if(document.getElementById(required[index]).value == ""){
		alert("Please fill out all required fields");
		return;
		}
}

document.getElementById("contactus").submit();

}

function checkSN(Serial){
  if(Serial.search(/[^A-Z^0-9^a-z]/)>0){
 document.getElementById('serial_number').value = Serial.replace(/[^A-Z^0-9^a-z]/g,'');
 alert("Only letters and numbers are valid in serial numbers. \nYou may only submit one serial at a time.");
  }

  if(Serial.length<12){
  alert("Serial numbers are generally 12-15.");
  document.getElementById('serial_number').value = Serial.substr(0,19);
 }

   if(Serial.length>19){
  alert("Serial numbers are generally 12-15.\nYou may only submit one serial at a time.");
  document.getElementById('serial_number').value = Serial.substr(0,19);
 }

  }
</script>
<style>
  form {
	background: #f7f7f7;
	padding: 20px;
	box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.2), inset 0px 0px 0px 0px rgba(255, 255, 255, 1);
	border: 0px solid #B2B2B2;
}
a.subtle{color:darkgrey;}
@media (min-width: 640px){
.contact-support{
	border-left:1px solid grey;
	padding-left:1%;
}
}
</style>
 </HEAD>
<body style="max-width:1200px;background: #f7f7f7;">

<form action="" id="contactus" method="POST" enctype="multipart/form-data">

<h3 ><?=translate('Contact InFocus')?></h3><span><?=$pageText['LearnAbout']?></span><br>
<input type="hidden" id="reqfields" value="first_name,last_name,e_mail,primary_address_country,notes">
<div class="Row">
<div class="C5 Col"><h5><?=translate('Sales and General Inquiries')?></h5>
<div><?=$pageText['Help']?>
</div>
<p><button type="button"><?=translate('Send Sales a Question')?></button></p>

<div>
<h6><?=translate('Other Resources')?></h6>
> <a class="subtle"><?=translate('Find a Reseller')?></a><br>
> <a class="subtle"><?=translate('Find a Product')?></a><br>
</div>
</div><div class="C5 Col contact-support" >
<h5><?=translate('Support')?></h5>
<p><?=$pageText['Own']?> </p>

<div><h6><?=$pageText['Failure']?></h6>
<p><?=$pageText['Power']?></p>
<p><button type="button"><?=translate('Create a Service Request')?></button> </p>
</div>
<div>
<h6><?=$pageText['General']?></h6>
<p><?=$pageText['Lumens']?></p>
<p><button type="button"><?=translate('Send Tech Support a Question')?></button> </p>
</div>
<p><?=translate('Or call us at 877-388-8360 (US and Canada)')?></p>

<p><a onclick="$('#phoneHours').toggle(500)"><?=translate('See phone numbers and hours for worldwide tech support')?> &darr;</a></p>
<style>

table.contact-table tr:nth-child(n+3) td:first-child{padding-left:40px;}
table.contact-table tr td:first-child{width:60px;}
table.contact-table td{ padding: 1px 6px;}
table.contact-table th{font-weight:bold;color:grey;text-align:left;}
table.contact-table{
	margin-bottom:20px;
}
</style>
 <div id="phoneHours" style="display:none">
<?=$contactTables?>
</div>
<br>
<div>
<h6><?=translate('Other Resources')?></h6>
> <a class="subtle"><?=translate('Projection Calculator')?></a><br>
> <a class="subtle"><?=translate('Check Status of Your Warranty')?></a><br>
> <a class="subtle"><?=translate('Find a Service Provider')?></a><br>
</div>
</div>
</div>


<div style="display:none">
<form action="" id="onlinerma" method="POST" name="onlinerma" enctype="multipart/form-data">

<h3 ><!--Trans-Marker-->Online RMA</h3><span >Need support or documentation for your product? Please visit our <a href="/support"> Support site.</a> </span><br>
<input type="hidden" id="reqfields" value="first_name,last_name,e_mail,phone_number,organization,serial_number,symptom,address,city,state,zip_postal_code,primary_address_country,notes">

 <ul class="wrap">
<li>
 <label class="top" for="serial_number"><?=translate('Serial Number')?>: <span class="form-required" title="This field is required.">*</span></label>
 <input maxlength="128" name="serial_number" id="serial_number" size="60" type="text" onkeyup="checkSN(this.value);" onchange="isRegistered(this.value);" required>
</li>
<li><label class="top" for="purchasedate" >Purchase Date: </label>
<input id="purchasedate" type="text" name="purchasedate" /></li>

<li><label class="top" for="symptom" >Symptom: <span class="required" style="color: #ff0000;">*</span></label>
<select type="text" name="symptom" id="symptom" >

	<option value="" selected="selected">- Select -</option>
	<option value="001,Abused / Dropped">Abused / Dropped</option>
	<option value="004,Audible Noise">Audible Noise</option>
	<option value="005,Audio">Audio</option>
	<option value="006,Border Light">Border Light</option>
	<option value="007,Brightness Uniformity">Brightness Uniformity</option>
	<option value="008,Color Uniformity">Color Uniformity</option>
	<option value="009,Computer Compatibility">Computer Compatibility</option>
	<option value="051,Connectivity - Video Source">Connectivity - Video Source</option>
	<option value="010,Contrast">Contrast</option>
	<option value="011,Convergence Out">Convergence Out</option>
	<option value="012,Cosmetic">Cosmetic</option>
	<option value="droppedcalls,Dropped Calls">Dropped Calls</option>
	<option value="016,Image Banding">Image Banding</option>
	<option value="017,Image Blemish">Image Blemish</option>
	<option value="018,Image Brightness">Image Brightness</option>
	<option value="019,Image Color">Image Color</option>
	<option value="020,Image Distorted">Image Distorted</option>
	<option value="021,Image Flashing/Flickering">Image Flashing/Flickering</option>
	<option value="022,Image Focus">Image Focus</option>
	<option value="023,Image Ghosting">Image Ghosting</option>
	<option value="024,Image Lines">Image Lines</option>
	<option value="025,Image Noisy or Grainy">Image Noisy or Grainy</option>
	<option value="026,Image Partial">Image Partial</option>
	<option value="027,IR / Wire Remote">IR / Wire Remote</option>
	<option value="028,Keypad / LED">Keypad / LED</option>
	<option value="029,Lamp Shattered">Lamp Shattered</option>
	<option value="031,Logo Capture">Logo Capture</option>
	<option value="032,Mechanical">Mechanical</option>
	<option value="033,Mechanical Fit">Mechanical Fit</option>
	<option value="034,Missing or Wrong Part">Missing or Wrong Part</option>
	<option value="035,No Image">No Image</option>
	<option value="036,No Light">No Light</option>
	<option value="037,No Mouse Functionality">No Mouse Functionality</option>
	<option value="038,No Network Communication">No Network Communication</option>
	<option value="039,No Power">No Power</option>
	<option value="040,No Serial Communication">No Serial Communication</option>
	<option value="041,Pixel">Pixel</option>
	<option value="042,Premature Shutoff">Premature Shutoff</option>
	<option value="045,Source Failure">Source Failure</option>
	<option value="unabletoconnectcall,Unable to Connect Call">Unable to Connect Call</option>
	<option value="vcmessages,V/C Messages">V/C Messages</option>
	<option value="048,Wireless Functionality">Wireless Functionality</option>
	<option value="049,Won&#039;t retain user settings">Won&#039;t retain user settings</option>
</select></li>
<li>
 <label class="top" for="first_name"><?=translate('First Name')?>: <span class="form-required" title="This field is required.">*</span></label>
 <input maxlength="128" name="first_name" id="first_name" size="60" type="text" value="<?php echo $_GET['first_name']; ?>" required>
</li>
<li>
 <label class="top" for="last_name"><?=translate('Last Name')?>: <span class="form-required" title="This field is required.">*</span></label>
 <input maxlength="128" name="last_name" id="last_name" size="60" type="text" value="<?php echo $_GET['last_name']; ?>" required>
</li>
<li>
 <label class="top" for="organization"><?=translate('Organization Name')?>: <span class="form-required" title="This field is required.">*</span></label>
 <input maxlength="128" name="organization" id="organization" size="60" type="text" value="<?php echo $_GET['organization']; ?>" required>
</li>
<li>
 <label class="top" for="phone_number"><?=translate('Phone')?>: </label>
 <input maxlength="128" name="phone_number" id="phone_number" size="60" type="text" value="<?php echo $_GET['phone_number']; ?>" >
</li>
<li>
 <label class="top" for="e_mail"><?=translate('Email Address')?>: <span class="form-required" title="This field is required.">*</span></label>
 <input type="email" id="email" name="e_mail" size="60" type="e_mail" value="<?php echo $_GET['e_mail']; ?>" required>
</li>
<li>
 <label class="top" for="first_name"><?=translate('Secondary Contact Name')?>: </label>
 <input maxlength="128" name="second_name" id="second_name" size="60" type="text" value="<?php echo $_GET['first_name']; ?>" >
</li>
<li>
 <label class="top" for="e_mail"><?=translate('Secondary Contact Email')?>: </label>
 <input type="email" id="second_email" name="second_email" size="60" value="<?php echo $_GET['e_mail']; ?>" >
</li>
<li>
 <label class="top" for="product"><?=translate('Product Part #')?>: </label>
<input maxlength="128" name="product" id="product" size="60" value="" class="form-text" type="text" required>
</li>

<li>

 <label class="top" for="address"><?=translate('Address')?>: <span class="form-required" title="This field is required.">*</span></label>
 <textarea type="text" cols="30" rows="5" name="address" id="address" required><?php echo $_GET['address']; ?></textarea>
</li>
<li>

 <label class="top" for="city"><?=translate('City')?>: <span class="form-required" title="This field is required."></span></label>
 <input maxlength="128" name="city" id="city" size="60" type="text" value="<?php echo $_GET['city']; ?>" required>
</li>
<li>

 <label class="top" for="state"><?=translate('State/Province')?>: <span class="form-required" title="This field is required."></span></label>
 <input maxlength="128" name="state" id="state" size="60" type="text" value="<?php echo $_GET['state']; ?>" required>
</li>
<li>

 <label class="top" for="zip_postal_code"><?=translate('Zip/Postalcode')?>: <span class="form-required" title="This field is required."></span></label>
 <input maxlength="128" name="zip_postal_code" id="zip_postal_code" size="60" type="text" value="<?php echo $_GET['zip_postal_code']; ?>" required>
</li>
<li>

 <label class="top" for="primary_address_country"><?=translate('Country')?>: <span class="form-required" title="This field is required.">*</span></label>
 <select type="text" name="primary_address_country" id="primary_address_country" required>
 <option value=""></option>
<?php  
 foreach($displayedCountries as $cCode){
	 echo "<option value='$cCode'>{$countryList[$cCode]} ($cCode)</option>";
 }
 
 ?>
 </select>
</li>



<li><label class="top" for="notes">Notes: <span class="required" style="color: #ff0000;">*</span></label>
<textarea id="notes" type="text" name="notes" rows="6"> </textarea></li>

<li><label class="top" for="file">Attach File: </label>
<input id="file" type="file" name="file"></li>

<br><br>
<br><br>
<button onclick="submit_form();" type="button">Submit</button>

<br><span class="form-required" style="font-size:70%">* Denotes a Required field.</span>

</div>
<script>
$(function(){
    parent.$.colorbox.resize({
        innerWidth:$('body').width(),
        innerHeight:$('body').height()
    });
});
</script>
</BODY>
</HTML>
