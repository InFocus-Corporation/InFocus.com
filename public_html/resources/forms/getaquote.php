﻿<?php
$connection = mysqli_connect('67.43.0.33','InFocus','InF0cusP@ssw0rd', 'InFocus',3306);
mysqli_set_charset($connection, "utf8");
ini_set('default_charset', 'utf-8');
if(substr($_SERVER['SERVER_NAME'], -2)=="de"){
$lang = "de";
}
else{
$lang = "en";
} 

$sql = "SELECT keygroup, transtext FROM (SELECT transkey as keygroup FROM InFocus.labeltranslation GROUP BY transkey) as KeyList LEFT JOIN (SELECT transkey, transtext FROM InFocus.labeltranslation where labeltranslation.lang = '" . $lang . "') as labeltrans ON keygroup = transkey;";
$results = mysqli_query($connection,$sql);

while($row = mysqli_fetch_array($results)){

if($row[1] == null){$translate[$row[0]] = $row[0];}
else{$translate[$row[0]] = $row[1];}

}

$replaceArray = array(".php",".htm",".html","/","-");
$pagename = str_replace($replaceArray,"",$_SERVER['PHP_SELF']);

				
		$sql = 'SELECT EngText.textkey, if(LangText.`text` is null,EngText.`text`,LangText.`text`) as Text FROM (SELECT * FROM InFocus.sitetext WHERE lang = "en") AS EngText LEFT JOIN (SELECT * FROM InFocus.sitetext WHERE lang = "' . $lang . '") AS LangText ON (EngText.textkey = LangText.textkey AND EngText.pagename = LangText.pagename) WHERE EngText.pagename = "' . $pagename . '"';
		$results = mysqli_query($connection,$sql);
		while($row = mysqli_fetch_array($results)){
		$pageText[$row[0]] = $row[1];
		}

function translate($key){
global $translate;

if($translate[$key] == NULL){return $key;}
else{return $translate[$key];}
}

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
<label class="top" for="primary_address_country"><?=translate('Country');?>: <span class="required" style="color: #ff0000;">*</span></label>
<Select id="primary_address_country" type="text" name="primary_address_country" onchange="showhidefields()">
	<option value="" selected="selected"><?php echo $translate['Select Country'];?></option> 
	<option value="United States">United States</option> 
	<option value="United Kingdom">United Kingdom</option> 
	<option value="Afghanistan">Afghanistan</option> 
	<option value="Albania">Albania</option> 
	<option value="Algeria">Algeria</option> 
	<option value="American Samoa">American Samoa</option> 
	<option value="Andorra">Andorra</option> 
	<option value="Angola">Angola</option> 
	<option value="Anguilla">Anguilla</option> 
	<option value="Antarctica">Antarctica</option> 
	<option value="Antigua and Barbuda">Antigua and Barbuda</option> 
	<option value="Argentina">Argentina</option> 
	<option value="Armenia">Armenia</option> 
	<option value="Aruba">Aruba</option> 
	<option value="Australia">Australia</option> 
	<option value="Austria">Austria</option> 
	<option value="Azerbaijan">Azerbaijan</option> 
	<option value="Bahamas">Bahamas</option> 
	<option value="Bahrain">Bahrain</option> 
	<option value="Bangladesh">Bangladesh</option> 
	<option value="Barbados">Barbados</option> 
	<option value="Belarus">Belarus</option> 
	<option value="Belgium">Belgium</option> 
	<option value="Belize">Belize</option> 
	<option value="Benin">Benin</option> 
	<option value="Bermuda">Bermuda</option> 
	<option value="Bhutan">Bhutan</option> 
	<option value="Bolivia">Bolivia</option> 
	<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
	<option value="Botswana">Botswana</option> 
	<option value="Bouvet Island">Bouvet Island</option> 
	<option value="Brazil">Brazil</option> 
	<option value="British Indian Ocean Territory">British Indian Ocean 
	Territory</option> 
	<option value="Brunei Darussalam">Brunei Darussalam</option> 
	<option value="Bulgaria">Bulgaria</option> 
	<option value="Burkina Faso">Burkina Faso</option> 
	<option value="Burundi">Burundi</option> 
	<option value="Cambodia">Cambodia</option> 
	<option value="Cameroon">Cameroon</option> 
	<option value="Canada">Canada</option> 
	<option value="Cape Verde">Cape Verde</option> 
	<option value="Cayman Islands">Cayman Islands</option> 
	<option value="Central African Republic">Central African Republic</option> 
	<option value="Chad">Chad</option> 
	<option value="Chile">Chile</option> 
	<option value="China">China</option> 
	<option value="Christmas Island">Christmas Island</option> 
	<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
	<option value="Colombia">Colombia</option> 
	<option value="Comoros">Comoros</option> 
	<option value="Congo">Congo</option> 
	<option value="Congo, The Democratic Republic of The">Congo, The Democratic 
	Republic of The</option> 
	<option value="Cook Islands">Cook Islands</option> 
	<option value="Costa Rica">Costa Rica</option> 
	<option value="Cote D'ivoire">Cote D&#39;ivoire</option> 
	<option value="Croatia">Croatia</option> 
	<option value="Cuba">Cuba</option> 
	<option value="Cyprus">Cyprus</option> 
	<option value="Czech Republic">Czech Republic</option> 
	<option value="Denmark">Denmark</option> 
	<option value="Djibouti">Djibouti</option> 
	<option value="Dominica">Dominica</option> 
	<option value="Dominican Republic">Dominican Republic</option> 
	<option value="Ecuador">Ecuador</option> 
	<option value="Egypt">Egypt</option> 
	<option value="El Salvador">El Salvador</option> 
	<option value="Equatorial Guinea">Equatorial Guinea</option> 
	<option value="Eritrea">Eritrea</option> 
	<option value="Estonia">Estonia</option> 
	<option value="Ethiopia">Ethiopia</option> 
	<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
	<option value="Faroe Islands">Faroe Islands</option> 
	<option value="Fiji">Fiji</option> 
	<option value="Finland">Finland</option> 
	<option value="France">France</option> 
	<option value="French Guiana">French Guiana</option> 
	<option value="French Polynesia">French Polynesia</option> 
	<option value="French Southern Territories">French Southern Territories</option> 
	<option value="Gabon">Gabon</option> 
	<option value="Gambia">Gambia</option> 
	<option value="Georgia">Georgia</option> 
	<option value="Germany">Germany</option> 
	<option value="Ghana">Ghana</option> 
	<option value="Gibraltar">Gibraltar</option> 
	<option value="Greece">Greece</option> 
	<option value="Greenland">Greenland</option> 
	<option value="Grenada">Grenada</option> 
	<option value="Guadeloupe">Guadeloupe</option> 
	<option value="Guam">Guam</option> 
	<option value="Guatemala">Guatemala</option> 
	<option value="Guinea">Guinea</option> 
	<option value="Guinea-bissau">Guinea-bissau</option> 
	<option value="Guyana">Guyana</option> 
	<option value="Haiti">Haiti</option> 
	<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald 
	Islands</option> 
	<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
	<option value="Honduras">Honduras</option> 
	<option value="Hong Kong">Hong Kong</option> 
	<option value="Hungary">Hungary</option> 
	<option value="Iceland">Iceland</option> 
	<option value="India">India</option> 
	<option value="Indonesia">Indonesia</option> 
	<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
	<option value="Iraq">Iraq</option> 
	<option value="Ireland">Ireland</option> 
	<option value="Israel">Israel</option> 
	<option value="Italy">Italy</option> 
	<option value="Jamaica">Jamaica</option> 
	<option value="Japan">Japan</option> 
	<option value="Jordan">Jordan</option> 
	<option value="Kazakhstan">Kazakhstan</option> 
	<option value="Kenya">Kenya</option> 
	<option value="Kiribati">Kiribati</option> 
	<option value="Korea, Democratic Peoples Republic of">Korea, Democratic People&#39;s Republic of</option> 
	<option value="Korea, Republic of">Korea, Republic of</option> 
	<option value="Kuwait">Kuwait</option> 
	<option value="Kyrgyzstan">Kyrgyzstan</option> 
	<option value="Lao Peoples Democratic Republic">Lao People&#39;s Democratic Republic</option> 
	<option value="Latvia">Latvia</option> 
	<option value="Lebanon">Lebanon</option> 
	<option value="Lesotho">Lesotho</option> 
	<option value="Liberia">Liberia</option> 
	<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
	<option value="Liechtenstein">Liechtenstein</option> 
	<option value="Lithuania">Lithuania</option> 
	<option value="Luxembourg">Luxembourg</option> 
	<option value="Macao">Macao</option> 
	<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The 
	Former Yugoslav Republic of</option> 
	<option value="Madagascar">Madagascar</option> 
	<option value="Malawi">Malawi</option> 
	<option value="Malaysia">Malaysia</option> 
	<option value="Maldives">Maldives</option> 
	<option value="Mali">Mali</option> 
	<option value="Malta">Malta</option> 
	<option value="Marshall Islands">Marshall Islands</option> 
	<option value="Martinique">Martinique</option> 
	<option value="Mauritania">Mauritania</option> 
	<option value="Mauritius">Mauritius</option> 
	<option value="Mayotte">Mayotte</option> 
	<option value="Mexico">Mexico</option> 
	<option value="Micronesia, Federated States of">Micronesia, Federated States 
	of</option> 
	<option value="Moldova, Republic of">Moldova, Republic of</option> 
	<option value="Monaco">Monaco</option> 
	<option value="Mongolia">Mongolia</option> 
	<option value="Montserrat">Montserrat</option> 
	<option value="Morocco">Morocco</option> 
	<option value="Mozambique">Mozambique</option> 
	<option value="Myanmar">Myanmar</option> 
	<option value="Namibia">Namibia</option> 
	<option value="Nauru">Nauru</option> 
	<option value="Nepal">Nepal</option> 
	<option value="Netherlands">Netherlands</option> 
	<option value="Netherlands Antilles">Netherlands Antilles</option> 
	<option value="New Caledonia">New Caledonia</option> 
	<option value="New Zealand">New Zealand</option> 
	<option value="Nicaragua">Nicaragua</option> 
	<option value="Niger">Niger</option> 
	<option value="Nigeria">Nigeria</option> 
	<option value="Niue">Niue</option> 
	<option value="Norfolk Island">Norfolk Island</option> 
	<option value="Northern Mariana Islands">Northern Mariana Islands</option> 
	<option value="Norway">Norway</option> 
	<option value="Oman">Oman</option> 
	<option value="Pakistan">Pakistan</option> 
	<option value="Palau">Palau</option> 
	<option value="Palestinian Territory, Occupied">Palestinian Territory, 
	Occupied</option> 
	<option value="Panama">Panama</option> 
	<option value="Papua New Guinea">Papua New Guinea</option> 
	<option value="Paraguay">Paraguay</option> 
	<option value="Peru">Peru</option> 
	<option value="Philippines">Philippines</option> 
	<option value="Pitcairn">Pitcairn</option> 
	<option value="Poland">Poland</option> 
	<option value="Portugal">Portugal</option> 
	<option value="Puerto Rico">Puerto Rico</option> 
	<option value="Qatar">Qatar</option> 
	<option value="Reunion">Reunion</option> 
	<option value="Romania">Romania</option> 
	<option value="Russian Federation">Russian Federation</option> 
	<option value="Rwanda">Rwanda</option> 
	<option value="Saint Helena">Saint Helena</option> 
	<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
	<option value="Saint Lucia">Saint Lucia</option> 
	<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
	<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
	<option value="Samoa">Samoa</option> 
	<option value="San Marino">San Marino</option> 
	<option value="Sao Tome and Principe">Sao Tome and Principe</option> 
	<option value="Saudi Arabia">Saudi Arabia</option> 
	<option value="Senegal">Senegal</option> 
	<option value="Serbia and Montenegro">Serbia and Montenegro</option> 
	<option value="Seychelles">Seychelles</option> 
	<option value="Sierra Leone">Sierra Leone</option> 
	<option value="Singapore">Singapore</option> 
	<option value="Slovakia">Slovakia</option> 
	<option value="Slovenia">Slovenia</option> 
	<option value="Solomon Islands">Solomon Islands</option> 
	<option value="Somalia">Somalia</option> 
	<option value="South Africa">South Africa</option> 
	<option value="South Georgia and The South Sandwich Islands">South Georgia 
	and The South Sandwich Islands</option> 
	<option value="Spain">Spain</option> 
	<option value="Sri Lanka">Sri Lanka</option> 
	<option value="Sudan">Sudan</option> 
	<option value="Suriname">Suriname</option> 
	<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
	<option value="Swaziland">Swaziland</option> 
	<option value="Sweden">Sweden</option> 
	<option value="Switzerland">Switzerland</option> 
	<option value="Syrian Arab Republic">Syrian Arab Republic</option> 
	<option value="Taiwan, Province of China">Taiwan, Province of China</option> 
	<option value="Tajikistan">Tajikistan</option> 
	<option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
	<option value="Thailand">Thailand</option> 
	<option value="Timor-leste">Timor-leste</option> 
	<option value="Togo">Togo</option> 
	<option value="Tokelau">Tokelau</option> 
	<option value="Tonga">Tonga</option> 
	<option value="Trinidad and Tobago">Trinidad and Tobago</option> 
	<option value="Tunisia">Tunisia</option> 
	<option value="Turkey">Turkey</option> 
	<option value="Turkmenistan">Turkmenistan</option> 
	<option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
	<option value="Tuvalu">Tuvalu</option> 
	<option value="Uganda">Uganda</option> 
	<option value="Ukraine">Ukraine</option> 
	<option value="United Arab Emirates">United Arab Emirates</option> 
	<option value="United Kingdom">United Kingdom</option> 
	<option value="United States">United States</option> 
	<option value="United States Minor Outlying Islands">United States Minor 
	Outlying Islands</option> 
	<option value="Uruguay">Uruguay</option> 
	<option value="Uzbekistan">Uzbekistan</option> 
	<option value="Vanuatu">Vanuatu</option> 
	<option value="Venezuela">Venezuela</option> 
	<option value="Viet Nam">Viet Nam</option> 
	<option value="Virgin Islands, British">Virgin Islands, British</option> 
	<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
	<option value="Wallis and Futuna">Wallis and Futuna</option> 
	<option value="Western Sahara">Western Sahara</option> 
	<option value="Yemen">Yemen</option> 
	<option value="Zambia">Zambia</option> 
	<option value="Zimbabwe">Zimbabwe</option>
</select>
</li>

<?php
if($lang == "en"){
echo '
<li>
<label class="top" id="primary_address_state_label" for="primary_address_state">State/Province: </label>
<Select id="primary_address_state" type="text" name="primary_address_state">
	<option value=""  selected="selected">Select a State</option> 
	<option value="AL">Alabama</option> 
	<option value="AK">Alaska</option> 
	<option value="AZ">Arizona</option> 
	<option value="AR">Arkansas</option> 
	<option value="CA">California</option> 
	<option value="CO">Colorado</option> 
	<option value="CT">Connecticut</option> 
	<option value="DE">Delaware</option> 
	<option value="DC">District Of Columbia</option> 
	<option value="FL">Florida</option> 
	<option value="GA">Georgia</option> 
	<option value="HI">Hawaii</option> 
	<option value="ID">Idaho</option> 
	<option value="IL">Illinois</option> 
	<option value="IN">Indiana</option> 
	<option value="IA">Iowa</option> 
	<option value="KS">Kansas</option> 
	<option value="KY">Kentucky</option> 
	<option value="LA">Louisiana</option> 
	<option value="ME">Maine</option> 
	<option value="MD">Maryland</option> 
	<option value="MA">Massachusetts</option> 
	<option value="MI">Michigan</option> 
	<option value="MN">Minnesota</option> 
	<option value="MS">Mississippi</option> 
	<option value="MO">Missouri</option> 
	<option value="MT">Montana</option> 
	<option value="NE">Nebraska</option> 
	<option value="NV">Nevada</option> 
	<option value="NH">New Hampshire</option> 
	<option value="NJ">New Jersey</option> 
	<option value="NM">New Mexico</option> 
	<option value="NY">New York</option> 
	<option value="NC">North Carolina</option> 
	<option value="ND">North Dakota</option> 
	<option value="OH">Ohio</option> 
	<option value="OK">Oklahoma</option> 
	<option value="OR">Oregon</option> 
	<option value="PA">Pennsylvania</option> 
	<option value="RI">Rhode Island</option> 
	<option value="SC">South Carolina</option> 
	<option value="SD">South Dakota</option> 
	<option value="TN">Tennessee</option> 
	<option value="TX">Texas</option> 
	<option value="UT">Utah</option> 
	<option value="VT">Vermont</option> 
	<option value="VA">Virginia</option> 
	<option value="WA">Washington</option> 
	<option value="WV">West Virginia</option> 
	<option value="WI">Wisconsin</option> 
	<option value="WY">Wyoming</option>
</select>
</li>'; }
?>

<li>
<label class="top" id="primary_address_postalcode_label" for="primary_address_postalcode"><?php echo $translate['Zip/Postalcode'];?>: </label>
<input id="primary_address_postalcode" type="text" name="primary_address_postalcode" />
</li>

<li>
<label class="top" for="phone_work"><?php echo $translate['Phone'];?>: <span class="required" style="color: #ff0000;">*</span></label>
<input id="phone_work" type="text" name="phone_work" />
</li>

 </ul>


<p><?php echo $pageText['PrivacyReview'];?></p>

<br><br>
<button onclick="submit_form();" type="button"><?php echo $translate['Send'];?></button>
<br><span class="form-required" style="font-size:70%">* <?php echo $translate['Denotes a Required field'];?>.</span>

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
	
	function showhidefields(){
	var country = document.getElementById('primary_address_country');
	if(country.value == "United States" || country.value == "Canada"){
	$('#primary_address_state').show();
	$('#primary_address_postalcode').show();
	$('#primary_address_state_label').show();
	$('#primary_address_postalcode_label').show();
	}
	else{
	$('#primary_address_state').hide();
	$('#primary_address_postalcode').hide();
	$('#primary_address_state_label').hide();
	$('#primary_address_postalcode_label').hide();
	}
	
	}
</script>
</BODY>
</HTML>
