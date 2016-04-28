function formElementSerializers() { function input(element) { switch (element.type.toLowerCase()) { case 'checkbox': case 'radio': return inputSelector(element); default: return valueSelector(element); } };
function inputSelector(element) { return element.checked ? element.value : null; };
function valueSelector(element) { return element.value; };
function select(element) { return (element.type === 'select-one' ? selectOne : selectMany)(element); };
function selectOne(element) { var index = element.selectedIndex; return index < 0 ? null : optionValue(element.options[index]); };
function selectMany(element) { var length = element.length; if (!length) return null; var values = []; for (var i = 0; i < length; i++) { var opt = element.options[i]; if (opt.selected) values.push(optionValue(opt)); } return values; };
function optionValue(opt) { if (document.documentElement.hasAttribute) return opt.hasAttribute('value') ? opt.value : opt.text; var element = document.getElementById(opt); if (element && element.getAttributeNode('value')) return opt.value; else return opt.text; };
return { input: input, inputSelector: inputSelector, textarea: valueSelector, select: select, selectOne: selectOne, selectMany: selectMany, optionValue: optionValue, button: valueSelector };
};
var requiredFields = new Array(); 
var requiredFieldGroups = new Array(); 
addRequiredField = function (id) { console.log(requiredFields);requiredFields.push (id); };
addRequiredFieldGroup = function (id, count) { requiredFieldGroups.push ([id, count]); };
missing = function (fieldName) { 
console.log(fieldName);
var f = document.getElementById(fieldName); 
var v = formElementSerializers()[f.tagName.toLowerCase()](f);
if (v) { v = v.replace (/^\s*(.*)/, "$1"); v = v.replace (/(.*?)\s*$/, "$1"); } if (!v) { f.style.backgroundColor = '#FFFFCC'; return 1; } else { f.style.backgroundColor = ''; return 0; } };
missingGroup = function (fieldName, count) { 
var result = 1; 
var color = '#FFFFCC'; 
for (var i = 0; i < count; i++) { 
if (document.getElementById(fieldName+'-'+i).checked) { 
color = ''; result = 0; 
break; } } 
for (var i = 0; i < count; i++) 
	document.getElementById(fieldName+'-'+i).parentNode.style.backgroundColor = color; return result; 
};
var validatedFields = new Array(); 
addFieldToValidate = function (id, validationType, arg1, arg2) { 
validatedFields.push ([ id, validationType, arg1, arg2 ]); 
};
validateField = function (id, fieldValidationValue, arg1, arg2) { 
var field = document.getElementById(id); 
var name = field.name; 
var value = formElementSerializers()[field.tagName.toLowerCase()](field); 
for (var i = 0; i < validators.length; i++) { 
var validationDisplay = validators[i][3]; 
var validationValue = validators[i][1]; 
var validationFunction	= validators[i][2]; 
if (validationValue === fieldValidationValue) { 
if (!validationFunction (value,arg1,arg2,id)) {	
field.style.backgroundColor = '#FFFFCC'; 
alert (validationDisplay); 
return false; } else { field.style.backgroundColor = ''; } 
break; } } for (var i = 0; i < implicitValidators.length; i++) { 
var validationDisplay = implicitValidators[i][0]; 
var validationValue = implicitValidators[i][1];
 var validationFunction	= implicitValidators[i][2]; 
 if (validationValue === fieldValidationValue) { 
 if (!validationFunction (value,arg1,arg2,id)) { 
 field.style.backgroundColor = '#FFFFCC'; alert (validationDisplay); 
 return false; 
 } else { field.style.backgroundColor = ''; } 
 break; 
 } } 
 return true; };

var r = ''; 
formElementById = function(form, id) { for (var i = 0; i < form.length; ++i) if (form[i].id === id) return form[i]; 
return null;
 };
var ABUArray = ['CU','HT','DO','JM','TT','BS','BB','LC','VC','GD','AG','DM','KN','PR','GP','MQ','CW','AW','VI','KY','SX','TC','MF','VG','BQ','AL','BL','MS','MX','BZ','CR','SV','GT','HN','NI','PA','AR','BO','BR','CL','CO','EC','GY','PY','PE','SR','UY','VE','GF','FK','CA','US'];
var APACArray = ['AU','BD','BT','BN','KH','FJ','IN','JP','KP','KR','LA','FM','NP','NZ','PK','PW','PN','SG','LK','TH','TL','TK','VN','CN','ID', 'MY', 'PH','HK', 'MO', 'TW'];
doSubmit = function(form,ABUurl,EMEAurl,APACurl) { 
EMEAurl = (typeof(EMEAurl) == 'undefined' ? ABUurl : EMEAurl);
APACurl = (typeof(APACurl) == 'undefined' ? ABUurl : APACurl);
console.log(ABUurl);
console.log(EMEAurl);
console.log(APACurl);

try { 
if (typeof(customSubmitProcessing) === "function") customSubmitProcessing();
 } catch (err) { } 
		  var ao_jstzo = formElementById(form, "ao_jstzo");
	 if(typeof(ao_jstzo) != 'undefined' && ao_jstzo != null){
		 if (ao_jstzo) ao_jstzo.value = new Date().getTimezoneOffset();
	 }

 var submitButton = document.getElementById(form.id+'_ao_submit_button');
 submitButton.style.visibility = 'hidden';
 var missingCount = 0;
 for (var i = 0; i < requiredFields.length; i++) 
	 if (requiredFields[i].indexOf(form.id+'_') === 0) missingCount += missing (requiredFields[i]);
 for (var i = 0; i < requiredFieldGroups.length; i++) 
	 if (requiredFieldGroups[i][0].indexOf(form.id+'_') === 0) missingCount += missingGroup (requiredFieldGroups[i][0], requiredFieldGroups[i][1]);
 if (missingCount > 0) { 
 alert ('Please fill all required fields. ');
 submitButton.style.visibility = 'visible';
 return; } 
 for (var i = 0; i < validatedFields.length; i++) { 
 var ff = validatedFields[i];
 if (ff[0].indexOf(form.id+'_') === 0 && !validateField (ff[0], ff[1], ff[2], ff[3])) { 
 document.getElementById(ff[0]).focus();
 submitButton.style.visibility = 'visible';
 return; 
 } } 
 var aop = document.getElementById("ao_p");
	 if(typeof(aop) != 'undefined' && aop != null){
		 if (formElementById(form, 'ao_p').value === '1') { 
		 submitButton.style.visibility = 'visible';
		 return; } 
	 }


 var aobot = document.getElementById("ao_bot");
	 if(typeof(aobot) != 'undefined' && aobot != null){
		 formElementById(form, 'ao_bot').value = 'nope';
	 }


 var submitCountry = document.getElementById(form.id).elements["Business Country"].value;
 console.log(submitCountry);
 if(ABUArray.indexOf(submitCountry) >= 0){form.action = ABUurl;}
 else if(APACArray.indexOf(submitCountry) >= 0){form.action = APACurl;}
 else{form.action = EMEAurl;}
 
 if(document.getElementById("name").value != ''){console.log("detected as bot");return;}
 
 if(sameDomain(form.action)){sendDataXML(form.id,form.action)}
 else{sendDataFrame(form.id)}
 var clearValue = document.getElementById("clear");
 var clearField = document.getElementById("clearContainer")
 	 console.log(form);
if(typeof(clearValue) != 'undefined'){
	 console.log("clear true");
	 if(typeof(clearField) != 'undefined' && clearValue != null){document.getElementById('clearContainer').innerHTML = document.getElementById("clear").value;}
	 else{document.getElementById("clearContainer").innerHTML = document.getElementById("clear").value;	 console.log("else true");
}
     parent.$.colorbox.resize({
        innerWidth:'300px',
        innerHeight:'120px'
    });
}
};

function sameDomain(url) {
    var prefix = /^https?:\/\//i;
    var domain = /^[^\/]+/;
    // remove any prefix
    url = url.replace(prefix, "");
    // assume any URL that starts with a / is on the current page's domain
    if (url.charAt(0) === "/") {
        return true;
    }
    // now extract just the domain
    var match = url.match(domain);
    if (match) {
        return(match[0] == window.location.hostname);
    }
    return(null);
}
function sendDataFrame(form){
	var iframe = document.createElement("iframe");
	iframe.name = "formTarget";
	iframe.style.display = "none";
	document.body.appendChild(iframe);
	document.getElementById(form).target = iframe.name;
	document.getElementById(form).submit();
}
function sendDataXML(formid,url) {

    var XHR = new XMLHttpRequest();
    form = document.getElementById(formid);
    // We bind the FormData object and the form element
    var FD  = new FormData(form);
	
	XHR.open("POST", url);
    XHR.send(FD);
  }


//	Modified from http://javascript.internet.com/forms/check-email.html

isEmailAddress = function(emailStr) 
	{
	var tlds = [ 'ac','academy','accountants','active','actor','ad','ae','aero','af','ag','agency','ai','airforce',
        'al','am','an','ao','aq','ar','archi','army','arpa','as','asia','associates','at','attorney','au','auction',
        'audio','autos','aw','ax','axa','az','ba','bar','bargains','bayern','bb','bd','be','beer','berlin','best',
        'bf','bg','bh','bi','bid','bike','bio','biz','bj','black','blackfriday','blue','bm','bmw','bn','bo','boutique',
        'br','brussels','bs','bt','build','builders','buzz','bv','bw','by','bz','bzh','ca','cab','camera','camp',
        'cancerresearch','capetown','capital','cards','care','career','careers','cash','cat','catering','cc','cd',
        'center','ceo','cf','cg','ch','cheap','christmas','church','ci','citic','city','ck','cl','claims','cleaning',
        'clinic','clothing','club','cm','cn','co','codes','coffee','college','cologne','com','community','company',
        'computer','condos','construction','consulting','contractors','cooking','cool','coop','country','cr','credit',
        'creditcard','cruises','cu','cuisinella','cv','cw','cx','cy','cz','dance','dating','de','deals','degree',
        'democrat','dental','dentist','desi','diamonds','digital','direct','directory','discount','dj','dk','dm',
        'dnp','do','domains','durban','dz','ec','edu','education','ee','eg','email','engineer','engineering',
        'enterprises','equipment','er','es','estate','et','eu','eus','events','exchange','expert','exposed','fail',
        'farm','feedback','fi','finance','financial','fish','fishing','fitness','fj','fk','flights','florist','fm',
        'fo','foo','foundation','fr','frogans','fund','furniture','futbol','ga','gal','gallery','gb','gd','ge','gent',
        'gf','gg','gh','gi','gift','gives','gl','glass','global','globo','gm','gmo','gn','gop','gov','gp','gq','gr',
        'graphics','gratis','green','gripe','gs','gt','gu','guide','guitars','guru','gw','gy','hamburg','haus','hiphop',
        'hiv','hk','hm','hn','holdings','holiday','homes','horse','host','house','hr','ht','hu','id','ie','il','im',
        'immobilien','in','industries','info','ink','institute','insure','int','international','investments','io','iq',
        'ir','is','it','je','jetzt','jm','jo','jobs','joburg','jp','juegos','kaufen','ke','kg','kh','ki','kim','kitchen',
        'kiwi','km','kn','koeln','kp','kr','krd','kred','kw','ky','kz','la','lacaixa','land','lawyer','lb','lc','lease',
        'lgbt','li','life','lighting','limited','limo','link','lk','loans','london','lotto','lr','ls','lt','lu','luxe',
        'luxury','lv','ly','ma','maison','management','mango','market','marketing','mc','md','me','media','meet',
        'melbourne','menu','mg','mh','miami','mil','mini','mk','ml','mm','mn','mo','mobi','moda','moe','monash',
        'mortgage','moscow','motorcycles','mp','mq','mr','ms','mt','mu','museum','mv','mw','mx','my','mz','na','nagoya',
        'name','navy','nc','ne','net','neustar','nf','ng','ngo','nhk','ni','ninja','nl','no','np','nr','nra','nrw','nu',
        'nyc','nz','okinawa','om','onl','org','organic','ovh','pa','paris','partners','parts','pe','pf','pg','ph',
        'photo','photography','photos','physio','pics','pictures','pink','pk','pl','place','plumbing','pm','pn','post',
        'pr','press','pro','productions','properties','ps','pt','pub','pw','py','qa','qpon','quebec','re','recipes',
        'red','rehab','reise','reisen','ren','rentals','repair','report','republican','rest','reviews','rich','rio','ro',
        'rocks','rodeo','rs','ru','ruhr','rw','ryukyu','sa','saarland','sb','sc','scb','schmidt','schule','scot','sd',
        'se','services','sexy','sg','sh','shiksha','shoes','si','singles','sj','sk','sl','sm','sn','so','social',
        'software','sohu','solar','solutions','soy','space','spiegel','sr','st','su','supplies','supply','support','surf',
        'surgery','suzuki','sv','sx','sy','systems','sz','tattoo','tax','tc','td','technology','tel','tf','tg','th',
        'tienda','tips','tirol','tj','tk','tl','tm','tn','to','today','tokyo','tools','town','toys','tp','tr','trade',
        'training','travel','tt','tv','tw','tz','ua','ug','uk','university','uno','us','uy','uz','va','vacations','vc',
        've','vegas','ventures','versicherung','vet','vg','vi','viajes','villas','vision','vlaanderen','vn','vodka',
        'vote','voting','voto','voyage','vu','wang','watch','webcam','website','wed','wf','whoswho','wien','wiki','works',
        'ws','wtc','wtf','xn--3bst00m','xn--3ds443g','xn--3e0b707e','xn--45brj9c','xn--4gbrim','xn--55qw42g','xn--55qx5d',
        'xn--6frz82g','xn--6qq986b3xl','xn--80adxhks','xn--80ao21a','xn--80asehdb','xn--80aswg','xn--90a3ac','xn--c1avg',
        'xn--cg4bki','xn--clchc0ea0b2g2a9gcd','xn--czr694b','xn--czru2d','xn--d1acj3b','xn--fiq228c5hs','xn--fiq64b',
        'xn--fiqs8s','xn--fiqz9s','xn--fpcrj9c3d','xn--fzc2c9e2c','xn--gecrj9c','xn--h2brj9c','xn--i1b6b1a6a2e',
        'xn--io0a7i','xn--j1amh','xn--j6w193g','xn--kprw13d','xn--kpry57d','xn--kput3i','xn--l1acc','xn--lgbbat1ad8j',
        'xn--mgb9awbf','xn--mgba3a4f16a','xn--mgbaam7a8h','xn--mgbab2bd','xn--mgbayh7gpa','xn--mgbbh1a71e',
        'xn--mgbc0a9azcg','xn--mgberp4a5d4ar','xn--mgbx4cd0ab','xn--ngbc5azd','xn--nqv7f','xn--nqv7fs00ema','xn--o3cw4h',
        'xn--ogbpf8fl','xn--p1ai','xn--pgbs0dh','xn--q9jyb4c','xn--rhqv96g','xn--s9brj9c','xn--ses554g','xn--unup4y',
        'xn--wgbh1c','xn--wgbl6a','xn--xkc2al3hye2a','xn--xkc2dl3a5ee0h','xn--yfro4i67o','xn--ygbi2ammx','xn--zfr164b',
        'xxx','xyz','yachts','yandex','ye','yokohama','yt','za','zm','zone','zw' ];

	/*
	if (ao__emailRolePat == undefined)
		var ao__emailRolePat =/^(abuse|admin|administrator|anti-spam|antispam|billing|contact|customerservice|designer|info|hostmaster|lawyer|mail-daemon|mail-deamon|marketing|no-reply|noreplies|noreply|nospam|postmaster|returns|root|sales|spam|support)$/
	*/

	//	The following pattern is used to check if the entered email address
 	//	fits the user@domain format.  It also is used to separate the username
  	//	from the domain.
	var emailPat=/^(.+)@(.+)$/i
	
	//	The following string represents the pattern for matching all special
	//	characters.  We don't want to allow special characters in the address. 
	//	This includes ( ) < > @ , ; : \ " . [ ] */ and non-english characters
	var specialChars="\\(\\)<>@,;:¿ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõö÷øùúûüýþÿ\\\\\\\"\\.\\[\\]"

	//	The following string represents the range of characters allowed in a 
	//	username or domainname.  It really states which chars aren't allowed. */
	var validChars="\[^\\s" + specialChars + "\]"
	
	//	The following pattern applies if the "user" is a quoted string (in
	//	which case, there are no rules about which characters are allowed
	//	and which aren't; anything goes).  E.g. "jiminy cricket"@disney.com
	//	is a legal email address. */
	var quotedUser="(\"[^\"]*\")"
	
	//	The following pattern applies for domains that are IP addresses,
	//	rather than symbolic names.  E.g. joe@[123.124.233.4] is a legal
	//	email address. NOTE: The square brackets are required. */
	var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
	
	//	The following string represents an atom (basically a series of
	//	non-special characters.) */
	var atom=validChars + '+'
	
	//	The following string represents one word in the typical username.
	//	For example, in john.doe@somewhere.com, john and doe are words.
	//	Basically, a word is either an atom or quoted string. */
	var word="(" + atom + "|" + quotedUser + ")"
	
	// The following pattern describes the structure of the user
	var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
	
	//	The following pattern describes the structure of a normal symbolic
	//	domain, as opposed to ipDomainPat, shown above. */
	var domainPat=new RegExp(/^([a-zA-Z0-9][a-zA-Z0-9.-]*\.)[a-zA-Z]{2,}?$/)

	//	Finally, let's start trying to figure out if the supplied address is
	//	valid.

	//	Begin with the coarse pattern to simply break up user@domain into
	//	different pieces that are easy to analyze.
	var matchArray=emailStr.match(emailPat)
	if (matchArray==null) 
		{
	  	//	Too many/few @'s or something; basically, this address doesn't
	    //	even fit the general mould of a valid email address.
		return false
		}
	var user=matchArray[1]

	var domain=matchArray[2]

	//	See if "user" is valid 
	if (user.match(userPat)==null) 
		{
	    //	User is not valid
	    return false
		}

	/*
	if (user.match( ao__emailRolePat )!= null)
		{
		return false;
		}
	*/

	//	if the email address is at an IP address (as opposed to a symbolic
	//	host name) make sure the IP address is valid.
	var IPArray=domain.match(ipDomainPat)
	if (IPArray!=null) 
		{
	    // this is an IP address
		for (var i=1;i<=4;i++) 
			{
		    if (IPArray[i]>255) 
		    	{
				return false
			    }
	 		}
	    return true
		}

	//	Domain is symbolic name
	
	//	Special handling of localhost situation
	if (domain == "localhost")
		return true;
	
	var domainArray=domain.match(domainPat)
	if (domainArray==null) 
		{
	    return false
		}

	//	Now we need to break up the domain to get a count of how many atoms
	//	it consists of.

	var atomPat=new RegExp(atom,"g")
	var domArr=domain.match(atomPat)
	var len=domArr.length
	if (len >= 2)
		{
		var sfx = domArr [len-1].toLowerCase()
		for (var i = 0; i < tlds.length; ++i)
			if (sfx == tlds[i])
				return true;
		}

	return false;
	};

//	Field Validators

validateNonBlank = function (value)
	{
	return value.length > 0;
	};
	
validateNumber = function (value)
	{
	return ! isNaN (value);
	};

implicitValidateLength = function ()
	{
	// args: value len arg2 id
	var args = Array.prototype.slice.call(arguments); 
	var value = args[0];
	var len = args[1];

	if (typeof(value) == undefined) return true;
	if (typeof(len) == undefined) return true;

	return value.length < len+1;
	}

implicitValidateNumberRange = function ()
	{
	// args: value lowrange highrange id
	var args = Array.prototype.slice.call(arguments); 
	var value = args[0];
	var lowrange = args[1];
	var highrange = args[2];

	if (isNaN (value)) return false;

	if ((lowrange < value) && (value < hirange))
		return true;

	return false;
	};
	
implicitValidateConfirm = function ()
	{
	// args: value arg1 arg2 id
	var args = Array.prototype.slice.call(arguments); 

	var primaryInput = args[3];
	var secondaryInput = args[3]+'-confirm';

	return document.getElementById(primaryInput).value == document.getElementById(secondaryInput).value;
	};
	
implicitValidateDate = function ()
	{
	// args: value arg1 arg2 id
	var args = Array.prototype.slice.call(arguments); 

	var dateHidden = args[3];

	var dateOutputPattern = document.getElementById(dateHidden+'_pattern').value;

	var MM, dd, day, yy, yyyy;
	var MMField = document.getElementById(dateHidden+'_MM');		if (MMField && MMField.value)		MM = MMField.value;
	var ddField = document.getElementById(dateHidden+'_dd');		if (ddField && ddField.value)		dd = ddField.value;
	var dayField = document.getElementById(dateHidden+'_Day');		if (dayField && dayField.value)		dd = dayField.value;
	var yyField = document.getElementById(dateHidden+'_yy');		if (yyField && yyField.value)		yy = yyField.value;
	var yyyyField = document.getElementById(dateHidden+'_yyyy');	if (yyyyField && yyyyField.value)	yyyy = yyyyField.value;

	if (yyyy != null && yy == null) yy = yyyy % 100;

	if (yy != null && yyyy == null) yyyy = 2000+parseInt(yy);	// remember y2k?

	var daysInMonth = [ 31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];

	if (yyyy != null && MM == 2)
		{
		var febDays;
		if ((yyyy % 400) == 0)
			febDays = 29;
		else if ((yyyy % 100) == 0)
			febDays = 28;
		else if ((yyyy % 4) == 0)
			febDays = 29;
		else
			febDays = 28;
		if (dd > febDays)
			return false;
		}
	else if (dd > daysInMonth[MM-1])
		return false;

	var MMM = MM != null ? [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ][MM-1] : null;

	var MMMMM = MM != null ? [ 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ][MM-1] : null;

	var E = null;

	if (yyyy != null && MM != null && dd != null) E = new Date(yyyy, MM-1, dd).getDay();

	var EEE = E != null ? [ 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat' ][E] : null;

	var EEEEEEE = E != null ? [ 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ][E] : null;

	var result = '';

	switch (dateOutputPattern)
	{
	case "MM/dd/yyyy":				if (MM && dd)    result = MM+'/'+dd+(yyyy != null ? '/'+yyyy : '');												break;
	case "dd/MM/yyyy":				if (dd && MM)    result = dd+'/'+MM+(yyyy != null ? '/'+yyyy : '');												break;
	case "MM/dd/yy":				if (MM && dd)    result = MM+'/'+dd+(yy != null ? '/'+yy : '');													break;
	case "dd/MM/yy":				if (dd && MM)    result = dd+'/'+MM+(yy != null ? '/'+yy : '');													break;
	case "yyyy/MM/dd":				if (MM && dd)    result = (yyyy != null ? yyyy+'/' : '')+MM+'/'+dd;												break;
	case "MM-dd-yyyy":				if (MM && dd)    result = MM+'-'+dd+(yyyy != null ? '-'+yyyy : '');												break;
	case "dd-MM-yyyy":				if (dd && MM)    result = dd+'-'+MM+(yyyy != null ? '-'+yyyy : '');												break;
	case "MM-dd-yy":				if (MM && dd)    result = MM+'-'+dd+(yy != null ? '-'+yy : '');													break;
	case "dd-MM-yy":				if (dd && MM)    result = dd+'-'+MM+(yy != null ? '-'+yy : '');													break;
	case "yyyy-MM-dd":				if (MM && dd)    result = (yyyy != null ? yyyy+'-' : '')+MM+'-'+dd;												break;
	case "dd MMM yyyy":				if (dd && MMM)   result = dd+' '+MMM+(yyyy != null ? ' '+yyyy : '');											break;
	case "MMM dd yyyy":				if (MMM && dd)   result = MMM+' '+dd+(yyyy != null ? ' '+yyyy : '');											break;
	case "dd MMMMM yyyy":			if (dd && MMMMM) result = dd+' '+MMMMM+(yyyy != null ? ' '+yyyy : '');											break;
	case "EEE, dd MMM yyyy":		if (dd && MMM)   result = (EEE != null ? EEE+', ' : '')+dd+' '+MMM+(yyyy != null ? ' '+yyyy : '');				break;
	case "EEEEEEE, dd MMMMM yyyy":	if (dd && MMMMM) result = (EEEEEEE != null ? EEEEEEE+', ' : '')+dd+' '+MMMMM+(yyyy != null ? ' '+yyyy : '');	break;
	}

	document.getElementById(dateHidden).value = result;

	return true;
	};

deconstructDate = function(dateHidden)
	{
	var dateValue = document.getElementById(dateHidden).value;

	var dateOutputPattern = document.getElementById(dateHidden+'_pattern').value;

	var MM, MMM, MMMMM, dd, yy, yyyy;

	var MMMs = [ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' ];

	var MMMMMs = [ 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ];

	switch (dateOutputPattern)
	{
	case "MM-dd-yyyy":
	case "MM/dd/yyyy":		
									MM = dateValue.substring(0, 2);
									dd = dateValue.substring(3, 5);
									yyyy = dateValue.substring(6, 10);
									yy = yyyy % 100;
									break;
	case "MM/dd/yy":
	case "MM-dd-yy":
									MM = dateValue.substring(0, 2);
									dd = dateValue.substring(3, 5);
									yy = dateValue.substring(6, 8);
									yyyy = 2000 + yy;	// y2k
									break;
	case "dd/MM/yy":
	case "dd-MM-yy":
									dd = dateValue.substring(0, 2);
									MM = dateValue.substring(3, 5);
									yy = dateValue.substring(6, 8);
									yyyy = 2000 + yy;	// y2k
									break;
	case "yyyy/MM/dd":
	case "yyyy-MM-dd":
									yyyy = dateValue.substring(0, 4);
									MM = dateValue.substring(5, 7);
									dd = dateValue.substring(8, 10);
									yy = yyyy % 100;
									break;
	case "dd/MM/yyyy":
	case "dd-MM-yyyy":
									dd = dateValue.substring(0, 2);
									MM = dateValue.substring(3, 5);
									yyyy = dateValue.substring(6, 10);
									yy = yyyy % 100;
									break;
	case "dd MMM yyyy":
									dd = dateValue.substring(0, 2);
									MMM = dateValue.substring(3, 6);
									MM = 1+MMM.indexOf(MMM);
									if (MM < 10) MM='0'+MM;
									yyyy = dateValue.substring(7, 11);
									yy = yyyy % 100;
									break;
	case "MMM dd yyyy":
									MMM = dateValue.substring(0, 3);
									MM = 1+MMMs.indexOf(MMM);
									if (MM < 10) MM='0'+MM;
									dd = dateValue.substring(4, 6);
									yyyy = dateValue.substring(7, 11);
									yy = yyyy % 100;
									break;
	case "dd MMMMM yyyy":
									dd = dateValue.substring(0, 2);
									MMMMM = dateValue.substring(3, dateValue.length-5);
									MM = 1+MMMMMs.indexOf(MMMMM);
									if (MM < 10) MM='0'+MM;
									yyyy = dateValue(dateValue.length-4, dateValue.length);
									yy = yyyy % 100;
									break;
	case "EEE, dd MMM yyyy":
									dd = dateValue.substring(dateValue.length-11, dateValue.length-9);
									MMM = dateValue.substring(dateValue.length-8, dateValue.length-5);
									MM = 1+MMMs.indexOf(MMM);
									if (MM < 10) MM='0'+MM;
									yyyy = dateValue.substring(dateValue.length-4, dateValue.length);
									yy = yyyy % 100;
									break;
	case "EEEEEEE, dd MMMMM yyyy":
									var ix = dateValue.indexOf(' ');
									dd = dateValue.substring(ix+1, ix+3);
									var iy = dateValue.lastIndexOf(' ');
									MMMMM = dateValue.substring(ix+3, iy);
									MM = 1+MMMMMs.indexOf(MMMMM);
									if (MM < 10) MM='0'+MM;
									yyyy = dateValue.substring(iy+1, iy+5);
									yy = yyyy % 100;
									break;
	}

	if (MM != null)
		{
		var mmE = document.getElementById(dateHidden+'_MM');
		if (mmE) mmE.value = MM;
		}

	if (dd != null)
		{
		var ddE = document.getElementById(dateHidden+'_dd');
		if (ddE) ddE.value = dd;
		var dayE = document.getElementById(dateHidden+'_Day');
		if (dayE) dayE.value = dd;
		}

	var yyE = document.getElementById(dateHidden+'_yy');
	if (yyE && yy != null) yyE.value = yy;

	var yyyyE = document.getElementById(dateHidden+'_yyyy');
	if (yyyyE && yyyy != null) yyyyE.value = yyyy;
	};
	
validateEmail = function (value)
	{
	value = value.replace(/^\s+/, '').replace(/\s+$/, '');
	// Return true if empty or is valid email
	if( value.length > 0 )
		return isEmailAddress(value);
	return true;
	};

validateNoRoleNoPublicEmail = function (value)
	{
	return validateNoPublicEmail(value) && validateNoRoleEmail(value);
	}

var publicEmailPatterns = [
	/@163\.com/i, /@aol\.com/i, /@bellsouth\.net/i, /@btconnect\.com/i, /@charter\.com/i, /@comcast\.net/i,
	/@cox\.net/i, /@earthlink\.net/i, /@email\.com/i, /@gmail\.co/i, /@gmail\.com/i, /@hotmail\.co\.../i, /@hotmail\.com/i,
	/@juno\.com/i, /@mail\.com/i, /@mail\.ru/i, /@mindspring\.com/i, /@msn\.com/i, /@orange\.fr/i, /@rogers\.com/i,
	/@sbcglobal\.net/i, /@shaw\.ca/i, /@sympatico\.ca/i, /@telus\.net/i, /@verizon\.net/i, /@yahoo\.ca/i, /@yahoo\.co\.../i,
	/@yahoo\.com/i, /@ymail\.com/i, /@virgin\.net/i, /@virginmedia\.com/i, /@ntlworld\.com/i, /@blueyonder\.co\.../i];

validateNoPublicEmail = function (value)
	{
	value = value.replace(/^\s+/, '').replace(/\s+$/, '');
	// Return true if empty or is valid email
	if (value.length <= 0)
		return true;

	for (var i = 0; i < publicEmailPatterns.length; ++i)
		if (value.match(publicEmailPatterns[i]))
			return false;

	return isEmailAddress(value);
	};

var roleEmailPatterns = [
	/^abuse@/i, /^admin@/i, /^administrator@/i, /^anti-spam@/i, /^antispam@/i, /^billing@/i, /^contact@/i, /^customerservice@/i,
	/^designer@/i, /^info@/i, /^it@/i, /^hostmaster@/i, /^lawyer@/i, /^mail-daemon@/i, /^mail-deamon@/i, /^marketing@/i,
	/^no-reply@/i, /^noreplies@/i, /^noreply@/i, /^nospam@/i, /^postmaster@/i, /^returns@/i, /^root@/i, /^sales@/i,
	/^spam@/i, /^support@/i ];


validateNoRoleEmail = function (value)
	{
	value = value.replace(/^\s+/, '').replace(/\s+$/, '');
	// Return true if empty or is valid email
	if (value.length <= 0)
		return true;

	for (var i = 0; i < roleEmailPatterns.length; ++i)
		if (value.match(roleEmailPatterns[i]))
			return false;

	return isEmailAddress(value);
	};

function validatePhoneNumberLength(value)
	{
	var digits = value.replace(/[^\d.]/g, "");
	var digitsLength = digits.length;
	return  !(digitsLength < 7 || digitsLength > 15);
	}

validateIntlPhone = function (value)
	{
	if (!value || value.length == 0)
		return true;

	if (!validatePhoneNumberLength(value))
		return false;

	//http://blog.stevenlevithan.com/archives/validate-phone-number
	//var regex = /^\+(?:[0-9] ?){6,14}[0-9]$/;

	// AO-8389
	//http://www.karlhorky.com/2010/07/jquery-international-phone-number.html
	var regex = /^((\+)?[1-9]{1,2})?([-\s\.])?(\(\d\)[-\s\.]?)?((\(\d{1,4}\))|\d{1,4})(([-\s\.])?[0-9]{1,12}){1,2}(\s*(ext|x)\s*\.?:?\s*([0-9]+))?$/;
	return value.match(regex);
	}
	
validateAnyPhone = function (value)
	{
	if (!value || value.length == 0) 
		return true;

	return validateUSPhone(value) || validateIntlPhone(value);
	}
	
validateUSPhone = function (value)
	{
	if (!value || value.length == 0) 
		return true;

	if (!validatePhoneNumberLength(value))
		return false;

	// http://stackoverflow.com/questions/123559/a-comprehensive-regex-for-phone-number-validation
	var regPhone = /^(?:(?:\+?1\s*(?:[.-]\s*)?)?(?:\(\s*([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9])\s*\)|([2-9]1[02-9]|[2-9][02-8]1|[2-9][02-8][02-9]))\s*(?:[.-]\s*)?)?([2-9]1[02-9]|[2-9][02-9]1|[2-9][02-9]{2})\s*(?:[.-]\s*)?([0-9]{4})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/;
	return  value.match(regPhone);
	};
	
//	Field validator registry
//	these are exposed to the end user in the choice dropdown
var	validators = [ 
   	[ "Should be a number",											"NUMBER",		validateNumber,					"Please enter a number." ],
   	[ "Should be a phone number",									"ANYPHONE",		validateAnyPhone,				"Please enter a valid phone number." ],   	
   	[ "Should be an email address",									"EMAIL",		validateEmail,					"Please enter a valid email address." ],
   	[ "Should be a non-role-based email address",					"NREMAIL",		validateNoRoleEmail,			"Please enter a valid, non-role-based email address." ],
   	[ "Should be a non-consumer email address",						"NPEMAIL",		validateNoPublicEmail,			"Please enter a valid, non-consumer email address." ],
   	[ "Should be a non-consumer, and non-role-based email address",	"NPREMAIL",		validateNoRoleNoPublicEmail,	"Please enter a valid, non-consumer, non-role-based email address." ],
   	[ "Should be a US phone number",								"USPHONE",		validateUSPhone,				"Please enter a valid US phone number." ],
   	[ "Should be an international phone number",					"INTLPHONE",	validateIntlPhone,				"Please enter a valid international phone number." ]
 	];

//	these can be used, but are not presented in the dropdown

var implicitValidators = [
	[ "Between range",														"RANGE",		implicitValidateNumberRange	],
	[ "Don't exceed maximum length",										"LENGTH",		implicitValidateLength		],
	[ "Please verify that the highlighted field matches the field below it","CONFIRM",		implicitValidateConfirm		],
	[ "Should be a valid date",												"DATE",			implicitValidateDate		]
	];
	
//	Password Field Checker

doubleCheck = function (idPrimaryField, idCheckerField, idLabel)
	{
	
	var primary = document.getElementById(idPrimaryField);
	var checker = document.getElementById(idCheckerField);
	
	var label   = document.getElementById(idLabel);
	
	if (!primary) return;
	if (!checker) return;
	
	if (primary.value != checker.value)
		label.className = 'formFieldLabelBad';
	else
		label.className = 'formFieldLabelGood';
	};
	
	
//	Text Field Checker

singleCheck = function (idField, validationType, idLabel)
	{
	var value = document.getElementById(idField).value;
	var label = document.getElementById(idLabel);

	if (!value) return;
	
	for (var i = 0; i < validators.length; i++)
		{
		var validationValue 	= validators[i][1];
		var validationFunction	= validators[i][2];

		if (validationValue == validationType)
			{
			if (validationFunction (value))
				label.className = 'formFieldLabelGood';
			else
				label.className = 'formFieldLabelBad';
			break;
			}
		}
	};