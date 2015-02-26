<?php

if(!empty($_POST['first_name'])){


    	$filename = $_FILES['file']['name'];
		
$connection = mysqli_connect('67.43.0.33','partners_login','InF0cusP@ssw0rd', 'partners_IFC_IB',3306);

mysqli_set_charset($connection, "utf8");

$_POST['serial_number'] = str_replace("-","",str_replace("1S","",str_replace(" ","",$_POST['serial_number'])));

$result = mysqli_query($connection,'SELECT * FROM InstallBase WHERE SerialNumber = "' . $_POST['serial_number'] . '"' );

if(mysqli_num_rows($result)==0 OR !empty($filename))
{


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
if($key != "ewCode"){
$arr[strip_tags($key)] = strip_tags($value);
}}


$Subject = "Registration Review";
$type = 'Question';
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
$Channel = "web";
$name = $FName . ' ' . $LName;


$description = 'http://internal.infocus.com/service/RegistrationReview.php


Purchase Date:' . $_POST['purchasedate'] . '

' . $name . '
' . $orgName . '
' . $email . '
' . $Phne . '
' . $address . '
' . $city . '
' . $state . '
' . $zip . '
' . $Country . '

EW Code(s): ' . implode(", ",$_POST['ewCode']);


$group = 22386119;
$formnum = 42349;


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
'tags' => "regreview",
'requester_id' => $uid,
'via' =>  array("channel"=> $Channel),
'custom_fields' => 	array( array("id"=> 23473115, "value"=> $orgName), 
					array("id"=> 23278985, "value"=> $serial), 
					array("id"=> 23415649, "value"=> $productin), ))));
}
else{
$create = json_encode(array('ticket' => array(
'type' => $type, 
'subject' => $Subject, 
'status' => 'new', 
'group_id' => $group, 
'comment' => array( "value"=> $description,"uploads" => array($ftoken)), 
'requester' => array('name' => $FName . ' ' . $LName, 'email' => $email),
"tags" => "regreview",
"uploads" => array($ftoken),
'via' =>  array("channel"=> $Channel),
'custom_fields' => 	array( array("id"=> 23473115, "value"=> $orgName), 
					array("id"=> 23278985, "value"=> $serial), 
					array("id"=> 23415649, "value"=> $productin), ))));
}

$return = curlWrap("/tickets.json", $create); 




$date = new DateTime();
$timestamp = $date->format('Y-m-d');

$sql='INSERT INTO IB_Pending SET  

ModifiedDate = STR_TO_DATE("' . $timestamp . '","%Y-%m-%d"),
`First Name` = "' . mysqli_real_escape_string($connection,$_POST['first_name']) . '",
`Last Name` = "' . mysqli_real_escape_string($connection,$_POST['last_name']) . '",
`Organization` = "' . mysqli_real_escape_string($connection,$_POST['organization']) . '",';

if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_array($result))
{
$sql .= '
`Model` = "'. $row['Model'] . '",
`INVENTDIM` = "'. $row['INVENTDIM'] . '",
`MASTERID` = "'. $row['MASTERID'] . '",
`FromDate` = "'. $row['FromDate'] . '",
`ToDate` = "'. $row['ToDate'] . '",
`SalesID` = "'. $row['SalesID'] . '",
`Name` = "'. $row['Name'] . '",
`Country` = "'. $row['Country'] . '",
`Status` = "'. $row['Status'] . '",
';

}}

$sql .= '`Phone` = "' . mysqli_real_escape_string($connection,$_POST['phone_number']) . '",
`Email` = "' . mysqli_real_escape_string($connection,$_POST['e_mail']) . '",
`Address` = "' . mysqli_real_escape_string($connection,$_POST['address']) . '",
`City` = "' . mysqli_real_escape_string($connection,$_POST['city']) . '",
`State` = "' . mysqli_real_escape_string($connection,$_POST['state']) . '",
`Zip` = "' . mysqli_real_escape_string($connection,$_POST['zip_postal_code']) . '",
`RegCountry` = "' . mysqli_real_escape_string($connection,$_POST['primary_address_country']) . '",
`Secondary Name` = "' . mysqli_real_escape_string($connection,$_POST['second_name']) . '",
`Secondary Email` = "' . mysqli_real_escape_string($connection,$_POST['second_email']) . '",
`Warranty Keys` = "' . mysqli_real_escape_string($connection,implode(",",$_POST['ewCode'])) . '",
SerialNumber = "' . mysqli_real_escape_string($connection,strtoupper($_POST['serial_number'])) . '"';

$result = mysqli_query($connection, $sql);




if($_POST['regdl'] == "TRUE"){
echo "<script src='http://code.jquery.com/jquery-1.9.1.js'></script><br>Request submitted<br><br><a href='/resources/forms/register.php?first_name=" . urlencode($_POST['first_name']) . "&last_name=" . urlencode($_POST['last_name']) . "&phone_number=" . urlencode($_POST['phone_number']) . "&organization=" . urlencode($_POST['organization']) . "&e_mail=" . urlencode($_POST['e_mail']) . "&address=" . urlencode($_POST['address']) . "&city=" . urlencode($_POST['city']) . "&state=" . urlencode($_POST['state']) . "&zip_postal_code=" . urlencode($_POST['zip_postal_code']) . "' onclick='parent.$.colorbox.resize({innerWidth:" . '"80%"' . "});'>Register Another?</a><script>$(function(){
    parent.$.colorbox.resize({
        innerWidth:'200px',
        innerHeight:'100px'
    });
	window.location = '/resources/php/pushdownload.php?filename=" . urlencode($_POST['filename']) . "';
});</script>";
die();
}
else{
echo "<script src='http://code.jquery.com/jquery-1.9.1.js'></script><br>Request submitted<br><br><a href='/resources/forms/register.php?first_name=" . urlencode($_POST['first_name']) . "&last_name=" . urlencode($_POST['last_name']) . "&phone_number=" . urlencode($_POST['phone_number']) . "&organization=" . urlencode($_POST['organization']) . "&e_mail=" . urlencode($_POST['e_mail']) . "&address=" . urlencode($_POST['address']) . "&city=" . urlencode($_POST['city']) . "&state=" . urlencode($_POST['state']) . "&zip_postal_code=" . urlencode($_POST['zip_postal_code']) . "' onclick='parent.$.colorbox.resize({innerWidth:" . '"80%"' . "});'>Register Another?</a><script>$(function(){
    parent.$.colorbox.resize({
        innerWidth:'200px',
        innerHeight:'100px'
    });
});</script>";
die();
}
}

while($row = mysqli_fetch_array($result))
{
$date = new DateTime();
$timestamp = $date->format('Y-m-d');
$sql='UPDATE InstallBase SET  

ModifiedDate = STR_TO_DATE("' . $timestamp . '","%Y-%m-%d"),
`First Name` = "' . mysqli_real_escape_string($connection,$_POST['first_name']) . '",
`Last Name` = "' . mysqli_real_escape_string($connection,$_POST['last_name']) . '",
`Organization` = "' . mysqli_real_escape_string($connection,$_POST['organization']) . '",
`Phone` = "' . mysqli_real_escape_string($connection,$_POST['phone_number']) . '",
`Email` = "' . mysqli_real_escape_string($connection,$_POST['e_mail']) . '",
`Address` = "' . mysqli_real_escape_string($connection,$_POST['address']) . '",
`City` = "' . mysqli_real_escape_string($connection,$_POST['city']) . '",
`State` = "' . mysqli_real_escape_string($connection,$_POST['state']) . '",
`Zip` = "' . mysqli_real_escape_string($connection,$_POST['zip_postal_code']) . '",
`Secondary Name` = "' . mysqli_real_escape_string($connection,$_POST['second_name']) . '",
`Secondary Email` = "' . mysqli_real_escape_string($connection,$_POST['second_email']) . '",
`Registered` = "TRUE",
`RegCountry` = "' . mysqli_real_escape_string($connection,$_POST['primary_address_country']) . '"
WHERE SerialNumber = "' . $_POST['serial_number'] . '"';

$result = mysqli_query($connection, $sql);

$result = mysqli_query($connection,'
SELECT LEFT(`Validation Code`,3) AS vCode, "DisplayWarranties", `Part Number` FROM DisplayWarranties GROUP BY vCode, `Part Number` 
UNION ALL SELECT LEFT(`Validation Code`,3) AS vCode, "ProjectorWarranties", `Part Number` FROM ProjectorWarranties GROUP BY vCode, `Part Number`
UNION ALL SELECT LEFT(`Validation Code`,3) AS vCode, "LampWarranties", `Part Number` FROM LampWarranties GROUP BY vCode, `Part Number`
UNION ALL SELECT LEFT(`Validation Code`,3) AS vCode, "Services", `Part Number` FROM Services GROUP BY vCode, `Part Number` ');
while($row = mysqli_fetch_array($result)){
$table[$row[0]] = $row[1];
$part[$row[0]] = $row[2];
}
$ewCodes=array();
foreach($_POST['ewCode'] as $Key){

$result = mysqli_query($connection,'SELECT Expended FROM `' . $table[substr($Key,0,3)] . '` WHERE `Validation Code` = "' . $Key . '"');
if($result != false){
if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result)){
		if($row['Expended'] != "True"){
		array_push($ewCodes,$Key);
		}}
}}}


foreach($ewCodes as $Key){
$result = mysqli_query($connection,'UPDATE `' . $table[substr($Key,0,3)] . '` SET Expended = "True", `Date Expended` = CURDATE() WHERE `Validation Code` = "' . $Key . '"');

$result = mysqli_query($connection,'INSERT INTO `Contracts` SET `Serial Number` = "' . strtoupper($_POST['serial_number']) . '", DateCreated = CURDATE(), `Key` = "' . $Key . '", `Part Number` = "' . $part[substr($Key,0,3)] . '"');

}


if($_POST['regdl'] == "TRUE"){
echo "<script src='http://code.jquery.com/jquery-1.9.1.js'></script><br>Request submitted<br><br><a href='/resources/forms/register.php?first_name=" . urlencode($_POST['first_name']) . "&last_name=" . urlencode($_POST['last_name']) . "&phone_number=" . urlencode($_POST['phone_number']) . "&organization=" . urlencode($_POST['organization']) . "&e_mail=" . urlencode($_POST['e_mail']) . "&address=" . urlencode($_POST['address']) . "&city=" . urlencode($_POST['city']) . "&state=" . urlencode($_POST['state']) . "&zip_postal_code=" . urlencode($_POST['zip_postal_code']) . "' onclick='parent.$.colorbox.resize({innerWidth:" . '"80%"' . "});'>Register Another?</a><script>$(function(){
    parent.$.colorbox.resize({
        innerWidth:'200px',
        innerHeight:'100px'
    });
	window.location = '/resources/php/pushdownload.php?filename=" . urlencode($_POST['filename']) . "';
});</script>";
die();
}
else{
echo "<script src='http://code.jquery.com/jquery-1.9.1.js'></script><br>Request submitted<br><br><a href='/resources/forms/register.php?first_name=" . urlencode($_POST['first_name']) . "&last_name=" . urlencode($_POST['last_name']) . "&phone_number=" . urlencode($_POST['phone_number']) . "&organization=" . urlencode($_POST['organization']) . "&e_mail=" . urlencode($_POST['e_mail']) . "&address=" . urlencode($_POST['address']) . "&city=" . urlencode($_POST['city']) . "&state=" . urlencode($_POST['state']) . "&zip_postal_code=" . urlencode($_POST['zip_postal_code']) . "' onclick='parent.$.colorbox.resize({innerWidth:" . '"80%"' . "});'>Register Another?</a><script>$(function(){
    parent.$.colorbox.resize({
        innerWidth:'200px',
        innerHeight:'100px'
    });
});</script>";
die();
}}


}

$connection = mysqli_connect('67.43.0.33','InFocus','InF0cusP@ssw0rd', 'InFocus',3306);
mysqli_set_charset($connection, "utf8");
ini_set('default_charset', 'utf-8');
if(substr($_SERVER['SERVER_NAME'], -2)=="de"){
$lang = "de";
}
else{
$lang = "en";
} 

$sql = "SELECT keygroup, transtext FROM (SELECT transkey as keygroup FROM InFocus.labeltranslation GROUP BY transkey) as KeyList LEFT JOIN (SELECT transkey, transtext FROM InFocus.labeltranslation where labeltranslation.lang = '" . $lang . "') as labeltrans ON keygroup = transkey;";
$results = mysqli_query($connection,$sql);

while($row = mysqli_fetch_array($results)){

if($row[1] == null){$translate[$row[0]] = $row[0];}
else{$translate[$row[0]] = $row[1];}

}

$replaceArray = array(".php",".htm",".html","/","-");
$pagename = str_replace($replaceArray,"",$_SERVER['PHP_SELF']);

				
		$sql = 'SELECT EngText.textkey, if(LangText.`text` is null,EngText.`text`,LangText.`text`) as Text FROM (SELECT * FROM InFocus.sitetext WHERE lang = "en") AS EngText LEFT JOIN (SELECT * FROM InFocus.sitetext WHERE lang = "' . $lang . '") AS LangText ON (EngText.textkey = LangText.textkey AND EngText.pagename = LangText.pagename) WHERE EngText.pagename = "' . $pagename . '"';
		$results = mysqli_query($connection,$sql);
		while($row = mysqli_fetch_array($results)){
		$pageText[$row[0]] = $row[1];
		}
?>
<!DOCTYPE html>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link type="text/css" rel="stylesheet" href="/resources/css/core.css">
<!--[if IE]>
    <link href="/resources/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
  <![endif]-->

<script>

function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[1].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
    var prodValue = "";
                newcell.innerHTML = table.rows[1].cells[i].innerHTML;
                //alert(newcell.childNodes);
               switch(newcell.childNodes[0].name) {
                    case "product[]":
                            newcell.childNodes[0].value = prodValue;
       newcell.childNodes[0].style.width = '200px';
                            break;
                    case "delete":
                            newcell.childNodes[0].checked = false;
        newcell.childNodes[0].style.width = '25px';
                           break;
                    case "qty[]":
                            newcell.childNodes[0].value = "";
        newcell.childNodes[0].style.width = '75px';
                           break;
                }
            }
        }
 
function deleteRow(tableID) {
    var tbl = document.getElementById(tableID); // table reference
    // delete last row
	if(tbl.rows.length==2){return;}

	tbl.deleteRow(tbl.rows.length-1);
}
// append row to the HTML table
function appendRow(tableID) {
    var tbl = document.getElementById(tableID), // table reference
        row = tbl.insertRow(tbl.rows.length),      // append table row
        i;
    // insert table cells to the new row
    for (i = 0; i < tbl.rows[0].cells.length; i++) {
        createCell(row.insertCell(i), i, 'row');
    }
}
 
// create DIV element and append to the table cell
function createCell(cell, text, style) {
    var div = document.createElement('div'), // create DIV element
        txt = document.createTextNode(text); // create text node
    div.appendChild(txt);                    // append text node to the DIV
    div.setAttribute('class', style);        // set DIV class attribute
    div.setAttribute('className', style);    // set DIV class attribute for IE (?!)
    cell.appendChild(div);                   // append DIV to the table cell			
			}
			
// append column to the HTML table
function appendColumn(tableID) {
    var tbl = document.getElementById(tableID), // table reference
        i;
    // open loop for each row and append cell
    for (i = 0; i < tbl.rows.length; i++) {
        createCell(tbl.rows[i].insertCell(tbl.rows[i].cells.length), i, 'col');
    }
}			

// delete table rows with index greater then 0
function deleteRows(tableID) {
    var tbl = document.getElementById(tableID), // table reference
        lastRow = tbl.rows.length - 1,             // set the last row index
        i;
    // delete rows with index greater then 0
    for (i = lastRow; i > 0; i--) {
        tbl.deleteRow(i);
    }
}

 
// delete table columns with index greater then 0
function deleteColumns(tableID) {
    var tbl = document.getElementById(tableID), // table reference
        lastCol = tbl.rows[0].cells.length - 1,    // set the last column index
        i, j;
    // delete cells with index greater then 0 (for each row)
    for (i = 0; i < tbl.rows.length; i++) {
        for (j = lastCol; j > 0; j--) {
            tbl.rows[i].deleteCell(j);
        }
    }
}
function deleteColumn(tableID) {
    var tbl = document.getElementById(tableID); // table reference
    // delete last column)
    for (i = 0; i < tbl.rows.length; i++) {
            tbl.rows[i].deleteCell(tbl.rows[0].cells.length - 1);
    }
}

if(self==top){
var sPath=window.location.pathname;
var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
if(sPage.lastIndexOf('.')>0){sPage = sPage.substring(0,sPage.lastIndexOf('.'));}

window.location = "/support/#register";
}

var wKeys;
var index;
var passed;

function validate(wKeys){

document.getElementById('submit').disabled=false;

// var required = document.getElementById('reqfields').value;
// required = required.split(",");



// for (index = 0; index < required.length; ++index) {
    // if(document.getElementById(required[index]).value == ""){
		// alert("Please fill out all required fields");
		// return false;
		// }
// }





wKeys = $(".ewCode");
for (index = 0; index < wKeys.length; ++index) {

	
if(wKeys[index].value.length>0){
	jQuery.post("validatekey.php",
	{key: wKeys[index].value
	},
	function(response){
	
	response = jQuery.parseJSON(response);
	if(response.type != null){
	   if(response.type.trim()=="True"){
		document.getElementById('submit').disabled=true;
	   alert("Key: " + response.key + "\n<?php echo $pageText['KeyUsed'];?>");
		return;
	   }
	   if(response.type.trim()=="Not Valid"){
		document.getElementById('submit').disabled=true;
	   alert("Key: " + response.key + "\n<?php echo $pageText['KeyInvalid'];?>");
		return;
	   }
}

	});
}}


}

function resetFrame(){

parent.$.colorbox.resize({
        innerHeight:$('body').height()+2
    });
console.log("test");
}

function isRegistered(serialN){

	jQuery.post("/resources/php/registrationvalidate.php",
	{serialNumber: serialN
	},
	function(response){
	
	if(response != "NotRegistered" && "<?php echo $_GET['regdl']; ?>" == "TRUE"){
	
	document.getElementById('predownload').innerHTML = "Great! You are already registered. Here is your download.";
	window.location = '/resources/php/pushdownload.php?filename=<?php echo $_GET['filename']; ?>';
	}
	else if("<?php echo $_GET['regdl']; ?>" == "TRUE"){
	$('#predownload').slideUp(0);
	$('#invoicetable').slideUp(0);
	$('#mpheaders').slideDown(0);
	$('#register').slideDown(0);
	setTimeout(resetFrame, 1);
	 document.getElementById('serial_number').value = document.getElementById('serial_numberpre').value;
	}
	else if(response != "NotRegistered" ){
	
	var Fields;
	Fields = response.split("^");
	
	if (prompt("We see this product is already registered.  Please enter the city it was registered in to validate ownership") == Fields[7]){
	 document.getElementById('product').value = Fields[0];
	 document.getElementById('first_name').value = Fields[1];
	 document.getElementById('last_name').value = Fields[2];
	 document.getElementById('organization').value = Fields[3];
	 document.getElementById('phone_number').value = Fields[4];
	 document.getElementById('email').value = Fields[5];
	 document.getElementById('address').innerHTML = Fields[6];
	 document.getElementById('city').value = Fields[7];
	 document.getElementById('state').value = Fields[8];
	 document.getElementById('zip_postal_code').value = Fields[9];
	 document.getElementById('primary_address_country').value = Fields[10];
	 document.getElementById('second_name').value = Fields[11];
	 document.getElementById('second_email').value = Fields[12];
	 
	 document.getElementById('notification').innerHTML = "We see this product is already registered.  Please verify your information.";
	    parent.$.colorbox.resize({
        innerHeight:$('body').height()+2
    });
	}
	else{
	document.getElementById('submit').disabled = true;
	alert("The information entered did not match what we have on file.  To change ownership of a product please call InFocus Support");
	}
	}

	});
	
}

function checkSN(Serial){
  if(Serial.search(/[^A-Z^0-9^a-z]/)>0){
 document.getElementById('serial_number').value = Serial.replace(/[^A-Z^0-9^a-z]/g,'');
 alert("Only letters and numbers are valid in serial numbers. \nYou may only submit one serial at a time.");
  }

  if(Serial.length>19){
  alert("Serial numbers are generally 12-15 characters with a maximum under 19.\nYou may only submit one serial at a time.");
  document.getElementById('serial_number').value = Serial.substr(0,19);
 }
  }

</script>
<style>
  form {
	background: #f7f7f7;
	padding: 20px;
	box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.2), inset 0px 0px 0px 0px rgba(255, 255, 255, 1);
	border: 0px;
}
#dataTable tr{
background-color:transparent;
}
</style>
 </HEAD>
<body style="max-width:1200px;background: #f7f7f7;">


<div id="predownload" style="<?php if($_GET['regdl']!="TRUE"){echo "display:none;";} ?>">
<?php echo $pageText['First'];?><br>
 <input maxlength="128" name="serial_numberpre" id="serial_numberpre" size="60" type="text" onchange="isRegistered(this.value);" required>
	<br><button><?php echo $translate['Check'];?></button>
 </div>

<section id="mpheaders" style="display:none;">
<?php echo $pageText['registerMP'];?>
</section>

<section  id="headers" style="margin-left:40px;<?php if($_GET['regdl']=="TRUE"){echo "display:none;";} ?>">
<h3 ><?php echo $translate['Product Registration'];?></h3>
<strong><?php echo $pageText['Processing'];?></strong><br>
<?php echo $pageText['StartDate'];?></p>
</section>
<form action="" style="<?php if($_GET['regdl']=="TRUE"){echo "display:none;";} ?>" id="register" onsubmit="return submit_form()" accept-charset="UTF-8" method="post" enctype="multipart/form-data">

<table id="invoicetable" style="margin-bottom:20px;">
<tbody><tr class="odd">
<td align="Left" width="50"></td>
<td style="text-align:Left"><?php echo $pageText['POP'];?>:</td>
<td rowspan="5" style="vertical-align:middle"><label class="top" for="invoice"><?php echo $translate['Invoice'];?>: </label>
 <input name="file" id="invoice" size="60" type="file"></td>
</tr>
<tr>
<td></td>
<td><?php echo $pageText['Price'];?></td>
</tr>
<tr class="odd">
<td></td>
<td><?php echo $translate['Date'];?></td>
</tr>
<tr>
<td></td>
<td><?php echo $pageText['Vendor'];?></td>
</tr>
<tr class="odd">
<td></td>
<td><?php echo $pageText['SerialNumber'];?></td>
</tr>
</tbody></table>


 <span id="notification"></span>
 <ul class="wrap">
 <li>

</li>
<li>
 <label class="top" for="serial_number"><?php echo $translate['Serial Number'];?>: <span class="form-required" title="This field is required.">*</span></label>
 <input maxlength="128" name="serial_number" id="serial_number" size="60" type="text" onkeyup="checkSN(this.value);" onchange="isRegistered(this.value);" required>
</li>
<li>
 <label class="top" for="first_name"><?php echo $translate['First Name'];?>: <span class="form-required" title="This field is required.">*</span></label>
 <input maxlength="128" name="first_name" id="first_name" size="60" type="text" value="<?php echo $_GET['first_name']; ?>" required>
</li>
<li>
 <label class="top" for="last_name"><?php echo $translate['Last Name'];?>: <span class="form-required" title="This field is required.">*</span></label>
 <input maxlength="128" name="last_name" id="last_name" size="60" type="text" value="<?php echo $_GET['last_name']; ?>" required>
</li>
<li>
 <label class="top" for="organization"><?php echo $translate['Organization Name'];?>: <span class="form-required" title="This field is required.">*</span></label>
 <input maxlength="128" name="organization" id="organization" size="60" type="text" value="<?php echo $_GET['organization']; ?>" required>
</li>
<li>
 <label class="top" for="phone_number"><?php echo $translate['Phone'];?>: </label>
 <input maxlength="128" name="phone_number" id="phone_number" size="60" type="text" value="<?php echo $_GET['phone_number']; ?>" >
</li>
<li>
 <label class="top" for="e_mail"><?php echo $translate['Email Address'];?>: <span class="form-required" title="This field is required.">*</span></label>
 <input type="email" id="email" name="e_mail" size="60" type="e_mail" value="<?php echo $_GET['e_mail']; ?>" required>
</li>
<li>
 <label class="top" for="first_name"><?php echo $translate['Secondary Contact Name'];?>: </label>
 <input maxlength="128" name="second_name" id="second_name" size="60" type="text" value="<?php echo $_GET['first_name']; ?>" >
</li>
<li>
 <label class="top" for="e_mail"><?php echo $translate['Secondary Contact Email'];?>: </label>
 <input type="email" id="second_email" name="second_email" size="60" value="<?php echo $_GET['e_mail']; ?>" >
</li>
<li>
 <label class="top" for="product"><?php echo $translate['Product'];?>: </label>
 <input maxlength="128" name="product" id="product" size="60" value="" class="form-text" type="text" required>
</li>

<li>

 <label class="top" for="address"><?php echo $translate['Address'];?>: <span class="form-required" title="This field is required.">*</span></label>
 <textarea type="text" cols="30" rows="5" name="address" id="address" required><?php echo $_GET['address']; ?></textarea>
</li>
<li>

 <label class="top" for="city"><?php echo $translate['City'];?>: <span class="form-required" title="This field is required.">*</span></label>
 <input maxlength="128" name="city" id="city" size="60" type="text" value="<?php echo $_GET['city']; ?>" required>
</li>
<li>

 <label class="top" for="state"><?php echo $translate['State/Province'];?>: <span class="form-required" title="This field is required.">*</span></label>
 <input maxlength="128" name="state" id="state" size="60" type="text" value="<?php echo $_GET['state']; ?>" required>
</li>
<li>

 <label class="top" for="zip_postal_code"><?php echo $translate['Zip/Postalcode'];?>: <span class="form-required" title="This field is required.">*</span></label>
 <input maxlength="128" name="zip_postal_code" id="zip_postal_code" size="60" type="text" value="<?php echo $_GET['zip_postal_code']; ?>" required>
</li>
<li>

 <label class="top" for="primary_address_country"><?php echo $translate['Country'];?>: <span class="form-required" title="This field is required.">*</span></label>
 <select type="text" name="primary_address_country" id="primary_address_country" required><option value="AD">AD</option><option value="AE">AE</option><option value="AF">AF</option><option value="AG">AG</option><option value="AI">AI</option><option value="AL">AL</option><option value="AM">AM</option><option value="AO">AO</option><option value="AQ">AQ</option><option value="AR">AR</option><option value="AS">AS</option><option value="AT">AT</option><option value="AU">AU</option><option value="AW">AW</option><option value="AX">AX</option><option value="AZ">AZ</option><option value="BA">BA</option><option value="BB">BB</option><option value="BD">BD</option><option value="BE">BE</option><option value="BF">BF</option><option value="BG">BG</option><option value="BH">BH</option><option value="BI">BI</option><option value="BJ">BJ</option><option value="BL">BL</option><option value="BM">BM</option><option value="BN">BN</option><option value="BO">BO</option><option value="BQ">BQ</option><option value="BR">BR</option><option value="BS">BS</option><option value="BT">BT</option><option value="BV">BV</option><option value="BW">BW</option><option value="BY">BY</option><option value="BZ">BZ</option><option value="CA">CA</option><option value="CC">CC</option><option value="CD">CD</option><option value="CF">CF</option><option value="CG">CG</option><option value="CH">CH</option><option value="CI">CI</option><option value="CK">CK</option><option value="CL">CL</option><option value="CM">CM</option><option value="CN">CN</option><option value="CO">CO</option><option value="CR">CR</option><option value="CU">CU</option><option value="CV">CV</option><option value="CW">CW</option><option value="CX">CX</option><option value="CY">CY</option><option value="CZ">CZ</option><option value="DE">DE</option><option value="DJ">DJ</option><option value="DK">DK</option><option value="DM">DM</option><option value="DO">DO</option><option value="DZ">DZ</option><option value="EC">EC</option><option value="EE">EE</option><option value="EG">EG</option><option value="EH">EH</option><option value="ER">ER</option><option value="ES">ES</option><option value="ET">ET</option><option value="FI">FI</option><option value="FJ">FJ</option><option value="FK">FK</option><option value="FM">FM</option><option value="FO">FO</option><option value="FR">FR</option><option value="GA">GA</option><option value="GB">GB</option><option value="GD">GD</option><option value="GE">GE</option><option value="GF">GF</option><option value="GG">GG</option><option value="GH">GH</option><option value="GI">GI</option><option value="GL">GL</option><option value="GM">GM</option><option value="GN">GN</option><option value="GP">GP</option><option value="GQ">GQ</option><option value="GR">GR</option><option value="GS">GS</option><option value="GT">GT</option><option value="GU">GU</option><option value="GW">GW</option><option value="GY">GY</option><option value="HK">HK</option><option value="HM">HM</option><option value="HN">HN</option><option value="HR">HR</option><option value="HT">HT</option><option value="HU">HU</option><option value="ID">ID</option><option value="IE">IE</option><option value="IL">IL</option><option value="IM">IM</option><option value="IN">IN</option><option value="IO">IO</option><option value="IQ">IQ</option><option value="IR">IR</option><option value="IS">IS</option><option value="IT">IT</option><option value="JE">JE</option><option value="JM">JM</option><option value="JO">JO</option><option value="JP">JP</option><option value="KE">KE</option><option value="KG">KG</option><option value="KH">KH</option><option value="KI">KI</option><option value="KM">KM</option><option value="KN">KN</option><option value="KP">KP</option><option value="KR">KR</option><option value="KW">KW</option><option value="KY">KY</option><option value="KZ">KZ</option><option value="LA">LA</option><option value="LB">LB</option><option value="LC">LC</option><option value="LI">LI</option><option value="LK">LK</option><option value="LR">LR</option><option value="LS">LS</option><option value="LT">LT</option><option value="LU">LU</option><option value="LV">LV</option><option value="LY">LY</option><option value="MA">MA</option><option value="MC">MC</option><option value="MD">MD</option><option value="ME">ME</option><option value="MF">MF</option><option value="MG">MG</option><option value="MH">MH</option><option value="MK">MK</option><option value="ML">ML</option><option value="MM">MM</option><option value="MN">MN</option><option value="MO">MO</option><option value="MP">MP</option><option value="MQ">MQ</option><option value="MR">MR</option><option value="MS">MS</option><option value="MT">MT</option><option value="MU">MU</option><option value="MV">MV</option><option value="MW">MW</option><option value="MX">MX</option><option value="MY">MY</option><option value="MZ">MZ</option><option value="NA">NA</option><option value="NC">NC</option><option value="NE">NE</option><option value="NF">NF</option><option value="NG">NG</option><option value="NI">NI</option><option value="NL">NL</option><option value="NO">NO</option><option value="NP">NP</option><option value="NR">NR</option><option value="NU">NU</option><option value="NZ">NZ</option><option value="OM">OM</option><option value="PA">PA</option><option value="PE">PE</option><option value="PF">PF</option><option value="PG">PG</option><option value="PH">PH</option><option value="PK">PK</option><option value="PL">PL</option><option value="PM">PM</option><option value="PN">PN</option><option value="PR">PR</option><option value="PS">PS</option><option value="PT">PT</option><option value="PW">PW</option><option value="PY">PY</option><option value="QA">QA</option><option value="RE">RE</option><option value="RO">RO</option><option value="RS">RS</option><option value="RU">RU</option><option value="RW">RW</option><option value="SA">SA</option><option value="SB">SB</option><option value="SC">SC</option><option value="SD">SD</option><option value="SE">SE</option><option value="SG">SG</option><option value="SH">SH</option><option value="SI">SI</option><option value="SJ">SJ</option><option value="SK">SK</option><option value="SL">SL</option><option value="SM">SM</option><option value="SN">SN</option><option value="SO">SO</option><option value="SR">SR</option><option value="SS">SS</option><option value="ST">ST</option><option value="SV">SV</option><option value="SX">SX</option><option value="SY">SY</option><option value="SZ">SZ</option><option value="TC">TC</option><option value="TD">TD</option><option value="TF">TF</option><option value="TG">TG</option><option value="TH">TH</option><option value="TJ">TJ</option><option value="TK">TK</option><option value="TL">TL</option><option value="TM">TM</option><option value="TN">TN</option><option value="TO">TO</option><option value="TR">TR</option><option value="TT">TT</option><option value="TV">TV</option><option value="TW">TW</option><option value="TZ">TZ</option><option value="UA">UA</option><option value="UG">UG</option><option value="UM">UM</option><option value="US" selected="selected">US</option><option value="UY">UY</option><option value="UZ">UZ</option><option value="VA">VA</option><option value="VC">VC</option><option value="VE">VE</option><option value="VG">VG</option><option value="VI">VI</option><option value="VN">VN</option><option value="VU">VU</option><option value="WF">WF</option><option value="WS">WS</option><option value="YE">YE</option><option value="YT">YT</option><option value="ZA">ZA</option><option value="ZM">ZM</option><option value="ZW">ZW</option></select>
</li>
<li>
     <TABLE class="rounded-corner" id="dataTable">
   <TR><TH width="225px"><label class="top" for="ewCode"><?php echo $translate['Warranty Extension'];?><br><?php echo $translate['Or Service Code(s)'];?> </label></TH></TR>
       <TR style="">
            <TD><INPUT type="text" name="ewCode[]" class="ewCode" onkeyup="document.getElementById('submit').disabled=true;" onchange="	   if(this.value.substr(0,3)=='MPT'){this.value='';alert('The key you entered is for a Training session and cannot be registered on this form. Please go to http://www.infocus.com/mptraining');}else{validate();}"/><br>
			</TD>
        </TR>
   </TABLE>
   

<div style="">
<INPUT type="button" id="btn" class="formbutton" style="" value="+" onclick="addRow('dataTable')"  />    
<INPUT type="button" style="" value="-" id="deletebtn" class="formbutton" onclick="deleteRow('dataTable');validate();" />

 
 
 </li></ul>

<input  id="submit" value="Submit" type="Submit" onclick="">
<br><span class="form-required" style="font-size:70%">* <?php echo $translate['Denotes a Required field'];?>.</span>
<p><?php echo $pageText['PrivacyReview'];?></p>
 <input name="reqfields" id="reqfields" type="hidden" value="first_name,last_name">
 <input name="regdl" id="regdl" type="hidden" value="<?php echo $_GET['regdl']; ?>">
 <input name="filename" id="filename" type="hidden" value="<?php echo $_GET['filename']; ?>">


</form>


<script>


$(document).ready(function() { 
    parent.$.colorbox.resize({
        innerWidth:$('body').width(),
        innerHeight:$('body').height()+2
    });
	
});

</script>

</html>
</body>
