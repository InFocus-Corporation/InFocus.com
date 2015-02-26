


<?php




$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

function getOS() { 

    global $user_agent;

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}

function getBrowser() {

    global $user_agent;

    $browser        =   "Unknown Browser";

    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );

    foreach ($browser_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }

    }

    return $browser;

}


$user_os        =   getOS();
$user_browser   =   getBrowser();




if(!empty($_POST['browser'])){

$connection = mysqli_connect('67.43.0.33','InFocus','InF0cusP@ssw0rd', 'InFocus',3306);


$result = mysqli_query($connection,'INSERT INTO websiteproblems SET 
firstname = "' . mysqli_real_escape_string($connection,$_POST['firstname']) . '",
lastname = "' . mysqli_real_escape_string($connection,$_POST['lastname']) . '",
email = "' . mysqli_real_escape_string($connection,$_POST['email']) . '",
browser = "' . mysqli_real_escape_string($connection,$_POST['browser']) . '",
operatingsystem = "' . mysqli_real_escape_string($connection,$_POST['operatingsystem']) . '",
pages = "' . mysqli_real_escape_string($connection,$_POST['pages']) . '",
issue = "' . mysqli_real_escape_string($connection,$_POST['issue']) . '",
description = "' . mysqli_real_escape_string($connection,$_POST['description']) . '"'
);

Echo "Thank you for taking the time to let us know.  We will get on that issue immediately.";
die();

}
?>



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

document.getElementById("webprob").submit();

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

<form action="" id="webprob" method="POST" enctype="multipart/form-data">

<h3 >Report Website Issue</h3><span >Please fill out the below fields. Name and email are optional. </span><br>
<input type="hidden" id="reqfields" value="issue,pages,description">

	  <ul class="wrap">
	  <li>

<label class="top" for="firstname" >First Name: </label>
<input id="firstname" type="text" name="firstname" />
</li>
<li>
<label class="top" for="lastname" >Last Name: </label>
<input id="lastname" type="text" name="lastname" onchange="validateHuman('1');" />
</li>
<li>
<label class="top" for="email" >Email Address: </label>
<input id="email" type="text" name="email" onchange="validateEmailAdd('1');" />
</li>
<li>
<label class="top" for="browser" >Browser: </label>
<input id="browser" type="text" name="browser" value="<?php echo $user_browser; ?>" readonly />
</li>
<li>
<label class="top" for="operatingsystem" >Operating System: </label>
<input id="operatingsystem" type="text" name="operatingsystem" value="<?php echo $user_os; ?>" readonly />
</li>
<li>
<label class="top" for="issue" >Issue: <span class="required" style="color: #ff0000;">*</span></label>
<select type="text" name="issue" id="issue">
	<option value="" selected="selected">- Select -</option>
	<option value="content">Inaccurate Spec, Grammar, or Spelling</option>
	<option value="bug">Website Bug or Performance Issue</option>
</select>
</li>
<li>
<label class="top" for="pages" >On Page(s): <span class="required" style="color: #ff0000;">*</span></label>
<input id="pages" type="text" name="pages" />
</li>
<li>
<label class="top" for="description">Description: <span class="required" style="color: #ff0000;">*</span></label>
<textarea id="description" type="text" name="description" rows="10"> </textarea>
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