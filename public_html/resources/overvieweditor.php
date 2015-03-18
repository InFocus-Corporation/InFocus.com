<!DOCTYPE html>
<?php
$groups_allowed = "admin,editor,saleseditor,marketingeditor";
require($_SERVER['DOCUMENT_ROOT'] . "/login/ublock.php");

require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
$localdir = dirname(__FILE__);

require($_SERVER['DOCUMENT_ROOT'] . "/resources/cmsmainmenu.html");
mysqli_set_charset($connection, "utf8");


$pn = $_GET['pn'];
if(!empty($_GET['lang'])){$lang = $_GET['lang'];}

?>
<script src="/ckeditor/ckeditor.js"></script>
<style>
#sortable { list-style-type: none; margin: 0; padding: 0; }
#sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; }
#sortable li span { position: absolute; margin-left: -1.3em; }
</style>
<script>

$(document).ready(function(){

		$(".upload").colorbox({inline:true, width:"95%", maxWidth:"900px"});
		$(".saveAs").colorbox({inline:true, width:"95%", maxWidth:"900px"});

	
});

$(function() {
 $( ".column" ).sortable({
connectWith: ".column",
handle: ".portlet-header",
cancel: ".portlet-toggle",
opacity: 0.5,
placeholder: "portlet-placeholder ui-corner-all",
update: function(event, ui) {
      $('.column .portlet-content').each(function(index){
         $(this).attr('id', index +1);
      });
    },
over: function () {
                removeIntent = false;
            },
out: function () {
                removeIntent = true;
            },
beforeStop: function (event, ui) {
                if(removeIntent == true){
                    ui.item.remove();  
}
            }
			});
$( ".portlet" )
.addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
.find( ".portlet-header" )
.addClass( "ui-widget-header ui-corner-all" )
.prepend( "<span class='ui-icon ui-icon-minusthick portlet-toggle'></span>");
$( ".portlet-toggle" ).click(function() {
var icon = $( this );
icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
});
$( "#draggable" ).draggable({
connectToSortable: ".column",
helper: "clone",
revert: "invalid"
});
// $( "ul, li" ).disableSelection();
});


        


	  var sectionHTML = new Array();;
	  var sectionImg = new Array();;
	  var sectionName = new Array();;
	  var sectionTagline = new Array();;
	  var section = new Array();;
	  
function submitOverview(){

	  var pn = document.getElementById('pn').value;
	  var lang = document.getElementById('lang').value;

	  
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



	 
	  
	  $('.column .portlet-content').each(function(index){
	  
 
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
			   document.getElementById('results').innerHTML = response;
			});

}
function uploadType(category){

document.getElementById("category").value = category;
}

function refreshInstances(){
$('div[contenteditable="true"]').each(function(i, editableElement)
{
  try{  CKEDITOR.inline(editableElement);}
  catch(e){}
});
}
</script>
</head>
<body>



<style>

.alternateDivChildL2custom > div:nth-child(odd) > div:nth-child(2) > div:first-child {
float:right;
margin-left:1.5em;
z-index:100;
}

.alternateDivChildL2custom > div {
clear:both;
padding-top:0em;
}

.alternateDivChildL2custom > div:nth-child(even) > div:nth-child(2) > div:first-child {
float:left;
margin-right:1.5em;
z-index:100;
}

.alternateDivChildL2custom > div > div:nth-child(2) > div.image-set {
margin-top:2.5em;
max-width:60%;
min-width:30%;
height:100%;
}

</style>



<div class="content">
<code style="position: relative;
top: -30px;
font-size: 72%;
left: 95px;">to add an embeded video use this: &lt;iframe src="//www.youtube.com/embed/&lt;&lt;videoID&gt;&gt;"  class="vidframe"&gt;&lt;/iframe&gt;</code>

<form action="" method="get" style="padding:15px 15px;display:block;position:relative;top:-20px;width:80%;margin:auto;">
<input type="text" name="pn" id="pn" placeholder="Part Number" value="<?php echo $pn; ?>">
<input style="width:50px;margin-left:20px;" type="text" name="lang" id="lang" value="<?php echo $lang; ?>">
<input type="submit" value="Load" style="margin-left:15px">
<button type="button" onclick="submitOverview()" style="margin-left:50px">Submit Changes</button>
<button type="button" onclick="refreshInstances()" style="margin-left:50px;margin-right: 200px;margin-top: 20px;">Refresh WYSIWYG</button>
<span id="results"></span>

<span style="text-align:right;position:absolute;right:15px;margin-top: 10px;"><a target="_blank" href="/resources/images/all" style="">Image Library</a> |<a target="_blank" href="/resources/documents/all" style="margin-left:10px">Document Library</a> |<a target="_blank" href="/resources/videos/all" style="margin-left:10px">Video Library</a><br>
		Uploads<button type="button" style="padding:0px 24px;" class="upload" href="#upload" onclick="$('#uploadFrame').slideUp(100);uploadType('images')"  style="float:center">Image</button>
		<button type="button" style="padding:0px 24px;" class="upload" href="#upload" onclick="$('#uploadFrame').slideUp(100);uploadType('documents')"  style="float:center">Document</button>
		<button type="button" style="padding:0px 24px;" class="upload" href="#upload" onclick="$('#uploadFrame').slideUp(100);uploadType('video')"  style="float:center">Video</button></span>
</form>
<div class="C9">
<div class="alternateDivChildL2custom">
<div id="draggable" class="ui-state-highlight portlet">
<div class="portlet-header">Drag-Handle: New Row</div>
<div class="portlet-content"><div class="image-set cmsedit" contenteditable="true"><p><img alt="" src="/resources/images/no-image-cms"></p>
</div>
<div class="info cmsedit" contenteditable="true"><h2 class="name">Drag Me Down to Add Section</h2>
<p class="tagline"><strong>Tagline</strong></p>


<ul class="feature-list">
	<li>List Item</li>
	<li>List Item</li>
</ul>
</div></div>
</div>
</div>
<br>

<div class="column C10 alternateDivChildL2custom">
<?php

$sql = 'SELECT * FROM productoverview WHERE partnumber = "' . $pn . '" AND lang = "' . $lang . '" ORDER BY `order`';

$result	=	mysqli_query($connection,$sql);

$i=0;
if(mysqli_num_rows($result)==0)
{
echo '<div class="portlet">
<div class="portlet-header">Drag-Handle: New Section</div>
<div class="portlet-content" id="' . $i . '"><div class="image-set cmsedit" contenteditable="true"><img alt="" src="/resources/images/no-image-cms"></div>
<div class="info cmsedit" contenteditable="true"><h2 class="name">Section Name</h2>

<p class="tagline">Tagline</p>

<ul class="feature-list">
	<li>List Item</li>
	<li>List Item</li>
</ul>
</div></div>
</div>

';
}
while($row	=	mysqli_fetch_array($result))
{


echo '<div class="portlet">
<div class="portlet-header">Drag-Handle: ' . $row['name'] . '</div>
<div class="portlet-content" id="' . $i . '"><div class="image-set cmsedit" contenteditable="true">' . $row['image'] . '</div>
<div class="info cmsedit" contenteditable="true"><h2 class="name">' . $row['name'] . '</h2>

<p class="tagline">' . $row['tagline'] . '</p>

' . $row['body'] . '
</div></div>
</div>

';

$i=$i+1;
}			


?>

</div>
</div>
</div>

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
			<li>Image with no suffix are LEFT facing (ie. InFoucs-IN2124A), Front, Back, Side, and Right have only those words as a suffix (ie.InFoucs-IN2124A-Right)</li>
			<li>part numbers should be ALL CAPS (ie. IN2124A, NOT IN2124a</li>
			<li>Company name case should be: "InFocus" with capitol 'I' and 'F'</li>
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
</body>
</html>