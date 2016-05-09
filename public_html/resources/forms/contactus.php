<?php
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
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

<script>
if(self==top) {
	var sPath=window.location.pathname;
	var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);

	if(sPage.lastIndexOf('.')>0) {
		sPage = sPage.substring(0,sPage.lastIndexOf('.'));
	}
	window.location = "/support/#contactus";
}


$(document).ready(function () {
	$("#WebToLeadForm").submit(function (e) {
		e.preventDefault(); //prevent default form submit
	});
});


function checkSN(Serial){
	if(Serial.search(/[^A-Z^0-9^a-z]/)>0){
		document.getElementById('contactForm_serial_number').value = Serial.replace(/[^A-Z^0-9^a-z]/g,'');
		alert("<?=$pageText['SerialChar']?>. \n<?=$pageText['SerialLong']?>.");
	} else if(Serial.length>19) {
		alert("<?=$pageText['SerialShort']?>.\n<?=$pageText['SerialLong']?>.");
		document.getElementById('contactForm_serial_number').value = Serial.substr(0,19);
	}
}
function checkSNShort(Serial){
	if(Serial.length<11 && Serial.length>0 ){
		alert("<?=$pageText['SerialShort']?>.");
		document.getElementById('contactForm_serial_number').value = Serial.substr(0,19);
	}
}
var abu = "/resources/php/formtozendesk.php";
var emea = "https://infocuscrm.sugarondemand.com/rest/v10/Web/submit";
var apac = "https://infocuscrm.sugarondemand.com/rest/v10/Web/submit";

function showForm(formType,spd){
	var speed = spd!=null ? spd:500;
	var Optional = '<?=translate('Optional')?>';
	var Required = '<?=translate('Required')?>';
	if(formType == "RMA"){
		if('<?=$pageText["RMA-Alternate"]?>' != ""){window.parent.location='http://<?=$pageText['RMA-Alternate']?>';return;}
		$('.salesOnly').hide();
		requiredFields = new Array(); 
		requiredFieldGroups = new Array(); 
		validatedFields = new Array(); 
		document.getElementById('contactForm_serial_number').placeholder = Required;
		document.getElementById('contactForm_purchasedate').placeholder = Optional;
		document.getElementById('contactForm_sympOption').innerHTML = Required;
		document.getElementById('contactForm_first_name').placeholder = Required;
		document.getElementById('contactForm_last_name').placeholder = Required;
		document.getElementById('contactForm_organization').placeholder = Optional;
		document.getElementById('contactForm_phone_number').placeholder = Required;
		document.getElementById('contactForm_email').placeholder = Required;
		document.getElementById('contactForm_second_name').placeholder = Optional;
		document.getElementById('contactForm_second_email').placeholder = Optional;
		document.getElementById('contactForm_product').placeholder = Required;
		document.getElementById('contactForm_address').placeholder = Required;
		document.getElementById('contactForm_city').placeholder = Required;
		document.getElementById('contactForm_primary_address_state').placeholder = Required;
		document.getElementById('contactForm_zip_postal_code').placeholder = Required;
		document.getElementById('contactForm_notes').placeholder = Required;
		parent.$.colorbox.resize({innerHeight:$('body').height()*1.2});
		if (typeof(addRequiredField) != 'undefined') { 
			addRequiredField ('contactForm_serial_number'); 
			addRequiredField ('contactForm_symptom'); 
			addRequiredField ('contactForm_first_name'); 
			addRequiredField ('contactForm_last_name'); 
			addRequiredField ('contactForm_phone_number');
			addRequiredField ('contactForm_email');
			addRequiredField ('contactForm_product'); 
			addRequiredField ('contactForm_address');
			addRequiredField ('contactForm_city');
			addRequiredField ('contactForm_primary_address_state');
			addRequiredField ('contactForm_zip_postal_code');
			addRequiredField ('contactForm_notes');
			addRequiredField ('contactForm_Business Country');
		}
		if (typeof(addFieldToValidate) != 'undefined') {
			addFieldToValidate ('ContactForm_email', 'EMAIL');
		}
		apac = "/resources/php/formtoemail.php?eto=jill.neo@infocus.com&esub=Tech%20Request";
	} else if(formType == "Sales") {
		if('<?=$pageText['Sales-Alternate']?>' != ""){window.parent.location='http://<?=$pageText['Sales-Alternate']?>';return;}
		$('.techOnly').hide();
		requiredFields = new Array(); 
		requiredFieldGroups = new Array(); 
		validatedFields = new Array(); 
		document.getElementById('contactForm_first_name').placeholder = Required;
		document.getElementById('contactForm_last_name').placeholder = Required;
		document.getElementById('contactForm_organization').placeholder = Optional;
		document.getElementById('contactForm_phone_number').placeholder = Optional;
		document.getElementById('contactForm_email').placeholder = Required;
		document.getElementById('contactForm_product').placeholder = Optional;
		document.getElementById('contactForm_primary_address_state').placeholder = Optional;
		document.getElementById('contactForm_notes').placeholder = Required;
		if (typeof(addRequiredField) != 'undefined') { 
			addRequiredField ('contactForm_first_name'); 
			addRequiredField ('contactForm_last_name'); 
			addRequiredField ('contactForm_email');
			addRequiredField ('contactForm_notes');
			addRequiredField ('contactForm_Business Country');
		}
		if (typeof(addFieldToValidate) != 'undefined') { 
			addFieldToValidate ('contactForm_email', 'EMAIL');
		}
	} else {
		if('<?=$pageText['Support-Alternate']?>' != ""){window.parent.location='http://<?=$pageText['Support-Alternate']?>';return;}
		$('.salesOnly').hide();
		requiredFields = new Array(); 
		requiredFieldGroups = new Array(); 
		validatedFields = new Array(); 
		document.getElementById('contactForm_serial_number').placeholder = Optional;
		document.getElementById('contactForm_purchasedate').placeholder = Optional;
		document.getElementById('contactForm_sympOption').innerHTML = Optional;
		document.getElementById('contactForm_first_name').placeholder = Required;
		document.getElementById('contactForm_last_name').placeholder = Required;
		document.getElementById('contactForm_organization').placeholder = Optional;
		document.getElementById('contactForm_phone_number').placeholder = Optional;
		document.getElementById('contactForm_email').placeholder = Required;
		document.getElementById('contactForm_second_name').placeholder = Optional;
		document.getElementById('contactForm_second_email').placeholder = Optional;
		document.getElementById('contactForm_product').placeholder = Required;
		document.getElementById('contactForm_address').placeholder = Optional;
		document.getElementById('contactForm_city').placeholder = Optional;
		document.getElementById('contactForm_primary_address_state').placeholder = Optional;
		document.getElementById('contactForm_zip_postal_code').placeholder = Optional;
		document.getElementById('contactForm_notes').placeholder = Required;
		parent.$.colorbox.resize({innerHeight:$('body').height()*1.2});
		if (typeof(addRequiredField) != 'undefined') { 
			addRequiredField ('contactForm_first_name'); 
			addRequiredField ('contactForm_last_name'); 
			addRequiredField ('contactForm_email');
			addRequiredField ('contactForm_product');
			addRequiredField ('contactForm_notes');
			addRequiredField ('contactForm_Business Country');
		}
		if (typeof(addFieldToValidate) != 'undefined') { 
			addFieldToValidate ('contactForm_email', 'EMAIL');
		}
		apac = "/resources/php/formtoemail.php?eto=jill.neo@infocus.com&esub=Tech%20Request";

 	}

	$('#preForm').slideUp(speed);
	$('#ContactForm').slideDown(speed);
}
</script>
<style>
h3, h5, h6, div {
	color: #3f4a54;
}
h3 {
	text-align: center;
	text-transform: initial;
}
h6 {
	text-transform: uppercase;
	font-size: 0.7rem;
	margin-bottom: 0.8rem;
	letter-spacing: 2px;
}
h6:before {
	display: block;
	content: ' ';
	border-width: 4px 0 0;
	border-style: solid;
	border-color: #3f4a54;
	width: 40px;
	height: 0px;
	margin-bottom: 0.6rem;
}
form {
	padding: 20px;
	box-shadow: none;
	border: none;
	background: transparent;
}
.subtle {
	line-height: 1.8em;
}
p.contact-about,
p.techOnly,
p.salesOnly {
	padding: 1rem 6rem 2rem;
	text-align: center;
}
.C5 {
	float: left;
	display: block;
	width: 33.33333333% !important;
	box-sizing: border-box;
}
@media screen and (max-width: 1090px) {
	h3 {
		text-align: left;
    	padding-right: 2em;
    	padding-left: 0.5em;
	}
	h5 {
		padding-top: 1rem;
	}
	.C5 {
		width: 100% !important;
	}
	p.contact-about,
	p.techOnly,
	p.salesOnly {
		text-align: left;
		padding: 1rem 1rem 0rem;
	}
}
table.contact-table tr:nth-child(n+3) td:first-child{padding-left:40px;}
table.contact-table tr td:first-child{width:60px;}
table.contact-table td{ padding: 1px 6px;}
table.contact-table th{font-weight:bold;color:grey;text-align:left;}
table.contact-table{
	margin-bottom:20px;
}
</style>
 </HEAD>
<body style="max-width:1200px;background: #f2f2f0;" >
	<div id="clearContainer" style="padding: 15px;">
		<form>
			<input type="hidden" id="req_id" name="req_id" value="">
			<div class="Row" id="preForm">
				<h3><?=translate('Contact InFocus')?></h3>
				<p class="contact-about"><?=$pageText['LearnAbout']?></p>
				<div class="C5 Col">
					<h5><?=translate('Sales and General Inquiries')?></h5>
					<div><?=$pageText['Help']?></div>
					<p><button type="button" onclick="showForm('Sales');"><?=translate('Send Sales a Question')?></button></p>
					<div>
						<h6><?=translate('Other Resources')?></h6>
						<a class="subtle" href="/reseller-locator" target="_parent"><?=translate('Find a Reseller')?></a><br>
						<a class="subtle" href="/product-finder" target="_parent"><?=translate('Find a Product')?></a><br>
					</div>
				</div>
				<div class="C5 Col contact-support">
					<h5><?=translate('Support')?></h5>
					<p><?=$pageText['Own']?></p>
					<p><b><?=$pageText['Failure']?></b> <?=$pageText['Power']?></p>
					<p>
						<button type="button" <?php if($lang=="en"){echo'href="#USCanada-popup" class="colorbox-inline"';}else{echo 'onclick="showForm(\'RMA\');"';}?>><?=translate('Create a Service Request')?></button>
					</p>
					<p><b><?=$pageText['General']?></b> <?=$pageText['Lumens']?></p>
					<p><button type="button" onclick="showForm('TS');"><?=translate('Send Tech Support a Question')?></button> </p>
				</div>
				<div class="C5 Col">
					<h5><?=translate('Get in Touch') ?></h5>
					<p><?=translate('Or call us at 877-388-8360 (US and Canada)')?></p>
					<p><button onclick="$('#phoneHours').toggle(500);return false;"><?=translate('See Full Directory')?></button></p>
 					<div id="phoneHours" style="display:none">
						<?=$contactTables?>
					</div>
					<br>
					<div>
						<h6><?=translate('Other Resources')?></h6>
						<a class="subtle" href="/resources/forms/projectioncalculator"><?=translate('Projection Calculator')?></a><br>
						<a class="subtle" href="/support/warrantyvt.php"><?=translate('Check Status of Your Warranty')?></a><br>
						<a class="subtle" href="/support/authorized-service-centers" target="_parent"><?=translate('Find a Service Provider')?></a><br>
					</div>
				</div>
			</div>
		</form>
		<div id="ContactForm" style="display:none">
			<h3 class="techOnly"><?=translate('Contact InFocus Technical Support')?></h3>
			<p class="techOnly"><?=$pageText['TechText']?></p>
			<h3 class="salesOnly"><?=translate('Contact InFocus Sales')?></h3>
			<p class="salesOnly"><?=$pageText['SalesText']?></p><br>
			<form action="" id="contactForm" method="POST" name="ContactForm" enctype="multipart/form-data" >
				<input type="hidden" name="type" id="type" value="">
				<ul class="wrap">
<li class="techOnly">
 <label class="top" for="serial_number"><?=translate('Serial Number')?>: </label>
 <input name="serial_number" id="contactForm_serial_number" type="text" onkeyup="checkSN(this.value);" onchange="checkSNShort(this.value);" >
</li>
<li class="techOnly"><label class="top" for="purchasedate" >Purchase Date: </label>
<input id="contactForm_purchasedate" type="text" name="purchasedate" /></li>

<li class="techOnly"><label class="top" for="symptom" >Symptom: </label>
<select type="text" name="symptom" id="contactForm_symptom" >

	<option id="contactForm_sympOption" value="" type="text" selected="selected">- Select -</option>
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
 <input name="first_name" id="contactForm_first_name" type="text" value="<?=$_GET['first_name']?>" >
</li>
<li>
 <label class="top" for="last_name"><?=translate('Last Name')?>: </label>
 <input name="last_name" id="contactForm_last_name" type="text" value="<?=$_GET['last_name']?>" >
</li>
<li>
 <label class="top" for="organization"><?=translate('Organization Name')?>: </label>
 <input name="account_name" id="contactForm_organization" type="text" value="<?=$_GET['account_name']?>" >
</li>
<li>
 <label class="top" for="phone_number"><?=translate('Phone')?>: </label>
 <input name="phone_work" id="contactForm_phone_number" type="text" value="<?=$_GET['phone_work']?>" >
</li>
<li>
<li  >
<label class="top" for = "contactForm_email">
<?=translate('Email Address')?>:<span style="color: #FF0000; cursor: default" title="Required Field" id="ContactForm_email-Label">
&nbsp;&nbsp;&nbsp;</span></label>
<input type="text" id="contactForm_email" name="email1" value="<?=$_GET['email1']?>" onBlur="singleCheck ('ContactForm_email', 'EMAIL', 'ContactForm_email-Label')">
</li>
<li class="techOnly">
 <label class="top" for="second_name"><?=translate('Secondary Contact Name')?>: </label>
 <input name="second_name" id="contactForm_second_name" type="text" value="<?=$_GET['second_name']?>" >
</li>
<li class="techOnly">
 <label class="top" for="second_email"><?=translate('Secondary Contact Email')?>: </label>
 <input type="email" id="contactForm_second_email" name="second_email" value="<?=$_GET['second_email']?>" >
</li>
<li>
 <label class="top" for="product"><?=translate('Product Part #')?>: </label>
<input name="product" id="contactForm_product" value="" class="form-text" type="text" >
</li>

<li class="techOnly">
 <label class="top" for="address"><?=translate('Address')?>: </label>
 <textarea type="text" cols="30" rows="5" name="primary_address_street" id="contactForm_address" ><?=$_GET['primary_address_street']?></textarea>
</li>
<li class="techOnly">
 <label class="top" for="city"><?=translate('City')?>: </label>
 <input name="primary_address_city" id="contactForm_city" type="text" value="<?=$_GET['primary_address_city']?>" >
</li>
<li>

 <label class="top" for="Business Country"><?=translate('Country')?>: </label>
 <select type="text" name="Business Country" id="contactForm_Business Country" onchange="if(this.value == 'US' || this.value == 'CA'){$('#stateContainer').show();$('#zipContainer').show();}else{$('#stateContainer').hide();$('#zipContainer').hide();}" >
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
 <select name="primary_address_state" id="contactForm_primary_address_state" type="text" >
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
 <input name="primary_address_postalcode" id="contactForm_zip_postal_code" type="text" value="<?=$_GET['primary_address_postalcode']?>" >
</li>



<li><label class="top" for="notes"><?=translate('Notes')?>: </label>
<textarea id="contactForm_notes" type="text" name="description" rows="6" placeholder="Required"></textarea></li>

<li class="techOnly"><label class="top" for="file"><?=translate('Attach File')?>: </label>
<input id="file" type="file" name="file"></li>


</ul>

<input id="optin" name="optin" class="css-checkbox" type="checkbox" value="Yes"/>
<label for="optin" style="margin-bottom:1.5em;" class="css-label"><?=translate('Yes, I would like to receive news and special deals from InFocus.')?></label>
<p class="privacy"><?php echo $pageText['PrivacyReview'];?></p>

<div id="contactForm_ao_submit_button">
<button id="contactForm_ao_submit_input" type="button" onClick="doSubmit(document.getElementById('contactForm'),abu,emea,apac)"><?=translate('Send')?></button>
</div>

<input type="hidden" id="name" name="name">
<input type="hidden" name="ao_p"      id="ao_p"      value="0">
<input type="hidden" name="ao_bot"    id="ao_bot"	value="yes">
<input type="hidden" id="clear" name="clear" value="Someone will be contacting you shortly regarding your request.">

</form>

</div>
</div>

<div class="hidden" style="display:none">
<div id="RMAUSCan-popup">
<style type="text/css">
	dl.image_map {display:block; width="178px" height="194px" background:url(/resources/images/USCanadaMap.png); position:relative; margin:2px auto 2px auto;}
<dl class="image_map">
</dl>
</style>
 <base target="_parent" />
<div id="USCanada-popup" style="cursor: pointer;text-align:center;  margin-left:auto; margin-right:auto;overflow:hidden;">
<img id="Image-UsCanada" src="/resources/images/USCanadaMap.png" usemap="#Image-UsCanada" border="0"  alt="" />
<map id="_Image-UsCanada" name="Image-UsCanada">
<area shape="poly" coords="23,99,45,109,67,119,92,129,105,142,111,153,131,143,140,137,148,145,132,158,124,161,123,165,123,170,120,174,119,174,107,185,107,197,104,200,100,197,100,189,96,185,85,182,68,182,61,181,51,188,45,173,40,173,36,161,21,159,16,148,5,140,2,133,2,130,5,119,10,109,19,103,19,103," class="form-box" onclick="showForm('RMA');$.colorbox.close();" alt="United States" title="United States"   />
<area shape="poly" coords="28,65,33,51,56,40,60,19,23,10,4,19,5,46,17,64," class="form-box" onclick="showForm('RMA');$.colorbox.close();"  alt="United States" title="United States"   />
<area shape="poly" coords="31,60,31,54,38,48,46,41,58,37,80,20,107,3,169,1,215,4,226,28,226,47,223,62,208,75,197,92,183,95,174,64,164,51,138,46,135,64,149,84,161,100,176,113,174,119,176,137,162,145,150,148,142,135,111,151,109,139,98,130,18,99,21,77," Target="_parent" href="http://www.repairware.ca/contact-us/" alt="Canada" title="Canada"   />
</map>
<br>Outside the US/CA?<br>
<a href="http://service.infocus.info/">Europe & Middle East</a><br>
<a href="/support/authorized-service-centers">Everywhere Else</a></div>
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
