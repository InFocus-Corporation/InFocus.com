<?php
if(!empty($_REQUEST['rows'])){


$groups_allowed	=	"admin,editor,saleseditor,marketingeditor";
require_once($_SERVER['DOCUMENT_ROOT']	.	"/login/ublock.php");

ini_set('default_charset',	'utf-8');
$lang	=	"en";
global	$localdir;
global	$homedir;	
$localdir	=	dirname(__FILE__);
$homedir	=	substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"public_html")+11);	
require_once($_SERVER['DOCUMENT_ROOT']	.	"/login/ubvars.php");
require_once($_SERVER['DOCUMENT_ROOT']	.	"/resources/php/connections.php");
mysqli_set_charset($connection,	"utf8");

foreach($_REQUEST['rows'] as $rows){

$dataSet = $_REQUEST['data'][$rows];

$intFields = array('weight', 'shipweight', 'lumenshigh', 'lumenslow', 'contrast', 'lamphigh', 'lamplow');

$i=0;
$sql = "UPDATE " . $_REQUEST['table'] . " SET ";
foreach($dataSet as $value){

if($_REQUEST['fields'][$i] == "Region"){
$Region = $value;
}
elseif($_REQUEST['fields'][$i] == "Form"){
$Form = $value;
}
else{
if($value == 0 OR $value == ""){$value = "null";
$sql .= '`' . $_REQUEST['fields'][$i] . '` = NULL,';
}
else{
$sql .= '`' . $_REQUEST['fields'][$i] . '` = "' . mysqli_real_escape_string($connection,$value) . '",';
}

}


$i=$i+1;
}
$sql = substr($sql, 0, -1); 
$sql .= ' WHERE Region = "' . $Region . '" AND Form = "' . $Form . '"';
$result = mysqli_query($connection,$sql);
}



$WebToLead = "  function submit_form(){
 	if(typeof(validateCaptchaAndSubmit)!='undefined'){
 		validateCaptchaAndSubmit();
 	}else{
 		check_webtolead_fields();
 	}
 }
 function check_webtolead_fields(){
     if(document.getElementById('bool_id') != null){
        var reqs=document.getElementById('bool_id').value;
        bools = reqs.substring(0,reqs.lastIndexOf(';'));
        var bool_fields = new Array();
        var bool_fields = bools.split(';');
        nbr_fields = bool_fields.length;
        for(var i=0;i<nbr_fields;i++){
          if(document.getElementById(bool_fields[i]).value == 'on'){
             document.getElementById(bool_fields[i]).value = 1;
          }
          else{
             document.getElementById(bool_fields[i]).value = 0;
          }
        }
      }
    if(document.getElementById('req_id') != null){
        var reqs=document.getElementById('req_id').value;
        reqs = reqs.substring(0,reqs.lastIndexOf(';'));
        var req_fields = new Array();
        var req_fields = reqs.split(';');
        nbr_fields = req_fields.length;
        var req = true;
        for(var i=0;i<nbr_fields;i++){
          if(document.getElementById(req_fields[i]).value.length <=0 || document.getElementById(req_fields[i]).value==0){
           req = false;
           break;
          }
        }
        
        if(req && document.getElementById('human').value == '55' && document.getElementById('name').value == '' && document.getElementById('first_name').value != document.getElementById('last_name').value){
try{
var EMEAarray = ['United Kingdom', 'Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Antarctica', 'Armenia', 'Austria', 'Azerbaijan', 'Bahrain', 'Belarus', 'Belgium', 'Benin', 'Bermuda', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Bouvet Island', 'British Indian Ocean Territory', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cameroon', 'Cape Verde', 'Central African Republic', 'Chad', 'Christmas Island', 'Cocos (Keeling) Islands', 'Comoros', 'Congo', 'Congo, The Democratic Republic of The', 'Cook Islands', 'C?te d?Ivoire', 'Croatia', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Egypt', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia', 'Falkland Islands (Malvinas)', 'Faroe Islands', 'Finland', 'France', 'French Guiana', 'French Polynesia', 'French Southern Territories', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Guinea', 'Guinea-bissau', 'Heard Island and Mcdonald Islands', 'Holy See (Vatican City State)', 'Hungary', 'Iceland', 'Iran, Islamic Republic of', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Kuwait', 'Kyrgyzstan', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libyan Arab Jamahiriya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macedonia, The Former Yugoslav Republic of', 'Madagascar', 'Malawi', 'Maldives', 'Mali', 'Malta', 'Mauritania', 'Mauritius', 'Mayotte', 'Moldova, Republic of', 'Monaco', 'Mongolia', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru', 'Netherlands', 'Netherlands Antilles', 'New Caledonia', 'Niger', 'Nigeria', 'Niue', 'Norfolk Island', 'Northern Mariana Islands', 'Norway', 'Oman', 'Palestinian Territory, Occupied', 'Papua New Guinea', 'Paraguay', 'Peru', 'Poland', 'Portugal', 'Qatar', 'Reunion', 'Romania', 'Russian Federation', 'Rwanda', 'Saint Helena', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and The Grenadines', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia and Montenegro', 'Seychelles', 'Sierra Leone', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Georgia and The South Sandwich Islands', 'Spain', 'Sudan', 'Suriname', 'Svalbard and Jan Mayen', 'Swaziland', 'Sweden', 'Switzerland', 'Syrian Arab Republic', 'Tajikistan', 'Tanzania, United Republic of', 'Togo', 'Tonga', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks and Caicos Islands', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'Uzbekistan', 'Western Sahara', 'Yemen', 'Zambia', 'Zimbabwe'];
var LAArray = ['American Samoa', 'Anguilla', 'Antigua and Barbuda', 'Argentina', 'Aruba', 'Bahamas', 'Barbados', 'Belize', 'Brazil', 'Cayman Islands', 'Chile', 'Colombia', 'Costa Rica', 'Cuba', 'Dominica', 'Dominican Republic', 'Ecuador', 'El Salvador', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guyana', 'Haiti', 'Honduras', 'Jamaica', 'Marshall Islands', 'Martinique', 'Mexico', 'Montserrat', 'Nicaragua', 'Panama', 'Puerto Rico', 'Saint Pierre and Miquelon', 'Samoa', 'Trinidad and Tobago', 'Tuvalu', 'Uganda', 'United States Minor Outlying Islands', 'Uruguay', 'Vanuatu', 'Venezuela', 'Virgin Islands, British', 'Virgin Islands, U.S.', 'Wallis and Futuna'];
var APAC1Array = ['Australia', 'Bangladesh', 'Bhutan', 'Brunei Darussalam', 'Cambodia', 'Fiji', 'India', 'Japan', 'Korea, Democratic People's Republic of', 'Korea, Republic of', 'Lao People's Democratic Republic', 'Micronesia, Federated States of', 'Nepal', 'New Zealand', 'Pakistan', 'Palau', 'Pitcairn', 'Singapore', 'Sri Lanka', 'Thailand', 'Timor-leste', 'Tokelau', 'Viet Nam'];
var APAC2Array = ['China'];
var APAC3Array = ['Indonesia', 'Malaysia', 'Philippines'];
var APAC4Array = ['Hong Kong', 'Macao', 'Taiwan, Province of China'];
var CANADAArray = ['Canada'];
var TAM1Array = ['CT ', 'ME', 'MA', 'NH', 'NJ', 'NY', 'PA', 'RI', 'VT'];
var TAM2Array = ['IL', 'IN', 'IA', 'MI', 'MN', 'MO', 'OH', 'WI', 'WV'];
var TAM3Array = ['AK', 'CA', 'HI', 'ID ', 'MT', 'NV', 'ND ', 'OR', 'SD', 'WA', 'WY'];
var TAM4Array = ['AR', 'CO', 'KS', 'LA', 'NE', 'NM', 'OK', 'TX', 'UT'];
var TAM5Array = ['AZ'];
var TAM6Array = ['DC', 'DE', 'KY', 'MD', 'NC', 'SC', 'TN', 'VA'];
var TAM7Array = ['AL', 'FL', 'GA', 'MS'];

var EMEAindex = EMEAarray.indexOf(document.getElementById('primary_address_country').value);
var LAindex = LAArray.indexOf(document.getElementById('primary_address_country').value);
var APAC1index = APAC1Array.indexOf(document.getElementById('primary_address_country').value);
var APAC2index = APAC2Array.indexOf(document.getElementById('primary_address_country').value);
var APAC3index = APAC3Array.indexOf(document.getElementById('primary_address_country').value);
var APAC4index = APAC4Array.indexOf(document.getElementById('primary_address_country').value);
var CANADAindex = CANADAArray.indexOf(document.getElementById('primary_address_country').value);
var TAM1index = TAM1Array.indexOf(document.getElementById('primary_address_state').value);
var TAM2index = TAM2Array.indexOf(document.getElementById('primary_address_state').value);
var TAM3index = TAM3Array.indexOf(document.getElementById('primary_address_state').value);
var TAM4index = TAM4Array.indexOf(document.getElementById('primary_address_state').value);
var TAM5index = TAM5Array.indexOf(document.getElementById('primary_address_state').value);
var TAM6index = TAM6Array.indexOf(document.getElementById('primary_address_state').value);
var TAM7index = TAM7Array.indexOf(document.getElementById('primary_address_state').value);
}
catch (e){
}
var PostEntry = 'https://abu-crm.infocus.com/index.php?entryPoint=WebToLeadCapture';
var formName = document.getElementById('campaign_id').value
if(1==2){}
";

$result = mysqli_query($connection,"SELECT * FROM formassignment WHERE CampaignID IS NOT NULL");

while($row = mysqli_fetch_array($result))
{

if (substr($row[0],0,4) == "EMEA") {
$WebToLead .= "			else if($row[0]index >= 0 && formName == '$row[1]'){
	document.getElementById('campaign_id').value = '$row[2]';
	document.getElementById('team_id').value = '$row[3]';
	document.getElementById('assigned_user_id').value = '$row[4]';
						PostEntry = 'https://eur-crm.infocus.com/index.php?entryPoint=WebToLeadCapture';
						}
						
";

}
else{
$WebToLead .= "			else if($row[0]index >= 0 && formName == '$row[1]'){
	document.getElementById('campaign_id').value = '$row[2]';
	document.getElementById('team_id').value = '$row[3]';
	document.getElementById('assigned_user_id').value = '$row[4]';
}

";

}

}

$WebToLead .= "				document.WebToLeadForm.action = PostEntry;
            	document.WebToLeadForm.submit();
            	return true;
         
            
        }
        else{
          alert('Please provide all the required fields');
          return false;
         }
        return false;
   }
   else{
				document.WebToLeadForm.action = PostEntry;
            	document.WebToLeadForm.submit();
            	return true;

   }
}
function validateEmailAdd(){
	if(document.getElementById('email1') && document.getElementById('email1').value.length >0) {
		if(document.getElementById('email1').value.match(/^\w+(['\.\-\+]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/) == null){
		  alert('Not a valid email address');
		}
	}
	if(document.getElementById('email2') && document.getElementById('email2').value.length >0) {
		if(document.getElementById('email2').value.match(/^\w+(['\.\-\+]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/) == null){
		  alert('Not a valid email address');
		}
	}
}

function validateHuman(){
	document.getElementById('human').value = '55';
}";

file_put_contents ( $_SERVER['DOCUMENT_ROOT'] . "/resources/js/WebToLead.js",$WebToLead);
echo json_encode("success");
die();
}
?>
<!DOCTYPE html>
<?php
$groups_allowed = "admin,editor,saleseditor,marketingeditor";
require($_SERVER['DOCUMENT_ROOT'] . "/login/ublock.php");

require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
$localdir = dirname(__FILE__);

require($_SERVER['DOCUMENT_ROOT'] . "/resources/cmsmainmenu.html");
mysqli_set_charset($connection, "utf8");


?>

<script src="/resources/plugins/jquery-handsontable/dist/jquery.handsontable.full.js"></script>
<link rel="stylesheet" media="screen" href="/resources/plugins/jquery-handsontable/dist/jquery.handsontable.full.css">
<link rel="stylesheet" media="screen" href="/resources/css/core.css">

<style>

#selectable3 .ui-selecting { background: #f7f7f7; }
#selectable3 .ui-selected { background: #fff; color: #565656; }
#selectable3 { list-style-type: none; margin: 0; padding: 0;  }

#selectable3 li {
 outline: none;
 border: 1px solid #cccccc;
 box-shadow: 0px 0px 0px 4px rgba(0, 0, 0, 0.1), inset 0px 1px 0px 0px rgba(255, 255, 255, 1), inset 0px 1px 6px 0px rgba(0, 0, 0, 0.05);
 border-radius: 3px;
 padding: 7px 10px;
 background: #f1f1f1;
 color: #b5b5b5;
 margin-bottom: 10px;
 margin-right: 10px;
 float: left;
 }

#selectable4 .ui-selecting { background: #f7f7f7; }
#selectable4 .ui-selected { background: #fff; color: #565656; }
#selectable4 { list-style-type: none; margin: 0; padding: 0;  }

#selectable4 li {
 outline: none;
 border: 1px solid #cccccc;
 box-shadow: 0px 0px 0px 4px rgba(0, 0, 0, 0.1), inset 0px 1px 0px 0px rgba(255, 255, 255, 1), inset 0px 1px 6px 0px rgba(0, 0, 0, 0.05);
 border-radius: 3px;
 padding: 7px 10px;
 background: #f1f1f1;
 color: #b5b5b5;
 margin-bottom: 10px;
 margin-right: 10px;
 float: left;
 }

.colHeader{
color:white;
}

table tbody tr:last-child td {
border-bottom:1px solid #ccc;
}

#dataTable{
z-index:100;
margin: 10px 10px;
width:800px
}
</style>


</div>
    <div id="content" class="content">
<br>Wildcard Search (max 50 results)<br>
<input id="partsearch" type="text" ><button type="button" onclick="window.location = '?pn=' + document.getElementById('partsearch').value;">Search</button>
  
<div style="width:50%;float:right;height:800px;z-index:200;">
Scroll or use CTRL + F to find who you are looking for.
<div style="height:350px;width:100%;overflow-x:auto;">
User ID Reference
<table style="width:98%;"><tr><td style="width:220px;">ID</td><td>User_Name</td><td>First</td><td>Last</td><td>Region</td></tr>
<tr><td>1</td><td>admin</td><td></td><td>Administrator</td><td></td></tr>
<tr><td>1039d136-0df7-ecb7-9e9f-52cc40ca1928</td><td>rene.rozendal</td><td>René</td><td>Rozendal</td><td>EMEA</td></tr>
<tr><td>1bbc7d0e-20a8-88ab-bd6a-5124e98c9533</td><td>Robin Page</td><td>Robin</td><td>Page</td><td>EMEA</td></tr>
<tr><td>507da9ef-9cce-8359-738e-5166df64fda0</td><td>Andrew.Laarmann</td><td>Andrew</td><td>Laarmann</td><td>EMEA</td></tr>
<tr><td>549898f4-ed4c-69fe-e9a9-50ec6e0b6025</td><td>Jimmy.Mikander</td><td>Jimmy</td><td>Mikander</td><td>EMEA</td></tr>
<tr><td>70d1b1bb-0ca2-a886-1af5-51266d071432</td><td>Ricky.Kumar</td><td>Ricky</td><td>Kumar</td><td>EMEA</td></tr>
<tr><td>763f04af-1e39-f2e5-3b9d-5314c247a896</td><td>carsten.jochmann</td><td>Carsten</td><td>Jochmann</td><td>EMEA</td></tr>
<tr><td>7b124eb1-4010-5de1-9921-5111a38c1b4b</td><td>Tim.Larimer</td><td>Tim</td><td>Larimer</td><td>EMEA</td></tr>
<tr><td>8dd9b5d3-3485-0f1e-115d-50d1f100d4df</td><td>Jeremy.Farren</td><td>Jeremy</td><td>Farren</td><td>EMEA</td></tr>
<tr><td>94f5bfce-e3d7-0abe-b748-506b6f4d1e65</td><td>Michael.Kuehn</td><td>Michael</td><td>Kuehn</td><td>EMEA</td></tr>
<tr><td>9b02305e-0faa-76c4-266d-506b6e87bc83</td><td>Andrea.Tebo</td><td>Andrea</td><td>Tebo</td><td>EMEA</td></tr>
<tr><td>9f4ac741-4125-fbec-d2cf-506b6f4d396a</td><td>Raymond.Yu</td><td>Raymond</td><td>Yu</td><td>EMEA</td></tr>
<tr><td>ad5db758-3168-d454-f3a0-522f231c473f</td><td>Axel.Janssen</td><td>Axel</td><td>Janssen</td><td>EMEA</td></tr>
<tr><td>af803e29-77c7-35f1-873c-52efd81e595c</td><td>sibylle.drescher</td><td>Sibylle</td><td>Drescher</td><td>EMEA</td></tr>
<tr><td>be406209-2328-72c9-a181-506d4f7cf522</td><td>Office.Munich</td><td>Office</td><td>Munich</td><td>EMEA</td></tr>
<tr><td>c20896a4-45ba-7a0a-c22b-507efd0c884c</td><td>Wilfried.Tollet</td><td>Wilfried</td><td>Tollet</td><td>EMEA</td></tr>
<tr><td>c3b405b6-2b6f-31cb-4aac-507713bc5563</td><td>Lisa.Prentice</td><td>Lisa</td><td>Prentice</td><td>EMEA</td></tr>
<tr><td>daa24b5f-2772-185c-7046-50c8cda5e821</td><td>Eva.Schmidt</td><td>Eva</td><td>Schmidt</td><td>EMEA</td></tr>
<tr><td>df02caa9-661d-3254-cde2-50d1f1d3f3a4</td><td>Christophe.Marchewka</td><td>Christophe</td><td>Marchewka</td><td>EMEA</td></tr>
<tr><td>e0890da7-3d49-84e8-3055-50d1f131e88b</td><td>Mark.Harris</td><td>Mark</td><td>Harris</td><td>EMEA</td></tr>
<tr><td>e2650969-6718-3acc-5c09-53611dd476e1</td><td>robert.hellwig</td><td>Robert</td><td>Hellwig</td><td>EMEA</td></tr>
<tr><td>8718cfa7-2ecf-7804-39c3-50802a1ee288</td><td>AJ.Parker</td><td>AJ</td><td>Parker</td><td>ABU & APAC</td></tr>
<tr><td>99058b9d-ee7b-575d-ddfc-507f2ec2e486</td><td>Andrea.Tebo</td><td>Andrea</td><td>Tebo</td><td>ABU & APAC</td></tr>
<tr><td>a0892f74-7083-09ed-8fa7-515c4f3aac70</td><td>Brad.Monroe</td><td>Brad</td><td>Monroe</td><td>ABU & APAC</td></tr>
<tr><td>971bc923-7d9d-e92a-2888-50802af61bb3</td><td>Charilyn.Dickson</td><td>Charilyn</td><td>Dickson</td><td>ABU & APAC</td></tr>
<tr><td>8ff0c778-bd84-1ba0-0cde-507f3f38371f</td><td>Constance.Hanson</td><td>Constance</td><td>Hanson</td><td>ABU & APAC</td></tr>
<tr><td>b7e4e018-5793-b4c9-218e-50802a4deb79</td><td>Dale.Wait</td><td>Dale</td><td>Wait</td><td>ABU & APAC</td></tr>
<tr><td>8af597f9-8a4e-0c4c-4266-507f3fe09cce</td><td>Daniel.Boggs</td><td>Daniel</td><td>Boggs</td><td>ABU & APAC</td></tr>
<tr><td>241212ec-c286-6597-d055-50802a67e34f</td><td>Dave.Duncan</td><td>Dave</td><td>Duncan</td><td>ABU & APAC</td></tr>
<tr><td>bd34d2dc-a76f-b2c7-8421-50802aa2ff9f</td><td>David.Miner</td><td>David</td><td>Miner</td><td>ABU & APAC</td></tr>
<tr><td>81af28fd-bb22-db27-15ef-50802ad925dc</td><td>Elida.Garcia</td><td>Elida</td><td>Garcia</td><td>ABU & APAC</td></tr>
<tr><td>251f769e-326a-e480-5f20-537a49a206c6</td><td>Elizabeth.Casey</td><td>Elizabeth</td><td>Casey</td><td>ABU & APAC</td></tr>
<tr><td>c2a71093-1532-5fb9-14ec-50802a9a99d6</td><td>Eric.Lookenott</td><td>Eric</td><td>Lookenott</td><td>ABU & APAC</td></tr>
<tr><td>2e4d232d-4bc2-1acc-ee22-50d4c2afb39e</td><td>Felicia.Tan</td><td>Felicia</td><td>Tan</td><td>ABU & APAC</td></tr>
<tr><td>268d20bd-ff67-4b05-7dc4-50b68c39113d</td><td>Gabriel.Navakas</td><td>Gabriel</td><td>Navakas</td><td>ABU & APAC</td></tr>
<tr><td>391ec728-e25b-a1be-7101-520278d73340</td><td>Harsh.Pandey</td><td>Harsh</td><td>Pandey</td><td>ABU & APAC</td></tr>
<tr><td>c7e87367-bb71-1062-4983-50802a885554</td><td>Jaime.Feil</td><td>Jaime</td><td>Feil</td><td>ABU & APAC</td></tr>
<tr><td>cd393dbf-8091-2077-ec6c-50802a467b51</td><td>James.Griffiths</td><td>James</td><td>Griffiths</td><td>ABU & APAC</td></tr>
<tr><td>d2e7ba97-cafc-f219-c04a-50802af80483</td><td>Jamie.Hall</td><td>Jamie</td><td>Hall</td><td>ABU & APAC</td></tr>
<tr><td>d82b492f-649d-aa20-294f-50802a952864</td><td>Jennifer.Lynch</td><td>Jennifer</td><td>Lynch</td><td>ABU & APAC</td></tr>
<tr><td>86cf9066-29a8-25bb-e266-50d4c29790e6</td><td>Jerry.Zhang</td><td>Jerry</td><td>Zhang</td><td>ABU & APAC</td></tr>
<tr><td>49a457b5-e8ca-8cb1-bdfe-507f377452ff</td><td>Jim.Reddy</td><td>Jim</td><td>Reddy</td><td>ABU & APAC</td></tr>
<tr><td>dd8a3a71-e2b8-802b-e19f-50802a17ab77</td><td>Katie.Kim</td><td>Katie</td><td>Kim</td><td>ABU & APAC</td></tr>
<tr><td>b2b5a04a-ad2c-e243-a088-50802a83958e</td><td>Kendra.Hanson</td><td>Kendra</td><td>Hanson</td><td>ABU & APAC</td></tr>
<tr><td>e2fade3a-4c4f-da98-9810-50802a4ea340</td><td>Kevin.Talentino</td><td>Kevin</td><td>Talentino</td><td>ABU & APAC</td></tr>
<tr><td>ddea00cb-bae5-d372-ab23-50804521965d</td><td>Lissa.Birou</td><td>Lissa</td><td>Birou</td><td>ABU & APAC</td></tr>
<tr><td>1ed0fa83-714e-e211-8b6c-50802a047f2c</td><td>Loren.Shaw</td><td>Loren</td><td>Shaw</td><td>ABU & APAC</td></tr>
<tr><td>e82add11-ef82-5057-087a-50802a366b06</td><td>Maria.Martinez</td><td>Maria</td><td>Martinez</td><td>ABU & APAC</td></tr>
<tr><td>ee08fe9f-c665-e855-5560-50802a281d26</td><td>Mark.Cunningham</td><td>Mark</td><td>Cunningham</td><td>ABU & APAC</td></tr>
<tr><td>f32a2858-1cc7-4cb0-0d09-50802a6bbb41</td><td>Mark.Holt</td><td>Mark</td><td>Holt</td><td>ABU & APAC</td></tr>
<tr><td>9c7b47a8-0778-124a-e970-50802a366727</td><td>Matt.Swan</td><td>Matt</td><td>Swan</td><td>ABU & APAC</td></tr>
<tr><td>29670900-1d72-6bf4-0404-50802ac61e80</td><td>Mike.Porter</td><td>Mike</td><td>Porter</td><td>ABU & APAC</td></tr>
<tr><td>27c6c607-6966-8355-22e2-5130e822ea16</td><td>Olivia.Yu</td><td>Olivia</td><td>Yu</td><td>ABU & APAC</td></tr>
<tr><td>ee360578-761f-cf59-1b78-50802afbc02c</td><td>Product.Marketing</td><td>Product</td><td>Marketing</td><td>ABU & APAC</td></tr>
<tr><td>6d208a94-577a-a816-abae-50d4c377a0ae</td><td>Rajagopal.Sitaraman</td><td>Rajagopal</td><td>Sitaraman</td><td>ABU & APAC</td></tr>
<tr><td>99f7b4b1-b311-46d3-a719-513a64ddbbc4</td><td>Randy.Arnold</td><td>Randy</td><td>Arnold</td><td>ABU & APAC</td></tr>
<tr><td>9da12706-8ec5-dd0c-17a4-507f2e5a9706</td><td>Raymond.Yu</td><td>Raymond</td><td>Yu</td><td>ABU & APAC</td></tr>
<tr><td>c2e0dd74-10bb-01c7-a7ed-514a4468022d</td><td>Robert.Detwiler</td><td>Robert</td><td>Detwiler</td><td>ABU & APAC</td></tr>
<tr><td>19a6c233-f578-8470-20e4-50802af9773f</td><td>Scott.Largent</td><td>Scott</td><td>Largent</td><td>ABU & APAC</td></tr>
<tr><td>1477f926-086b-be91-ae45-50802a26ee3b</td><td>Sofia.DiFalco</td><td>Sofia</td><td>DiFalco</td><td>ABU & APAC</td></tr>
<tr><td>650334be-6175-86b8-b4dd-50d4c2004923</td><td>Spencer.Chan</td><td>Spencer</td><td>Chan</td><td>ABU & APAC</td></tr>
<tr><td>4f870b54-7691-0d48-c8d3-507f341e7c9a</td><td>Tim.Larimer</td><td>Tim</td><td>Larimer</td><td>ABU & APAC</td></tr>
<tr><td>d0549a10-2338-9f5a-87e8-50d4c33758fb</td><td>Tong.Wang</td><td>Tong</td><td>Wang</td><td>ABU & APAC</td></tr>
<tr><td>9d290e1d-364e-b144-87e5-50d4c360e556</td><td>Vincent.Liu</td><td>Vincent</td><td>Liu</td><td>ABU & APAC</td></tr>
<tr><td>9fdf0789-b930-eb46-9066-50d4c3e278a3</td><td>Vivo.Wang</td><td>Vivo</td><td>Wang</td><td>ABU & APAC</td></tr>
<tr><td>917b0b22-a0fc-614b-59e9-50802a2b4b0d</td><td>Wallen.Magalei</td><td>Wallen</td><td>Magalei</td><td>ABU & APAC</td></tr>
<tr><td>59b83da4-9358-68a1-a64a-50d4c3ed2d4d</td><td>Zhu.Lin</td><td>Zhu</td><td>Lin</td><td>ABU & APAC</td></tr>
<tr><td>856f7b8a-c22a-5589-bd5d-507f381538e4</td><td>abigail.Rath</td><td>Abigail</td><td>Rath</td><td>ABU & APAC</td></tr>
<tr><td>bd0bda5d-6bb3-f908-d968-5123b08b211a</td><td>bradley.monroe</td><td>Bradley</td><td>Monroe</td><td>ABU & APAC</td></tr>
<tr><td>ac2b7413-4894-674c-a832-52655038460d</td><td>chris.wright</td><td>Chris</td><td>Wright</td><td>ABU & APAC</td></tr>
<tr><td>40c0ef61-2803-e64c-9704-5390ac6fe77f</td><td>dustin.dimicelli</td><td>Dustin</td><td>Dimicelli</td><td>ABU & APAC</td></tr>
<tr><td>25b124aa-6ba7-3bbf-85c2-517714fa2d1e</td><td>elaina.anderson</td><td>Elaina</td><td>Anderson</td><td>ABU & APAC</td></tr>
<tr><td>52d81627-30f2-2e55-9b73-520132b5b8f2</td><td>justin.mason</td><td>Justin</td><td>Mason</td><td>ABU & APAC</td></tr>
<tr><td>87a102bd-25cb-49ed-995a-52c5ed11882f</td><td>kyle.henderson</td><td>Kyle</td><td>Henderson</td><td>ABU & APAC</td></tr>
<tr><td>7259ba53-e5e2-0759-4cb8-5277dfceca3d</td><td>laszlo.buza</td><td>Laszlo</td><td>Buza</td><td>ABU & APAC</td></tr>
<tr><td>42ca3ed0-68c9-5593-a557-527be782356a</td><td>lee.mendelsohn </td><td>Lee</td><td>Mendelsohn</td><td>ABU & APAC</td></tr>
<tr><td>34935b18-9e17-00b0-f199-510954dda272</td><td>mary.potter</td><td>Mary</td><td>Potter</td><td>ABU & APAC</td></tr>
<tr><td>917413e4-6437-bb58-e5f0-50dc8b501b95</td><td>ross.burdick</td><td>Ross</td><td>Burdick</td><td>ABU & APAC</td></tr>
<tr><td>47b5f61a-27f3-7cb1-ff32-512524c1e18d</td><td>tod.bunnell</td><td>Tod</td><td>Bunnell</td><td>ABU & APAC</td></tr>
<tr><td>3e424621-a945-c94c-beab-5154a0a88146</td><td>ty</td><td>Ty</td><td>Raia</td><td>ABU & APAC</td></tr></table>

</div>

<div style="height:350px;width:100%;overflow-x:auto;margin-top:30px;">
Team ID Reference
<table style="width:98%;"><tr><td style="width:220px;">TeamID</td><td>Name</td><td>Name_2</td><td>Region</td></tr>
<tr><td>1</td><td>Global</td><td></td><td></td></tr>
<tr><td>12f818ae-eeea-b4e8-5a10-50c257996ec6</td><td>Michael</td><td>Kuehn</td><td>EMEA</td></tr>
<tr><td>2dd3056f-9cd4-3c76-62df-50c2574f8b49</td><td>Raymond</td><td>Yu</td><td>EMEA</td></tr>
<tr><td>2fd77259-bf87-7d83-8747-50c25711acee</td><td>Daniel</td><td>Gibson</td><td>EMEA</td></tr>
<tr><td>314e87ae-3e83-0262-9b48-50c2578db922</td><td>Lisa</td><td>Prentice</td><td>EMEA</td></tr>
<tr><td>36bbfbf7-f595-9435-533f-513a711201da</td><td>Randy</td><td>Arnold</td><td>EMEA</td></tr>
<tr><td>3a906294-8653-8a5c-370f-50c257623972</td><td>Levementum Reg User</td><td></td><td>EMEA</td></tr>
<tr><td>3c1bad72-470b-e32d-a9ae-53611de5a14a</td><td>Robert</td><td>Hellwig</td><td>EMEA</td></tr>
<tr><td>3ec0ffb7-ea22-3f24-4f4b-5124e99a036b</td><td>Robin</td><td>Page</td><td>EMEA</td></tr>
<tr><td>3fdee564-5691-ed93-05ac-50c257bd877d</td><td>Jim</td><td>Reddy</td><td>EMEA</td></tr>
<tr><td>41d44172-2d28-8dea-95a8-52cc402968fa</td><td>René</td><td>Rozendal</td><td>EMEA</td></tr>
<tr><td>46126cd9-846b-ee86-5dad-5314c23004aa</td><td>Carsten</td><td>Jochmann</td><td>EMEA</td></tr>
<tr><td>51a6bef3-e9c0-bfa1-71c1-50c8cd152d19</td><td>Eva</td><td>Schmidt</td><td>EMEA</td></tr>
<tr><td>5553b1b8-f462-596c-954b-50c257c533a1</td><td>Andrea</td><td>Tebo</td><td>EMEA</td></tr>
<tr><td>671f16d9-9309-e8a0-7747-51151c400a9a</td><td>Email Archiving user</td><td></td><td>EMEA</td></tr>
<tr><td>6c17673c-7394-a395-fb0e-50c257959041</td><td>Office</td><td>Munich</td><td>EMEA</td></tr>
<tr><td>6d10004a-430d-8571-1b93-50c2575b60d8</td><td>Lissa</td><td>Birou</td><td>EMEA</td></tr>
<tr><td>7556e458-e395-3228-c8e8-50c257d1a20d</td><td>Karl</td><td>Knabe</td><td>EMEA</td></tr>
<tr><td>77a43ac8-bb5c-8ea7-5ab6-50c2575b0520</td><td>Joe</td><td>Lam</td><td>EMEA</td></tr>
<tr><td>798e9578-5be9-2458-d883-50c257df0eac</td><td>Jan-Albert</td><td>Nebbeling</td><td>EMEA</td></tr>
<tr><td>80b88041-7d9b-fdb3-387f-50c2576a79c4</td><td>Wilfried</td><td>Tollet</td><td>EMEA</td></tr>
<tr><td>84bd6f3e-1a97-63f0-e000-5166df6982fe</td><td>Andrew</td><td>Laarmann</td><td>EMEA</td></tr>
<tr><td>9013aea8-08ad-eef2-55eb-50c25725e0cd</td><td>Administrator</td><td></td><td>EMEA</td></tr>
<tr><td>932efe9b-e519-6c0b-47ec-50c2579947d2</td><td>Tim</td><td>Larimer</td><td>EMEA</td></tr>
<tr><td>a0491b84-147e-188d-76a0-50d1f1f6bf65</td><td>Jeremy</td><td>Farren</td><td>EMEA</td></tr>
<tr><td>a05a6699-0ca1-a04d-b4a6-50ec6e9c30ae</td><td>Jimmy</td><td>Mikander</td><td>EMEA</td></tr>
<tr><td>a2e29f7e-70ce-f6dc-6619-5111a3eb7181</td><td>Tim</td><td>Larimer</td><td>EMEA</td></tr>
<tr><td>aa8e388a-3d80-da37-dcf3-51266d838e08</td><td>Ricky</td><td>Kumar</td><td>EMEA</td></tr>
<tr><td>b56f2835-95a2-3d27-2b1e-50c25735da74</td><td>Jan-Albert</td><td>Nebbeling</td><td>EMEA</td></tr>
<tr><td>ba8e43e9-c8f8-3b1f-8a07-50c25701a311</td><td>Kendra</td><td>Cannoy</td><td>EMEA</td></tr>
<tr><td>bb4bf2ca-bbbc-56fa-5cc4-50c25770f783</td><td>Tim</td><td>Erb</td><td>EMEA</td></tr>
<tr><td>bbfcf41a-52a8-a522-637d-50c25715910f</td><td>Andre</td><td>Voerster</td><td>EMEA</td></tr>
<tr><td>c23153f1-8ece-937b-3d21-517718cd519a</td><td>Elaina</td><td>Anderson</td><td>EMEA</td></tr>
<tr><td>cc46fcd1-ea8d-bfac-4d5e-50ec6d637dad</td><td>Teik</td><td>Ng</td><td>EMEA</td></tr>
<tr><td>ce96d4bc-21cc-167f-81b3-50c257c08133</td><td>Abigail</td><td>Rath</td><td>EMEA</td></tr>
<tr><td>d220dade-dc5f-653b-c076-52efd800125f</td><td>Sibylle</td><td>Drescher</td><td>EMEA</td></tr>
<tr><td>d7f3cfaf-a5bb-bff7-375d-522f2381fe84</td><td>Axel</td><td>Janssen</td><td>EMEA</td></tr>
<tr><td>db6aa493-71c6-ede3-b67c-50c2574f3de9</td><td>Maximilian</td><td>Meyer</td><td>EMEA</td></tr>
<tr><td>dff90d10-b78b-47b5-d2d8-50d1f1170b10</td><td>Mark</td><td>Harris</td><td>EMEA</td></tr>
<tr><td>e6c6f4d2-cb9d-b82e-afe4-50c25766ae37</td><td>Heidi</td><td>Kayser</td><td>EMEA</td></tr>
<tr><td>efcf4e77-e93b-69b2-9b89-50d1f1c6a180</td><td>Christophe</td><td>Marchewka</td><td>EMEA</td></tr>
<tr><td>17312b12-d343-040b-d0e7-510aa7329d26</td><td>ABU Sales</td><td></td><td>ABU & APAC</td></tr>
<tr><td>a600020c-fedb-1a13-9ba4-50b92caf59c8</td><td>AJ</td><td>Parker</td><td>ABU & APAC</td></tr>
<tr><td>538410c8-b1fb-1b28-16f4-50d4c42a29ed</td><td>APAC Team</td><td></td><td>ABU & APAC</td></tr>
<tr><td>c094384e-b5c9-bdf2-be26-50b92c17af4c</td><td>Abigail</td><td>Rath</td><td>ABU & APAC</td></tr>
<tr><td>40f7f947-b785-856c-b420-50b92cd30a8a</td><td>Administrator</td><td></td><td>ABU & APAC</td></tr>
<tr><td>4b839dc6-186b-e5f6-291d-50b92c0395c9</td><td>Andrea</td><td>Tebo</td><td>ABU & APAC</td></tr>
<tr><td>841023f2-c9f0-bf2e-7c93-50b92c899ef1</td><td>Billy</td><td>Borkus</td><td>ABU & APAC</td></tr>
<tr><td>c4d81cea-783c-43f2-ce55-515c4f6b6e02</td><td>Brad</td><td>Monroe</td><td>ABU & APAC</td></tr>
<tr><td>cf9305ef-115c-c3fa-4b8d-5126a79bdd1e</td><td>Bradley Monroe</td><td></td><td>ABU & APAC</td></tr>
<tr><td>35685fbc-32f9-46e4-0141-51269f4018e2</td><td>Celso Naranjo </td><td></td><td>ABU & APAC</td></tr>
<tr><td>dd37ad16-3b1d-6693-fd32-50b92c6ae273</td><td>Charilyn</td><td>Dickson</td><td>ABU & APAC</td></tr>
<tr><td>d34d10fb-a2e8-1b01-8022-526550fb0a98</td><td>Chris</td><td>Wright</td><td>ABU & APAC</td></tr>
<tr><td>76c4e178-4c8c-c922-f26b-50b92c148072</td><td>Constance</td><td>Hanson</td><td>ABU & APAC</td></tr>
<tr><td>77e84859-7934-6e34-b1d5-50b92c659e08</td><td>Dale</td><td>Wait</td><td>ABU & APAC</td></tr>
<tr><td>39cc9d13-159e-f841-7211-50b92c4e1175</td><td>Daniel</td><td>Boggs</td><td>ABU & APAC</td></tr>
<tr><td>5cb591dc-7ea7-2436-3dc9-50b92c00ba2b</td><td>Dave</td><td>Duncan</td><td>ABU & APAC</td></tr>
<tr><td>af57dc41-fb41-3853-7fcd-50b92c645b71</td><td>David</td><td>Miner</td><td>ABU & APAC</td></tr>
<tr><td>595189a2-d256-3ec9-84d5-5390ac5816b4</td><td>Dustin</td><td>Dimicelli</td><td>ABU & APAC</td></tr>
<tr><td>3942661a-76b0-77e6-97f4-51771441b4c8</td><td>Elaina</td><td>Anderson</td><td>ABU & APAC</td></tr>
<tr><td>84c08152-098d-42e0-bd8e-50b92c0b8158</td><td>Elida</td><td>Garcia</td><td>ABU & APAC</td></tr>
<tr><td>52993ca7-4ac2-ad83-eab2-537a49e23534</td><td>Elizabeth</td><td>Casey</td><td>ABU & APAC</td></tr>
<tr><td>e7befc76-bd48-6dc5-5cc1-50b92c7cf18e</td><td>Eric</td><td>Lookenott</td><td>ABU & APAC</td></tr>
<tr><td>41df180a-6770-be01-c554-50d4c222de72</td><td>Felicia</td><td>Tan</td><td>ABU & APAC</td></tr>
<tr><td>85de82ce-dfac-c406-1749-50b92cb3167c</td><td>Gabriel</td><td>Navakas</td><td>ABU & APAC</td></tr>
<tr><td>640355bd-74a4-0f4c-2afd-52027844b8fa</td><td>Harsh</td><td>Pandey</td><td>ABU & APAC</td></tr>
<tr><td>b67b974b-6bb6-e518-ce65-50b92c5c340e</td><td>Heidi</td><td>Kayser</td><td>ABU & APAC</td></tr>
<tr><td>9a66660a-c7f4-7062-b43e-50b92c2077d1</td><td>IT</td><td>Test</td><td>ABU & APAC</td></tr>
<tr><td>2c5b69a2-f88a-a2d2-b87e-50b92c803e20</td><td>Jaime</td><td>Feil</td><td>ABU & APAC</td></tr>
<tr><td>67483e9e-81b6-9507-8444-50b92cee32c5</td><td>James</td><td>Griffiths</td><td>ABU & APAC</td></tr>
<tr><td>d2c77aaf-8cf2-f29f-7adc-50b92ce25301</td><td>Jamie</td><td>Hall</td><td>ABU & APAC</td></tr>
<tr><td>1806c928-ebdc-8841-e207-50b92c7ed567</td><td>Jennifer</td><td>Lynch</td><td>ABU & APAC</td></tr>
<tr><td>9b5f9841-0b7a-83ef-255e-50d4c269fc7c</td><td>Jerry</td><td>Zhang</td><td>ABU & APAC</td></tr>
<tr><td>281972bf-f5b5-c43d-453a-50b92cfaad20</td><td>Jim</td><td>Reddy</td><td>ABU & APAC</td></tr>
<tr><td>1fe2adbe-51cc-29bb-bfe9-50b92cad3627</td><td>Joe</td><td>Lam</td><td>ABU & APAC</td></tr>
<tr><td>a0e94ef2-4556-a934-43f3-520132e5f1e1</td><td>Justin</td><td>Mason</td><td>ABU & APAC</td></tr>
<tr><td>4fab5a1a-1f44-a4c4-ce7b-50b92cede479</td><td>Katie</td><td>Kim</td><td>ABU & APAC</td></tr>
<tr><td>3a07469c-7b83-ec61-b575-50b92ce5d7fe</td><td>Kendra</td><td>Hanson</td><td>ABU & APAC</td></tr>
<tr><td>c1906e30-1cb4-157c-d337-50b92c943e58</td><td>Kevin</td><td>Talentino</td><td>ABU & APAC</td></tr>
<tr><td>2e68fe4d-9097-939d-be16-52c5ed47cb43</td><td>Kyle</td><td>Henderson</td><td>ABU & APAC</td></tr>
<tr><td>a1f208cc-8a04-b24b-5d1f-5277df445ffd</td><td>Laszlo</td><td>Buza</td><td>ABU & APAC</td></tr>
<tr><td>76ac97bf-71b5-b01a-a55d-527be7a0a4fb</td><td>Lee</td><td>Mendelsohn</td><td>ABU & APAC</td></tr>
<tr><td>428cdfb7-bb76-6713-9731-50b92c0e264d</td><td>Lisa</td><td>Prentice</td><td>ABU & APAC</td></tr>
<tr><td>168f12b4-694b-8c57-a99b-50bcd9492345</td><td>Lissa</td><td>Birou</td><td>ABU & APAC</td></tr>
<tr><td>817a04f5-28b5-b470-5cc2-50b92c44aa8f</td><td>Lissa</td><td>Birou</td><td>ABU & APAC</td></tr>
<tr><td>2fb01780-e36f-fd9e-c777-50b92cdacff6</td><td>Loren</td><td>Shaw</td><td>ABU & APAC</td></tr>
<tr><td>8fc80041-b96d-229b-7307-50b92c11e830</td><td>Maria</td><td>Martinez</td><td>ABU & APAC</td></tr>
<tr><td>490db8ad-d551-b03a-b2c8-50b92cf92a42</td><td>Mark</td><td>Cunningham</td><td>ABU & APAC</td></tr>
<tr><td>eb5d09ee-9edf-a712-f037-50b92c17774f</td><td>Mark</td><td>Holt</td><td>ABU & APAC</td></tr>
<tr><td>57967371-a5a4-0f74-69a3-50b92cb64122</td><td>Mary</td><td>Potter</td><td>ABU & APAC</td></tr>
<tr><td>84f7e355-50e3-0b73-e187-50b92ca04033</td><td>Matt</td><td>Swan</td><td>ABU & APAC</td></tr>
<tr><td>b4165f1d-b161-fa3f-9050-50b92ca6516d</td><td>Mike</td><td>Porter</td><td>ABU & APAC</td></tr>
<tr><td>cbb25ff7-9513-647e-81eb-50b92ccf1538</td><td>Ole</td><td>Dame</td><td>ABU & APAC</td></tr>
<tr><td>37469253-aff9-4f1f-4ac8-5130e823a659</td><td>Olivia</td><td>Yu</td><td>ABU & APAC</td></tr>
<tr><td>7fd5f067-ee69-070f-bba6-50b92c26433c</td><td>Product</td><td>Marketing</td><td>ABU & APAC</td></tr>
<tr><td>84cd64f4-234a-d320-aec1-50d4c3cb7fe8</td><td>Rajagopal</td><td>Sitaraman</td><td>ABU & APAC</td></tr>
<tr><td>b4e5d82b-cf2f-a383-7576-513a64d3ab82</td><td>Randy</td><td>Arnold</td><td>ABU & APAC</td></tr>
<tr><td>bcd8b0ae-d62e-f1e0-b2e5-50b92cadf329</td><td>Raymond</td><td>Yu</td><td>ABU & APAC</td></tr>
<tr><td>da7d7768-050a-b276-114b-514a44755821</td><td>Robert</td><td>Detwiler</td><td>ABU & APAC</td></tr>
<tr><td>e86da5b1-e39b-2a9a-7f76-50b92cfc7de1</td><td>Ross</td><td>Burdick</td><td>ABU & APAC</td></tr>
<tr><td>e5d82006-fc71-ea21-9a6d-50b92c7594c0</td><td>Scott</td><td>Largent</td><td>ABU & APAC</td></tr>
<tr><td>b1f9a64a-74b5-f857-7fce-50b92c53eb85</td><td>Sofia</td><td>DiFalco</td><td>ABU & APAC</td></tr>
<tr><td>7a4c02cf-c25c-92d9-7087-50d4c2b43afe</td><td>Spencer</td><td>Chan</td><td>ABU & APAC</td></tr>
<tr><td>921fc99e-c8d8-f231-30be-50b92c0261a1</td><td>Tim</td><td>Erb</td><td>ABU & APAC</td></tr>
<tr><td>c2900554-74cc-05cc-709d-50b92ce396aa</td><td>Tim</td><td>Larimer</td><td>ABU & APAC</td></tr>
<tr><td>595a0cf9-0fed-3c1c-fe9d-5126a77a6edf</td><td>Tod Bunnell</td><td></td><td>ABU & APAC</td></tr>
<tr><td>e62440b9-f63d-8587-f52f-50d4c3385b74</td><td>Tong</td><td>Wang</td><td>ABU & APAC</td></tr>
<tr><td>53dca6b7-0f60-dbff-cc6c-5154a0406da0</td><td>Ty</td><td>Raia</td><td>ABU & APAC</td></tr>
<tr><td>f1023a8c-9950-10ba-d5fc-50b92c657bf2</td><td>Valerie</td><td>White</td><td>ABU & APAC</td></tr>
<tr><td>b316a7c0-5124-c795-c52f-50d4c385bfbe</td><td>Vincent</td><td>Liu</td><td>ABU & APAC</td></tr>
<tr><td>1edc0e30-915b-36ed-6c4d-50d4c3839269</td><td>Vivo</td><td>Wang</td><td>ABU & APAC</td></tr>
<tr><td>a747bcbe-cc1d-9c38-e3ff-50b92cbce535</td><td>Wallen</td><td>Magalei</td><td>ABU & APAC</td></tr>
<tr><td>6a25e202-e65f-6649-0bb7-50d4c3a65e7f</td><td>Zhu</td><td>Lin</td><td>ABU & APAC</td></tr></table>

</div>
</div>

   <div id="dataTable" style=""></div>
   
   
  <script>
<?php 
$sql = 'SELECT * FROM formassignment';

require_once($_SERVER['DOCUMENT_ROOT'] . "/resources/php/tableQuery.php");

?>
var changeRows = [];
var jArray= <?php echo json_encode($javaArray); ?>;
var jHeaders= <?php echo json_encode($colNames); ?>;
var jFields= <?php echo json_encode($fieldNames); ?>;
var specCell = [];
var $container;
var handsontable;



  $("#dataTable").handsontable({
    data: jArray,
 colHeaders: jHeaders,
 autoWrapRow:true,
 autoWrapCol:true,
 minSpareRows: 1 
  });

  
  $('#dataTable').handsontable('getInstance').addHook('beforeChange', function(changes,source) {

  for (var i=0;i<changes.length;i++)
{  
  if(changes[i][1] == "id"){changes[i] = null;}
  else{
  if(changes[i] !== null && changeRows.indexOf(changes[i][0]) == -1 ){
  changeRows.push(changes[i][0]);
      window.onbeforeunload = function(e) {
  return 'It looks like you may have unsaved changes, are you sure you want to leave the page?';
	};

  }
  }
}
});
   

$container = $("#dataTable");
handsontable = $container.data('handsontable');   
   
function post_to_url(path, method, table) {

if(changeRows.length==0){
alert("Must change/add at least one row");
return;
}

var r=confirm("Confirm changes to " + changeRows.length + " rows");
if (r==true)
  {
  }
else
  {
 return;
  } 
  window.onbeforeunload = false;

  $.ajax({
    url: "/resources/leadassignment.php",
    data: {"data": handsontable.getData(), "fields": jFields, "rows": changeRows, "table": "formassignment"}, //returns all cells' data
    dataType: 'json',
    type: 'POST',
    success: function (res) {
      if (res === 'success') {
        document.getElementById('statusdiv').innerHTML = 'Data saved';
      }
      else {
        document.getElementById('statusdiv').innerHTML = 'Save error';
      }
    }
  });

}







</script>



<button type="button" style="position:relative;left:75%;top:30px;" onclick="post_to_url('/resources/php/productcreateupdate', 'post', 'displays');">Submit Changes</button><div id="statusdiv"></div> 



<div style="display:none">
<iframe name="hiddenFrame" ></iframe>
</div>
</div>

</body>
</html>