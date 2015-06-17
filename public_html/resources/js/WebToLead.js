  function submit_form(){
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
var EMEAarray = ['United Kingdom', 'Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Antarctica', 'Armenia', 'Austria', 'Azerbaijan', 'Bahrain', 'Belarus', 'Belgium', 'Benin', 'Bermuda', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Bouvet Island', 'British Indian Ocean Territory', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cameroon', 'Cape Verde', 'Central African Republic', 'Chad', 'Christmas Island', 'Cocos (Keeling) Islands', 'Comoros', 'Congo', 'Congo, The Democratic Republic of The', 'Cook Islands', 'Cote d\'Ivoire', 'Croatia', 'Cyprus', 'Czech Republic', 'Denmark', 'Djibouti', 'Egypt', 'Equatorial Guinea', 'Eritrea', 'Estonia', 'Ethiopia', 'Falkland Islands (Malvinas)', 'Faroe Islands', 'Finland', 'France', 'French Guiana', 'French Polynesia', 'French Southern Territories', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Guinea', 'Guinea-bissau', 'Heard Island and Mcdonald Islands', 'Holy See (Vatican City State)', 'Hungary', 'Iceland', 'Iran, Islamic Republic of', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Kuwait', 'Kyrgyzstan', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libyan Arab Jamahiriya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Macedonia, The Former Yugoslav Republic of', 'Madagascar', 'Malawi', 'Maldives', 'Mali', 'Malta', 'Mauritania', 'Mauritius', 'Mayotte', 'Moldova, Republic of', 'Monaco', 'Mongolia', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru', 'Netherlands', 'Netherlands Antilles', 'New Caledonia', 'Niger', 'Nigeria', 'Niue', 'Norfolk Island', 'Northern Mariana Islands', 'Norway', 'Oman', 'Palestinian Territory, Occupied', 'Papua New Guinea', 'Paraguay', 'Peru', 'Poland', 'Portugal', 'Qatar', 'Reunion', 'Romania', 'Russian Federation', 'Rwanda', 'Saint Helena', 'Saint Kitts and Nevis', 'Saint Lucia', 'Saint Vincent and The Grenadines', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Serbia and Montenegro', 'Seychelles', 'Sierra Leone', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa', 'South Georgia and The South Sandwich Islands', 'Spain', 'Sudan', 'Suriname', 'Svalbard and Jan Mayen', 'Swaziland', 'Sweden', 'Switzerland', 'Syrian Arab Republic', 'Tajikistan', 'Tanzania, United Republic of', 'Togo', 'Tonga', 'Tunisia', 'Turkey', 'Turkmenistan', 'Turks and Caicos Islands', 'Ukraine', 'United Arab Emirates', 'United Kingdom', 'Uzbekistan', 'Western Sahara', 'Yemen', 'Zambia', 'Zimbabwe'];
var LAArray = ['American Samoa', 'Anguilla', 'Antigua and Barbuda', 'Argentina', 'Aruba', 'Bahamas', 'Barbados', 'Belize', 'Brazil', 'Cayman Islands', 'Chile', 'Colombia', 'Costa Rica', 'Cuba', 'Dominica', 'Dominican Republic', 'Ecuador', 'El Salvador', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guyana', 'Haiti', 'Honduras', 'Jamaica', 'Marshall Islands', 'Martinique', 'Mexico', 'Montserrat', 'Nicaragua', 'Panama', 'Puerto Rico', 'Saint Pierre and Miquelon', 'Samoa', 'Trinidad and Tobago', 'Tuvalu', 'Uganda', 'United States Minor Outlying Islands', 'Uruguay', 'Vanuatu', 'Venezuela', 'Virgin Islands, British', 'Virgin Islands, U.S.', 'Wallis and Futuna'];
var APAC1Array = ['Australia', 'Bangladesh', 'Bhutan', 'Brunei Darussalam', 'Cambodia', 'Fiji', 'India', 'Japan', 'Korea, Democratic People\'s Republic of', 'Korea, Republic of', 'Lao People\'s Democratic Republic', 'Micronesia, Federated States of', 'Nepal', 'New Zealand', 'Pakistan', 'Palau', 'Pitcairn', 'Singapore', 'Sri Lanka', 'Thailand', 'Timor-leste', 'Tokelau', 'Viet Nam'];
var APAC2Array = ['China'];
var APAC3Array = ['Indonesia', 'Malaysia', 'Philippines'];
var APAC4Array = ['Hong Kong', 'Macao', 'Taiwan, Province of China'];
var CANADAArray = ['Canada'];
var TAM1Array = ['CT ', 'ME', 'MA', 'NH', 'NJ', 'NY', 'PA', 'RI', 'VT'];
var TAM2Array = ['IL', 'IN', 'IA', 'MI', 'MN', 'MO', 'OH', 'WI', 'WV'];
var TAM3Array = ['AK', 'HI', 'ID ', 'MT', 'ND ', 'OR', 'SD', 'WA', 'WY'];
var TAM4Array = ['AR', 'CO', 'KS', 'LA', 'NE', 'NM', 'OK', 'TX', 'UT'];
var TAM5Array = ['AZ'];
var TAM6Array = ['DC', 'DE', 'KY', 'MD', 'NC', 'SC', 'TN', 'VA'];
var TAM7Array = ['AL', 'FL', 'GA', 'MS'];
var TAM8Array = ['NV'];
	
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
var TAM8index = TAM8Array.indexOf(document.getElementById('primary_address_state').value);

	//Two new indexes for North and South California.
	var NOCAindex = 0;
	var SOCAindex = 0;

	//Test for N/S California Zip code matches.  If doesn't match zip, but is CA assign to Tam3.
	if(document.getElementById('primary_address_postalcode') && document.getElementById('primary_address_postalcode').value.length >=5) {
		if(document.getElementById('primary_address_postalcode').value.match(/^([940-969]+\d{2,}/) != null){
			NOCAindex = 1;
		}else if(document.getElementById('primary_address_postalcode').value.match(/^([900-936]+\d{2,}/) != null){
			SOCAindex = 1;
		}else if(document.getElementById('primary_address_state').value == 'CA'){var TAM3index = 1;}
	}else if(document.getElementById('primary_address_state').value == 'CA'){var TAM3index = 1;}
}
catch (e){
}
var PostEntry = '/resources/forms/crmpostforward.php';
document.getElementById('name').value = 'http://abu-crm.infocus.com/index.php?entryPoint=WebToLeadCapture';
var formName = document.getElementById('campaign_id').value;

			if(EMEAindex >= 0 && formName == 'GetAQuote'){
	document.getElementById('campaign_id').value = '63760045-10cb-0dec-8ba6-50ec6c2bb9a9';
	document.getElementById('team_id').value = '5553b1b8-f462-596c-954b-50c257c533a1';
	document.getElementById('assigned_user_id').value = 'daa24b5f-2772-185c-7046-50c8cda5e821';
						document.getElementById('name').value = 'http://eur-crm.infocus.com/index.php?entryPoint=WebToLeadCapture';
						}
						
			else if(LAindex >= 0 && formName == 'GetAQuote'){
	document.getElementById('campaign_id').value = '343da04a-85a5-da5e-0291-50cfa02f86b9';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = 'e82add11-ef82-5057-087a-50802a366b06';
}

			else if(APAC1index >= 0 && formName == 'GetAQuote'){
	document.getElementById('campaign_id').value = '343da04a-85a5-da5e-0291-50cfa02f86b9';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = 'd0549a10-2338-9f5a-87e8-50d4c33758fb';
}

			else if(CANADAindex >= 0 && formName == 'GetAQuote'){
	document.getElementById('campaign_id').value = '343da04a-85a5-da5e-0291-50cfa02f86b9';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = 'b2b5a04a-ad2c-e243-a088-50802a83958e';
}

			else if(TAM1index >= 0 && formName == 'GetAQuote'){
	document.getElementById('campaign_id').value = '343da04a-85a5-da5e-0291-50cfa02f86b9';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = 'bd34d2dc-a76f-b2c7-8421-50802aa2ff9f';
}

			else if(TAM2index >= 0 && formName == 'GetAQuote'){
	document.getElementById('campaign_id').value = '343da04a-85a5-da5e-0291-50cfa02f86b9';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = 'ee08fe9f-c665-e855-5560-50802a281d26';
}

			//Catches NOCA too.
			else if((TAM3index >= 0 || NOCAindex > 0) && formName == 'GetAQuote'){
	document.getElementById('campaign_id').value = '343da04a-85a5-da5e-0291-50cfa02f86b9';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = 'ed3d36b4-203c-fada-af53-5526d77fd169';
}

			else if(TAM4index >= 0 && formName == 'GetAQuote'){
	document.getElementById('campaign_id').value = '343da04a-85a5-da5e-0291-50cfa02f86b9';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = '19a6c233-f578-8470-20e4-50802af9773f';
}

			else if(TAM5index >= 0 && formName == 'GetAQuote'){
	document.getElementById('campaign_id').value = '343da04a-85a5-da5e-0291-50cfa02f86b9';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = 'b7e4e018-5793-b4c9-218e-50802a4deb79';
}

			else if(TAM6index >= 0 && formName == 'GetAQuote'){
	document.getElementById('campaign_id').value = '343da04a-85a5-da5e-0291-50cfa02f86b9';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = 'c2a71093-1532-5fb9-14ec-50802a9a99d6';
}

			else if(TAM7index >= 0 && formName == 'GetAQuote'){
	document.getElementById('campaign_id').value = '343da04a-85a5-da5e-0291-50cfa02f86b9';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = 'cd393dbf-8091-2077-ec6c-50802a467b51';
}

			//TAM8 for NV and SOCA.
			else if((TAM8index >= 0 || SOCAindex > 0) && formName == 'GetAQuote'){
	document.getElementById('campaign_id').value = '343da04a-85a5-da5e-0291-50cfa02f86b9';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = '168f557a-86fc-255e-a437-556c702134be';
}

			else if(LAindex >= 0 && formName == 'MPDemo'){
	document.getElementById('campaign_id').value = '59eeea26-0ad3-374b-7f7f-50cfa327a67c';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = 'e82add11-ef82-5057-087a-50802a366b06';
}

			else if(APAC1index >= 0 && formName == 'MPDemo'){
	document.getElementById('campaign_id').value = '59eeea26-0ad3-374b-7f7f-50cfa327a67c';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = 'd0549a10-2338-9f5a-87e8-50d4c33758fb';
}

			else if(CANADAindex >= 0 && formName == 'MPDemo'){
	document.getElementById('campaign_id').value = '59eeea26-0ad3-374b-7f7f-50cfa327a67c';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = 'b2b5a04a-ad2c-e243-a088-50802a83958e';
}

			else if(TAM1index >= 0 && formName == 'MPDemo'){
	document.getElementById('campaign_id').value = '59eeea26-0ad3-374b-7f7f-50cfa327a67c';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = 'bd34d2dc-a76f-b2c7-8421-50802aa2ff9f';
}

			else if(TAM2index >= 0 && formName == 'MPDemo'){
	document.getElementById('campaign_id').value = '59eeea26-0ad3-374b-7f7f-50cfa327a67c';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = 'ee08fe9f-c665-e855-5560-50802a281d26';
}

			//Catches NOCA too.
			else if((TAM3index >= 0 || NOCAindex > 0) && formName == 'MPDemo'){
	document.getElementById('campaign_id').value = '59eeea26-0ad3-374b-7f7f-50cfa327a67c';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = 'ed3d36b4-203c-fada-af53-5526d77fd169';
}

			else if(TAM4index >= 0 && formName == 'MPDemo'){
	document.getElementById('campaign_id').value = '59eeea26-0ad3-374b-7f7f-50cfa327a67c';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = '19a6c233-f578-8470-20e4-50802af9773f';
}

			else if(TAM5index >= 0 && formName == 'MPDemo'){
	document.getElementById('campaign_id').value = '59eeea26-0ad3-374b-7f7f-50cfa327a67c';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = 'b7e4e018-5793-b4c9-218e-50802a4deb79';
}

			else if(TAM6index >= 0 && formName == 'MPDemo'){
	document.getElementById('campaign_id').value = '59eeea26-0ad3-374b-7f7f-50cfa327a67c';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = 'c2a71093-1532-5fb9-14ec-50802a9a99d6';
}

			else if(TAM7index >= 0 && formName == 'MPDemo'){
	document.getElementById('campaign_id').value = '59eeea26-0ad3-374b-7f7f-50cfa327a67c';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = 'cd393dbf-8091-2077-ec6c-50802a467b51';
}

			//TAM8 for NV and SOCA.
			else if((TAM8index >= 0 || SOCAindex > 0) && formName == 'MPDemo'){
	document.getElementById('campaign_id').value = '59eeea26-0ad3-374b-7f7f-50cfa327a67c';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = '168f557a-86fc-255e-a437-556c702134be';
}

			else if(EMEAindex >= 0 && formName == 'ContactUs'){
	document.getElementById('campaign_id').value = '4d9ae97d-6ff2-eb94-28fb-50ec693c1d05';
	document.getElementById('team_id').value = '5553b1b8-f462-596c-954b-50c257c533a1';
	document.getElementById('assigned_user_id').value = 'daa24b5f-2772-185c-7046-50c8cda5e821';
						document.getElementById('name').value = 'http://eur-crm.infocus.com/index.php?entryPoint=WebToLeadCapture';
						}
						
			else if(APAC2index >= 0 && formName == 'MPDemo'){
	document.getElementById('campaign_id').value = '59eeea26-0ad3-374b-7f7f-50cfa327a67c';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = '86cf9066-29a8-25bb-e266-50d4c29790e6';
}

			else if(APAC3index >= 0 && formName == 'MPDemo'){
	document.getElementById('campaign_id').value = '59eeea26-0ad3-374b-7f7f-50cfa327a67c';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = '2e4d232d-4bc2-1acc-ee22-50d4c2afb39e';
}

			else if(APAC4index >= 0 && formName == 'MPDemo'){
	document.getElementById('campaign_id').value = '59eeea26-0ad3-374b-7f7f-50cfa327a67c';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = '650334be-6175-86b8-b4dd-50d4c2004923';
}

			else if(APAC2index >= 0 && formName == 'GetAQuote'){
	document.getElementById('campaign_id').value = '343da04a-85a5-da5e-0291-50cfa02f86b9';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = '86cf9066-29a8-25bb-e266-50d4c29790e6';
}

			else if(APAC3index >= 0 && formName == 'GetAQuote'){
	document.getElementById('campaign_id').value = '343da04a-85a5-da5e-0291-50cfa02f86b9';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = '2e4d232d-4bc2-1acc-ee22-50d4c2afb39e';
}

			else if(APAC4index >= 0 && formName == 'GetAQuote'){
	document.getElementById('campaign_id').value = '343da04a-85a5-da5e-0291-50cfa02f86b9';
	document.getElementById('team_id').value = '1';
	document.getElementById('assigned_user_id').value = '650334be-6175-86b8-b4dd-50d4c2004923';
}

				document.WebToLeadForm.action = PostEntry;
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
}