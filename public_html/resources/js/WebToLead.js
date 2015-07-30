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
        	console.log(req_fields[i]);
          if(document.getElementById(req_fields[i]).value.length <=0 || document.getElementById(req_fields[i]).value==0){
        	console.log(req_fields[i]);
        	console.log(ementById(req_fields[i]).value);
           req = false;
           break;
          }
        }
        
        if(req && document.getElementById('human').value == '55' && document.getElementById('name').value == '' && document.getElementById('first_name').value != document.getElementById('last_name').value){
try{
	var i;
var EMEAarray = ['GB','AF','AL','DZ','AD','AO','AQ','AM','AT','AZ','BH','BY','BE','BJ','BM','BO','BA','BW','BV','IO','BG','BF','BI','CM','CV','CF','TD','CX','CC','KM','CG','CG','CK','HR','CY','CZ','DK','DJ','EG','GQ','ER','EE','ET','FK','FO','FI','FR','GF','PF','TF','GA','GM','GE','DE','GH','GI','GR','GL','GN','GW','HM','VA','HU','IS','IR','IQ','IE','IL','IT','JO','KZ','KE','KI','KW','KG','LV','LB','LS','LR','LY','LI','LT','LU','MK','MG','MW','MV','ML','MT','MR','MU','YT','MD','MC','MN','MA','MZ','MM','NA','NR','NL','NL','NC','NE','NG','NU','NF','MP','NO','OM','PS','PG','PY','PE','PL','PT','QA','RE','RO','RU','RW','SH','KN','LC','VC','SM','ST','SA','SN','RS','SC','SL','SK','SI','SB','SO','ZA','GS','ES','SD','SR','SJ','SZ','SE','CH','SY','TJ','TZ','TG','TO','TN','TR','TM','TC','UA','AE','GB','UZ','EH','YE','ZM','ZW','AS'];
var APAC1Array = ['AU','BD','BT','BN','KH','FJ','IN','JP','KP','KR','LA','FM','NP','NZ','PK','PW','PN','SG','LK','TH','TL','TK','VN'];
var APAC2Array = ['CN'];
var APAC3Array = ['ID', 'MY', 'PH'];
var APAC4Array = ['HK', 'MO', 'TW'];
var LAArray = ['AI','AG','AR','AW','BS','BB','BZ','BR','KY','CL','CO','CR','CU','DM','DO','EC','SV','GD','GP','GU','GT','GY','HT','HN','JM','MH','MQ','MX','MS','NI','PA','PR','PM','WS','TT','TV','UG','UM','UY','VU','VE','VG','VI','WF'];
var CANADAArray = ['CA'];
//No TAM Array includes CA or NV because they are split between TAM3 and TAM8.
//TAM8 does not have any whole states, so no TAM8Array.
var TAM1Array = ['CT ', 'ME', 'MA', 'NH', 'NJ', 'NY', 'PA', 'RI', 'VT'];
var TAM2Array = ['IL', 'IN', 'IA', 'MI', 'MN', 'MO', 'OH', 'WI', 'WV'];
var TAM3Array = ['AK', 'HI', 'ID ', 'MT', 'ND ', 'OR', 'SD', 'WA', 'WY'];
var TAM4Array = ['AR', 'CO', 'KS', 'LA', 'NE', 'NM', 'OK', 'TX', 'UT'];
var TAM5Array = ['AZ'];
var TAM6Array = ['DC', 'DE', 'KY', 'MD', 'NC', 'SC', 'TN', 'VA'];
var TAM7Array = ['AL', 'FL', 'GA', 'MS'];
console.log(document.getElementById('primary_address_state').value);
	
var EMEAindex = EMEAarray.indexOf(document.getElementById('primary_address_country').value);
var LAindex = LAArray.indexOf(document.getElementById('primary_address_country').value);
var APAC1index = APAC1Array.indexOf(document.getElementById('primary_address_country').value);
var APAC2index = APAC2Array.indexOf(document.getElementById('primary_address_country').value);
var APAC3index = APAC3Array.indexOf(document.getElementById('primary_address_country').value);
var APAC4index = APAC4Array.indexOf(document.getElementById('primary_address_country').value);
var CANADAindex = CANADAArray.indexOf(document.getElementById('primary_address_country').value);
console.log(2);
var TAM1index = TAM1Array.indexOf(document.getElementById('primary_address_state').value);
var TAM2index = TAM2Array.indexOf(document.getElementById('primary_address_state').value);
var TAM3index = TAM3Array.indexOf(document.getElementById('primary_address_state').value);
var TAM4index = TAM4Array.indexOf(document.getElementById('primary_address_state').value);
var TAM5index = TAM5Array.indexOf(document.getElementById('primary_address_state').value);
var TAM6index = TAM6Array.indexOf(document.getElementById('primary_address_state').value);
var TAM7index = TAM7Array.indexOf(document.getElementById('primary_address_state').value);
var TAM8index = 0;


	//Indexes for North and South California.
	var NOCAindex = 0;
	var SOCAindex = 0;

	//Test for N/S California Zip code matches.  If doesn't match zip, but is CA, then is assigned to Tam3.
	if(document.getElementById('primary_address_postalcode') && document.getElementById('primary_address_postalcode').value.length >=5) {
		if(document.getElementById('primary_address_postalcode').value.match(/9[0-3][0-5]\d{2}(\-\d{4})?/) != null){
			SOCAindex = 1;
		}else if(document.getElementById('primary_address_postalcode').value.match(/9(3[6-9]|[4,5]\d|[6][0,1])\d{2}(\-\d{4})?/) != null){
			NOCAindex = 1;
		}else if(document.getElementById('primary_address_state').value == 'CA'){
			TAM3index = 1;
		}
	}else if(document.getElementById('primary_address_state').value == 'CA'){TAM3index = 1;}
	
	//Indexes for North and South Nevada.
	var NONVindex = 0;
	var SONVindex = 0;

	//Test for N/S Nevada Zip code matches.  If doesn't match zip, but is CA, then is assigned to Tam3.
	if(document.getElementById('primary_address_postalcode') && document.getElementById('primary_address_postalcode').value.length >=5) {
		if(document.getElementById('primary_address_postalcode').value.match(/89[0-1]\d{2}(\-\d{4})?/) != null){
			SONVindex = 1;
		}else if(document.getElementById('primary_address_postalcode').value.match(/89[3-8]\d{2}(\-\d{4})?/) != null){
			NONVindex = 1;
		}else if(document.getElementById('primary_address_state').value == 'NV'){
			TAM8index = 1;
		}
	}else if(document.getElementById('primary_address_state').value == 'NV'){TAM8index = 1;}
}

catch (e){
}
var PostEntry = '/resources/forms/contactus.php';
var formName = document.getElementById('campaign_id').value;

switch(formName){

	case "GetAQuote":
		if(EMEAindex >= 0){
			document.getElementById('campaign_id').value = '63760045-10cb-0dec-8ba6-50ec6c2bb9a9';
			document.getElementById('team_id').value = '5553b1b8-f462-596c-954b-50c257c533a1';
			document.getElementById('assigned_user_id').value = 'daa24b5f-2772-185c-7046-50c8cda5e821';
			document.getElementById('name').value = 'http://eur-crm.infocus.com/index.php?entryPoint=WebToLeadCapture';
		}
		else{
			document.getElementById('campaign_id').value = '343da04a-85a5-da5e-0291-50cfa02f86b9';
			document.getElementById('team_id').value = '1';
			document.getElementById('name').value = 'http://abu-crm.infocus.com/index.php?entryPoint=WebToLeadCapture';
			console.log("test");
			if(APAC1index >= 0){document.getElementById('assigned_user_id').value = 'd0549a10-2338-9f5a-87e8-50d4c33758fb';break;}
			if(APAC2index >= 0){document.getElementById('assigned_user_id').value = '86cf9066-29a8-25bb-e266-50d4c29790e6';break;}
			if(APAC3index >= 0){document.getElementById('assigned_user_id').value = '2e4d232d-4bc2-1acc-ee22-50d4c2afb39e';break;}
			if(APAC4index >= 0){document.getElementById('assigned_user_id').value = '650334be-6175-86b8-b4dd-50d4c2004923';break;}
			if((LAindex >= 0)){document.getElementById('assigned_user_id').value = '1477f926-086b-be91-ae45-50802a26ee3b';break;}
			if(CANADAindex >= 0){document.getElementById('assigned_user_id').value = 'b2b5a04a-ad2c-e243-a088-50802a83958e';break;}
			if(TAM1index >= 0){document.getElementById('assigned_user_id').value = 'bd34d2dc-a76f-b2c7-8421-50802aa2ff9f';break;}
			if(TAM2index >= 0){document.getElementById('assigned_user_id').value = 'ee08fe9f-c665-e855-5560-50802a281d26';break;}
			if(TAM3index >= 0){document.getElementById('assigned_user_id').value = 'ed3d36b4-203c-fada-af53-5526d77fd169';break;}
			if(NOCAindex > 0){document.getElementById('assigned_user_id').value = 'ed3d36b4-203c-fada-af53-5526d77fd169';break;}
			if(NONVindex > 0){document.getElementById('assigned_user_id').value = 'ed3d36b4-203c-fada-af53-5526d77fd169';break;}
			if(TAM4index >= 0){document.getElementById('assigned_user_id').value = '19a6c233-f578-8470-20e4-50802af9773f';break;}
			if(TAM5index >= 0){document.getElementById('assigned_user_id').value = 'b7e4e018-5793-b4c9-218e-50802a4deb79';break;}
			if(TAM6index >= 0){document.getElementById('assigned_user_id').value = 'c2a71093-1532-5fb9-14ec-50802a9a99d6';break;}
			if(TAM7index >= 0){document.getElementById('assigned_user_id').value = 'cd393dbf-8091-2077-ec6c-50802a467b51';break;}
			if(TAM8index > 0){document.getElementById('assigned_user_id').value = '168f557a-86fc-255e-a437-556c702134be';break;}
			if(SOCAindex > 0){document.getElementById('assigned_user_id').value = '168f557a-86fc-255e-a437-556c702134be';break;}
			if(SONVindex > 0){document.getElementById('assigned_user_id').value = '168f557a-86fc-255e-a437-556c702134be';break;}
		}
		break;

	case "MPDemo":
		if(EMEAindex >= 0){
			document.getElementById('campaign_id').value = '5439a5b3-ebd7-2f3a-ccdc-50ec6e335e25';
			document.getElementById('team_id').value = '5553b1b8-f462-596c-954b-50c257c533a1';
			document.getElementById('assigned_user_id').value = 'daa24b5f-2772-185c-7046-50c8cda5e821';
			document.getElementById('name').value = 'http://eur-crm.infocus.com/index.php?entryPoint=WebToLeadCapture';
		}
		else{
			document.getElementById('campaign_id').value = '59eeea26-0ad3-374b-7f7f-50cfa327a67c';
			document.getElementById('team_id').value = '1';
			document.getElementById('name').value = 'http://abu-crm.infocus.com/index.php?entryPoint=WebToLeadCapture';

			if(APAC1index >= 0){document.getElementById('assigned_user_id').value = 'd0549a10-2338-9f5a-87e8-50d4c33758fb';break;}
			if(APAC2index >= 0){document.getElementById('assigned_user_id').value = '86cf9066-29a8-25bb-e266-50d4c29790e6';break;}
			if(APAC3index >= 0){document.getElementById('assigned_user_id').value = '2e4d232d-4bc2-1acc-ee22-50d4c2afb39e';break;}
			if(APAC4index >= 0){document.getElementById('assigned_user_id').value = '650334be-6175-86b8-b4dd-50d4c2004923';break;}
			if((LAindex >= 0)){document.getElementById('assigned_user_id').value = '1477f926-086b-be91-ae45-50802a26ee3b';break;}
			if(CANADAindex >= 0){document.getElementById('assigned_user_id').value = 'b2b5a04a-ad2c-e243-a088-50802a83958e';break;}
			if(TAM1index >= 0){document.getElementById('assigned_user_id').value = 'bd34d2dc-a76f-b2c7-8421-50802aa2ff9f';break;}
			if(TAM2index >= 0){document.getElementById('assigned_user_id').value = 'ee08fe9f-c665-e855-5560-50802a281d26';break;}
			if(TAM3index >= 0){document.getElementById('assigned_user_id').value = 'ed3d36b4-203c-fada-af53-5526d77fd169';break;}
			if(NOCAindex > 0){document.getElementById('assigned_user_id').value = 'ed3d36b4-203c-fada-af53-5526d77fd169';break;}
			if(NONVindex > 0){document.getElementById('assigned_user_id').value = 'ed3d36b4-203c-fada-af53-5526d77fd169';break;}
			if(TAM4index >= 0){document.getElementById('assigned_user_id').value = '19a6c233-f578-8470-20e4-50802af9773f';break;}
			if(TAM5index >= 0){document.getElementById('assigned_user_id').value = 'b7e4e018-5793-b4c9-218e-50802a4deb79';break;}
			if(TAM6index >= 0){document.getElementById('assigned_user_id').value = 'c2a71093-1532-5fb9-14ec-50802a9a99d6';break;}
			if(TAM7index >= 0){document.getElementById('assigned_user_id').value = 'cd393dbf-8091-2077-ec6c-50802a467b51';break;}
			if(TAM8index > 0){document.getElementById('assigned_user_id').value = '168f557a-86fc-255e-a437-556c702134be';break;}
			if(SOCAindex > 0){document.getElementById('assigned_user_id').value = '168f557a-86fc-255e-a437-556c702134be';break;}
			if(SONVindex > 0){document.getElementById('assigned_user_id').value = '168f557a-86fc-255e-a437-556c702134be';break;}
		}
			break;


	case "ContactUs":
			if(EMEAindex >= 0){
				document.getElementById('campaign_id').value = '4d9ae97d-6ff2-eb94-28fb-50ec693c1d05';
				document.getElementById('team_id').value = '5553b1b8-f462-596c-954b-50c257c533a1';
				document.getElementById('assigned_user_id').value = 'daa24b5f-2772-185c-7046-50c8cda5e821';
				document.getElementById('name').value = 'http://eur-crm.infocus.com/index.php?entryPoint=WebToLeadCapture';
			}
			break;
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

