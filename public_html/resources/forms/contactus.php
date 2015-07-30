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



if(!empty($_POST['first_name'])){

if(in_array($_POST['primary_address_country'],$apacCountries)){
	$to = "daniel.boggs@infocus.com";
	$date = new DateTime();
	$result = $date->format('Y-m-d H:i:s');


	$subject = "Online Request";
	$message = "
	Created On:" . $result . "\r";
	$message .= (empty($_POST['first_name']) ? "" : "First Name:" . $_POST['first_name'] . "\r");
	$message .= (empty($_POST['last_name']) ? "" : "Last Name:" . $_POST['last_name'] . "\r");
	$message .= (empty($_POST['phone_number']) ? "" : "Phone Number:" . $_POST['phone_number'] . "\r");
	$message .= (empty($_POST['organization']) ? "" : "Organization:" . $_POST['organization'] . "\r");
	$message .= (empty($_POST['e_mail']) ? "" : "Email:" . $_POST['e_mail'] . "\r");
	$message .= (empty($_POST['serial_number']) ? "" : "Serial Number:" . $_POST['serial_number'] . "\r");
	$message .= (empty($_POST['symptom']) ? "" : "Symptom:" . $_POST['symptom'] . "\r");
	$message .= (empty($_POST['product']) ? "" : "Product:" . $_POST['product'] . "\r");
	$message .= (empty($_POST['purchasedate']) ? "" : "Purchase Date:" . $_POST['purchasedate'] . "\r");
	$message .= (empty($_POST['notes']) ? "" : "Notes:\r" . $_POST['description'] . "\r");
	$message .= (empty($_POST['address']) ? "" : "Address:\r" . $_POST['address'] . "\r");
	$message .= (empty($_POST['primary_address_city']) ? "" : "City:" . $_POST['primary_address_city'] . "\r");
	$message .= (empty($_POST['primary_address_state']) ? "" : "State:" . $_POST['primary_address_state'] . "\r");
	$message .= (empty($_POST['primary_address_postalcode']) ? "" : "Postal Code:" . $_POST['primary_address_postalcode'] . "\r");
	$message .= (empty($_POST['primary_address_country']) ? "" : "Country:" . $_POST['primary_address_country'] . "\r");

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
$thankyou = $_POST['thankyou'];
if(empty($_POST['thankyou'])){$thankyou = translate("Thank you for your submission");}

echo $thankyou."
<script src='http://code.jquery.com/jquery-1.9.1.js'></script>
<script>$(function(){
    parent.$.colorbox.resize({
        innerWidth:'300px',
        innerHeight:'40px'
    });
});</script>";
die();
}

if($_POST['name'] != ""){

# Create a connection
$url = $_POST['name'];
$ch = curl_init($url);

# Form data string
$postString = http_build_query($_POST, '', '&');

# Setting our options
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
echo $postString;
# Get the response
$response = curl_exec($ch);
print_r($ch);
curl_close($ch);
print_r($response);
$thankyou = $_POST['thankyou'];
if(empty($_POST['thankyou'])){
$thankyou = "Thank you for your submission
";}

echo $thankyou."
<script src='http://code.jquery.com/jquery-1.9.1.js'></script>
<script>$(function(){
    parent.$.colorbox.resize({
        innerWidth:'300px',
        innerHeight:'40px'
    });
});</script>";
die();

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
	$type = 'question';
	$FName = $arr['first_name'];
	$LName = $arr['last_name'];
	$name = $FName . ' ' . $LName;
	$Subject = $name . "/" . $arr['product'] ." Question";
if($arr['type'] == "RMA"){
	$type = 'problem';
	$Subject = $arr['product'] . '/' . $SympName;
}	
	$SName = $arr['second_name'];
	$Semail = $arr['second_email'];
	$orgName = $arr['account_name'];
	$email = $arr['email1'];
	$Country = $arr['primary_address_country'];
	$Phne = $arr['phone_work'];
	$serial = $arr['serial_number'];
	$address = $arr['primary_address_street'];
	$city = $arr['primary_address_city'];
	$state = $arr['primary_address_state'];
	$zip = $arr['primary_address_postalcode']; 
	$productin = $arr['product']; 
	$Channel = "email";
	$description = $arr['description'] . '

	';

	$description .= "\r\r	Contact Name:" . $name;
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


if($lang == "de"):?>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-35128719-1', 'infocus.de');
  ga ('set', 'anonymizeIp', true);
  ga('send', 'pageview');

</script>
<?php elseif($lang == "en"):?>

	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-11305727-14', 'auto');
  ga('send', 'pageview');
 
</script>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-M927XK"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M927XK');</script>
<!-- End Google Tag Manager -->

<?php endif; ?>
<script type="text/javascript" src="/resources/js/WebToLead.js"></script>

<script>

if(self==top){
var sPath=window.location.pathname;
var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
if(sPage.lastIndexOf('.')>0){sPage = sPage.substring(0,sPage.lastIndexOf('.'));}

window.location = "/support/#contactus";
}


$(document).ready(function () {
    $("#WebToLeadForm").submit(function (e) {
        e.preventDefault(); //prevent default form submit
    });});


function checkSN(Serial){
  if(Serial.search(/[^A-Z^0-9^a-z]/)>0){
 document.getElementById('serial_number').value = Serial.replace(/[^A-Z^0-9^a-z]/g,'');
 alert("<?=$pageText['SerialChar']?>. \n<?=$pageText['SerialLong']?>.");
  }
   else if(Serial.length>19){
  alert("<?=$pageText['SerialShort']?>.\n<?=$pageText['SerialLong']?>.");
  document.getElementById('serial_number').value = Serial.substr(0,19);
 }
  }
 function checkSNShort(Serial){
 if(Serial.length<11 && Serial.length>0 ){
  alert("<?=$pageText['SerialShort']?>.");
  document.getElementById('serial_number').value = Serial.substr(0,19);
 }
 }

  function showForm(formType,spd){
  	var speed = spd!=null ? spd:500;
  	var Optional = '<?=translate('Optional')?>';
  	var Required = '<?=translate('Required')?>';
  	if(formType == "RMA"){
  		if('<?=$pageText["RMA-Alternate"]?>' != ""){window.parent.location='http://<?=$pageText['RMA-Alternate']?>';return;}
 		$('.salesOnly').hide();
  		document.getElementById('serial_number').placeholder = Required;
		document.getElementById('purchasedate').placeholder = Optional;
		document.getElementById('sympOption').innerHTML = Required;
		document.getElementById('first_name').placeholder = Required;
		document.getElementById('last_name').placeholder = Required;
		document.getElementById('organization').placeholder = Optional;
		document.getElementById('phone_number').placeholder = Required;
		document.getElementById('email').placeholder = Required;
		document.getElementById('second_name').placeholder = Optional;
		document.getElementById('second_email').placeholder = Optional;
		document.getElementById('product').placeholder = Required;
		document.getElementById('address').placeholder = Required;
		document.getElementById('city').placeholder = Required;
		document.getElementById('primary_address_state').placeholder = Required;
		document.getElementById('zip_postal_code').placeholder = Required;
		document.getElementById('notes').placeholder = Required;
		document.getElementById('req_id').value = 'serial_number;symptom;first_name;last_name;phone_number;email;product;primary_address_country;address;city;notes';
		document.getElementById('campaign_id').value = "Support";
		parent.$.colorbox.resize({innerHeight:$('body').height()*1.2});
  	}
  	else if(formType == "Sales"){
   		if('<?=$pageText['Sales-Alternate']?>' != ""){window.parent.location='http://<?=$pageText['Sales-Alternate']?>';return;}
 		$('.techOnly').hide();
		document.getElementById('first_name').placeholder = Required;
		document.getElementById('last_name').placeholder = Required;
		document.getElementById('organization').placeholder = Optional;
		document.getElementById('phone_number').placeholder = Optional;
		document.getElementById('email').placeholder = Required;
		document.getElementById('product').placeholder = Optional;
		document.getElementById('primary_address_state').placeholder = Optional;
		document.getElementById('notes').placeholder = Required;
		document.getElementById('req_id').value = 'first_name;last_name;email;notes';
 		document.getElementById('campaign_id').value = "ContactUs";
 	}
  	else{
   		if('<?=$pageText['Support-Alternate']?>' != ""){window.parent.location='http://<?=$pageText['Support-Alternate']?>';return;}
 		$('.salesOnly').hide();
 		document.getElementById('serial_number').placeholder = Optional;
		document.getElementById('purchasedate').placeholder = Optional;
		document.getElementById('sympOption').innerHTML = Optional;
		document.getElementById('first_name').placeholder = Required;
		document.getElementById('last_name').placeholder = Required;
		document.getElementById('organization').placeholder = Optional;
		document.getElementById('phone_number').placeholder = Optional;
		document.getElementById('email').placeholder = Required;
		document.getElementById('second_name').placeholder = Optional;
		document.getElementById('second_email').placeholder = Optional;
		document.getElementById('product').placeholder = Required;
		document.getElementById('address').placeholder = Optional;
		document.getElementById('city').placeholder = Optional;
		document.getElementById('primary_address_state').placeholder = Optional;
		document.getElementById('zip_postal_code').placeholder = Optional;
		document.getElementById('notes').placeholder = Required;
 		document.getElementById('req_id').value = 'first_name;last_name;email;product;notes';
		document.getElementById('campaign_id').value = "ContactUs";
		parent.$.colorbox.resize({innerHeight:$('body').height()*1.2});
 	}
	document.getElementById('type').value = formType;
  	$('#preForm').slideUp(speed);
  	$('#contactForm').slideDown(speed);

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

<form action="" id="WebToLeadForm" method="POST" name="WebToLeadForm" enctype="multipart/form-data">

<input type="hidden" id="req_id" name="req_id" value="">
<div class="Row" id="preForm">
<h3 ><?=translate('Contact InFocus')?></h3><span><?=$pageText['LearnAbout']?></span><br>
<div class="C5 Col"><h5><?=translate('Sales and General Inquiries')?></h5>
<div><?=$pageText['Help']?>
</div>
<p><button type="button" onclick="showForm('Sales');"><?=translate('Send Sales a Question')?></button></p>

<div>
<h6><?=translate('Other Resources')?></h6>
> <a class="subtle" href="/reseller-locator" target="_parent"><?=translate('Find a Reseller')?></a><br>
> <a class="subtle" href="/product-finder" target="_parent"><?=translate('Find a Product')?></a><br>
</div>
</div><div class="C5 Col contact-support" >
<h5><?=translate('Support')?></h5>
<p><?=$pageText['Own']?> </p>

<div><h6><?=$pageText['Failure']?></h6>
<p><?=$pageText['Power']?></p>
<p><button type="button" href="#USCanada-popup" class="colorbox-inline"><?=translate('Create a Service Request')?></button>
</div>
<div>
<h6><?=$pageText['General']?></h6>
<p><?=$pageText['Lumens']?></p>
<p><button type="button" onclick="showForm('TS');"><?=translate('Send Tech Support a Question')?></button> </p>
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
> <a class="subtle" href="/resources/forms/projectioncalculator"><?=translate('Projection Calculator')?></a><br>
> <a class="subtle" href="/support/warrantyvt.php"><?=translate('Check Status of Your Warranty')?></a><br>
> <a class="subtle" href="/support/authorized-service-centers#ABU" target="_parent"><?=translate('Find a Service Provider')?></a><br>
</div>
</div>
</div>


<div id="contactForm" style="display:none">
<h3 class="salesOnly"><?=translate('Contact InFocus Technical Support')?></h3><span class="salesOnly"><?=$pageText['TechText']?></span><br>

<h3 class="techOnly"><?=translate('Contact InFocus Sales')?></h3><span class="techOnly"><?=$pageText['SalesText']?></span><br>

<form action=""method="POST" enctype="multipart/form-data" onsubmit="submit();">

<input type="hidden" id="reqfields" value="first_name,last_name,e_mail,phone_number,organization,serial_number,symptom,address,city,state,zip_postal_code,primary_address_country,notes">
<input type="hidden" name="type" id="type" value="">

 <ul class="wrap">
<li class="techOnly">
 <label class="top" for="serial_number"><?=translate('Serial Number')?>: </label>
 <input name="serial_number" id="serial_number" type="text" onkeyup="checkSN(this.value);" onchange="checkSNShort(this.value);" >
</li>
<li class="techOnly"><label class="top" for="purchasedate" >Purchase Date: </label>
<input id="purchasedate" type="text" name="purchasedate" /></li>

<li class="techOnly"><label class="top" for="symptom" >Symptom: </label>
<select type="text" name="symptom" id="symptom" >

	<option id="sympOption" value="" selected="selected">- Select -</option>
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
 <label class="top" for="first_name"><?=translate('First Name')?>: </label>
 <input name="first_name" id="first_name" type="text" value="<?=$_GET['first_name']?>" >
</li>
<li>
 <label class="top" for="last_name"><?=translate('Last Name')?>: </label>
 <input name="last_name" id="last_name" type="text" value="<?=$_GET['last_name']?>" >
</li>
<li>
 <label class="top" for="organization"><?=translate('Organization Name')?>: </label>
 <input name="account_name" id="organization" type="text" value="<?=$_GET['account_name']?>" >
</li>
<li>
 <label class="top" for="phone_number"><?=translate('Phone')?>: </label>
 <input name="phone_work" id="phone_number" type="text" value="<?=$_GET['phone_work']?>" >
</li>
<li>
 <label class="top" for="email"><?=translate('Email Address')?>: </label>
 <input type="email" id="email" name="email1" type="email" value="<?=$_GET['email1']?>" >
</li>
<li class="techOnly">
 <label class="top" for="first_name"><?=translate('Secondary Contact Name')?>: </label>
 <input name="second_name" id="second_name" type="text" value="<?=$_GET['second_name']?>" >
</li>
<li class="techOnly">
 <label class="top" for="e_mail"><?=translate('Secondary Contact Email')?>: </label>
 <input type="email" id="second_email" name="second_email" value="<?=$_GET['second_email']?>" >
</li>
<li>
 <label class="top" for="product"><?=translate('Product Part #')?>: </label>
<input name="product" id="product" value="" class="form-text" type="text" >
</li>

<li class="techOnly">
 <label class="top" for="address"><?=translate('Address')?>: </label>
 <textarea type="text" cols="30" rows="5" name="primary_address_street" id="address" ><?=$_GET['primary_address_street']?></textarea>
</li>
<li class="techOnly">
 <label class="top" for="city"><?=translate('City')?>: </label>
 <input name="primary_address_city" id="city" type="text" value="<?=$_GET['primary_address_city']?>" >
</li>
<li>

 <label class="top" for="primary_address_country"><?=translate('Country')?>: </label>
 <select type="text" name="primary_address_country" id="primary_address_country" onchange="if(this.value == 'US' || this.value == 'CA'){$('#stateContainer').show();$('#zipContainer').show();}else{$('#stateContainer').hide();$('#zipContainer').hide();}" >
 <option value=""><?=translate('Required')?></option>
<?php  
 foreach($displayedCountries as $cCode){
	 echo "<option value='$cCode'>{$countryList[$cCode]} ($cCode)</option>";
 }
 
 ?>
 </select>
</li>
<li id="stateContainer" style="display:none">
 <label class="top" for="state"><?=translate('State/Province')?>: </label>
 <select name="primary_address_state" id="primary_address_state" type="text" >
 <option value="">Select a State</option>
<?php  
 foreach($stateList as $sCode => $sValue){
	 echo "<option value='$sCode'>{$sValue} ($sCode)</option>";
 }
 
 ?>
 </select>
</li>
<li id="zipContainer" class="techOnly" style="display:none">
 <label class="top" for="zip_postal_code"><?=translate('Zip/Postalcode')?>: </label>
 <input name="primary_address_postalcode" id="zip_postal_code" type="text" value="<?=$_GET['primary_address_postalcode']?>" >
</li>



<li><label class="top" for="notes"><?=translate('Notes')?>: </label>
<textarea id="notes" type="text" name="description" rows="6" placeholder="Required"></textarea></li>

<li class="techOnly"><label class="top" for="file"><?=translate('Attach File')?>: </label>
<input id="file" type="file" name="file"></li>


</ul>

<input id="optin" name="optin" class="css-checkbox" type="checkbox" value="Yes"/>
<label for="optin" style="margin-bottom:1.5em;" class="css-label"><?=translate('Yes, I would like to receive news and special deals from InFocus.')?></label>
<button onclick="submit_form();" type="button"><?=translate('Submit')?></button>

<br><span class="form-required" style="font-size:70%">* <?= $translate['Denotes a Required field']?>.</span>
<p><?php echo $pageText['PrivacyReview'];?></p>
<input id="campaign_id" type="hidden" name="campaign_id" value="ContactUs" />
<input id="assigned_user_id" type="hidden" name="assigned_user_id" value="" />
<input id="team_id" type="hidden" name="team_id" value="1" />
<input id="team_set_id" type="hidden" name="team_set_id" value="Global" />
<input type="hidden" id="human" name="human" value="55">
<input type="hidden" id="name" name="name">

</form>

</div>






<div class="hidden" style="display:none">
<div id="RMAUSCan-popup">
<style type="text/css">
	dl.image_map {display:block; width="178px" height="194px" background:url(/resources/images/USCanadaMap.png); position:relative; margin:2px auto 2px auto;}
<dl class="image_map">
</dl>
</style>
 <base target="_parent" />
<div id="USCanada-popup" style="text-align:center;  margin-left:auto; margin-right:auto;overflow:hidden;">
<img id="Image-UsCanada" src="/resources/images/USCanadaMap.png" usemap="#Image-UsCanada" border="0"  alt="" />
<map id="_Image-UsCanada" name="Image-UsCanada">
<area shape="poly" coords="23,99,45,109,67,119,92,129,105,142,111,153,131,143,140,137,148,145,132,158,124,161,123,165,123,170,120,174,119,174,107,185,107,197,104,200,100,197,100,189,96,185,85,182,68,182,61,181,51,188,45,173,40,173,36,161,21,159,16,148,5,140,2,133,2,130,5,119,10,109,19,103,19,103," class="form-box" onclick="showForm('RMA');$.colorbox.close();" alt="United States" title="United States"   />
<area shape="poly" coords="28,65,33,51,56,40,60,19,23,10,4,19,5,46,17,64," class="form-box" onclick="showForm('RMA');$.colorbox.close();"  alt="United States" title="United States"   />
<area shape="poly" coords="31,60,31,54,38,48,46,41,58,37,80,20,107,3,169,1,215,4,226,28,226,47,223,62,208,75,197,92,183,95,174,64,164,51,138,46,135,64,149,84,161,100,176,113,174,119,176,137,162,145,150,148,142,135,111,151,109,139,98,130,18,99,21,77," Target="_parent" href="http://www.repairware.ca/contact-us/" alt="Canada" title="Canada"   />
</map>
</div>
</div></div>

<script>

				$(".colorbox-inline").colorbox({inline:true});

$(function(){
    resize();
    if("<?=$_GET['preForm']?>" != ""){showForm("<?=$_GET['preForm']?>",0);}

});

function resize(){
	    parent.$.colorbox.resize({innerWidth:$('body').width(),innerHeight:$('body').height()});
}
</script>
</BODY>
</HTML>
