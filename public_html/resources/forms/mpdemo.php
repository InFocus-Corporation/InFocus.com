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
.page-text {
	text-align:center;
	padding-left:5rem;
	padding-right:5rem;
}
.page-text a {
	margin-left: 6px;
}
form input[type=checkbox] + label {
    font-size: 13px;
}
</style>
 </HEAD>
<body style="max-width:1200px;background: #f7f7f7;">

<div id="MPpopup-popup">
<form id="form_0002" method="POST" enctype="multipart/form-data" action="" >
<section id="clearContainer">
<h2 style="text-align: center;text-transform:capitalize;"><?php echo $pageText['MPAction'];?></h2>
<div class="page-text"><?php echo $pageText['ManyWays'];?>
</div>
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
<label class="top" for="Company"><?=translate('Organization Name');?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="form_0002_fld_2_2" type="text" name="Company" />
</li>

<li>
<label class="top" for="Business Phone"><?=translate('Phone');?>: <span id="form_0002_fld_4-Label" class="required" style="color: #ff0000;">*&nbsp;&nbsp;&nbsp;</span></label>
<input type="text" id="form_0002_fld_4" name="Business Phone" onBlur="singleCheck ('form_0002_fld_4', 'ANYPHONE', 'form_0002_fld_4-Label')">
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
<label class="top" id="Products_label" for="Products"><?php echo $pageText['InterestedProductsP1'];?><span class="required" style="color: #ff0000;">*</span><br>
<small><?php echo $pageText['InterestedProductsP2'];?></small></label>
<input id="Products1" name="products[]" class="css-checkbox" type="checkbox" value="Mondopad">
<label for="Products1" class="css-label">Mondopad</label><br>
<input id="Products2" name="products[]" class="css-checkbox" type="checkbox" value="BigTouch">
<label for="Products2" class="css-label">BigTouch</label><br>
<input id="Products3" name="products[]" class="css-checkbox" type="checkbox" value="JTouch">
<label for="Products3" class="css-label">JTouch</label><br>
<input id="Products4" name="products[]" class="css-checkbox" type="checkbox" value="DigiEasel">
<label for="Products4" class="css-label">DigiEasel</label>
</li>

<li>
<label class="top" for="Company"><?=translate('I am');?><span class="required" style="color: #ff0000;">*</span>...</label>
<input id="reseller"  class="css-checkbox" type="checkbox" value="Reseller" onchange="if(this.checked){$('#custNameContainer').show();$('#workWith')[0].checked = false;$('#dealerContainer').hide();}else{$('#custNameContainer').hide();}">
<label for="reseller" class="css-label"><?=translate('an InFocus Reseller');?></label><br>
<input id="workWith"  class="css-checkbox" type="checkbox" value="Reseller" onchange="if(this.checked){$('#dealerContainer').show();$('#reseller')[0].checked = false;$('#custNameContainer').hide();}else{$('#dealerContainer').hide();}">
<label for="workWith" class="css-label"><?=translate('considering purchasing for myself or my organization');?></label>
<li id="custNameContainer" class="techOnly" style="display:none">
<label class="top" id="CustName" for="CustName"><?=translate('Customer Name');?>: </label>
<input id="CustName" type="text" name="CustName" />
</li>
<li id="dealerContainer" class="techOnly" style="display:none">
<label class="top" id="DealerName" for="DealerName"><?=translate('Dealer Name');?>: </label>
<input id="DealerName" type="text" name="DealerName" />
</li>
</li>
<li>
<label class="top" for="Description"><strong><?php echo $pageText['Additional'];?></strong> - <?php echo $pageText['TellUs'];?></label>
<textarea id="Description" type="text" name="Description" rows="8" /> </textarea>
</li>
</ul>
<div style="padding-left: 10px">
	<p class="privacy"><?php echo $pageText['PrivacyReview'];?></p>
	<div id="form_0002_ao_submit_button" style="padding:0;">
		<button id="form_0002_ao_submit_input" type="button" onClick="doSubmit(document.getElementById('form_0002'),'http://marketing.infocus.com/acton/forms/userSubmit.jsp','https://infocuscrm.sugarondemand.com/rest/v10/Web/submit','https://infocuscrm.sugarondemand.com/rest/v10/Web/submit')"><?=translate('Send')?></button>
	</div>

	<br><span class="form-required" style="font-size:70%">* <?=translate('Denotes a Required field');?>.</span>
</div>
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

</form>
</div>
<script>
$(document).ready(function() { 
    parent.$.colorbox.resize({
        innerWidth:$('body').width(),
        innerHeight:$('body').height()+100
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
