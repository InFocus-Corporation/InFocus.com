<?php

require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
		
?>

 <script>
if(self==top){
var sPath=window.location.pathname;
var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
if(sPage.lastIndexOf('.')>0){sPage = sPage.substring(0,sPage.lastIndexOf('.'));}

window.location = "/#mpdemo";
}
</script>
<style>
  form {
	padding: 20px;
	box-shadow: none;
	border: 0px;
}
p.page-text {
	text-align:center;
	padding-left:5rem;
	padding-right:5rem;
}
p.page-text br {
	display: none;
}
p.page-text a {
	margin-left: 6px;
}
</style>
 </HEAD>
<body style="max-width:1200px;background: #f7f7f7;">

<div id="MPpopup-popup">
<!-- ======================================================================================= -->


<form id="form_0002" method="POST" enctype="multipart/form-data" action="" >
<section id="clearContainer">
		<input type="hidden" name="ao_a"      value="16218">
		<input type="hidden" name="ao_f"      value="0002">
		<input type="hidden" name="ao_d"      value="0002:d-0001">
		<input type="hidden" name="ao_jstzo"  id="ao_jstzo"  value="">
		<input type="hidden" name="ao_refurl" id="ao_refurl" value="">
		<input type="hidden" name="ao_cuid"   value="">
		<input type="hidden" name="ao_srcid"  value="">
		<input type="hidden" name="ao_nc"	  value="">
		<input type="hidden" name="ao_pf"	  value="0">
		<input type="hidden" name="ao_p"      id="ao_p"      value="0">
		<input type="hidden" name="ao_bot"    id="ao_bot"	value="yes">
        <input type="hidden" name="ao_iframe" id="ao_iframe" value="">
		<input type="hidden" name="ao_camp"   value="">
		<input type="hidden" name="ao_campid"  value="">		
		<!-- -------------------------------------------------------------------------------------------- -->

<h2 style="text-align: center;text-transform:capitalize;"><?php echo $pageText['MPAction'];?></h2>
<p class="page-text"><?php echo $pageText['ManyWays'];?><br>
<?php echo $pageText['LiveDemo'];?>
</p>
<p style="text-align: center;font-size: 12px;"><?php echo $pageText['FillOut'];?></p>
<ul class="wrap">
<li  >
<label class="top" for = "form_0002_fld_1_2">
Email Address:<span style="color: #FF0000; cursor: default" title="Required Field" id="form_0002_fld_1_2-Label"></span></label>
<input type="text" id="form_0002_fld_1_2" name="E-mail Address" value="" onBlur="singleCheck ('form_0002_fld_1_2', 'EMAIL', 'form_0002_fld_1_2-Label')">
</li>
<li>

<label class="top" for="First Name"><?=translate('First Name');?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="form_0002_fld_1_fn" type="text" name="First Name" />
</li>
<li>
<label class="top" for="Last Name"><?=translate('Last Name');?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="form_0002_fld_1_ln" type="text" name="Last Name"  onchange="validateHuman();"/>
</li>
<li>
<label class="top" for="Job Title"><?=translate('Job Title');?>: </label>
<input id="form_0002_fld_2_1" type="text" name="Job Title" />
</li>
<li>
<label class="top" for="Company"><?=translate('Organization Name');?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="form_0002_fld_2_2" type="text" name="Company" />
</li>
<li>
<label class="top" for="Business Street"><?=translate('Address');?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="form_0002_fld_3_Street" type="text" name="Business Street" />
</li>
<li>
<label class="top" for="Business City"><?=translate('City');?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="form_0002_fld_3_City" type="text" name="Business City" />
</li>
<li>
<label class="top" for="Business Country"><?=translate('Country');?>: <span class="required" style="color: #ff0000;">*</span></label>
<Select id="form_0002_fld_3_Country" type="text" name="Business Country" onchange="if(this.value == 'US' || this.value == 'CA'){$('#stateContainer').show();$('#zipContainer').show();}else{$('#stateContainer').hide();$('#zipContainer').hide();}" onclick="event.cancelBubble = true;">
	<option value="" selected="selected"><?=translate('Select Country');?></option> 
<?php  
 foreach($displayedCountries as $cCode){
	 echo "<option value='$cCode'>{$countryList[$cCode]} ($cCode)</option>";
 }
 
 ?>
</select>
</li>

<li id="stateContainer" style="display:none">
<label class="top" id="Business State_label" for="Business State">State/Province: </label>
<Select id="form_0002_fld_3_State" type="text" name="Business State">
	<option value=""  selected="selected">Select a State</option>';
<?php
 foreach($stateList as $sCode => $sValue){
	 echo "<option value='$sCode'>{$sValue} ($sCode)</option>";
 }
?>
</select>
</li>
<li id="zipContainer" class="techOnly" style="display:none">
<label class="top" id="Business Postal Code_label" for="Business Postal Code"><?=translate('Zip/Postalcode');?>: </label>
<input id="Business Postal Code" type="text" name="Business Postal Code" />
</li>

<li>
<label class="top" for="Business Phone"><?=translate('Phone');?>: <span id="form_0002_fld_4-Label" class="required" style="color: #ff0000;">*&nbsp;&nbsp;&nbsp;</span></label>
<input type="text" id="form_0002_fld_4" name="Business Phone" onBlur="singleCheck ('form_0002_fld_4', 'ANYPHONE', 'form_0002_fld_4-Label')">
</li>
<li>
<label class="top" for="Description"><strong><?php echo $pageText['Additional'];?></strong> - <?php echo $pageText['TellUs'];?></label>
<textarea id="Description" type="text" name="Description" rows="8" /> </textarea>
</li>
</ul>
<div style="padding-left: 10px">
	<p class="privacy"><?php echo $pageText['PrivacyReview'];?></p>
	<div id="form_0002_ao_submit_button" style="padding:0;">
<button id="form_0002_ao_submit_input" type="button" onClick="doSubmit(document.getElementById('form_0002'),'/resources/forms/formtoemail.php','https://infocuscrm.sugarondemand.com/rest/v10/Web/submit','https://infocuscrm.sugarondemand.com/rest/v10/Web/submit')"><?=translate('Send')?></button>
</div>

<br><span class="form-required" style="font-size:70%">* <?=translate('Denotes a Required field');?>.</span>

<input type="hidden" id="name" name="name">
<input type="hidden" id="clear" name="clear" value="Thank you for your interest.  Someone will be contacting you shortly to schedule your demo.">
</section>

<script type="text/javascript">
if (typeof(addRequiredField) != 'undefined') { 
addRequiredField ('form_0002_fld_4'); 
addRequiredField ('form_0002_fld_3_Street'); 
addRequiredField ('form_0002_fld_3_City'); 
addRequiredField ('form_0002_fld_3_Country'); 
addRequiredField ('form_0002_fld_2_2');
addRequiredField ('form_0002_fld_1_2');
addRequiredField ('form_0002_fld_1_fn'); 
addRequiredField ('form_0002_fld_1_ln');
}
if (typeof(addFieldToValidate) != 'undefined') { 
addFieldToValidate ('form_0002_fld_4', 'USPHONE'); 
addFieldToValidate ('form_0002_fld_4', 'LENGTH', 110);
addFieldToValidate ('form_0002_fld_1_2', 'EMAIL');
}
 </script>


<input id="name" name="name" type="hidden"> <input name="eto" value="mptraining@infocus.com,lisa.johnson@infocus.com" type="hidden"> <input name="esub" value="Display Demo Request" type="hidden">


</form>
</div>
<script>
$(document).ready(function() { 
    parent.$.colorbox.resize({
        innerWidth:$('body').width(),
        innerHeight:$('body').height()+6
    });
	
});
	
		function showhidefields(){
	var country = document.getElementById('BusinessCountry');
	console.log(document.getElementById('BusinessCountry').value)
	if(country.value == "US" || country.value == "CA"){
	$('#Business State').show();
	$('#Business State_label').show();
	}
	else{
	$('#Business State').hide();
	$('#Business State_label').hide();
	}
	
	}

</script>
</BODY>
</HTML>
