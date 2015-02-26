<!DOCTYPE html>
<?PHP
$groups_allowed = "admin,editor,saleseditor,marketingeditor";
require($_SERVER['DOCUMENT_ROOT'] . "/login/ublock.php");
require($_SERVER['DOCUMENT_ROOT'] . "/login/ubvars.php");
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");

function saveFiles(){
global $mysqli;
global $FILES;
global $idnum;
global $_POST;
global $file_folder;
global $extension;
$i=0;

$bName = $_POST['filename'];

foreach ($_FILES['filesToUpload']['name'] as $value) {
$Files[$i++]['name']=$value;
}

	// if(empty($bName)){$bName = $value;}
	// else{if(strlen($bName) > strlen($value)){$bName = $value;}}
$i=0;
foreach ($_FILES['filesToUpload']['tmp_name'] as $value) {
$Files[$i++]['tmp_name']=$value;
}

 $file_folder="/" . $_POST[filetype] . "/";
 if(!empty($_POST[subfolder])){$file_folder .= $_POST[subfolder] . "/";}

    if (!file_exists($_SERVER['DOCUMENT_ROOT'] ."/resources"  . $file_folder )){
 if (!mkdir($_SERVER['DOCUMENT_ROOT'] ."/resources"  . $file_folder, 0755)){die('Failed to create folders...');}}

     if (file_exists($_SERVER['DOCUMENT_ROOT'] ."/resources"  . $file_folder . $bName) && isset($_POST['file_overwrite']) != false)
      {

echo '<script type="text/javascript"> 
    alert("' . $bName . ' already exists.");
   </script>';
return false;
  }

$i=0;
if(count($_FILES['filesToUpload'])) {
	foreach ($Files as $file) {
	$temp = explode(".", $file["name"]);
	$extension = end($temp);
	$fName = $file["name"];
	$fName = str_replace("." . $extension,"",$fName);
	$bName = str_replace("." . $extension,"",$bName);



	if($langext == "-en" or $langext == "-EN"){$langext = "";}
	move_uploaded_file($file["tmp_name"],$_SERVER['DOCUMENT_ROOT'] ."/resources"  . $file_folder . $Files[$i++]['name']);
	}
}
	return $bName;
}

 if ($_FILES['filesToUpload']) {
 $file_folder;
 $extension;
 $bname = saveFiles();

 if($bname != false){

require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");
// Check connection

$sql="REPLACE INTO Downloadstmp
SET 
filename = '". $bname ."',
lang = '". $_POST[language] ."',
description = '".$_POST[description]."',
filelocation = '/resources$file_folder',
relatedproducts = '".mysqli_real_escape_string($connection,$_POST[relatedprod])."',
extension = '$extension',
title = '".$_POST[title]."',
category = '".$_POST[category]."',
rank = '".$_POST[rank]."'
";

   $results=mysqli_query($connection,$sql);
  }

  }
 
  
$documentDirs = array();
$imageDirs = array();
$videoDirs = array();
$miscDirs = array();
$documentDira = array_filter(glob($_SERVER['DOCUMENT_ROOT'] . "/resources/documents/*"), 'is_dir');
foreach ($documentDira as $result) {array_push($documentDirs,str_replace($_SERVER['DOCUMENT_ROOT'] . "/resources/documents/","",$result));}
$imageDira = array_filter(glob($_SERVER['DOCUMENT_ROOT'] . "/resources/images/*"), 'is_dir');
foreach ($imageDira as $result) {array_push($imageDirs,str_replace($_SERVER['DOCUMENT_ROOT'] . "/resources/images/","",$result));}
$videoDira = array_filter(glob($_SERVER['DOCUMENT_ROOT'] . "/resources/videos/*"), 'is_dir');
foreach ($videoDira as $result) {array_push($videoDirs,str_replace($_SERVER['DOCUMENT_ROOT'] . "/resources/videos/","",$result));}
$miscDira = array_filter(glob($_SERVER['DOCUMENT_ROOT'] . "/resources/misc/*"), 'is_dir');
foreach ($miscDira as $result) {array_push($miscDirs,str_replace($_SERVER['DOCUMENT_ROOT'] . "/resources/misc/","",$result));}



require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
$localdir = dirname(__FILE__);

require($_SERVER['DOCUMENT_ROOT'] . "/resources/cmsmainmenu.html");
mysqli_set_charset($connection, "utf8");


$pn = $_GET['pn'];
if(!empty($_GET['lang'])){$lang = $_GET['lang'];}




?>
<script>

//get the input and UL list
var input = document.getElementById('filesToUpload');
var list = document.getElementById('fileList');

//empty list for now...
while (list.hasChildNodes()) {
	list.removeChild(ul.firstChild);
}

//for every file...
for (var x = 0; x < input.files.length; x++) {
	//add to list
	var li = document.createElement('li');
	li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
	list.append(li);
}

  (function( $ ) {
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
 
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
 
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
 
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            tooltipClass: "ui-state-highlight"
          });
 
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },
 
          autocompletechange: "_removeIfInvalid"
        });
      },
 
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
 
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Show All Items" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .mousedown(function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .click(function() {
            input.focus();
 
            // Close if already visible
            if ( wasOpen ) {
              return;
            }
 
            // Pass empty string as value to search for, displaying all results
            input.autocomplete( "search", "" );
          });
      },
 
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
 
      _removeIfInvalid: function( event, ui ) {
 
        // Selected an item, nothing to do
        if ( ui.item ) {
          return;
        }
 
        // Search for a match (case-insensitive)
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
 
        // Found a match, nothing to do
        if ( valid ) {
          return;
        }
 
        // Remove invalid value
        this.input
          .val( "" )
          .attr( "title", value + " didn't match any item" )
          .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.data( "ui-autocomplete" ).term = "";
      },
 
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
  })( jQuery );
 
  $(function() {
    $( "#combobox" ).combobox();
    $( "#toggle" ).click(function() {
      $( "#combobox" ).toggle();
    });
  });
  

 </script>
<style>
div.bulleted ul{
list-style-type: disc;
list-style-position: inside;
}


  .custom-combobox {
   position: relative;
   display: inline-block;
font-size:80%;
 background: #e8edff;
 }
  .custom-combobox-toggle {
    position: absolute;
    top: 0;
    bottom: 0;
    margin-left: -1px;
    padding: 0;
    /* support: IE7 */
    *height: 1em;
    *top: 0.1em;
 background: #e8edff;
  }
  .custom-combobox-input {
 margin: 0;
font-size:80%;
    padding: 0.3em;
 background: #e8edff;
 padding-left:40px;
  }

  .ui-autocomplete {
max-height: 200px;
font-size:80%;
overflow-y: auto;
/* prevent horizontal scrollbar */
overflow-x: hidden;
}
/* IE 6 doesn't support max-height
* we use height instead, but this forces the menu to always be this tall
*/
* html .ui-autocomplete {
height: 200px;
}

.ui-widget-dd{
left:200px;
   display: inline;

}

.thumb img{
vertical-align:middle;
width:100px;
float:left;
} 

.colorclass2 #cboxLoadedContent{
margin-bottom:20px;
padding:10px;
}
.colorclass2 #cboxContent{
opacity:1;
background-color:white;
}

.wrap li{
display:inline-block;
margin-left:18px;
}
.wrap{margin-bottom:20px;}

form{padding:15px;} 
form label{padding-bottom:2px;padding-top:15px;}
</style>
    <div id="layout" class="C9">
   <section id="content">
<div style="padding-top:40px;"></div>
Files uploaded (INCLUDING EN) MUST end with the appropriate language abbreviation.  No "_" characters allowed.  Spaces in file names should be repalced with "-". Filename field should be base filename without language or file extension.
<form action="" method="POST" enctype="multipart/form-data">
<ul class="wrap">
<li>
<label for="filesToUpload">File(s)<span style="color:red;">*<span></label>
<input name="filesToUpload[]" style="width:440px;max-width:440px;" id="filesToUpload" type="file" onchange="if(this.value.indexOf('_')!=-1){alert('filename cannot contain _ character.');this.value='';}else{document.getElementById('filename').value = this.value;}" multiple="" />
</li>
<li style="display:block;">
<label for="filename">Filename<span style="color:red;">*<span></label>
<input name="filename" id="filename" onchange="if(this.value.indexOf('_')!=-1){alert('filename cannot contain _ character.');this.value='';}" style="width:440px;max-width:440px;" value=""/>
</li>
<li>
<label for="title">Title<span style="color:red;">*<span></label>
<input name="title" id="title" style="width:180px;" value=""  placeholder="User Guide for IN120a Series" />
</li>
<li>
<label for="language">Language<span id="langreq" style="color:red;">*<span></label>
<INPUT type="text" name="language" id="language" onkeyup="this.value = this.value.toUpperCase();" placeholder="EN,DE,EU,FR" required>
</li>
<li>
<label for="description">Description<span style="color:red;">*<span></label>
 <INPUT type="text" name="description" id="description"/>
</li>
<li>
<label for="description">Related Product(s)<span style="color:red;">*<span></label>
 <INPUT type="text" name="relatedprod" id="relatedprod" placeholder="IN10;IN12;IN115;" onkeyup="this.value =  this.value.replace(/[\s]/g,';').replace(';;',';');" onchange="this.value = '' + this.value + ';';this.value = this.value.replace(/[\s]/g,';').replace(/;;/g,';');" required/>
</li>
<li>
<label for="filetype">File Type<span style="color:red;">*<span></label>
 <select type="text" name="filetype" id="filetype" onchange="docdirs(this);if(this.value != 'documents'){$('#language').prop('required',false); $('#langreq').html('');}else{$('#language').prop('required',true); $('#langreq').html('*');}" placeholder="Document">
     <option value=""></option>
     <option value="documents">Document</option>
     <option value="firmware">Firmware</option>
     <option value="images">Image</option>
     <option value="videos">Video</option>
     <option value="misc">Other</option>
     </select>
</li>
<li style="position:relative;">
<label for="subfolder">Subfolder</label>
 <input style="position: absolute;
border: medium none;
box-shadow: none;
top: 42px;
width: 119px;
height: 18px;
z-index: 20;
left: 1px; id="subinput" name="subfolder" type="text"><select style="width:158px;" onchange="this.previousElementSibling.value = this.value;" type="text" id="subfolder"/></select>
</li>
<li>
<label for="category">Category</label>
 <INPUT type="text" name="category" id="category"/>
</li>
<li>
<label for="category">Rank</label>
 <INPUT type="text" name="rank" id="rank" style="width:30px"/>
</li>
</ul>
<input type="submit" class="formbutton" style="clear:both;display:block;margin-top:15px;" id="submitorder" name="submitrepair" value="Upload" ><br>
<INPUT class="css-checkbox" id="overwrite" name="file_overwrite" type="checkbox" />  
<label class="checkbox-label" style="float:left" for="overwrite"></label>
<label for="overwrite">Overwrite</label>

</div>
<br>
 </form>
</section>
</div>

<script>

var documentDirs = <?php echo json_encode($documentDirs); ?>;
var imageDirs = <?php echo json_encode($imageDirs); ?>;
var videoDirs = <?php echo json_encode($videoDirs); ?>;
var miscDirs = <?php echo json_encode($miscDirs); ?>;

function docdirs(mainDir){
var selectArray;
var htmltext = "<option value=''></option>";

if(mainDir.value == "documents"){selectArray = documentDirs;}
if(mainDir.value == "images"){selectArray = imageDirs;}
if(mainDir.value == "videos"){selectArray = videoDirs;}
if(mainDir.value == "firmware"){selectArray = miscDirs;}
if(mainDir.value == "other"){selectArray = miscDirs;}

 for (var i=0;i<selectArray.length;i++){
 
 htmltext = htmltext + "<option value='" + selectArray[i] + "'>" + selectArray[i] + "</option>";
 
 }

 document.getElementById('subfolder').innerHTML = htmltext;
}

</script>


<script src="/resources/plugins/jquery-handsontable/dist/jquery.handsontable.full.js"></script>
<link rel="stylesheet" media="screen" href="/resources/plugins/jquery-handsontable/dist/jquery.handsontable.full.css">


<style>

.colHeader{
color:black;
}

table tbody tr:last-child td {
border-bottom:1px solid #ccc;
}
.handsontable .currentRow {
  background-color: #E7E8EF;
  border-bottom: 1.5px solid darkgrey;
  border-right: 1.5px solid darkgrey;
}

.pagination {
        padding: 2px 0;
        margin: 2px;
		margin-top:20px;
    }
.pagination a {
            border: 1px solid grey;   
            padding: 2px 5px;
        } 
.handsontable th, .handsontable td {
white-space:normal;
}
.handsontable th,
.handsontable td {
  border-right: 1px solid #CCC;
  border-bottom: 1px solid #CCC;
  empty-cells: show;
  line-height: 10px;
  padding: 0 4px 0 4px;
  /* top, bottom padding different than 0 is handled poorly by FF with HTML5 doctype */
  vertical-align: middle;
  overflow: hidden;
  outline-width: 0;
  white-space:nowrap;
  text-overflow:ellipsis;
  /* preserve new line character in cell */
 }
 .colHeader{
color:white;
font-weight:bold;
 }
</style>

<div style="display:inline-block;"><label for="filter" style="margin-left:40px;margin-top:30px;">Filter by Related Products</label>
<input id="filter" style="margin-left:20px;"><button onclick="window.location='downloads?pn='+document.getElementById('filter').value.toUpperCase()+'&lang='+document.getElementById('lang').value.toUpperCase()">Filter</button></div>
<div style="display:inline-block;"><label for="filter" style="margin-left:40px;margin-top:30px;">Language</label>
<input id="lang" style="margin-left:40px;" maxlength="2" onchange="window.location='downloads?pn='+document.getElementById('filter').value.toUpperCase()+'&lang='+document.getElementById('lang').value.toUpperCase()" value="<?php echo $_REQUEST['lang'] ?>"></div>
 <div style="width:97%;margin:auto;margin-top:10px;">  <div id="dataTable" style=""></div></div>

<script>

<?php

if(!empty($_REQUEST['lang']) AND $_REQUEST['lang'] != "EN"){
$lang = $_REQUEST['lang'];
$sql = "SELECT Downloadstmp.filename,DownloadTrans.title,Downloadstmp.lang,DownloadTrans.description,filelocation,extension,relatedproducts,DownloadTrans.category,rank FROM InFocus.Downloadstmp LEFT JOIN (SELECT * FROM InFocus.DownloadTrans WHERE lang = '$lang') AS DownloadTrans ON Downloadstmp.filename = DownloadTrans.FileName WHERE relatedproducts LIKE '%$pn%'";
}
else{
$sql = "SELECT filename,title,lang,description,filelocation,extension,relatedproducts,category,rank FROM InFocus.Downloadstmp WHERE relatedproducts LIKE '%$pn%'";
}
$_POST['table'] = "Downloads";

require_once($_SERVER['DOCUMENT_ROOT'] . "/resources/php/tableQuery.php");

?>
var changeRows = [];
var jArray= <?php echo json_encode($javaArray); ?>;
var jHeaders= <?php echo json_encode($colNames); ?>;
var jFields= <?php echo json_encode($fieldNames); ?>;
var multiplier= <?php echo json_encode($Multiplier); ?>;
var specCell = [];
var $container;
var handsontable;

console.log(jArray);
console.log(jHeaders);

function TextRenderer(instance, td, row, col, prop, value, cellProperties) {

	  Handsontable.renderers.TextRenderer.apply(this,arguments);

}



var mycols = [{data:"PartNumber",readOnly:true},{data:"Category",width:200},{data:"Status",type:'dropdown',source:["NEW","Current","Limited","NoOrders","EOL"]},{data:"NotesKey"},{data:"CurrentBom",type:'numeric',format:'$0,0',language:'en'},{data:"MAP",type:'numeric',format:'$0,0',language:'en'},{data:"BaseX",type:'numeric',format:'$0,0',language:'en'},{data:"DemoPricing",type:'numeric',format:'$0,0',language:'en'},{data:"PubSecMultiplier",type:'numeric',format:'0%'},{data:"InstRebate",type:'numeric',format:'$0,0',language:'en'},{data:"Dist",type:'numeric',format:'$0,0',language:'en'},{data:"DistPubSec",type:'numeric',format:'$0,0',language:'en'},{data:"DirResp",type:'numeric',format:'$0,0',language:'en'},{data:"DirRespPubSec",type:'numeric',format:'$0,0',language:'en'},{data:"ProAV",type:'numeric',format:'$0,0',language:'en'},{data:"ProAVPubSec",type:'numeric',format:'$0,0',language:'en'},{data:"Strategic",type:'numeric',format:'$0,0',language:'en'},{data:"StrategicDist",type:'numeric',format:'$0,0',language:'en'},{data:"MSContractPrice",type:'numeric',format:'$0,0',language:'en'},{data:"MSList",type:'numeric',format:'$0,0',language:'en'},{data:"NYContractPrice",type:'numeric',format:'$0,0',language:'en'},{data:"NYList",type:'numeric',format:'$0,0',language:'en'},{data:"CDWStrat",type:'numeric',format:'$0,0',language:'en'},{data:"EasyMoney",type:'numeric',format:'$0,0',language:'en'},{data:"ClubEasyMoney",type:'numeric',format:'$0,0',language:'en'},{data:"RegRewards",type:'numeric',format:'$0,0',language:'en'},{data:"AltClaimers",type:'numeric',format:'$0,0',language:'en'},{data:"CDWSpiff",type:'numeric',format:'$0,0',language:'en'},{data:"TroxellSpiff",type:'numeric',format:'$0,0',language:'en'},{data:"Description",width:200},{data:"OnSpiffSheet",type:'dropdown',source:["Yes","No",""]},{data:"SpiffDescription",width:200},{data:"SpiffCategory"},{data:"CDWPartNumber"},{data:"Weight",type:'numeric',format:'0.0',readOnly:true},{data:"HD",readOnly:true},{data:"3D",readOnly:true,width:200},{data:"Lumens",readOnly:true},{data:"Resolution",readOnly:true}];



var container = $("#dataTable");
  $("#dataTable").handsontable({
    data: jArray,
 colHeaders: jHeaders,
 fixedColumnsLeft: 1,
currentRowClassName: 'currentRow',
currentColClassName: 'currentCol', 
 height:600,
 cells: function (row, col, prop) {
    var cellProperties = {};
	cellProperties.renderer = TextRenderer
    if(col==0){cellProperties.readOnly = true;}
	return cellProperties;
  },
 contextMenu: {
    callback: function (key, options) {
     if (key === '') {
        setTimeout(function () {
          //timeout is used to make sure the menu collapsed before alert is shown
         }, 100);
      }
    },
    items: {
      "remove_row": {
        name: 'Remove this row'
      }
    }
  }
  });

   $('#dataTable').handsontable({
  beforeRemoveRow: function(changes, source) {
 
			jQuery.post("/resources/php/tableQuery.php",
			{fn: container.handsontable('getDataAtRowProp',changes,"filename"),
			 removerow: "TRUE",
			 table:"Downloadstmp"},
			function(response){
		  if (response == 'Success') {
			console.log('Data saved');
		  }
		  else {
			console.log(response);
			alert('Save error');
		  }
		}); 


  }});
  

  $('#dataTable').handsontable({
  beforeChange: function(changes, source) {

if(changes != null && changes.length > 0){
for (var i = changes.length - 1; i >= 0; i--) {

		var fn = container.handsontable('getDataAtRowProp',changes[i][0],"filename");
		if(changes[i][1] == "filename"){fn = changes[i][3];}
		saveData(fn,changes[i][1],changes[i][3]);

}}}});

  


$container = $("#dataTable");
handsontable = $container.data('handsontable');   


function saveData(partnum,colChanged,cValue){

			jQuery.post("/resources/php/tableQuery.php",
			{fn: partnum,
			 col: colChanged,
			 value: cValue,
			 table:"Downloadstmp",
			 language: "<?php echo $_REQUEST['lang'] ?>"},
			function(response){
		  if (response == 'Success') {
			console.log('Data saved');
		  }
		  else {
			console.log(response);
			alert('Save error');
		  }
		});
		}
		



</script>



<div style="display:none">
<iframe name="hiddenFrame" ></iframe>
</div>
</section>
</div>

</body>
</html>
</BODY>
</HTML>