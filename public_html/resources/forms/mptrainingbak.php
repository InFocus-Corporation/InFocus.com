<!DOCTYPE html>

<HTML>
<HEAD>
 
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link type="text/css" rel="stylesheet" href="/resources/global/css/base.css">
<link type="text/css" rel="stylesheet" href="/resources/global/css/General.css">
<!--[if IE]>
    <link href="/resources/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
  <![endif]-->

<script>
if(self==top){
var sPath=window.location.pathname;
var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
if(sPage.lastIndexOf('.')>0){sPage = sPage.substring(0,sPage.lastIndexOf('.'));}

window.location = "/#mptraining";
}
var traintotal1=0;
var traintotal2=0;
var traintable;




function revealTraining(){

var trainsel = document.getElementById('trainingtype');
var train = document.getElementById('trainingtype').value
if(train=="1.2"){
traintotal2=0;
$("#additionalqs").slideDown(900);
$("#session1").slideDown(900);
$("#session2").slideUp(900);
document.getElementById('s1').innerHTML = "Training Session<br> (2 Hours Remaining)";
traintable="Services";

}
else if(train=="1.4"){
traintotal2=0;
$("#additionalqs").slideDown(900);
$("#session1").slideDown(900);
$("#session2").slideUp(900);
document.getElementById('s1').innerHTML = "Training Session<br> (4 Hours Remaining)";
traintable="Services";

}
else if(train="2.2"){
$("#additionalqs").slideDown(900);
$("#session1").slideDown(900);
$("#session2").slideDown(900);
document.getElementById('s1').innerHTML = "Training Session 1<br> (2 Hours Remaining)";
document.getElementById('s2').innerHTML = "Training Session 2<br> (2 Hours Remaining)";
traintable="Services";

}


}

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

var trainsel = document.getElementById('trainingtype');
var train = trainsel.options[trainsel.selectedIndex].value

if(train=="1.2"){
total = 2 - total;
document.getElementById('s1').innerHTML = "Training Session<br> (" + total + " Hours Remaining)";
}
else if(train=="1.4"){
total = 4 - total;
document.getElementById('s1').innerHTML = "Training Session<br> (" + total + " Hours Remaining)";
}
else if(train=="2.2"){
total = 2 - total;
document.getElementById('s1').innerHTML = "Training Session 1<br> (" + total + " Hours Remaining)";
}

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


if(traintotal2!=0 || traintotal1!=0){
alert("Training time remaining must equal 0.");
return;
}


	var Validate1 = document.getElementById('firstname').value;
	var Validate2 = document.getElementById('phone').value;
	var Validate3 = document.getElementById('email').value;
	var Validate4 = document.getElementById('org').value;
	var Validate5 = document.getElementById('trainingtype').value;
	var Validate6 = document.getElementById('key').value;


	if(Validate1 == "" || Validate2 == "" || Validate3 == "" || Validate4 == "" || Validate5 == "" || Validate6 == "")
  {
	alert("please fill out all fields at the top of the form");
	return false;
	}


	jQuery.post("validatekey.php",
	{key: document.getElementById('key').value,
	table: traintable
	},
	function(response){
	   if(response.trim()=="True"){
	   alert("This key has already been used.  If you feel this is in error please contact the support department at 877-388-8360");
		return;
	   }
	   if(response.trim()=="Not Valid"){
	   alert("The key you entered is not valid.  If you feel this is in error please contact the support department at 877-388-8360");
		return;
	   }

	   jQuery.post("consumekey.php",
	{key: document.getElementById('key').value,
	table: traintable
	},
	function(response){ document.trainingsubmit.submit(); });


	});
	

}

function preValidate(){

if(document.getElementById('key').value.substring(0,4) == "MPT2"){
	document.getElementById('trainingtype').value = "1.2";
	revealTraining();
	}
	else if(document.getElementById('key').value.substring(0,4) == "MPT4"){
	document.getElementById('trainingtype').value = "2.2";
	revealTraining();
	}
	else{
	alert("The key you entered is not valid.  If you feel this is in error please contact the support department at 877-388-8360");
	}
	}

<?php
    if(isset($_POST['key']))
{
$serial = $_POST['key'];

$connection = mysqli_connect('67.43.0.33','partners_admin','InF0cusPassw0rd', 'partners_external',3306);
}
?>                

</script>
<style>
.session1{
display:none;
}
.session2{
display:none;
}
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


</style>
 </HEAD>
<body style="width:400px;background: #f7f7f7;">

<form name="trainingsubmit" id="trainingsubmit" action="https://abu-crm.infocus.com/index.php?entryPoint=cctask"  method="post" >
<h2 style="text-align: left;"><!--Trans-Marker-->Register your Mondopad Training Session</h2>

<ul class="">
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

         <label class="top" for="key"><!--Trans-Marker-->Product Key</label>
<input type="text" name="key" id="key" onchange="preValidate();" style="" required/>

<select  type="text" name="trainingtype" id="trainingtype" style="width:180px;display:none" onchange="">
<option value=""></option>
<option value="1.2"><!--Trans-Marker-->One-2 Hour Session</option>
<option value="2.2"><!--Trans-Marker-->Two-2 Hour Sessions</option>
</select>
</li>
<li>


 </li>
</section>
 

<section id="session1" style="display:inline-block;margin-bottom:30px;">
<li>
<h5 id="s1"><!--Trans-Marker-->Session 1</h5>
 </li>

<li>
<input id="mps1t1" name="session1[]" class="css-checkbox" type="checkbox" value="2" onchange="calculateTime1();"/>
<label for="mps1t1" class="css-label"><!--Trans-Marker-->Mondopad Overview (2 hours) - Most Popular!!</label>
</li>
<li>

<input id="mps1t2" name="session1[]" class="css-checkbox" type="checkbox" value="0.5" onchange="calculateTime1();"/>
<label for="mps1t2" class="css-label"><!--Trans-Marker-->Your Content, Your Mondopad (30 minutes)</label>
</li>
<li style="margin-bottom:45px">

<input id="mps1t3" name="session1[]" class="css-checkbox" type="checkbox" value="0.5" onchange="calculateTime1();"/>
<label for="mps1t3" class="css-label"><!--Trans-Marker-->Successful Video conferencing presentation with Mondopad (30 minutes)</label>
</li>
<li>
<input id="mps1t4" name="session1[]" class="css-checkbox" type="checkbox" value="0.5" onchange="calculateTime1();"/>
<label for="mps1t4" class="css-label"><!--Trans-Marker-->Whiteboard Sharing (30 minutes)</label>
</li>
<li>

<input id="mps1t5" name="session1[]" class="css-checkbox" type="checkbox" value="1" onchange="calculateTime1();"/>
<label for="mps1t5" class="css-label"><!--Trans-Marker-->Administering Mondopad (60 minutes)</label>
</li>
<li>

<input id="mps1t6" name="session1[]" class="css-checkbox" type="checkbox" value="0.5" onchange="calculateTime1();"/>
<label for="mps1t6" class="css-label"><!--Trans-Marker-->Deploying Video Conferencing Correctly (30 minutes)</label>
</li>
<li>

<input id="mps1t7" name="session1[]" class="css-checkbox" type="checkbox" value="0.5" onchange="calculateTime1();"/>
<label for="mps1t7" class="css-label"><!--Trans-Marker-->Making Video Calls (30 minutes)</label>
</li>
<li>

<input id="mps1t8" name="session1[]" class="css-checkbox" type="checkbox" value="0.5" onchange="calculateTime1();"/>
<label for="mps1t8" class="css-label"><!--Trans-Marker-->Video Conferencing Etiquette (30 minutes</label>
</li>
<li>

<input id="mps1t9" name="session1[]" class="css-checkbox" type="checkbox" value="0.5" onchange="calculateTime1();"/>
<label for="mps1t9" class="css-label"><!--Trans-Marker-->Presenting 101 (30 minutes)</label>
</li>
<li>

<input id="mps1t10" name="session1[]" class="css-checkbox" type="checkbox" value="0.5" onchange="calculateTime1();"/>
<label for="mps1t10" class="css-label"><!--Trans-Marker-->Mondopad Interactive Whiteboard (30 minutes)</label>
</li>
<li>

<input id="mps1t11" name="session1[]" class="css-checkbox" type="checkbox" value="0.5" onchange="calculateTime1();"/>
<label for="mps1t11" class="css-label"><!--Trans-Marker-->Working with 3rd party Applications (30 minutes)</label>
</li>

</section>
<section id="session2" style="display:inline-block;">

<li>
<h5 id="s2"><!--Trans-Marker-->Session 2</h5>
</li>
<li>
<input id="mps2t1" name="session2[]" class="css-checkbox" type="checkbox" value="2" onchange="calculateTime2();"/>
<label for="mps2t1" class="css-label"><!--Trans-Marker-->Mondopad Overview (2 hours) - Most Popular!!</label>
</li>
<li>

<input id="mps2t2" name="session2[]" class="css-checkbox" type="checkbox" value=".5" onchange="calculateTime2();"/>
<label for="mps2t2" class="css-label"><!--Trans-Marker-->Your Content, Your Mondopad (30 minutes)</label>
</li>
<li style="margin-bottom:45px">

<input id="mps2t3" name="session2[]" class="css-checkbox" type="checkbox" value=".5" onchange="calculateTime2();"/>
<label for="mps2t3" class="css-label"><!--Trans-Marker-->Successful Video conferencing presentation with Mondopad (30 minutes)</label>
</li>
<li>
<input id="mps2t4" name="session2[]" class="css-checkbox" type="checkbox" value=".5" onchange="calculateTime2();"/>
<label for="mps2t4" class="css-label"><!--Trans-Marker-->Whiteboard Sharing (30 minutes)</label>
</li>
<li>

<input id="mps2t5" name="session2[]" class="css-checkbox" type="checkbox" value="1" onchange="calculateTime2();"/>
<label for="mps2t5" class="css-label"><!--Trans-Marker-->Administering Mondopad (60 minutes)</label>
</li>
<li>

<input id="mps2t6" name="session2[]" class="css-checkbox" type="checkbox" value=".5" onchange="calculateTime2();"/>
<label for="mps2t6" class="css-label"><!--Trans-Marker-->Deploying Video Conferencing Correctly (30 minutes)</label>
</li>
<li>

<input id="mps2t7" name="session2[]" class="css-checkbox" type="checkbox" value=".5" onchange="calculateTime2();"/>
<label for="mps2t7" class="css-label"><!--Trans-Marker-->Making Video Calls (30 minutes)</label>
</li>
<li>

<input id="mps2t8" name="session2[]" class="css-checkbox" type="checkbox" value=".5" onchange="calculateTime2();"/>
<label for="mps2t8" class="css-label"><!--Trans-Marker-->Video Conferencing Etiquette (30 minutes</label>
</li>
<li>

<input id="mps2t9" name="session2[]" class="css-checkbox" type="checkbox" value=".5" onchange="calculateTime2();"/>
<label for="mps2t9" class="css-label"><!--Trans-Marker-->Presenting 101 (30 minutes)</label>
</li>
<li>

<input id="mps2t10" name="session2[]" class="css-checkbox" type="checkbox" value=".5" onchange="calculateTime2();"/>
<label for="mps2t10" class="css-label"><!--Trans-Marker-->Mondopad Interactive Whiteboard (30 minutes)</label>
</li>
<li>

<input id="mps2t11" name="session2[]" class="css-checkbox" type="checkbox" value=".5" onchange="calculateTime2();"/>
<label for="mps2t11" class="css-label"><!--Trans-Marker-->Working with 3rd party Applications (30 minutes)</label>
</li>
</section>

<section id="additionalqs"  style="display:inline-block">
<li>
<textarea id="s1trainings" name="s1trainings" style="display:none"></textarea>
<textarea id="s2trainings" name="s2trainings" style="display:none"></textarea>

<label for="oq1" class="top"><!--Trans-Marker-->What does your typical meeting look like currently? Is it PPT? GoToMeeting?:</label>
<textarea type="text" name="oq1" rows="1" ></textarea>
</li>
<li>

<label for="oq2" class="top"><!--Trans-Marker-->What are your objectives for the training?:</label>
<textarea type="text" name="oq2"  ></textarea>
</li>
<li>

<label for="oq3" class="top"><!--Trans-Marker-->How do you use the Mondopad or how do you anticipate using it?:</label>
<textarea type="text" name="oq3"  ></textarea>
</li>
<li>

<label for="oq4" class="top"><!--Trans-Marker-->What issues will the Mondopad solve for you?:</label>
<textarea type="text" name="oq4"  ></textarea>
</li>
<li>

<label for="oq5" class="top"><!--Trans-Marker-->Do you have remote users (Field Sales, Suppliers, Customers)?:</label>
<textarea type="text" name="oq5"  ></textarea>
</li>
<li>

<label for="oq6" class="top"><!--Trans-Marker-->Where will the Mondopad be located (Conference rooms, classrooms, etc)?:</label>
<textarea type="text" name="oq6"  ></textarea>
</li>
<li>
<label for="size" class="top"><!--Trans-Marker-->How large is your organization?:</label>
<input type="radio" name="size" value="1-100">1-100<br>
<input type="radio" name="size" value="101-500">101-500<br>
<input type="radio" name="size" value="500+">500+<br>
</li>
<li>


<label for="oq7" class="top"><!--Trans-Marker-->Are you currently using a video conferencing solution? If yes, which one?:</label>
<textarea type="text" name="oq7"  ></textarea>
</li>
</ul>
<br><br><br>
<div style="text-align:right"><button type="button" onclick="submitForm()">Submit</button></div>
<br><span class="form-required" style="font-size:70%">* Denotes a Required field.</span>
</section>
 </form>

<script>
$(function(){
    parent.$.colorbox.resize({
        innerWidth:$('body').width()+20,
        innerHeight:'90%'})
});

$("#session2").hide();
$("#session1").hide();
$("#additionalqs").hide();
</script>
</BODY>
</HTML>




