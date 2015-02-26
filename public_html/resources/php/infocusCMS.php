<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/login/ubvars.php");


function validateUser($adminList = "admin"){
$adminList=explode(",",$adminList);
$isAdmin = false;
global $ub_group_list;
foreach ($adminList as &$admins) {
	if (in_array($admins,$ub_group_list,TRUE)){
	$isAdmin = true;
	}
}
return $isAdmin;
}

function CMSscript($fileName, $pn, $filepath, $adminList = "admin", $fileExt = ".src", $editableID = "overview", $THB = "true", $SavePageAs = "SavePage", $removeID = "product"){
$adminList=explode(",",$adminList);
$isAdmin = false;
global $ub_group_list;
global $lang;
global $pn;
global $homedir;
foreach ($adminList as &$admins) {
	if (in_array($admins,$ub_group_list,TRUE)){
	$isAdmin = true;
	}
}

if(!empty($_GET[test])){$isAdmin = false;}

if($isAdmin){
$date = date_create();
echo '<script src="/ckeditor/ckeditor.js"></script>';
echo '<script>
$(document).ready(function(){
editableElements();
		$(".upload").colorbox({inline:true, width:"95%", maxWidth:"900px"});
		$(".saveAs").colorbox({inline:true, width:"95%", maxWidth:"900px"});

	
});



	  var sectionHTML = new Array();;
	  var sectionImg = new Array();;
	  var sectionName = new Array();;
	  var sectionTagline = new Array();;
	  var section = new Array();;
	  
function submitOverview(){

	  var pn = "' . $pn . '";
	  var lang = "' . $lang . '";

	  
var	r=confirm("Confirm changes to "	+	pn	+	" for language " + lang + "\n Be aware this will delete/replace all current overview values for this part and language.");
if	(r==true)
		{
		}
else
		{
	return;
		}	

for(name in CKEDITOR.instances)
{
    CKEDITOR.instances[name].destroy()
}

var x = 0;


	  
	  
	  $("#overview > ul > li").each(function(index){
	  

	  
         sectionImg[x] = $(this)[0].children[0].innerHTML;
         sectionHTML[x] = $(this)[0].children[1].innerHTML;
		 section = $(this)[0].children[1].children;
			sectionName[x] = "";
			sectionTagline[x] = "";
		 for(i=0; i<section.length; i++){
			
			if(section[i].className == "name"){
				sectionName[x] = section[i].innerHTML;
				sectionHTML[x] = sectionHTML[x].replace(section[i].outerHTML,"");
			}
			if(section[i].className == "tagline"){
				sectionTagline[x] = section[i].innerHTML;
				sectionHTML[x] = sectionHTML[x].replace(section[i].outerHTML,"");
			}
		 }
		 
		 

		 x=x+1;
      });
	  
	  
	  		 	jQuery.post("/resources/php/overviewsubmit.php",
			{pn: pn,
			lang: lang,
			name: sectionName,
			image: sectionImg,
			tag: sectionTagline,
			html: sectionHTML
			},
			function(response){
			   document.getElementById("results").innerHTML = response;
			});

}









function editableElements() {
    var cmsEdit = document.getElementsByClassName("cmsedit"),
        i = cmsEdit.length;

    while(i--) {
        cmsEdit[i].contentEditable = "true";
    }

    var mysqlEdit = document.getElementsByClassName("mysqledit"),
        i = mysqlEdit.length;

    while(i--) {
        mysqlEdit[i].contentEditable = "true";
    }
}


function saveData(){


	jQuery.post("/resources/php/savepage.php",
		{pn: "' . $pn . '",
		lang: "' . $lang . '",
		title: document.getElementById("pagetitle").innerHTML,
		price: document.getElementById("price").innerHTML,
		header: document.getElementById("header").innerHTML,
		blurb: document.getElementById("blurb").innerHTML,
		list: document.getElementById("list").innerHTML
		},
		function(response){

		});
}


function callHTMLText(){

	var data =  document.getElementById("' . $editableID . '").innerHTML.replace(/data-cke-saved-/g,"");

	data = makeReadable(data);
	document.getElementById("HTMLEdit").value = data;
}

function uploadType(category){

document.getElementById("category").value = category;
}
</script>';
}
}



function CMSHTML($SavePageAs = "SavePage", $adminList = "admin"){
global $ub_group_list;
global $pn;
global $lang;
$adminList=explode(",",$adminList);
$isAdmin = false;
foreach ($adminList as &$admins) {
	if (in_array($admins,$ub_group_list,TRUE)){
	$isAdmin = true;
	}
}
if(!empty($_GET[test])){$isAdmin = false;}

if($isAdmin){

echo '<div style="display:none">
	<div id="inline_HTMLEdit" style="padding:10px; background:#fff;">
		<p><textarea id="HTMLEdit" style="width:100%;height:600px;"></textarea></p>
	</div>
</div>
<form style="position:fixed;left:0;bottom:0;z-index:9999999999;height:50px;width:100%">
	<div style="position:fixed;left:0;bottom:0;z-index:9999999999;">
		<button type="button" class="upload" href="#clone">Clone Product</button>
	</div>
	
	<div style="position:fixed;left:40%;bottom:0;z-index:9999999999;">
	<a target="_blank" href="/resources/images/all" style="">Image Library</a> |<a target="_blank" href="/resources/documents/all" style="margin-left:10px">Document Library</a> |<a target="_blank" href="/resources/videos/all" style="margin-left:10px">Video Library</a><br>
		Uploads<button type="button" style="padding:0px 24px;" class="upload" href="#upload" onclick="$(' . "'#uploadFrame'" . ').slideUp(100);uploadType(' . "'images'" . ')"  style="float:center">Image</button>
		<button type="button" style="padding:0px 24px;" class="upload" href="#upload" onclick="$(' . "'#uploadFrame'" . ').slideUp(100);uploadType(' . "'documents'" . ')"  style="float:center">Document</button>
		<button type="button" style="padding:0px 24px;" class="upload" href="#upload" onclick="$(' . "'#uploadFrame'" . ').slideUp(100);uploadType(' . "'video'" . ')"  style="float:center">Video</button>
	</div>
	<div style="position:fixed;right:0;bottom:0;z-index:9999999999;">
	';
	
	
if($SavePageAs == "SavePage"){
echo '<span id="results"></span>	<button type="button" class="" onclick="submitOverview();saveData()"  style="float:center">Save Page Changes</button>';
}
else{
echo '	<button type="button" class="saveAs" href="#saveAs" onclick="$(' . "'#saveAsFrame'" . ').slideUp(100);"  style="float:center">Save AS</button>';
}
echo '		<iframe src="#" style="display:none;" name="hiddenFrame" id="hiddenFrame"></iframe>
	</div>
</form>

<div style="display:none">
	<div id="upload" >
		<form Target="uploadFrame" action="/resources/php/fileupload.php"  method="post"
		enctype="multipart/form-data" style="padding:10px;">
		<div style="width:300px;display:inline-block">	
			<label class="top">Upload a File</label>
			<input type="file" name="file" id="file"><br>
			<label class="top">File Category</label>
			<input type="text" id="category" name="file_category" readonly></br>
			<label class="top">Override upload filename</label>
			<input type="text" name="file_override"><br><br>

			<div style="position:relative"><input type="checkbox" class="css-checkbox" id="fileow" name="file_overwrite" style="float:left"><label for="fileow" class="checkbox-label" style="float:left"></label><label for="fileow">Overwrite if file exists?</label></div>
			<div style="position:absolute;right:0;top:0;width:65%;">
			<h6>Images:</h6>
			<ul class="feature-list">
			<li>Any core product images should be in 3x2 (wxh) aspect ratio</li>
			<li>Core product images should be as large as possible, up to 1600x1087.  When used by the system they are sized down when needed</li>
			<li>part numbers should be ALL CAPS</li>
			<li>Company name case should be: "InFocus"</li>
			</ul>
			<h6>documents:</h6>
			<ul class="feature-list">
			<li>always "-" never "_"</li>
			<li>Datasheets should have "Datasheet" in the name.  Same with Userguides and Quickstarts</li>
			<li>If uploading a file that you want to display in the "Downloads" or "Datasheets" tabs use <a href="/resources/downloads/php">this</a> instead</li>
			<ul>			</div>
			<input type="submit" name="submit" value="Upload" onclick="$(' . "'#uploadFrame'" . ').delay(1500).slideDown(1000);">
			</div>
			<iframe style="display:none;right:0;position:absolute;overflow:hidden;" src="#" name="uploadFrame" id="uploadFrame" height="180px" scrolling="no"></iframe>
 	<script type="text/javascript"	src="/resources/js/filterTable.js"></script>
		</form>
	</div>
		<div id="clone" >
		<form Target="cloneFrame" action="/resources/php/cloneproduct.php"  method="post" style="padding:10px;">
		<div style="width:300px;display:inline-block;vertical-align:top;">	
			<label class="top">Clone Part Number (from)</label>
			<input type="text" name="sourceProduct" id="sourceProduct" value ="' . $pn . '"><br>
			<label class="top">New Part Number (to)</label>
			<input type="text" id="createdProduct" name="createdProduct" >
			<label class="top">Language</label>
			<input type="text" name="lang" value="' . $lang . '"></div>

			<div style="width:400px;display:inline-block">
			<input type="checkbox" class="css-checkbox" id="cloneText" name="cloneText" style="float:left" checked><label for="cloneText" class="checkbox-label" style="float:left"></label><label for="cloneText">Clone Product Text</label>

			<input type="checkbox" class="css-checkbox" id="cloneSpecs" name="cloneSpecs" style="float:left" checked><label for="cloneSpecs" class="checkbox-label" style="float:left"></label><label for="cloneSpecs">Clone Specifications</label>

			<input type="checkbox" class="css-checkbox" id="cloneOverview" name="cloneOverview" style="float:left" checked><label for="cloneOverview" class="checkbox-label" style="float:left"></label><label for="cloneOverview">Clone Overview</label>

			<input type="checkbox" class="css-checkbox" id="cloneAccessories" name="cloneAccessories" style="float:left" checked><label for="cloneAccessories" class="checkbox-label" style="float:left"></label><label for="cloneAccessories">Clone Accessories (or associated products)</label>

			<input type="checkbox" class="css-checkbox" id="cloneSeries" name="cloneSeries" style="float:left" checked><label for="cloneSeries" class="checkbox-label" style="float:left"></label><label for="cloneSeries">Clone Series</label>

			<input type="checkbox" class="css-checkbox" id="cloneDownloads" name="cloneDownloads" style="float:left" checked><label for="cloneDownloads" class="checkbox-label" style="float:left"></label><label for="cloneDownloads">Clone Downloads</label></div>
			
			<input type="submit" name="submit" value="Clone" onclick="$(' . "'#cloneFrame'" . ').delay(1500).slideDown(1000);">
			
			<iframe style="display:none;right:0;position:absolute;overflow:auto;width:240px;height:155px;" src="#" name="cloneFrame" id="cloneFrame" scrolling="no"></iframe>
		</form>
	</div>
</div>
';


if($SavePageAs == "SaveAs"){
echo '
<div style="display:none">
<div id="saveAs" style="background-color:transparent;" >
<form Target="saveAsFrame" action=""  method="post"
enctype="multipart/form-data">
		<iframe style="display:none;right:0;position:absolute;overflow:hidden;" src="#" name="saveAsFrame" id="saveAsFrame" height="180px" scrolling="no"></iframe>
<label class="top">Part (ie: IN2124) or Series (ie: IN2120 Series)</label>
<input type="text" id="partnumber" name="partnumber"></br>
<label class="top">Language</label>
<Select type="text" name="language" id="language">
<option value="en">English</option>
<option value="de">German</option>
</Select><br><br>
<input type="checkbox" id="fileow" name="file_overwrite" style="float:left"><label for="fileow">Overwrite if file exists?</label>
<br>
<input type="button" name="submit" value="Save" onclick="saveAs();">
</form>
</div>
</div>';
}
}
}

function cssifysize($img) {
$dimensions = getimagesize($img);
$dimensions = str_replace("=\"", ":", $dimensions['3']);
$dimensions = str_replace("\"", "px;", $dimensions);
return $dimensions;
} 
?>
