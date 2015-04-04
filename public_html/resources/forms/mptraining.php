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
	   if(response['type'].trim()=="Not Valid"){
	   alert("The key you entered is not valid.  If you feel this is in error please contact the support department at 877-388-8360");
		keyhrs="";
		return;
	   }
	});
	
if(document.getElementById('key').value.substring(0,4) == "MPT2"){
	keyhrs = 2;
	}
	else if(document.getElementById('key').value.substring(0,4) == "MPT4"){
	keyhrs = 4;
	}
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
#page_2,#page_3,#page_4,#page_5{display:none;}

#page_1 li{display:inline-block}
</style>
 </HEAD>
<body style="width:800px;background: #f7f7f7;" onLoad="collapsePages()">

<form name="trainingsubmit" id="trainingsubmit" action="https://abu-crm.infocus.com/index.php?entryPoint=cctask"  method="post" >
<!--Page one-->
<ul id="page_1">
<h2 style="text-align: left;">Register your Mondopad Training Session</h2>
    <section  style="display:inline-block">
      
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
        <label class="top" for="state">State</label>
<input type="text" name="state" id="state" style=""/>
</li>
<li>

         <label class="top" for="key">Product Key</label>
<input type="text" name="key" id="key" onchange="preValidate();" style="" required/>

</li>
<br>
<button class="mainForm" onclick="if(keyhrs==''){alert('Valid Key is required to continue');}else if(p1val()){alert('All Fields are required');}else{collapseElement('page_1'); expandElement('page_2');if(keyhrs=='2'){$('#4hrs').hide();}}" type="button">Continue</button> <!--This hides the first page and shows the second page-->
 <br><br>
    <div class="meter"><span style="width: 20%"></span></div>
	</ul>

<ul id="page_2">
<li>
 </li>
</section>
 

<section id="session1" style="display:inline-block;">
<li>
<h5 id="s1">Session 1</h5>
 </li>
 
 <li>
<input id="mps1t1" name="session1[]" class="css-checkbox" type="checkbox" value="2" onchange="calculateTime1();"/>
<label for="mps1t1" class="css-label">Mondopad Overview (2hrs) - Most Popular!!</label>
<div style="margin-left:20px;font-size:80%;">This course is designed to equip Mondopad users with the knowledge and resources to confidently utilize the Mondopad by offering an introduction to the Mondopad features and capabilities and video conferencing solutions offered by InFocus Corp.</div>
</li>
<li>
<input id="mps1t2" name="session1[]" class="css-checkbox" type="checkbox" value="1" onchange="calculateTime1();"/>
<label for="mps1t2" class="css-label">Your Content, Your Mondopad (1hr)</label>
<div style="margin-left:20px;font-size:80%;">
Learn how to display content via basic connectivity like a VGA or
HDMI cable or USB stick, to upload content from your laptop or
iPhone, and to use the Mondopad application, Present2, to display
your laptop screen.</div>
</li>
<li>
<input id="mps1t3" name="session1[]" class="css-checkbox" type="checkbox" value="1" onchange="calculateTime1();"/>
<label for="mps1t3" class="css-label">(New!) InFocus Video Conferencing Overview (1hr)</label>
<div style="margin-left:20px;font-size:80%;">
This course is designed to equip attendees with a full understanding of the various video conferencing solutions offered by InFocus.</div>
</li>
<li>
<input id="mps1t4" name="session1[]" class="css-checkbox" type="checkbox" value="2" onchange="calculateTime1();"/>
<label for="mps1t4" class="css-label">Mondopad Administration (2hrs)</label>
<div style="margin-left:20px;font-size:80%;">
This course is designed to equip Mondopad Administrators with the tools to assist end users with daily use of the InFocus Mondopad</div>
</li>
<li>
<input id="mps1t5" name="session1[]" class="css-checkbox" type="checkbox" value="1" onchange="calculateTime1();"/>
<label for="mps1t5" class="css-label">Successful Video Conferencing Presentations with Mondopad (1hr)</label>
<div style="margin-left:20px;font-size:80%;">
Discover Mondopad tools that let you easily conduct a video call,
present information, and collaborate at a whole new level. Show a
presentation on your screen, deliver your message, and get
business done.</div>
</li>
<li>
<input id="mps1t6" name="session1[]" class="css-checkbox" type="checkbox" value=".5" onchange="calculateTime1();"/>
<label for="mps1t6" class="css-label">Video Conferencing Etiquette (30 minutes)</label>
<div style="margin-left:20px;font-size:80%;">
Uncover the dos and don’ts of video conferencing, then use what
you’ve learned to conduct energizing online meetings.</div>
</li>
<li>
<input id="mps1t7" name="session1[]" class="css-checkbox" type="checkbox" value=".5" onchange="calculateTime1();"/>
<label for="mps1t7" class="css-label">Mondopad Interactive Whiteboard (30 minutes)</label>
<div style="margin-left:20px;font-size:80%;">
Find out how to use Mondopad’s interactive whiteboard to
collaborate with colleagues and organize thoughts and ideas.
Familiarize yourself with pen types, colors, shapes, backgrounds,
annotations, and many other tools.</div>
</li>
<li>
<input id="mps1t8" name="session1[]" class="css-checkbox" type="checkbox" value=".5" onchange="calculateTime1();"/>
<label for="mps1t8" class="css-label">Working with 3rd party Applications (30 minutes)</label>
<div style="margin-left:20px;font-size:80%;">
Discover how to install third-party applications and integrate them into Mondopad to make it an even more flexible tool for your conference room or classroom.</div>
</li>
</section>

<button class="mainForm" onclick="collapseElement('page_2'); expandElement('page_1');" type="button">Back</button> <!--This hides the second page and shows the first page-->
<button class="mainForm" onclick="if(traintotal1!=0){alert('Training time remaining must equal 0.');}else{if(keyhrs=='2'){collapseElement('page_2'); expandElement('page_4');}else{collapseElement('page_2'); expandElement('page_3');document.getElementById('s1h').innerHTML='1st Session';}}" type="button">Continue</button> <!--This hides the second page and shows the third page-->
 <br><br>
    <div class="meter"><span style="width: 40%"></span></div>
	</ul>

<!--Page three-->
<ul id="page_3">

<section id="session2" style="display:inline-block;">
<li>
<h5 id="s2">Session 2</h5>
</li>
<li>
<input id="mps2t1" name="session2[]" class="css-checkbox" type="checkbox" value="2" onchange="calculateTime2();"/>
<label for="mps2t1" class="css-label">Mondopad Overview (2hrs) - Most Popular!!</label>
<div style="margin-left:20px;font-size:80%;">
This course is designed to equip Mondopad users with the knowledge and resources to confidently utilize the Mondopad by offering an introduction to the Mondopad features and capabilities and video conferencing solutions offered by InFocus Corp.</div>
</li>
<li>
<input id="mps2t2" name="session2[]" class="css-checkbox" type="checkbox" value="1" onchange="calculateTime2();"/>
<label for="mps2t2" class="css-label">Your Content, Your Mondopad (1hr)</label>
<div style="margin-left:20px;font-size:80%;">
Learn how to display content via basic connectivity like a VGA or
HDMI cable or USB stick, to upload content from your laptop or
iPhone, and to use the Mondopad application, Present2, to display
your laptop screen.</div>
</li>
<li>
<input id="mps2t3" name="session2[]" class="css-checkbox" type="checkbox" value="1" onchange="calculateTime2();"/>
<label for="mps2t3" class="css-label">(New!) InFocus Video Conferencing Overview (1hr)</label>
<div style="margin-left:20px;font-size:80%;">
This course is designed to equip attendees with a full understanding of the various video conferencing solutions offered by InFocus.</div>
</li>
<li>
<input id="mps2t4" name="session2[]" class="css-checkbox" type="checkbox" value="2" onchange="calculateTime2();"/>
<label for="mps2t4" class="css-label">Mondopad Administration (2hrs)</label>
<div style="margin-left:20px;font-size:80%;">
This course is designed to equip Mondopad Administrators with the tools to assist end users with daily use of the InFocus Mondopad</div>
</li>
<li>
<input id="mps2t5" name="session2[]" class="css-checkbox" type="checkbox" value="1" onchange="calculateTime2();"/>
<label for="mps2t5" class="css-label">Successful Video Conferencing Presentations with Mondopad (1hr)</label>
<div style="margin-left:20px;font-size:80%;">
Discover Mondopad tools that let you easily conduct a video call,
present information, and collaborate at a whole new level. Show a
presentation on your screen, deliver your message, and get
business done.</div>
</li>
<li>
<input id="mps2t6" name="session2[]" class="css-checkbox" type="checkbox" value=".5" onchange="calculateTime2();"/>
<label for="mps2t6" class="css-label">Video Conferencing Etiquette (30 minutes)</label>
<div style="margin-left:20px;font-size:80%;">
Uncover the dos and don’ts of video conferencing, then use what
you’ve learned to conduct energizing online meetings.</div>
</li>
<li>
<input id="mps2t7" name="session2[]" class="css-checkbox" type="checkbox" value=".5" onchange="calculateTime2();"/>
<label for="mps2t7" class="css-label">Mondopad Interactive Whiteboard (30 minutes)</label>
<div style="margin-left:20px;font-size:80%;">
Find out how to use Mondopad’s interactive whiteboard to
collaborate with colleagues and organize thoughts and ideas.
Familiarize yourself with pen types, colors, shapes, backgrounds,
annotations, and many other tools.</div>
</li>
<li>
<input id="mps2t8" name="session2[]" class="css-checkbox" type="checkbox" value=".5" onchange="calculateTime2();"/>
<label for="mps2t8" class="css-label">Working with 3rd party Applications (30 minutes)</label>
<div style="margin-left:20px;font-size:80%;">
Discover how to install third-party applications and integrate them into Mondopad to make it an even more flexible tool for your conference room or classroom.</div>
</li>
</section>

<button class="mainForm" onclick="collapseElement('page_3'); expandElement('page_2');" type="button">Back</button> <!--This hides the second page and shows the first page-->
<button class="mainForm" onclick="if(traintotal2!=0){alert('Training time remaining must equal 0.');}else{collapseElement('page_3'); expandElement('page_4');}" type="button">Continue</button> <!--This hides the second page and shows the third page-->
 <br><br>
   <div class="meter"><span style="width: 60%"></span></div>

</ul>
<!--Page four-->
<ul id="page_4">
<h2>Schedule It!</h2>
You can click <a target="_blank" href="https://outlook.office365.com/owa/calendar/42bfb8e514c640638c540de2536b89f9@infocus.com/877eeafff8a24ea7befeee46520b49e01056002142867044319/calendar.html">here</a> to see the current schedule.  Any time that is labeled as "free" is a 2 hours slot that can be requested.  Appointment times are not guaranteed and are approved on a first come first serve basis.  It is recommended to put a second available time in the notes.
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

<button class="mainForm" onclick="if(keyhrs=='2'){collapseElement('page_4'); expandElement('page_2');}else{collapseElement('page_4'); expandElement('page_3');}" type="button">Back</button> <!--This hides the second page and shows the first page-->
<button class="mainForm" onclick="collapseElement('page_4'); expandElement('page_5');" type="button">Continue</button> <!--This hides the second page and shows the third page-->
 <br><br>
   <div class="meter"><span style="width: 80%"></span></div>
</ul>
<!--Page five-->
<ul id="page_5">
<section id="additionalqs"  style="display:inline-block">
<li>
<textarea id="s1trainings" name="s1trainings" style="display:none"></textarea>
<textarea id="s2trainings" name="s2trainings" style="display:none"></textarea>

<h2>Pre-Training Survey</h2>
Please answer the following information to ensure your training fulfills your organization’s specific training needs.
<br><br>
<h5>What type of organization are you: </h5>
<label for="rad1"><input type="radio" name="opt1" value="Educational" id="rad1">Educational/Training Services</label>
<label for="rad2"><input type="radio" name="opt1" value="Sales" id="rad2">Sales/Marketing</label>
<label for="rad3"><input type="radio" name="opt1" value="Healthcare" id="rad3">Healthcare/Research</label>
<label for="rad3"><input type="radio" name="opt1" value="First Responder" id="rad4">First Responder</label>
<label for="rad3"><input type="radio" name="opt1" value="Other" id="rad4">Other.</label>

</li>
<li>
<br>
<h5>How large is your organization?:</h5>
<label for="rad5"><input type="radio" name="size" value="1-100" id="rad5">1-100</label>
<label for="rad6"><input type="radio" name="size" value="101-500" id="rad6">101-500</label>
<label for="rad7"><input type="radio" name="size" value="500+" id="rad7">500+</label>
</li>
<li>
<br>
<h5>What types of technology are you using? (Check all that apply)<br>
<input id="opt2" name="optchk[]" class="css-checkbox" type="checkbox" value="Mondopad"/>
<label for="opt2" class="css-label">InFocus Mondopad</label>
</li>
<li>
<input id="opt3" name="optchk[]" class="css-checkbox" type="checkbox" value="MVP100"/>
<label for="opt3" class="css-label">InFocus MVP100 Videophone</label>
</li>
<li>
<input id="opt4" name="optchk[]" class="css-checkbox" type="checkbox" value="121 Video Calling"/>
<label for="opt4" class="css-label">InFocus 121 Video Calling</label>
</li>
<li>
<input id="opt5" name="optchk[]" class="css-checkbox" type="checkbox" value="ConX"/>
<label for="opt5" class="css-label">InFocus ConX</label>
</li>
<li>
<input id="opt6" name="optchk[]" class="css-checkbox" type="checkbox" value="BigConnect"/>
<label for="opt6" class="css-label">InFocus BigConnect software</label>
</li>
<li>
<input id="opt7" name="optchk[]" class="css-checkbox" type="checkbox" value="BigNote"/>
<label for="opt7" class="css-label">InFocus BigNote Software</label>
</li>
<li>
<input id="opt8" name="optchk[]" class="css-checkbox" type="checkbox" value="Tablets"/>
<label for="opt8" class="css-label">InFocus Tablets</label>
</li>
<li>
<input id="opt9" name="optchk[]" class="css-checkbox" type="checkbox" value="Other"/>
<label for="opt9" class="css-label">Other Video Conferencing Platforms. (Cisco, Adobe Connect, GoToMeeting etc.)</label>
</li>
<li>
<input id="opt10" name="optchk[]" class="css-checkbox" type="checkbox" value="MS Office"/>
<label for="opt10" class="css-label">MS Office (ppt/word/excel)</label>
</li>
<li>
<input id="opt11" name="optchk[]" class="css-checkbox" type="checkbox" value="files"/>
<label for="opt11" class="css-label">Video files/Audio Files</label>

</li>
<li>

<br>
<h5>What are your objectives for the training?:</h5>
<textarea type="text" name="opt12"  ></textarea>
</li>
<li>

<br>
<h5>Do you have remote users (Field Sales, Suppliers, Customers, students etc.)?</h5>
<textarea type="text" name="opt13"  ></textarea>
</li>
<li>

<br>
<h5>Is there anything else you’d like your trainer to know prior to your training? Any special requests?</h5>
<textarea type="text" name="opt14"  ></textarea>
</li>

<button class="mainForm" onclick="collapseElement('page_5'); expandElement('page_4');" type="button" >Back</button> <!--This hides the second page and shows the first page-->
<div style="text-align:right"><button type="button" onclick="submitForm()">Submit</button></div>
<br><span class="form-required" style="font-size:70%">* Denotes a Required field.</span>
 <br><br>
   <div class="meter"><span style="width: 98%"></span></div>
</section>

</ul>

</ul>
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




