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
var EMEAarray = ["United Kingdom", "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antarctica", "Armenia", "Austria", "Azerbaijan", "Bahrain", "Belarus", "Belgium", "Benin", "Bermuda", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Bouvet Island", "British Indian Ocean Territory", "Bulgaria", "Burkina Faso", "Burundi", "Cameroon", "Cape Verde", "Central African Republic", "Chad", "Christmas Island", "Cocos (Keeling) Islands", "Comoros", "Congo", "Congo, The Democratic Republic of The", "Cook Islands", "C?te d?Ivoire", "Croatia", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Egypt", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Finland", "France", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Guinea", "Guinea-bissau", "Heard Island and Mcdonald Islands", "Holy See (Vatican City State)", "Hungary", "Iceland", "Iran, Islamic Republic of", "Iraq", "Ireland", "Israel", "Italy", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Maldives", "Mali", "Malta", "Mauritania", "Mauritius", "Mayotte", "Moldova, Republic of", "Monaco", "Mongolia", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Netherlands", "Netherlands Antilles", "New Caledonia", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Palestinian Territory, Occupied", "Papua New Guinea", "Paraguay", "Peru", "Poland", "Portugal", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and The Grenadines", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and The South Sandwich Islands", "Spain", "Sudan", "Suriname", "Svalbard and Jan Mayen", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Tajikistan", "Tanzania, United Republic of", "Togo", "Tonga", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Ukraine", "United Arab Emirates", "United Kingdom", "Uzbekistan", "Western Sahara", "Yemen", "Zambia", "Zimbabwe"];
var LatinArray = ["American Samoa", "Anguilla", "Antigua and Barbuda", "Argentina", "Aruba", "Bahamas", "Barbados", "Belize", "Brazil", "Canada", "Cayman Islands", "Chile", "Colombia", "Costa Rica", "Cuba", "Dominica", "Dominican Republic", "Ecuador", "El Salvador", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guyana", "Haiti", "Honduras", "Jamaica", "Marshall Islands", "Martinique", "Mexico", "Montserrat", "Nicaragua", "Panama", "Puerto Rico", "Saint Pierre and Miquelon", "Samoa", "Trinidad and Tobago", "Tuvalu", "Uganda", "United States Minor Outlying Islands", "Uruguay", "Vanuatu", "Venezuela", "Virgin Islands, British", "Virgin Islands, U.S.", "Wallis and Futuna"];
var APACArray = ["Australia", "Bangladesh", "Bhutan", "Brunei Darussalam", "Cambodia", "Fiji", "India", "Japan", "Korea, Democratic People's Republic of", "Korea, Republic of", "Lao People's Democratic Republic", "Micronesia, Federated States of", "Nepal", "New Zealand", "Pakistan", "Palau", "Pitcairn", "Singapore", "Sri Lanka", "Thailand", "Timor-leste", "Tokelau", "Viet Nam"];
var CANADAArray = ["Canada"];
var TAM1Array = ["CT ", "ME", "MA", "NH", "NJ", "NY", "PA", "RI", "VT"];
var TAM2Array = ["IL", "IN", "IA", "MI", "MN", "MO", "OH", "WI"];
var TAM3Array = ["AK", "CA", "HI", "ID ", "MT", "NV", "ND ", "OR", "SD", "WA", "WY"];
var TAM4Array = ["AR", "CO", "KS", "LA", "NE", "NM", "OK", "TX", "UT"];
var TAM5Array = ["AZ"];
var TAM6Array = ["DC", "DE", "KY", "MD", "NC", "SC", "TN", "VA", "WV"];
var TAM7Array = ["AL", "FL", "GA", "MS"];
var EMEAindex = EMEAarray.indexOf(document.getElementById('primary_address_country').value);
var Latinindex = LatinArray.indexOf(document.getElementById('primary_address_country').value);
var APACindex = APACArray.indexOf(document.getElementById('primary_address_country').value);
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
var PostEntry = "https://abu-crm.infocus.com/index.php?entryPoint=WebToLeadCapture";
// ContactUsEMEA = "4d9ae97d-6ff2-eb94-28fb-50ec693c1d05";
// GetAQuoteEMEA = "63760045-10cb-0dec-8ba6-50ec6c2bb9a9";
// MondopadDemoEMEA = "5439a5b3-ebd7-2f3a-ccdc-50ec6e335e25";
// EMEAUser = "daa24b5f-2772-185c-7046-50c8cda5e821";
// EMEATeam = "5553b1b8-f462-596c-954b-50c257c533a1";
// ContactUs = "d1727fac-f327-484c-823a-50be6f119a74";
// GetAQuote = "343da04a-85a5-da5e-0291-50cfa02f86b9";
// MondopadDemo = "59eeea26-0ad3-374b-7f7f-50cfa327a67c";
var ZLin = "59b83da4-9358-68a1-a64a-50d4c3ed2d4d";
var SChan = "650334be-6175-86b8-b4dd-50d4c2004923";
var JZhang = "86cf9066-29a8-25bb-e266-50d4c29790e6";
var FTan = "2e4d232d-4bc2-1acc-ee22-50d4c2afb39e";
var MSwan = "9c7b47a8-0778-124a-e970-50802a366727";
var TWang = "d0549a10-2338-9f5a-87e8-50d4c33758fb";
var AParker = "8718cfa7-2ecf-7804-39c3-50802a1ee288";
var EGarcia = "81af28fd-bb22-db27-15ef-50802ad925dc";
var WMagalei = "917b0b22-a0fc-614b-59e9-50802a2b4b0d";
var SLargent = "19a6c233-f578-8470-20e4-50802af9773f";
var DWait = "b7e4e018-5793-b4c9-218e-50802a4deb79";
var ELookenott = "c2a71093-1532-5fb9-14ec-50802a9a99d6";
var JGriffiths = "cd393dbf-8091-2077-ec6c-50802a467b51";
var JFell = "c7e87367-bb71-1062-4983-50802a885554";
var DMiner = "bd34d2dc-a76f-b2c7-8421-50802aa2ff9f";

			if(EMEAindex >= 0){
			
				switch (document.getElementById('campaign_id').value)
				{
					case "d1727fac-f327-484c-823a-50be6f119a74":
						document.getElementById('campaign_id').value = "4d9ae97d-6ff2-eb94-28fb-50ec693c1d05";
						break;
					case "343da04a-85a5-da5e-0291-50cfa02f86b9":
						document.getElementById('campaign_id').value = "63760045-10cb-0dec-8ba6-50ec6c2bb9a9";
						break;
					case "59eeea26-0ad3-374b-7f7f-50cfa327a67c":
						document.getElementById('campaign_id').value = "5439a5b3-ebd7-2f3a-ccdc-50ec6e335e25";
						break;
				}
						document.getElementById('assigned_user_id').value = "daa24b5f-2772-185c-7046-50c8cda5e821";
						document.getElementById('team_id').value = "5553b1b8-f462-596c-954b-50c257c533a1";
						PostEntry = "https://eur-crm.infocus.com/index.php?entryPoint=WebToLeadCapture";
			}
			else if (APACindex >= 0){
				document.getElementById('assigned_user_id').value = TWang;
			}
			else if (document.getElementById('primary_address_country').value == 'China'){
				document.getElementById('assigned_user_id').value = JZhang;
			}
			else if (document.getElementById('primary_address_country').value == 'Indonesia' || document.getElementById('primary_address_country').value == 'Malaysia' || document.getElementById('primary_address_country').value == 'Philippines'){
				document.getElementById('assigned_user_id').value = FTan;
			}
			else if (document.getElementById('primary_address_country').value == 'Hong Kong' || document.getElementById('primary_address_country').value == 'Macao' || document.getElementById('primary_address_country').value == 'Taiwan, Province of China'){
				document.getElementById('assigned_user_id').value = SChan;
			}
			else if (CANADAindex >= 0){
				document.getElementById('assigned_user_id').value = JFell;
			}

			else if (TAM1index >= 0){
				document.getElementById('assigned_user_id').value = DMiner;
			}

			else if (TAM2index >= 0){
				document.getElementById('assigned_user_id').value = EGarcia;
			}

			else if (TAM3index >= 0){
				document.getElementById('assigned_user_id').value = WMagalei;
			}

			else if (TAM4index >= 0){
				document.getElementById('assigned_user_id').value = SLargent;
			}

			else if (TAM5index >= 0){
				document.getElementById('assigned_user_id').value = DWait;
			}

			else if (TAM6index >= 0){
				document.getElementById('assigned_user_id').value = ELookenott;
			}

			else if (TAM7index >= 0){
				document.getElementById('assigned_user_id').value = JGriffiths;
			}
			
			else {
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
	document.getElementById('human').value = "55";
}