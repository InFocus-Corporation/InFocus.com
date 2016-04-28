<?php
$lang="en";
$connection = mysqli_connect('67.43.0.33','InFocus','InF0cusP@ssw0rd', 'InFocus',3306);
mysqli_set_charset($connection, "utf8");
ini_set('default_charset', 'utf-8');
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/langchk.php");
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/transfunc.php");

?>
<!DOCTYPE html>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link type="text/css" rel="stylesheet" href="/resources/css/core.css">
<!--[if IE]>
    <link href="/resources/css/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
  <![endif]-->

<script>

function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[1].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
    var prodValue = "";
                newcell.innerHTML = table.rows[1].cells[i].innerHTML;
                //alert(newcell.childNodes);
               switch(newcell.childNodes[0].name) {
                    case "product[]":
                            newcell.childNodes[0].value = prodValue;
       newcell.childNodes[0].style.width = '200px';
                            break;
                    case "delete":
                            newcell.childNodes[0].checked = false;
        newcell.childNodes[0].style.width = '25px';
                           break;
                    case "qty[]":
                            newcell.childNodes[0].value = "";
        newcell.childNodes[0].style.width = '75px';
                           break;
                }
            }
        }
 
function deleteRow(tableID) {
    var tbl = document.getElementById(tableID); // table reference
    // delete last row
	if(tbl.rows.length==2){return;}

	tbl.deleteRow(tbl.rows.length-1);
}
// append row to the HTML table
function appendRow(tableID) {
    var tbl = document.getElementById(tableID), // table reference
        row = tbl.insertRow(tbl.rows.length),      // append table row
        i;
    // insert table cells to the new row
    for (i = 0; i < tbl.rows[0].cells.length; i++) {
        createCell(row.insertCell(i), i, 'row');
    }
}
 
// create DIV element and append to the table cell
function createCell(cell, text, style) {
    var div = document.createElement('div'), // create DIV element
        txt = document.createTextNode(text); // create text node
    div.appendChild(txt);                    // append text node to the DIV
    div.setAttribute('class', style);        // set DIV class attribute
    div.setAttribute('className', style);    // set DIV class attribute for IE (?!)
    cell.appendChild(div);                   // append DIV to the table cell			
			}
			
// append column to the HTML table
function appendColumn(tableID) {
    var tbl = document.getElementById(tableID), // table reference
        i;
    // open loop for each row and append cell
    for (i = 0; i < tbl.rows.length; i++) {
        createCell(tbl.rows[i].insertCell(tbl.rows[i].cells.length), i, 'col');
    }
}			

// delete table rows with index greater then 0
function deleteRows(tableID) {
    var tbl = document.getElementById(tableID), // table reference
        lastRow = tbl.rows.length - 1,             // set the last row index
        i;
    // delete rows with index greater then 0
    for (i = lastRow; i > 0; i--) {
        tbl.deleteRow(i);
    }
}

 
// delete table columns with index greater then 0
function deleteColumns(tableID) {
    var tbl = document.getElementById(tableID), // table reference
        lastCol = tbl.rows[0].cells.length - 1,    // set the last column index
        i, j;
    // delete cells with index greater then 0 (for each row)
    for (i = 0; i < tbl.rows.length; i++) {
        for (j = lastCol; j > 0; j--) {
            tbl.rows[i].deleteCell(j);
        }
    }
}
function deleteColumn(tableID) {
    var tbl = document.getElementById(tableID); // table reference
    // delete last column)
    for (i = 0; i < tbl.rows.length; i++) {
            tbl.rows[i].deleteCell(tbl.rows[0].cells.length - 1);
    }
}

if(self==top){
var sPath=window.location.pathname;
var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
if(sPage.lastIndexOf('.')>0){sPage = sPage.substring(0,sPage.lastIndexOf('.'));}

window.location = "/support/#register";
}

var wKeys;
var index;
var passed;

function validate(wKeys){

document.getElementById('submit').disabled=false;

// var required = document.getElementById('reqfields').value;
// required = required.split(",");



// for (index = 0; index < required.length; ++index) {
    // if(document.getElementById(required[index]).value == ""){
		// alert("Please fill out all required fields");
		// return false;
		// }
// }





wKeys = $(".ewCode");
for (index = 0; index < wKeys.length; ++index) {

	
if(wKeys[index].value.length>0){
	jQuery.post("validatekey.php",
	{key: wKeys[index].value
	},
	function(response){
	
	response = jQuery.parseJSON(response);
	if(response.type != null){
	   if(response.type.trim()=="True"){
		document.getElementById('submit').disabled=true;
	   alert("Key: " + response.key + "\nThis warranty or service key has already been used.  If you feel this is in error please contact the support department at 877-388-8360");
		return;
	   }
	   if(response.type.trim()=="Not Valid"){
		document.getElementById('submit').disabled=true;
	   alert("Key: " + response.key + "\nThis warranty or service key is not valid.  If you feel this is in error please contact the support department at 877-388-8360");
		return;
	   }
}

	});
}}


}

function resetFrame(){

parent.$.colorbox.resize({
        innerHeight:$('body').height()+2
    });
console.log("test");
}

function isRegistered(serialN){

	jQuery.post("/resources/php/registrationvalidate.php",
	{serialNumber: serialN
	},
	function(response){
	
	if(response != "NotRegistered" && "<?php echo $_GET['regdl']; ?>" == "TRUE"){
	
	document.getElementById('predownload').innerHTML = "Great! You are already registered. Here is your download.";
	window.location = '/resources/php/pushdownload.php?filename=<?php echo $_GET['filename']; ?>';
	}
	else if("<?php echo $_GET['regdl']; ?>" == "TRUE"){
	$('#predownload').slideUp(0);
	$('#invoicetable').slideUp(0);
	$('#mpheaders').slideDown(0);
	$('#register').slideDown(0);
	setTimeout(resetFrame, 1);
	 document.getElementById('serial_number').value = document.getElementById('serial_numberpre').value;
	}
	else if(response != "NotRegistered" ){
	
	var Fields;
	Fields = response.split("^");
	
	if (prompt("We see this product is already registered.  Please enter the city it was registered in to validate ownership") == Fields[7]){
	 document.getElementById('product').value = Fields[0];
	 document.getElementById('first_name').value = Fields[1];
	 document.getElementById('last_name').value = Fields[2];
	 document.getElementById('organization').value = Fields[3];
	 document.getElementById('phone_number').value = Fields[4];
	 document.getElementById('email').value = Fields[5];
	 document.getElementById('address').innerHTML = Fields[6];
	 document.getElementById('city').value = Fields[7];
	 document.getElementById('state').value = Fields[8];
	 document.getElementById('zip_postal_code').value = Fields[9];
	 document.getElementById('primary_address_country').value = Fields[10];
	 document.getElementById('second_name').value = Fields[11];
	 document.getElementById('second_email').value = Fields[12];
	 
	 document.getElementById('notification').innerHTML = "We see this product is already registered.  Please verify your information.";
	    parent.$.colorbox.resize({
        innerHeight:$('body').height()+2
    });
	}
	else{
	document.getElementById('submit').disabled = true;
	alert("The information entered did not match what we have on file.  To change ownership of a product please call InFocus Support");
	}
	}

	});
	
}

function checkSN(Serial){
  if(Serial.search(/[^A-Z^0-9^a-z]/)>0){
 document.getElementById('serial_number').value = Serial.replace(/[^A-Z^0-9^a-z]/g,'');
 alert("Only letters and numbers are valid in serial numbers. \nYou may only submit one serial at a time.");
  }

  if(Serial.length>19){
  alert("Serial numbers are generally 12-15 characters with a maximum under 19.\nYou may only submit one serial at a time.");
  document.getElementById('serial_number').value = Serial.substr(0,19);
 }
  }

</script>
<style>
  form {
	background: #f7f7f7;
	padding: 20px;
	box-shadow: 0px 0px 0px 0px rgba(0, 0, 0, 0.2), inset 0px 0px 0px 0px rgba(255, 255, 255, 1);
	border: 0px;
}
#dataTable tr{
background-color:transparent;
}
</style>
 </HEAD>
<body style="max-width:1200px;background: #f7f7f7;">

<section  id="headers" style="margin-left:40px;">
<h3 style="text-transform: capitalize" ><h3 style="text-transform: capitalize">Product Registration</h3>
<strong>Please fill out the below fields to register your product.  Registration Processing takes 2-5 business days.</strong><br>All warranties start from the date of <u>manufacture</u> unless a proof of purchase is attached to the registration request.</section>
<form action="/resources/forms/register.php" id="register" accept-charset="UTF-8" method="post" enctype="multipart/form-data">

<table id="invoicetable" style="margin-bottom:20px;">
<tbody><tr class="odd">
<td align="Left" width="50"></td>
<td style="text-align:Left">Valid proof of purchase must contain:</td>
<td rowspan="5" style="vertical-align:middle"><label class="top" for="invoice">Invoice: </label>
 <input name="file" id="invoice" size="60" type="file"></td>
</tr>
<tr>
<td></td>
<td>Price Paid</td>
</tr>
<tr class="odd">
<td></td>
<td>Date</td>
</tr>
<tr>
<td></td>
<td>Vendor purchased from</td>
</tr>
<tr class="odd">
<td></td>
<td>Serial Number of the product</td>
</tr>
</tbody></table>


 <span id="notification"></span>
 <ul class="wrap">
 <li>

</li>
<li>
 <label class="top" for="serial_number"><?=translate('Serial Number')?>: <span class="form-required" title="This field is required.">*</span></label>
 <input maxlength="128" name="serial_number" id="serial_number" size="60" type="text" onkeyup="checkSN(this.value);" onchange="isRegistered(this.value);" required>
</li>
<li>
 <label class="top" for="first_name"><?=translate('First Name')?>: <span class="form-required" title="This field is required.">*</span></label>
 <input maxlength="128" name="first_name" id="first_name" size="60" type="text" value="<?php echo $_GET['first_name']; ?>" required>
</li>
<li>
 <label class="top" for="last_name"><?=translate('Last Name')?>: <span class="form-required" title="This field is required.">*</span></label>
 <input maxlength="128" name="last_name" id="last_name" size="60" type="text" value="<?php echo $_GET['last_name']; ?>" required>
</li>
<li>
 <label class="top" for="phone_number"><?=translate('Phone')?>: </label>
 <input maxlength="128" name="phone_number" id="phone_number" size="60" type="text" value="<?php echo $_GET['phone_number']; ?>" >
</li>
<li>
 <label class="top" for="e_mail"><?=translate('Email Address')?>: <span class="form-required" title="This field is required.">*</span></label>
 <input type="email" id="email" name="e_mail" size="60" type="e_mail" value="<?php echo $_GET['e_mail']; ?>" required>
</li>
<li>
 <label class="top" for="second_name"><?=translate('Secondary Contact Name')?>: </label>
 <input maxlength="128" name="second_name" id="second_name" size="60" type="text" value="<?php echo $_GET['second_name']; ?>" >
</li>
<li>
 <label class="top" for="e_mail"><?=translate('Secondary Contact Email')?>: </label>
 <input type="email" id="second_email" name="second_email" size="60" value="<?php echo $_GET['e_mail']; ?>" >
</li>
<li>
 <label class="top" for="product"><?=translate('Product Part #')?>: <span class="form-required" title="This field is required.">*</span></label>
 <input maxlength="128" name="product" id="product" size="60" value="" class="form-text" type="text" required>
</li>

<li>

 <label class="top" for="address"><?=translate('Address')?>: <span class="form-required" title="This field is required.">*</span></label>
 <textarea type="text" cols="30" rows="5" name="address" id="address" required><?php echo $_GET['address']; ?></textarea>
</li>
<li>

 <label class="top" for="city"><?=translate('City')?>: <span class="form-required" title="This field is required."></span></label>
 <input maxlength="128" name="city" id="city" size="60" type="text" value="<?php echo $_GET['city']; ?>" required>
</li>
<li>

 <label class="top" for="state"><?=translate('State/Province')?>: <span class="form-required" title="This field is required."></span></label>
 <input maxlength="128" name="state" id="state" size="60" type="text" value="<?php echo $_GET['state']; ?>" required>
</li>
<li>

 <label class="top" for="zip_postal_code"><?=translate('Zip/Postalcode')?>: <span class="form-required" title="This field is required."></span></label>
 <input maxlength="128" name="zip_postal_code" id="zip_postal_code" size="60" type="text" value="<?php echo $_GET['zip_postal_code']; ?>" required>
</li>
<li>

 <label class="top" for="primary_address_country"><?=translate('Country')?>: <span class="form-required" title="This field is required.">*</span></label>
 <select type="text" name="primary_address_country" id="primary_address_country" required>
 <option value=""></option>
<?php 

$countryList = array('AF' => 'Afghanestan','SA' => 'Al Arabiyah as Suudiyah','BH' => 'Al Bahrayn','AE' => 'Al Imarat al Arabiyah al Muttahidah','IQ' => 'Al Iraq','DZ' => 'Al Jaza\'ir','KW' => 'Al Kuwayt','MA' => 'Al Maghrib','JO' => 'Al Urdun','YE' => 'Al Yaman','AD' => 'Andorra','AO' => 'Angola','AG' => 'Antigua and Barbuda','AR' => 'Argentina','SD' => 'As-Sudan','AU' => 'Australia','AZ' => 'Azarbaycan Respublikasi','BD' => 'Bangladesh','BB' => 'Barbados','PW' => 'Belau','BE' => 'Belgique (French) or Belgie (Flemish)','BZ' => 'Belice','BJ' => 'Benin','BO' => 'Bolivia','BA' => 'Bosna i Hercegovina','BW' => 'Botswana','BR' => 'Brasil','BF' => 'Burkina Faso','BI' => 'Burundi','BY' => 'Byelarus','CV' => 'Cabo Verde','CM' => 'Cameroon or Cameroun (French)','CA' => 'Canada','CZ' => 'Ceska Republika','CL' => 'Chile','KR' => 'Choson or Choson-minjujuui-inmin-konghwaguk','CO' => 'Colombia','KM' => 'Comores','CR' => 'Costa Rica','CI' => 'Cote d\'Ivoire','CU' => 'Cuba','DK' => 'Danmark','DE' => 'Deutschland','MV' => 'Dhivehi Raajje','DJ' => 'Djibouti','DM' => 'Dominica','BT' => 'Drukyul','EC' => 'Ecuador','EE' => 'Eesti','SV' => 'El Salvador','GR' => 'Ellas','ER' => 'Ertra','ES' => 'Espana','FM' => 'Federated States of Micronesia','FJ' => 'Fiji','FR' => 'France or Republique Francaise','GA' => 'Gabon','GH' => 'Ghana','GD' => 'Grenada','GT' => 'Guatemala','GQ' => 'Guinea Ecuatorial','GW' => 'Guine-Bissau','GN' => 'Guinee','GY' => 'Guyana','HT' => 'Haiti','AM' => 'Hayastan','HN' => 'Honduras','HR' => 'Hrvatska','IN' => 'India, Bharat','ID' => 'Indonesia','IR' => 'Iran, Persia','IE' => 'Ireland or Eire','IS' => 'Island','IT' => 'Italia','JM' => 'Jamaica','TJ' => 'Jumhurii Tojikistan','KH' => 'Kampuchea','KE' => 'Kenya','KI' => 'Kiribati','CY' => 'Kypros (Greek) or Kibris (Turkish)','KG' => 'Kyrgyz Respublikasy','LV' => 'Latvija','LS' => 'Lesotho','LR' => 'Liberia','LY' => 'Libya','LI' => 'Liechtenstein','LT' => 'Lietuva','LB' => 'Lubnan','LU' => 'Luxembourg','MG' => 'Madagascar','HU' => 'Magyarorszag','MK' => 'Makedonija','MW' => 'Malawi','MY' => 'Malaysia','ML' => 'Mali','MT' => 'Malta','MH' => 'Marshall Islands','MU' => 'Mauritius','MX' => 'Mexico','EG' => 'Misr','MZ' => 'Mocambique','MD' => 'Moldova','MC' => 'Monaco','MN' => 'Mongol Uls','TH' => 'Muang Thai','MR' => 'Muritaniyah','MM' => 'Myanma Naingngandaw','NA' => 'Namibia','NR' => 'Nauru','NL' => 'Nederland','NP' => 'Nepal','NZ' => 'New Zealand','NI' => 'Nicaragua','NE' => 'Niger','NG' => 'Nigeria','JP' => 'Nippon','NO' => 'Norge','AT' => 'Oesterreich','PK' => 'Pakistan','PA' => 'Panama','PG' => 'Papua New Guinea','PY' => 'Paraguay','PE' => 'Peru','PH' => 'Pilipinas','PL' => 'Polska','PT' => 'Portugal','QA' => 'Qatar','KZ' => 'Qazaqstan','DO' => 'Republica Dominicana','BG' => 'Republika Bulgariya','CF' => 'Republique Centrafricaine','CD' => 'Republique Democratique du Congo','CG' => 'Republique du Congo','RO' => 'Romania','RU' => 'Rossiya','RW' => 'Rwanda','KN' => 'Saint Kitts and Nevis','LC' => 'Saint Lucia','GE' => 'Sak\'art\'velo','WS' => 'Samoa','SM' => 'San Marino','VA' => 'Santa Sede (Citta del Vaticano)','ST' => 'Sao Tome e Principe','LA' => 'Sathalanalat Paxathipatai Paxaxon Lao','CH' => 'Schweiz (German), Suisse (French), Svizzera (Italian)','SN' => 'Senegal','SC' => 'Seychelles','AL' => 'Shqiperia','SL' => 'Sierra Leone','SG' => 'Singapore','SI' => 'Slovenija','SK' => 'Slovensko','SB' => 'Solomon Islands','SO' => 'Somalia','ZA' => 'South Africa','RS' => 'Srbija-Crna Gora','LK' => 'Sri Lanka','FI' => 'Suomi','SR' => 'Suriname','SY' => 'Suriyah','SE' => 'Sverige','SZ' => 'Swaziland','KP' => 'Taehan-min\'guk','TW' => 'T\'ai-wan','TZ' => 'Tanzania','TD' => 'Tchad','BS' => 'The Bahamas','GM' => 'The Gambia','TG' => 'Togo','TO' => 'Tonga','TT' => 'Trinidad and Tobago','TN' => 'Tunis','TR' => 'Turkiye','TM' => 'Turkmenistan','TV' => 'Tuvalu','UG' => 'Uganda','UA' => 'Ukrayina','OM' => 'Uman','GB' => 'United Kingdom','US' => 'United States','UY' => 'Uruguay','UZ' => 'Uzbekiston Respublikasi','VU' => 'Vanuatu','VE' => 'Venezuela','VN' => 'Viet Nam','ET' => 'YeItyop\'iya','IL' => 'Yisra\'el','ZM' => 'Zambia','CN' => 'Zhong Guo','ZW' => 'Zimbabwe');
$displayedCountries = array('AF','SA','BH','AE','IQ','DZ','KW','MA','JO','YE','AD','AO','AG','AR','SD','AU','AZ','BD','BB','PW','BE','BZ','BJ','BO','BA','BW','BR','BF','BI','BY','CV','CM','CA','CZ','CL','KR','CO','KM','CR','CI','CU','DK','DE','MV','DJ','DM','BT','EC','EE','SV','GR','ER','ES','FM','FJ','FR','GA','GH','GD','GT','GQ','GW','GN','GY','HT','AM','HN','HR','IN','ID','IR','IE','IS','IT','JM','TJ','KH','KE','KI','CY','KG','LV','LS','LR','LY','LI','LT','LB','LU','MG','HU','MK','MW','MY','ML','MT','MH','MU','MX','EG','MZ','MD','MC','MN','TH','MR','MM','NA','NR','NL','NP','NZ','NI','NE','NG','JP','NO','AT','PK','PA','PG','PY','PE','PH','PL','PT','QA','KZ','DO','BG','CF','CD','CG','RO','RU','RW','KN','LC','GE','WS','SM','VA','ST','LA','CH','SN','SC','AL','SL','SG','SI','SK','SB','SO','ZA','RS','LK','FI','SR','SY','SE','SZ','KP','TW','TZ','TD','BS','GM','TG','TO','TT','TN','TR','TM','TV','UG','UA','OM','GB','US','UY','UZ','VU','VE','VN','ET','IL','ZM','CN','ZW');

 
 if($_GET['euwar']==1){ $displayedCountries = array('AL','DZ','AD','AO','AT','BH','BY','BE','BJ','BA','BW','BG','BF','BI','CM','CV','CF','TD','KM','HR','CY','CZ','CD','DK','DJ','EG','GQ','ER','EE','ET','FI','FR','GA','GM','GE','DE','GH','GR','GN','GW','HU','IS','IR','IQ','IE','IL','IT','JO','KE','KW','LV','LB','LS','LR','LY','LI','LT','LU','MK','MG','MW','ML','MT','MR','MU','MD','MC','MA','MZ','NA','NL','NE','NG','NO','OM','PL','PT','QA','RO','RW','SM','ST','SA','SN','RS','SK','SI','SO','ZA','ES','SD','SZ','SE','CH','SY','TZ','TG','TN','TR','UG','UA','AE','GB','VA','YE','ZM','ZW');}
 
 foreach($displayedCountries as $cCode){
	 echo "<option value='$cCode'>{$countryList[$cCode]} ($cCode)</option>";
 }
 
 ?>
 </select>
</li>
</ul>

<input id="optin" name="optin" class="css-checkbox" type="checkbox" value="Yes"/>
<label for="optin" class="css-label">Yes, I would like to receive news and special deals from Kangaroo.</label>
<input  id="submit" value="<?= $translate['Submit']?>" type="Submit" onclick="">
<br><span class="form-required" style="font-size:70%">* <?= $translate['Denotes a Required field']?>.</span>


 <input name="reqfields" id="reqfields" type="hidden" value="first_name,last_name">

</form>


<script>


$(document).ready(function() { 
    parent.$.colorbox.resize({
        innerWidth:$('body').width(),
        innerHeight:$('body').height()+2
    });
	
});

</script>

</html>
</body>
