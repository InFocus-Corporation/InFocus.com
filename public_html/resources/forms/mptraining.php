<?php
if(!empty($_POST['key']))
{
$s1train = str_replace("mps1t1","Mondopad 2.0 Overview (2hrs)",$_POST['s1trainings']);
$s1train = str_replace("mps1t2","Mondopad 2.0 for Admins (2hrs)",$s1train);
$s1train = str_replace("mps1t3","Upgrading to 2.0 (1hr)",$s1train);
$s1train = str_replace("mps1t4","Mondopad 1.8 Overview (2hrs)",$s1train);
$s1train = str_replace("mps1t5","Mondopad 1.8 for Admins (2hrs)",$s1train);
$s1train = str_replace("mps1t6","InFocus Video Conferencing (1hr)",$s1train);
//$s1train = str_replace("mps1t7","Mondopad Interactive Whiteboard (30 minutes)",$s1train);
//$s1train = str_replace("mps1t8","Working with 3rd party Applications (30 minutes)",$s1train);



$descript = "

>>>InFocus as your Video Conferencing Provider?:
";
$descript .= $_POST["service"];


$descript .=  "

>>>Products & Service?:
";
foreach($_POST["optchk"] as $value){
$descript .= $value . "
";
}

$descript .= "

>>>version of software?:
";
$descript .= $_POST["opt1"];






	if(empty($_POST['org'])){$_POST['org']= $_POST['firstname'] . " " . $_POST['lastname'];}


		
		
switch($_POST['reqtime1']){
	case 8:
$startTime = $_POST['reqdate1'] . " 9:00:00";        
$endTime = $_POST['reqdate1'] . " 11:00:00";         
	break;
	case 10:
$startTime = $_POST['reqdate1'] . " 11:00:00";        
$endTime = $_POST['reqdate1'] . " 13:00:00";         
	break;
	case 12:
$startTime = $_POST['reqdate1'] . " 13:00:00";        
$endTime = $_POST['reqdate1'] . " 15:00:00";         
	break;
	case 2:
$startTime = $_POST['reqdate1'] . " 15:00:00";        
$endTime = $_POST['reqdate1'] . " 17:00:00";         
	break;
}	

$from_name = $_POST['firstname'] . " " . $_POST['lastname'];        
$from_address = $_POST['email'];        
$to_name = "MPTraining";        
$to_address = "MPTraining@infocus.com";        
$subject = "Mondopad Training Registration: " . $_POST['org'];        
		
$description = "Session 1
Organization: " . $_POST['org'] . "
Email: " . $_POST['email'] . "
Phone: " . $_POST['phone'] . "
Name: " . $_POST['firstname'] . " " . $_POST['lastname'] . "

Customer Notes:" . $_POST['note1'] . "


" . $s1train . $descript;

$description = str_replace("
","<br>",$description);

sendIcalEvent($to_name, $to_address, $to_name, $to_address, $startTime, $endTime, $subject, $description, $location);

  //send email

	
if(!empty($_POST['reqdate2'])){

$s2train = str_replace("mps2t1","Mondopad 2.0 Overview (2hrs)",$_POST['s1trainings']);
$s2train = str_replace("mps2t2","Mondopad 2.0 for Admins (2hrs)",$s2train);
$s2train = str_replace("mps2t3","Upgrading to 2.0 (1hr)",$s2train);
$s2train = str_replace("mps2t4","Mondopad 1.8 Overview (2hrs)",$s2train);
$s2train = str_replace("mps2t5","Mondopad 1.8 for Admins (2hrs)",$s2train);
$s2train = str_replace("mps2t6","InFocus Video Conferencing (1hr)",$s2train);
//$s2train = str_replace("mps2t7","Mondopad Interactive Whiteboard (30 minutes)",$s2train);
//$s2train = str_replace("mps2t8","Working with 3rd party Applications (30 minutes)",$s2train);




	if(empty($_POST['org'])){$_POST['org']= $_POST['firstname'] . " " . $_POST['lastname'];}



		
switch($_POST['reqtime2']){
	case 8:
$startTime = $_POST['reqdate2'] . " 9:00:00";        
$endTime = $_POST['reqdate2'] . " 11:00:00";         
	break;
	case 10:
$startTime = $_POST['reqdate2'] . " 11:00:00";        
$endTime = $_POST['reqdate2'] . " 13:00:00";         
	break;
	case 12:
$startTime = $_POST['reqdate2'] . " 13:00:00";        
$endTime = $_POST['reqdate2'] . " 15:00:00";         
	break;
	case 2:
$startTime = $_POST['reqdate2'] . " 15:00:00";        
$endTime = $_POST['reqdate2'] . " 17:00:00";         
	break;
}	

$from_name = $_POST['firstname'] . " " . $_POST['lastname'];        
$from_address = $_POST['email'];        
$to_name = "MPTraining";        
$to_address = "MPTraining@infocus.com";        
$subject = "Mondopad Training Registration: " . $_POST['org'];        
		
$description = "Session 1
Organization: " . $_POST['org'] . "
Email: " . $_POST['email'] . "
Phone: " . $_POST['phone'] . "
Name: " . $_POST['firstname'] . " " . $_POST['lastname'] . "

Customer Notes:" . $_POST['note2'] . "


" . $s1train . $descript;

$description = str_replace("
","<br>",$description);


sendIcalEvent($to_name, $to_address, $to_name, $to_address, $startTime, $endTime, $subject, $description, $location);

  //send email

}

$thankyou = $_POST['thankyou'];
if(empty($_POST['thankyou'])){
$thankyou = "Thank you for your submission
<script>$(function(){
    parent.$.colorbox.resize({
        innerWidth:'300px',
        innerHeight:'40px'
    });
});</script>";}


echo "<script src='http://code.jquery.com/jquery-1.9.1.js'></script>
 $thankyou";
 die();
}


function sendEmail($emailTo, $emailSubject, $emailBody, SugarBean $relatedBean = null)
{
    $emailObj = new Email();
    $defaults = $emailObj->getSystemDefaultEmail();
    $mail = new SugarPHPMailer();
    $mail->setMailerForSystem();
    $mail->From = $defaults['email'];
    $mail->FromName = $defaults['name'];
    $mail->ClearAllRecipients();
    $mail->ClearReplyTos();
    $mail->Subject=from_html($emailSubject);
    $mail->Body=from_html($emailBody);
    $mail->prepForOutbound();
    $mail->AddAddress($emailTo);

    //now create email
    if (@$mail->Send()) {
        $emailObj->to_addrs= '';
        $emailObj->type= 'archived';
        $emailObj->deleted = '0';
        $emailObj->name = $mail->Subject ;
        $emailObj->description = $mail->Body;
        $emailObj->description_html = null;
        $emailObj->from_addr = $mail->From;
        if ( $relatedBean instanceOf SugarBean && !empty($relatedBean->id) ) {
            $emailObj->parent_type = $relatedBean->module_dir;
            $emailObj->parent_id = $relatedBean->id;
        }
        $emailObj->date_sent = TimeDate::getInstance()->nowDb();
        $emailObj->modified_user_id = '1';
        $emailObj->created_by = '1';
        $emailObj->status = 'sent';
        $emailObj->save();
    }
}




function sendIcalEvent($from_name, $from_address, $to_name, $to_address, $startTime, $endTime, $subject, $description, $location)
{
    $domain = 'exchangecore.com';

    //Create Email Headers
    $mime_boundary = "----Meeting Booking----".MD5(TIME());

    $headers = "From: ".$from_name." <".$from_address.">\n";
    $headers .= "Reply-To: ".$from_name." <".$from_address.">\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
    $headers .= "Content-class: urn:content-classes:calendarmessage\n";
    
    //Create Email Body (HTML)
    $message = "--$mime_boundary\r\n";
    $message .= "Content-Type: text/html; charset=UTF-8\n";
    $message .= "Content-Transfer-Encoding: 8bit\n\n";
    $message .= "<html>\n";
    $message .= "<body>\n";
    $message .= '<p>Dear '.$to_name.',</p>';
    $message .= '<p>'.$description.'</p>';
    $message .= "</body>\n";
    $message .= "</html>\n";
    $message .= "--$mime_boundary\r\n";

    $ical = 'BEGIN:VCALENDAR' . "\r\n" .
    'PRODID:-//Microsoft Corporation//Outlook 10.0 MIMEDIR//EN' . "\r\n" .
    'VERSION:2.0' . "\r\n" .
    'METHOD:REQUEST' . "\r\n" .
    'BEGIN:VTIMEZONE' . "\r\n" .
    'TZID:Eastern Time' . "\r\n" .
    'BEGIN:STANDARD' . "\r\n" .
    'DTSTART:20091101T020000' . "\r\n" .
    'RRULE:FREQ=YEARLY;INTERVAL=1;BYDAY=1SU;BYMONTH=11' . "\r\n" .
    'TZOFFSETFROM:-0400' . "\r\n" .
    'TZOFFSETTO:-0500' . "\r\n" .
    'TZNAME:EST' . "\r\n" .
    'END:STANDARD' . "\r\n" .
    'BEGIN:DAYLIGHT' . "\r\n" .
    'DTSTART:20090301T020000' . "\r\n" .
    'RRULE:FREQ=YEARLY;INTERVAL=1;BYDAY=2SU;BYMONTH=3' . "\r\n" .
    'TZOFFSETFROM:-0500' . "\r\n" .
    'TZOFFSETTO:-0400' . "\r\n" .
    'TZNAME:EDST' . "\r\n" .
    'END:DAYLIGHT' . "\r\n" .
    'END:VTIMEZONE' . "\r\n" .	
    'BEGIN:VEVENT' . "\r\n" .
    'ORGANIZER;CN="'.$from_name.'":MAILTO:'.$from_address. "\r\n" .
    'ATTENDEE;CN="'.$to_name.'";ROLE=REQ-PARTICIPANT;RSVP=TRUE:MAILTO:'.$to_address. "\r\n" .
    'LAST-MODIFIED:' . date("Ymd\TGis") . "\r\n" .
    'UID:'.date("Ymd\TGis", strtotime($startTime)).rand()."@".$domain."\r\n" .
    'DTSTAMP:'.date("Ymd\TGis"). "\r\n" .
    'DTSTART;TZID="Eastern Time":'.date("Ymd\THis", strtotime($startTime)). "\r\n" .
    'DTEND;TZID="Eastern Time":'.date("Ymd\THis", strtotime($endTime)). "\r\n" .
    'TRANSP:OPAQUE'. "\r\n" .
    'SEQUENCE:1'. "\r\n" .
    'SUMMARY:' . $subject . "\r\n" .
    'LOCATION:' . $location . "\r\n" .
    'CLASS:PUBLIC'. "\r\n" .
    'PRIORITY:5'. "\r\n" .
    'BEGIN:VALARM' . "\r\n" .
    'TRIGGER:-PT15M' . "\r\n" .
    'ACTION:DISPLAY' . "\r\n" .
    'DESCRIPTION:Reminder' . "\r\n" .
    'END:VALARM' . "\r\n" .
    'END:VEVENT'. "\r\n" .
    'END:VCALENDAR'. "\r\n";
    $message .= 'Content-Type: text/calendar;name="meeting.ics";method=REQUEST\n';
    $message .= "Content-Transfer-Encoding: 8bit\n\n";
    $message .= $ical;

    $mailsent = mail($to_address, $subject, $message, $headers);

    return ($mailsent)?(true):(false);
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
<!--Pages function-->
		function collapseElement(obj)
		{
			var el = document.getElementById(obj);
			$("#"+obj).slideUp(1000);
			//el.style.display = 'none';
		}
		function expandElement(obj)
		{
			var el = document.getElementById(obj);
			$("#"+obj).slideDown(1000)
			//el.style.display = '';
		}
		function collapsePages()
		{
			var numFormPages = 5;
			for(i=2; i <= numFormPages; i++)
			{
				currPageId = ('page_' + i);
				collapseElement(currPageId);
			}
		}
		
		
		
if(self==top){
var sPath=window.location.pathname;
var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
if(sPage.lastIndexOf('.')>0){sPage = sPage.substring(0,sPage.lastIndexOf('.'));}

window.location = "/#mptraining";
}
var traintotal1=0;
var traintotal2=0;
var traintable;

function calculateTime1(){

var inputs = trainingsubmit["session1[]"];
var trainings = document.getElementById('s1trainings');
var total = 0;
trainings.value="";
for (var i = 0; i < inputs.length; i++) {
    if(inputs[i].checked){
	total += parseFloat(inputs[i].value);
	trainings.value = trainings.value + inputs[i].id + '\n';
	}
}


total = 2 - total;
document.getElementById('s1').innerHTML = "Training Session<br> (" + total + " Hours Remaining)";

if(total<=0){
for (var i = 0; i < inputs.length; i++) {
    if(!inputs[i].checked){
	inputs[i].disabled=true;
	}
}
}
else{
for (var i = 0; i < inputs.length; i++) {
	inputs[i].disabled=false;
}
}
traintotal1=total;
}

function calculateTime2(){

var inputs = trainingsubmit["session2[]"];
var trainings = document.getElementById('s2trainings');
var total = 0;
trainings.value="";
for (var i = 0; i < inputs.length; i++) {
    if(inputs[i].checked){
	total += parseFloat(inputs[i].value);
	trainings.value = trainings.value + inputs[i].id + '\n';
	}
}

total = 2 - total;
document.getElementById('s2').innerHTML = "Training Session 2<br> (" + total + " Hours Remaining)";

if(total<=0){
for (var i = 0; i < inputs.length; i++) {
    if(!inputs[i].checked){
	inputs[i].disabled=true;
	}
}
}
else{
for (var i = 0; i < inputs.length; i++) {
	inputs[i].disabled=false;
}
}
traintotal2=total;
}

function submitForm(){


	jQuery.post("consumekey.php",
	{key: document.getElementById('key').value,
	note: document.getElementById('firstname').value + ' ' + document.getElementById('lastname').value + ' ' + document.getElementById('org').value + ' ' + document.getElementById('email').value,
	table: "Services"
	}, 
	function(response){ document.trainingsubmit.submit(); });



	

}

var keyhrs="";

function preValidate(){

	jQuery.post("validatekey.php",
	{key: document.getElementById('key').value,
	table: traintable
	},
	function(response){
	response = JSON.parse(response);
	console.log(response);
	   if(response['type'].trim()=="True"){
	   alert("This key has already been used.  If you feel this is in error please contact the support department at 877-388-8360");
		keyhrs="";
		return;
	   }
	   else if(response['type'].trim()=="Not Valid"){
	   alert("The key you entered is not valid.  If you feel this is in error please contact the support department at 877-388-8360");
		keyhrs="";
		return;
	   }
		else if(document.getElementById('key').value.substring(0,4) == "MPT2"){
		keyhrs = 2;
		}
		else if(document.getElementById('key').value.substring(0,4) == "MPT4"){
		keyhrs = 4;
		}

	});
	

}

$(document).ready(function(){
$( "#reqdate1" ).datepicker({ dateFormat: "yy-mm-dd" });
$( "#reqdate2" ).datepicker({ dateFormat: "yy-mm-dd" });
});

<?php
    if(isset($_POST['key']))
{
$serial = $_POST['key'];
$connection = mysqli_connect('67.43.0.33','partners_admin','InF0cusPassw0rd', 'partners_external',3306);
}
?>                

function p1val(){
if(document.getElementById('firstname').value == ''){return true;}
if(document.getElementById('lastname').value == ''){return true;}
if(document.getElementById('phone').value == ''){return true;}
if(document.getElementById('email').value == ''){return true;}
if(document.getElementById('org').value == ''){return true;}
if(document.getElementById('state').value == ''){return true;}
return false;
}
</script>
<style>

  form {
	background: #f7f7f7;
	padding: 20px;
	box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.2), inset 0px 0px 0px 0px rgba(255, 255, 255, 1);
	border: 0px solid #B2B2B2;
}
form ul{
  list-style-type:none;
}
form #session1 li ,form #session2 li {
margin-bottom:25px;
}
.meter { 
	width:235px;
	height: 20px;
	position: relative;
	background: #555;
	border:solid 2px #000;
}
.meter > span {
	padding-left: 5px;
	display: block;
	height: 100%;
	background-color: rgb(43,194,83);
	position: relative;
	overflow: hidden;
}
span{line-height: 1.6em;}
#page_2,#page_3,#page_4,#page_5{display:none;}

#page_1 li{display:inline-block}
</style>
 </HEAD>
<body style="width:800px;background: #f7f7f7;" onLoad="collapsePages()">

<form name="trainingsubmit" id="trainingsubmit" action=""  method="post" >
<!--Page one-->
<ul id="page_1">
<h2 style="text-align: left;">Register your Mondopad Training Session</h2>
<span>Welcome to our online training registration form. In order to complete your training registration you will need to have your registration key ready. This key is printed on your training registration card. If you purchased training online, this card should have been mailed to you. If you purhcased through a reseller, your reseller should have handed this to you. If you do not have your training registration card please contact your reseller or <a href="mailto:MPTraining@infocus.com">MPTraining@infocus.com</a>.</span>    <section  style="display:inline-block">
      
<div>

 <label class="top" for="key">Product Key</label>
<input type="text" name="key" id="key" onchange="preValidate();" style="" required/>

</div>

<li>
  <label class="top" for="firstname">First Name</label>
 <input type="text" name="firstname" id="firstname" style="" required/>
</li>
<li>
        <label class="top" for="lastname">Last Name</label>
 <input type="text" name="lastname" id="lastname" style="" required/>
 </li>
<li>
        <label class="top" for="phone">Phone</label>
<input type="text" name="phone" id="phone" style="width:150px" required/>
 </li>
<li>
        <label class="top" for="email">Email</label>
<input type="email" name="email" id="email" style="" required/>
 </li>
<li>
        <label class="top" for="org">Organization</label>
<input type="text" name="org" id="org" style="" required/>
 </li>
<li>
        <label class="top" for="state">Time Zone</label>
<select type="text" name="state" id="state" style="">
<option value=''>Select Time Zone</option>
<option value='GMT'>GMT</option>
<option value='ECT'>ECT - GMT+1:00</option>
<option value='EET'>EET - GMT+2:00</option>
<option value='ART'>ART - GMT+2:00</option>
<option value='EAT'>EAT - GMT+3:00</option>
<option value='MET'>MET - GMT+3:30</option>
<option value='NET'>NET - GMT+4:00</option>
<option value='PLT'>PLT - GMT+5:00</option>
<option value='IST'>IST - GMT+5:30</option>
<option value='BST'>BST - GMT+6:00</option>
<option value='VST'>VST - GMT+7:00</option>
<option value='CTT'>CTT - GMT+8:00</option>
<option value='JST'>JST - GMT+9:00</option>
<option value='ACT'>ACT - GMT+9:30</option>
<option value='AET'>AET - GMT+10:00</option>
<option value='SST'>SST - GMT+11:00</option>
<option value='NST'>NST - GMT+12:00</option>
<option value='MIT'>MIT - GMT-11:00</option>
<option value='HST'>HST - GMT-10:00</option>
<option value='AST'>AST - GMT-9:00</option>
<option value='PST'>PST - GMT-8:00</option>
<option value='PNT'>PNT - GMT-7:00</option>
<option value='MST'>MST - GMT-7:00</option>
<option value='CST'>CST - GMT-6:00</option>
<option value='EST'>EST - GMT-5:00</option>
<option value='IET'>IET - GMT-5:00</option>
<option value='PRT'>PRT - GMT-4:00</option>
<option value='CNT'>CNT - GMT-3:30</option>
<option value='AGT'>AGT - GMT-3:00</option>
<option value='BET'>BET - GMT-3:00</option>
<option value='CAT'>CAT - GMT-1:00</option>
</select>
</li>
<br><br>
<button class="mainForm" onclick="console.log(keyhrs);if(keyhrs==''){alert('Valid Key is required to continue');}else if(p1val()){alert('All Fields are required');}else{collapseElement('page_1'); expandElement('page_2');if(keyhrs=='2'){$('#4hrs').hide();}}" type="button">Continue</button> <!--This hides the first page and shows the second page-->
 <br><br>
    <div class="meter"><span style="width: 20%"></span></div>
	</ul>

<ul id="page_2">
<li>
 </li>
</section>
 
 <section id="additionalqs"  style="display:inline-block">
<li>
<textarea id="s1trainings" name="s1trainings" style="display:none"></textarea>
<textarea id="s2trainings" name="s2trainings" style="display:none"></textarea>

<h2>Pre-Training Survey</h2>
Please answer the following information to ensure your training fulfills your organization’s specific training needs.
<br><br>

<h5>Which InFocus Products Have You Purchased? <small>(Check all that apply)</small><br>
<input id="opt2" name="optchk[]" class="css-checkbox" type="checkbox" value="Mondopad57"/>
<label for="opt2" class="css-label">57 inch Mondopad</label>
</li>
<li>
<input id="opt3" name="optchk[]" class="css-checkbox" type="checkbox" value="Mondopad70"/>
<label for="opt3" class="css-label">70 inch Mondopad</label>
</li>
<li>
<input id="opt4" name="optchk[]" class="css-checkbox" type="checkbox" value="Mondopad80"/>
<label for="opt4" class="css-label">80 inch Mondopad</label>
</li>
<li>
<input id="opt5" name="optchk[]" class="css-checkbox" type="checkbox" value="JTouch"/>
<label for="opt5" class="css-label">InFocus JTouch (any size)</label>
</li>
<li>
<input id="opt6" name="optchk[]" class="css-checkbox" type="checkbox" value="BigTouch"/>
<label for="opt6" class="css-label">InFocus BigTouch (any size)</label>
</li>
<li>
<input id="opt7" name="optchk[]" class="css-checkbox" type="checkbox" value="Videophone"/>
<label for="opt7" class="css-label">InFocus Videophone</label>
</li>
<li>
<input id="opt8" name="optchk[]" class="css-checkbox" type="checkbox" value="BigConnect"/>
<label for="opt8" class="css-label">BigConnect Desktop application</label>
</li>
<li>
<input id="opt9" name="optchk[]" class="css-checkbox" type="checkbox" value="Tablets"/>
<label for="opt9" class="css-label">InFocus Tablet</label>
</li>

<br>

<li>
<h5>If you have purchased a Mondopad, which version of software are you currently using? </h5>
<label for="rad1"><input type="radio" name="opt1" value="Mondopad 1.8 or lower" id="rad1">Mondopad 1.8 or lower</label>
<label for="rad2"><input type="radio" name="opt1" value="Mondopad 2.0 or higher" id="rad2">Mondopad 2.0 or higher</label>

</li>
<li>
<br>
<h5>Are you using InFocus as your Video Conferencing Provider?</h5>
Please note: Mondopad, BigConnect, and the InFocus Videophone come with 1 year free of our 121 Basic service.<br>
<label for="rad5"><input type="radio" name="service" value="Yes" id="rad5">Yes</label>
<label for="rad6"><input type="radio" name="service" value="No" id="rad6">No</label>
</li>
<li>
<br>

<h5>If yes, please select the services you are using <small>(Check all that apply)</small></h5>
<input id="opt10" name="optchk[]" class="css-checkbox" type="checkbox" value="121 Basic"/>
<label for="opt10" class="css-label">121 Basic</label>
</li>
<li>
<input id="opt11" name="optchk[]" class="css-checkbox" type="checkbox" value="121 Premium"/>
<label for="opt11" class="css-label">121 Premium</label>
</li>
<li>
<input id="opt12" name="optchk[]" class="css-checkbox" type="checkbox" value="ConX Video Meeting Room"/>
<label for="opt12" class="css-label">ConX Video Meeting Room</label>
</li>





<button class="mainForm" onclick="collapseElement('page_2'); expandElement('page_1');" type="button">Back</button> <!--This hides the second page and shows the first page-->
<button class="mainForm" onclick="collapseElement('page_2'); expandElement('page_3');" type="button">Continue</button> <!--This hides the second page and shows the third page-->
 <br><br>
    <div class="meter"><span style="width: 40%"></span></div>
	</ul>

<!--Page three-->
<ul id="page_3">

<section id="session1" style="display:inline-block;">
<li>
<h5 id="s1">Session 1</h5>
<span>Training is sold in 2hr and 4hr blocks of time. We offer a variety of trainings you may select from to fill the hours you have purchased. You may have mulitple locations join one training session at a time or have each location with their own private training session. Once you have selected you training courses, you will be prompted to to request a date and time for your training session(s). 

Please select from the list below. To view a complete description of each course please visit <a href="www.infocus.com/training-services">www.infocus.com/training-services</a>. 
</span>
 </li>
 
 <li>
<input id="mps1t1" name="session1[]" class="css-checkbox" type="checkbox" value="2" onchange="calculateTime1();"/>
<label for="mps1t1" class="css-label">Mondopad 2.0 Overview (2hrs)</label>
<div style="margin-left:20px;font-size:80%;"></div>
</li>
<li>
<input id="mps1t2" name="session1[]" class="css-checkbox" type="checkbox" value="2" onchange="calculateTime1();"/>
<label for="mps1t2" class="css-label">Mondopad 2.0 for Admins (2hrs)</label>
<div style="margin-left:20px;font-size:80%;">
</div>
</li>
<li>
<input id="mps1t3" name="session1[]" class="css-checkbox" type="checkbox" value="1" onchange="calculateTime1();"/>
<label for="mps1t3" class="css-label">Upgrading to 2.0 (1hr)</label>
<div style="margin-left:20px;font-size:80%;">
</div>
</li>
<li>
<input id="mps1t4" name="session1[]" class="css-checkbox" type="checkbox" value="2" onchange="calculateTime1();"/>
<label for="mps1t4" class="css-label">Mondopad 1.8 Overview (2hrs)</label>
<div style="margin-left:20px;font-size:80%;">
</div>
</li>
<li>
<input id="mps1t5" name="session1[]" class="css-checkbox" type="checkbox" value="2" onchange="calculateTime1();"/>
<label for="mps1t5" class="css-label">Mondopad 1.8 for Admins (2hrs)</label>
<div style="margin-left:20px;font-size:80%;">
</div>
</li>
<li>
<input id="mps1t6" name="session1[]" class="css-checkbox" type="checkbox" value="1" onchange="calculateTime1();"/>
<label for="mps1t6" class="css-label">InFocus Video Conferencing (1hr)</label>
<div style="margin-left:20px;font-size:80%;">
</div>
</li>
</section>

<button class="mainForm" onclick="collapseElement('page_3'); expandElement('page_2');" type="button">Back</button> <!--This hides the second page and shows the first page-->
<button class="mainForm" onclick="if(traintotal1!=0){alert('Training time remaining must equal 0.');}else{if(keyhrs=='2'){collapseElement('page_3'); expandElement('page_5');}else{collapseElement('page_3'); expandElement('page_4');document.getElementById('s1h').innerHTML='1st Session';}}" type="button">Continue</button> <!--This hides the second page and shows the third page-->
 <br><br>
   <div class="meter"><span style="width: 60%"></span></div>

</ul>
<!--Page four-->
<ul id="page_4">


<section id="session2" style="display:inline-block;">
<li>
<h5 id="s2">Session 2</h5>
</li>
<li>
<input id="mps2t1" name="session2[]" class="css-checkbox" type="checkbox" value="2" onchange="calculateTime2();"/>
<label for="mps2t1" class="css-label">Mondopad 2.0 Overview (2hrs)</label>
<div style="margin-left:20px;font-size:80%;">
</div>
</li>
<li>
<input id="mps2t2" name="session2[]" class="css-checkbox" type="checkbox" value="2" onchange="calculateTime2();"/>
<label for="mps2t2" class="css-label">Mondopad 2.0 for Admins (2hrs)</label>
<div style="margin-left:20px;font-size:80%;">
</div>
</li>
<li>
<input id="mps2t3" name="session2[]" class="css-checkbox" type="checkbox" value="1" onchange="calculateTime2();"/>
<label for="mps2t3" class="css-label">Upgrading to 2.0 (1hr)</label>
<div style="margin-left:20px;font-size:80%;">
</div>
</li>
<li>
<input id="mps2t4" name="session2[]" class="css-checkbox" type="checkbox" value="2" onchange="calculateTime2();"/>
<label for="mps2t4" class="css-label">Mondopad 1.8 Overview (2hrs)</label>
<div style="margin-left:20px;font-size:80%;">
</div>
</li>
<li>
<input id="mps2t5" name="session2[]" class="css-checkbox" type="checkbox" value="2" onchange="calculateTime2();"/>
<label for="mps2t5" class="css-label">Mondopad 1.8 for Admins (2hrs)</label>
<div style="margin-left:20px;font-size:80%;">
</div>
</li>
<li>
<input id="mps2t6" name="session2[]" class="css-checkbox" type="checkbox" value="1" onchange="calculateTime2();"/>
<label for="mps2t6" class="css-label">InFocus Video Conferencing (1hr)</label>
<div style="margin-left:20px;font-size:80%;">
</div>
</li>
</section>

<button class="mainForm" onclick="if(keyhrs=='2'){collapseElement('page_4'); expandElement('page_2');}else{collapseElement('page_4'); expandElement('page_3');}" type="button">Back</button> <!--This hides the second page and shows the first page-->
<button class="mainForm" onclick="if(traintotal2!=0){alert('Training time remaining must equal 0.');}else{collapseElement('page_4'); expandElement('page_5');}" type="button">Continue</button> <!--This hides the second page and shows the third page-->
 <br><br>
   <div class="meter"><span style="width: 80%"></span></div>
</ul>
<!--Page five-->
<ul id="page_5">

<h2>Schedule It!</h2>
You can click <a target="_blank" href="/TrainingSchedule">here</a> to see the current schedule.  Any time that is labeled as "free" is a 2 hours slot that can be requested.  Appointment times are not guaranteed and are approved on a first come first serve basis.  It is recommended to put a second available time in the notes.
<br><br>
<li>
<h2 id='s1h'></h2>
<label for="reqdate1">Requested Date</label>
<input type="text" name="reqdate1" id="reqdate1">
</li>
<li>
<label for="reqtime1">Starting Time:</label>
<select type="text" name="reqtime1">
<option value="8">8:00am PST</option>
<option value="10">10:00am PST</option>
<option value="12">12:00pm PST</option>
<option value="2">2:00pm PST</option>
</select>
</li>
<li>
<label for="note1">Notes</label>
<textarea type="text" name="note1" id="note1"></textarea>
</li>
<section id="4hrs">
<li>
<br>
<h2>2nd Session</h2>
*Can be adjacent to the first if timeslots allow<br>
</li>
<li>
<label for="reqdate1">Requested Date</label>
<input type="text" name="reqdate2" id="reqdate2">
</li>
<li>
<label for="reqtime1">Starting Time:</label>
<select type="text" name="reqtime2">
<option value="8">8:00am PST</option>
<option value="10">10:00am PST</option>
<option value="12">12:00pm PST</option>
<option value="2">2:00pm PST</option>
</select>
</li>
<li>
<label for="note2">Notes</label>
<textarea type="text" name="note2" id="note2"></textarea>
</li>
</section>
<span style="font-size:65%">If you need a time slot that is not listed or if you would like to break up your training into smaller chunks please detail your request in the notes and we will do our best to accommodate your request.</span><br>
<li>

<button class="mainForm" onclick="collapseElement('page_5'); expandElement('page_4');" type="button" >Back</button> <!--This hides the second page and shows the first page-->
<div style="text-align:right"><button type="button" onclick="submitForm()">Submit</button></div>
<br><span class="form-required" style="font-size:70%">* Denotes a Required field.</span>
 <br><br>
   <div class="meter"><span style="width: 98%"></span></div>
</section>

</ul>

</ul>
<input type="hidden" name="name" value="http://abu-crm.infocus.com/index.php?entryPoint=cctask"/>
<textarea type="hidden" name="thankyou" style="display:none;"><h2>Congratulations!</h2> You have successfully registered your InFocus Training Session. You will be contacted within 24hours by our training coordinator to confirm your date and time and course selection with one of our certified trainers. Our coordinator will provide you with the meeting invite and materials for your virtual training session. </textarea>
 </form>

<script>
$(function(){
    parent.$.colorbox.resize({
        innerWidth:$('body').width()+20,
        innerHeight:'90%'})
});


</script>
</BODY>
</HTML>




