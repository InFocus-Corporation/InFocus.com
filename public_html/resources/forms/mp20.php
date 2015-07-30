<?php

require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");

if(!empty($_POST['first_name'])){

extract($_POST,EXTR_SKIP);

$sql = "INSERT INTO mp20 SET 
serialnumber = '$serial_number', 
firstname = '$first_name', 
lastname = '$last_name', 
company = '$account_name', 
email = '$email1', 
country = '$primary_address_country', 
`number` = '$number', 
state = '$primary_address_state'";

mysqli_query($connection,$sql); 


$headers = "From: noreply@infocus.com\r\n";
$headers .= "Reply-To: noreply@infocus.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$to = $email1;
$subject = "Mondopad 2.0 Beta software";
$message = "Thank you for requesting Mondopad 2.0 Beta software.<br>
You can download the software by clicking the link below.<br>
<a href='https://infocus.box.com/s/ztrfe7i8kjgk02k37dnr3dc8o0c1vn4t'>Click here!</a><br>
We would love to get your feedback. Please send any issues you have or other comments about the software to support@infocus.com.<br>
If you need help with installing or using the software, contact our support team at 877-388-8360.<br>
Thank you for choosing InFocus!

";

mail($to, $subject, $message,$headers);

echo "<script src='http://code.jquery.com/jquery-1.9.1.js'></script><br>Check your email!<script>$(function(){
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

<form action="" method="POST" name="mp20Form">

<h5><?=translate('Mondopad 2.0 BETA Software V2')?></h5>
<p><?=$pageText['Fill out the fields below to receive your Mondopad 2.0 Beta software via email.
If you need help, contact our support team at 877-388-8360.']?> </p>

<div id="contactForm">
<form action=""method="POST" enctype="multipart/form-data" onsubmit="submit();">

<ul class="wrap">
<li >
 <label class="top" for="serial_number"><?=translate('Serial Number')?>: </label>
 <input name="serial_number" id="serial_number" type="text" placeholder="Optional" >
</li>
<li>
 <label class="top" for="first_name"><?=translate('First Name')?>: </label>
 <input name="first_name" id="first_name" type="text" placeholder="Required" >
</li>
<li>
 <label class="top" for="last_name"><?=translate('Last Name')?>: </label>
 <input name="last_name" id="last_name" type="text"  placeholder="Optional" >
</li>
<li>
 <label class="top" for="organization"><?=translate('Organization Name')?>: </label>
 <input name="account_name" id="organization" type="text"  placeholder="Optional" >
</li>
<li>
 <label class="top" for="email"><?=translate('Email Address')?>: </label>
 <input type="email" id="email" name="email1" type="email" placeholder="Required">
</li>
<li>
 <label class="top" for="email"><?=translate('About how many devices <br> will you be installing this on?')?> </label>
 <input name="number" type="number" placeholder="Optional">
</li>

<li>
 <label class="top" for="primary_address_country"><?=translate('Country')?>: </label>
 <select type="text" name="primary_address_country" id="primary_address_country" >
 <option value=""><?=translate('Optional')?></option>
<?php  foreach($displayedCountries as $cCode){ echo "<option value='$cCode'>{$countryList[$cCode]} ($cCode)</option>";} ?>
 </select>
</li>
<li>
 <label class="top" for="state"><?=translate('State/Province')?>: </label>
 <select name="primary_address_state" id="primary_address_state" type="text" >
 <option value="">Optional</option>
<?php  foreach($stateList as $sCode => $sValue){echo "<option value='$sCode'>{$sValue} ($sCode)</option>";} ?>
 </select>
</li>



<li><br><br><input type="submit" name="Submit" value="Submit"></li>

</ul>

</form>

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
