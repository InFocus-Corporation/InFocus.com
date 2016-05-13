<?php

require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");


?>

 <script>
if(self==top){
var sPath=window.location.pathname;
var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
if(sPage.lastIndexOf('.')>0){sPage = sPage.substring(0,sPage.lastIndexOf('.'));}

window.location = "/#getaquote";
}
</script>

<style>
  form {
	background: #f2f2f0;
	padding: 20px;
	box-shadow: none;
	border: none;
}
</style>
 </HEAD>
<body style="max-width:1200px;background: #f2f2f0;line-height: 1em;">


<form id="GetAQuote" method="POST" name="GetAQuote">
<span id="clearContainer">
<h2 style="text-align: center;margin-top:3rem;"><?php echo translate('Get a Quote');?></h2>
<p style="text-align: center;padding:1rem 4rem 0rem;"><?php echo $pageText['WorkWithYou'];?></p>
<p style="text-align: center;"><?php echo $pageText['TellUs'];?></p>

<ul class="wrap">
 <li>
<label class="top" for="productofinterest_c"><?php echo translate('Product');?>: <span class="required" style="color: #ff0000;">*</span></label>

<?php 

if(preg_match('/(?i)msie [8-9]/',$_SERVER['HTTP_USER_AGENT']))
{
echo '<input id="productofinterest_c" type="text" name="productofinterest_c" >
</input>';
}
else
{
echo '<select id="GetAQuote_productofinterest_c" type="text" name="productofinterest_c" >
</select>
<script>
getProductList(" productgroup = \'Display\' AND active != 0 AND active is not null AND active != 9","GetAQuote_productofinterest_c",\'<option value="Canvas">Canvas</option><option value="Canvas CRS-4K">Canvas CRS-4K</option><option value="Canvas Touch">Canvas Touch</option><option value="Fusion Catalyst">Fusion Catalyst</option><option value="PixelNet">PixelNet</option><option value="StreamCenter">StreamCenter</option><option value="VizionPlus II">VizionPlus II</option><option value="ConX Wall">ConX Wall or ConX Exec</option>\');
</script>';
}

?>

<label class="top" for="quanity_of_units_c"><?=translate('Quantity') ?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="GetAQuote_quanity_of_units_c" type="text" name="quanity_of_units_c" required/>


<label class="top" for="description"><?=translate('Notes') ?>: <span class="required" style="color: #ff0000;">*</span></label>
<textarea id="GetAQuote_description" type="text" name="description" rows="8" required/> </textarea>
  </li>
  
<li>
<label class="top" for="email1"><?=translate('Email') ?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="GetAQuote_email1" type="text" name="email1" required/>
</li>
<li>

<label class="top" for="first_name"><?=translate('First Name') ?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="GetAQuote_first_name" type="text" name="first_name" required/>
</li>
<li>
<label class="top" for="last_name"><?=translate('Last Name') ?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="GetAQuote_last_name" type="text" name="last_name" required/>
</li>
<li>
<label class="top" for="title"><?=translate('Job Title');?>: </label>
<input id="title" type="text" name="title" />
</li>
<li>
<label class="top" for="account_name"><?=translate('Organization Name');?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="account_name" type="text" name="account_name" required />
</li>
<li>
<label class="top" for="primary_address_street"><?=translate('Address');?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="primary_address_street" type="text" name="primary_address_street" required />
</li>
<li>
<label class="top" for="primary_address_city"><?=translate('City');?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="primary_address_city" type="text" name="primary_address_city" required/>
</li>
<li>
 <label class="top" for="primary_address_country"><?=translate('Country')?>: <span class="required" style="color: #ff0000;">*</span></label>
 <select type="text" name="Business Country" id="GetAQuote_Business Country" onchange="if(this.value == 'US' || this.value == 'CA'){$('#stateContainer').show();$('#zipContainer').show();}else{$('#stateContainer').hide();$('#zipContainer').hide();}" required>
 <option value="">Select a Country</option>
<?php  
 foreach($displayedCountries as $cCode){
	 echo "<option value='$cCode'>{$countryList[$cCode]} ($cCode)</option>";
 }
 
 ?>
 </select>
</li>
<li>
<li id="stateContainer" style="display:none">
 <label class="top" for="state"><?=translate('State/Province')?>: <span class="required" style="color: #ff0000;">*</span></label>
 <select name="primary_address_state" id="primary_address_state" type="text" required >
 <option value="">Select a State</option>
<?php  foreach($stateList as $sCode => $sValue){echo "<option value='$sCode'>{$sValue} ($sCode)</option>";} ?>
 </select>
</li>
<li id="zipContainer" style="display:none">
<label class="top" id="primary_address_postalcode_label" for="primary_address_postalcode"><?php echo $translate['Zip/Postalcode'];?>: </label>
<input id="primary_address_postalcode" type="text" name="primary_address_postalcode" />
</li>

<li>
<label class="top" for="phone_work"><?php echo $translate['Phone'];?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="GetAQuote_phone_work" type="text" name="phone_work" required/>
</li>
</ul>

<div style="padding-left: 10px;">
	<p class="privacy"><?php echo $pageText['PrivacyReview'];?></p>
	<div id="GetAQuote_ao_submit_button" style="padding: 0;">
		<button id="GetAQuote_ao_submit_input" type="button" onClick="console.log(requiredFields);doSubmit(document.getElementById('GetAQuote'),'/resources/php/formtoemail.php?eto=GetAQuote@infocus.com&esub=Get%20A%20Quote','https://infocuscrm.sugarondemand.com/rest/v10/Web/submit','https://infocuscrm.sugarondemand.com/rest/v10/Web/submit')"><?=translate('Send')?></button>
	</div>
	<span class="form-required" style="font-size:70%">* <?php echo $translate['Denotes a Required field'];?>.</span>
</div>

<input type="hidden" id="name" name="name">
<input type="hidden" id="clear" name="clear" value="Thank you for your interest.  Someone will be contacting you shortly.">

</span>
</form>

<script>
console.log(typeof(addRequiredField));
if (typeof(addRequiredField) != 'undefined') { 
console.log("test");
addRequiredField ('GetAQuote_email1'); 
addRequiredField ('GetAQuote_first_name'); 
addRequiredField ('GetAQuote_last_name'); 
addRequiredField ('GetAQuote_phone_work');
addRequiredField ('GetAQuote_productofinterest_c'); 
addRequiredField ('GetAQuote_Business Country');
addRequiredField ('GetAQuote_description');
}
if (typeof(addFieldToValidate) != 'undefined') { 
addFieldToValidate ('GetAQuote_email1', 'EMAIL');
}

$(document).ready(function() { 
    parent.$.colorbox.resize({
        innerWidth:$('body').width(),
        innerHeight:$('body').height()+14
    });
});
	

</script>
</BODY>
</HTML>
