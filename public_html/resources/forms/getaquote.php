<?php

require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");


?>
<!DOCTYPE html>

<!--[if IE 9]>     <html class="ie ie9 lte9"> <![endif]-->
<!--[if !IE]><!--> <html>             <!--<![endif]-->
<HEAD>
 
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link type="text/css" rel="stylesheet" href="/resources/css/core.css">
<script type="text/javascript" src="/resources/js/InFocusCollection.js"></script>
<script type="text/javascript" src="/resources/js/WebToLead.js"></script>
<!--[if IE]>
    <link href="/resources/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
  <![endif]-->
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
	background: #f7f7f7;
	padding: 20px;
	box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.2), inset 0px 0px 0px 0px rgba(255, 255, 255, 1);
	border: 0px solid #B2B2B2;
}
</style>
 </HEAD>
<body style="max-width:1200px;background: #f7f7f7;line-height: 1em;">


<form id="WebToLeadForm" method="POST" name="WebToLeadForm">

<h2 style="text-align: left;"><?php echo translate('Get a Quote');?></h2>
<p style="text-align: left;"><?php echo $pageText['WorkWithYou'];?></p>


<ul class="wrap">

 <li>

<p><?php echo $pageText['TellUs'];?></p>
<label class="top" for="productofinterest_c"><?php echo translate('Product');?>: <span class="required" style="color: #ff0000;">*</span></label>

<?php 

if(preg_match('/(?i)msie [8-9]/',$_SERVER['HTTP_USER_AGENT']))
{
echo '<input id="productofinterest_c" type="text" name="productofinterest_c" >
</input>';
}
else
{
echo '<select id="productofinterest_c" type="text" name="productofinterest_c" >
</select>
<script>
getProductList(" productgroup != ' . "'Accessory'" . ' AND productgroup != ' . "'Series'" . ' AND active != 0 AND active is not null AND active != 9","productofinterest_c");
</script>';
}

?>

<label class="top" for="quanity_of_units_c"><?=translate('Quantity') ?>: </label>
<input id="quanity_of_units_c" type="text" name="quanity_of_units_c"/>


<label class="top" for="description"><?=translate('Notes') ?>: <span class="required" style="color: #ff0000;">*</span></label>
<textarea id="description" type="text" name="description" rows="8" /> </textarea>
  </li>
  
<li>
<label class="top" for="email1"><?=translate('Email') ?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="email1" type="text" name="email1" onchange="validateEmailAdd();" />
</li>
<li>

<label class="top" for="first_name"><?=translate('First Name') ?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="first_name" type="text" name="first_name" />
</li>
<li>
<label class="top" for="last_name"><?=translate('Last Name') ?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="last_name" type="text" name="last_name"  onchange="validateHuman();"/>
</li>
<li>
<label class="top" for="title"><?=translate('Job Title');?>: </label>
<input id="title" type="text" name="title" />
</li>
<li>
<label class="top" for="account_name"><?=translate('Organization Name');?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="account_name" type="text" name="account_name" />
</li>
<li>
<label class="top" for="primary_address_street"><?=translate('Address');?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="primary_address_street" type="text" name="primary_address_street" />
</li>
<li>
<label class="top" for="primary_address_city"><?=translate('City');?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="primary_address_city" type="text" name="primary_address_city" />
</li>
<li>
 <label class="top" for="primary_address_country"><?=translate('Country')?>: <span class="required" style="color: #ff0000;">*</span></label>
 <select type="text" name="primary_address_country" id="primary_address_country" onchange="if(this.value == 'US' || this.value == 'CA'){$('#stateContainer').show();$('#zipContainer').show();}else{$('#stateContainer').hide();$('#zipContainer').hide();}" >
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
 <select name="primary_address_state" id="primary_address_state" type="text" >
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
<input id="phone_work" type="text" name="phone_work" />
</li>
<li>
<br>
<button onclick="submit_form();" type="button"><?php echo $translate['Send'];?></button>
<br><span class="form-required" style="font-size:70%">* <?php echo $translate['Denotes a Required field'];?>.</span></li>
 </ul>


<p><?php echo $pageText['PrivacyReview'];?></p>




<input id="campaign_id" type="hidden" name="campaign_id" value="GetAQuote" />


<input id="assigned_user_id" type="hidden" name="assigned_user_id" value="" />

<input id="team_id" type="hidden" name="team_id" value="1" />
<input id="team_set_id" type="hidden" name="team_set_id" value="Global" />

<input id="req_id" type="hidden" name="req_id" value="last_name;email1;primary_address_country;first_name;productofinterest_c" />

<input type="hidden" id="human" name="human" value="0">

<input type="hidden" id="name" name="name">


</form>

<script>
$(document).ready(function() { 
    parent.$.colorbox.resize({
        innerWidth:$('body').width(),
        innerHeight:$('body').height()+14
    });
});
	

</script>
</BODY>
</HTML>
