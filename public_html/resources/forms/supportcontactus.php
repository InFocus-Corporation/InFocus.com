<?php

if(!empty($_POST['first_name'])){



if(in_array($_POST['primary_address_country'],array("AF", "AL", "DZ", "AD", "AO", "AQ", "AM", "AT", "AZ", "BH", "BY", "BE", "BJ", "BM", "BA", "BW", "BV", "IO", "BG", "BF", "BI", "CM", "CV", "CF", "TD", "CX", "CC", "KM", "CG", "CK", "CI", "HR", "CY", "CZ", "DK", "DJ", "EG", "GQ", "ER", "EE", "ET", "FK", "FO", "FI", "FR", "GF", "PF", "TF", "GA", "GM", "GE", "DE", "GH", "GI", "GR", "GL", "GN", "GW", "HM", "HU", "IS", "IR", "IQ", "IE", "IL", "IT", "JO", "KZ", "KE", "KI", "KW", "KG", "LV", "LB", "LS", "LR", "LY", "LI", "LT", "LU", "MK", "MG", "MW", "MV", "ML", "MT", "MR", "MU", "YT", "MD", "MC", "MN", "MA", "MZ", "MM", "NA", "NR", "NL", "AN", "NC", "NE", "NG", "NU", "NF", "MP", "NO", "OM", "PG", "PY", "PL", "PT", "QA", "RE", "RO", "RU", "RW", "KN", "LC", "VC", "SM", "ST", "SA", "SN", "SC", "SL", "SK", "SI", "SB", "SO", "ZA", "GS", "ES", "SD", "SR", "SJ", "SZ", "SE", "CH", "SY", "TJ", "TZ", "TG", "TO", "TN", "TR", "TM", "TC", "UA", "AE", "UK", "UZ", "EH", "YE", "ZM", "ZW", "GB"))){$to = "emea.support@infocus.com";}
elseif(in_array($_POST['primary_address_country'],array("AS", "AI", "AG", "AR", "AW", "MO", "TW", "AU", "BD", "BT", "BN", "KH", "FJ", "IN", "JP", "KP", "KR", "LA", "FM", "NP", "NZ", "PK", "PW", "PN", "SG", "TH", "TP", "TK", "VN"))){$to = "Jill.Neo@infocus.com";}

if(!empty($to)){
$date = new DateTime();
$result = $date->format('Y-m-d H:i:s');


$subject = "[Form:Online Request]";
$message = "
<Created On>" . $result . "</Created On>

<first_name>" . $_POST['first_name'] . "</first_name>

<last_name>" . $_POST['last_name'] . "</last_name>

<phone_number>" . $_POST['phone_number'] . "</phone_number>

<organization>" . $_POST['organization'] . "</organization>
<e_mail>" . $_POST['e_mail'] . "</e_mail>
<serial_number>" . $_POST['serial_number'] . "</serial_number>
<symptom>" . $_POST['symptom'] . "</symptom>
"; 


$message .=  "
<symptom_notes>" . $_POST['product'] . "
" . $_POST['purchasedate'] . "
" . $_POST['notes'] . "</symptom_notes>
<address>" . $_POST['address'] . "</address>
<city>" . $_POST['city'] . "</city>
<state>" . $_POST['state'] . "</state>
<zip_postal_code>" . $_POST['zip_postal_code'] . "</zip_postal_code>
<country>" . $_POST['primary_address_country'] . "</country>";
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
define("ZDUSER", "daniel.boggs@infocus.com");
define("ZDURL", "https://infocuscorp.zendesk.com/api/v2");

function curlWrap($url, $json)
{
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
?>



<!DOCTYPE html>

<HTML>
<HEAD>
 
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link type="text/css" rel="stylesheet" href="/resources/css/core.css">
<!--[if IE]>
    <link href="/resources/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
  <![endif]-->

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
</script>
<style>
  form {
	background: #f7f7f7;
	padding: 20px;
	box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.2), inset 0px 0px 0px 0px rgba(255, 255, 255, 1);
	border: 0px solid #B2B2B2;
}
</style>
 </HEAD>
<body style="max-width:1200px;background: #f7f7f7;">

<form action="" id="contactus" method="POST" enctype="multipart/form-data">

<h3 ><!--Trans-Marker-->Contact Support</h3><span ><!--Trans-Marker-->Please fill out the below fields. Support response time is 1-2 business days.<br>
      <!--Trans-Marker-->If you need faster answers feel free to call us at 877-388-8360. </span><br>
<input type="hidden" id="reqfields" value="first_name,last_name,e_mail,primary_address_country,notes">

	  <ul class="wrap">
	  <li>

<label class="top" for="first_name" >First Name: <span class="required" style="color: #ff0000;">*</span></label>
<input id="first_name" type="text" name="first_name" />
</li>
<li>
<label class="top" for="last_name" >Last Name: <span class="required" style="color: #ff0000;">*</span></label>
<input id="last_name" type="text" name="last_name" onchange="validateHuman('1');" />
</li>
<li>
<label class="top" for="e_mail" >Email Address: <span class="required" style="color: #ff0000;">*</span></label>
<input id="e_mail" type="text" name="e_mail" onchange="validateEmailAdd('1');" />
</li>
<li>
<label class="top" for="phone_number" >Phone: </label>
<input id="phone_number" type="text" name="phone_number" />
</li>
<li>
<label class="top" for="organization" >Organization: </label>
<input id="organization" type="text" name="organization" />
</li>
<li>
<label class="top" for="product" >Product: </label>
<input id="product" type="text" name="product" />
</li>
<li>
<label class="top" for="serial_number" >Serial Number: </label>
<input id="serial_number" type="text" name="serial_number" />
</li>
<li>
<label class="top" for="symptom" >Symptom: </label>
<select type="text" name="symptom" id="symptom">
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
</select>
</li>
<li>
<label class="top" for="address" >Address: </label>
<input id="address" type="text" name="address" />
</li>
<li>
<label class="top" for="city" >City: </label>
<input id="city" type="text" name="city" />
</li>
<li>
<label class="top" for="state" >State: </label>
<input maxlength="2" id="state" type="text" name="state" />
</li>
<li>
<label class="top" for="zip_postal_code" >Postal Code: </label>
<input id="zip_postal_code" type="text" name="zip_postal_code" />
</li>
<li>
<label class="top" for="primary_address_country">Country: <span class="required" style="color: #ff0000;">*</span></label>
<Select id="primary_address_country" type="text" name="primary_address_country">
	<option value="" selected="selected">Select Country</option> 
<option value="AD">AD</option><option value="AE">AE</option><option value="AF">AF</option><option value="AG">AG</option><option value="AI">AI</option><option value="AL">AL</option><option value="AM">AM</option><option value="AO">AO</option><option value="AQ">AQ</option><option value="AR">AR</option><option value="AS">AS</option><option value="AT">AT</option><option value="AU">AU</option><option value="AW">AW</option><option value="AX">AX</option><option value="AZ">AZ</option><option value="BA">BA</option><option value="BB">BB</option><option value="BD">BD</option><option value="BE">BE</option><option value="BF">BF</option><option value="BG">BG</option><option value="BH">BH</option><option value="BI">BI</option><option value="BJ">BJ</option><option value="BL">BL</option><option value="BM">BM</option><option value="BN">BN</option><option value="BO">BO</option><option value="BQ">BQ</option><option value="BR">BR</option><option value="BS">BS</option><option value="BT">BT</option><option value="BV">BV</option><option value="BW">BW</option><option value="BY">BY</option><option value="BZ">BZ</option><option value="CA">CA</option><option value="CC">CC</option><option value="CD">CD</option><option value="CF">CF</option><option value="CG">CG</option><option value="CH">CH</option><option value="CI">CI</option><option value="CK">CK</option><option value="CL">CL</option><option value="CM">CM</option><option value="CN">CN</option><option value="CO">CO</option><option value="CR">CR</option><option value="CU">CU</option><option value="CV">CV</option><option value="CW">CW</option><option value="CX">CX</option><option value="CY">CY</option><option value="CZ">CZ</option><option value="DE">DE</option><option value="DJ">DJ</option><option value="DK">DK</option><option value="DM">DM</option><option value="DO">DO</option><option value="DZ">DZ</option><option value="EC">EC</option><option value="EE">EE</option><option value="EG">EG</option><option value="EH">EH</option><option value="ER">ER</option><option value="ES">ES</option><option value="ET">ET</option><option value="FI">FI</option><option value="FJ">FJ</option><option value="FK">FK</option><option value="FM">FM</option><option value="FO">FO</option><option value="FR">FR</option><option value="GA">GA</option><option value="GB">GB</option><option value="GD">GD</option><option value="GE">GE</option><option value="GF">GF</option><option value="GG">GG</option><option value="GH">GH</option><option value="GI">GI</option><option value="GL">GL</option><option value="GM">GM</option><option value="GN">GN</option><option value="GP">GP</option><option value="GQ">GQ</option><option value="GR">GR</option><option value="GS">GS</option><option value="GT">GT</option><option value="GU">GU</option><option value="GW">GW</option><option value="GY">GY</option><option value="HK">HK</option><option value="HM">HM</option><option value="HN">HN</option><option value="HR">HR</option><option value="HT">HT</option><option value="HU">HU</option><option value="ID">ID</option><option value="IE">IE</option><option value="IL">IL</option><option value="IM">IM</option><option value="IN">IN</option><option value="IO">IO</option><option value="IQ">IQ</option><option value="IR">IR</option><option value="IS">IS</option><option value="IT">IT</option><option value="JE">JE</option><option value="JM">JM</option><option value="JO">JO</option><option value="JP">JP</option><option value="KE">KE</option><option value="KG">KG</option><option value="KH">KH</option><option value="KI">KI</option><option value="KM">KM</option><option value="KN">KN</option><option value="KP">KP</option><option value="KR">KR</option><option value="KW">KW</option><option value="KY">KY</option><option value="KZ">KZ</option><option value="LA">LA</option><option value="LB">LB</option><option value="LC">LC</option><option value="LI">LI</option><option value="LK">LK</option><option value="LR">LR</option><option value="LS">LS</option><option value="LT">LT</option><option value="LU">LU</option><option value="LV">LV</option><option value="LY">LY</option><option value="MA">MA</option><option value="MC">MC</option><option value="MD">MD</option><option value="ME">ME</option><option value="MF">MF</option><option value="MG">MG</option><option value="MH">MH</option><option value="MK">MK</option><option value="ML">ML</option><option value="MM">MM</option><option value="MN">MN</option><option value="MO">MO</option><option value="MP">MP</option><option value="MQ">MQ</option><option value="MR">MR</option><option value="MS">MS</option><option value="MT">MT</option><option value="MU">MU</option><option value="MV">MV</option><option value="MW">MW</option><option value="MX">MX</option><option value="MY">MY</option><option value="MZ">MZ</option><option value="NA">NA</option><option value="NC">NC</option><option value="NE">NE</option><option value="NF">NF</option><option value="NG">NG</option><option value="NI">NI</option><option value="NL">NL</option><option value="NO">NO</option><option value="NP">NP</option><option value="NR">NR</option><option value="NU">NU</option><option value="NZ">NZ</option><option value="OM">OM</option><option value="PA">PA</option><option value="PE">PE</option><option value="PF">PF</option><option value="PG">PG</option><option value="PH">PH</option><option value="PK">PK</option><option value="PL">PL</option><option value="PM">PM</option><option value="PN">PN</option><option value="PR">PR</option><option value="PS">PS</option><option value="PT">PT</option><option value="PW">PW</option><option value="PY">PY</option><option value="QA">QA</option><option value="RE">RE</option><option value="RO">RO</option><option value="RS">RS</option><option value="RU">RU</option><option value="RW">RW</option><option value="SA">SA</option><option value="SB">SB</option><option value="SC">SC</option><option value="SD">SD</option><option value="SE">SE</option><option value="SG">SG</option><option value="SH">SH</option><option value="SI">SI</option><option value="SJ">SJ</option><option value="SK">SK</option><option value="SL">SL</option><option value="SM">SM</option><option value="SN">SN</option><option value="SO">SO</option><option value="SR">SR</option><option value="SS">SS</option><option value="ST">ST</option><option value="SV">SV</option><option value="SX">SX</option><option value="SY">SY</option><option value="SZ">SZ</option><option value="TC">TC</option><option value="TD">TD</option><option value="TF">TF</option><option value="TG">TG</option><option value="TH">TH</option><option value="TJ">TJ</option><option value="TK">TK</option><option value="TL">TL</option><option value="TM">TM</option><option value="TN">TN</option><option value="TO">TO</option><option value="TR">TR</option><option value="TT">TT</option><option value="TV">TV</option><option value="TW">TW</option><option value="TZ">TZ</option><option value="UA">UA</option><option value="UG">UG</option><option value="UM">UM</option><option value="US" selected="selected">US</option><option value="UY">UY</option><option value="UZ">UZ</option><option value="VA">VA</option><option value="VC">VC</option><option value="VE">VE</option><option value="VG">VG</option><option value="VI">VI</option><option value="VN">VN</option><option value="VU">VU</option><option value="WF">WF</option><option value="WS">WS</option><option value="YE">YE</option><option value="YT">YT</option><option value="ZA">ZA</option><option value="ZM">ZM</option><option value="ZW">ZW</option>
</select>
</li>
<li>
<label class="top" for="notes">Question: <span class="required" style="color: #ff0000;">*</span></label>
<textarea id="notes" type="text" name="notes" rows="10"> </textarea>
</li>
</ul>

<br>
<button onclick="submit_form();" type="button">Submit</button>
<br><span class="form-required" style="font-size:70%">* Denotes a Required field.</span>

</form>

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
