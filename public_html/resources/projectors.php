<!DOCTYPE html>
<?php
$groups_allowed = "admin,editor,saleseditor,marketingeditor";
require($_SERVER['DOCUMENT_ROOT'] . "/login/ublock.php");

require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/header.php");
$localdir = dirname(__FILE__);

require($_SERVER['DOCUMENT_ROOT'] . "/resources/cmsmainmenu.html");
mysqli_set_charset($connection, "utf8");


$pn = $_GET['pn'];
if(!empty($_GET['lang'])){$lang = $_GET['lang'];}

?>

<script src="/resources/plugins/jquery-handsontable/dist/jquery.handsontable.full.js"></script>
<link rel="stylesheet" media="screen" href="/resources/plugins/jquery-handsontable/dist/jquery.handsontable.full.css">

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

</style>
    <div id="layout" style="padding:40px 50px;">
   <section id="content">
<br>Wildcard Search (max 20 results)<br>
<input id="partsearch" type="text" ><button type="button" onclick="window.location = '?pn=' + document.getElementById('partsearch').value;">Search</button><br>
  
   <div id="dataTable"></div>
   
<button type="button" style="position:relative;left:75%;top:30px;" onclick="post_to_url('/resources/php/productcreateupdate', 'post', 'displays');">Submit Changes</button><div id="statusdiv"></div>

<script>

<?php 
$sql = 'SELECT * FROM projectors WHERE partnumber LIKE "%' . $_GET['pn'] . '%" LIMIT 20';

require_once($_SERVER['DOCUMENT_ROOT'] . "/resources/php/tableQuery.php");

?>
var changeRows = [];
var jArray= <?php echo json_encode($javaArray); ?>;
var jHeaders= <?php echo json_encode($colNames); ?>;
var jFields= <?php echo json_encode($fieldNames); ?>;
var specCell = [];
var $container;
var handsontable;


$(function() {

var $currentlySelected3 = null;
var selected3 = [];
var replacestring;

$('#selectable3').selectable({
    start: function(event, ui) {
        $currentlySelected3 = $('#selectable3 .ui-selected');
    },
    stop: function(event, ui) {
        for (var i = 0; i < selected3.length; i++) {
            if ($.inArray(selected3[i], $currentlySelected3) >= 0) {
              $(selected3[i]).removeClass('ui-selected');
     
            }
        }
        selected3 = [];
    
  Q8 = "";
  $( ".ui-selected", this ).each(function() {
  var index = $( "#selectable3 li" ).index( this );
  Q8 = Q8 + "," + ( ( index + 1 )  );
  });
  replacestring = Q8;
  replacestring = replacestring.replace(",1",",lanman");
  replacestring = replacestring.replace(",2",",landis");
  replacestring = replacestring.replace(",3",",rs232");
  replacestring = replacestring.replace(",4",",scrntrg");
  replacestring = replacestring.replace(",5",",mic");
  replacestring = replacestring.replace(",6",",3dsync");

  replacestring = replacestring.replace(",7",",lensshift");
  replacestring = replacestring.replace(",8",",motorizedlens");
  replacestring = replacestring.replace(",9",",interactive");
  replacestring = replacestring.replace(",10",",memory");
  replacestring = replacestring.replace(",11",",usbdis");
  replacestring = replacestring.replace(",12",",pc3d");
  replacestring = replacestring.replace(",13",",br3d");
  handsontable.setDataAtCell (specCell[0], specCell[1], replacestring);
 },
    selecting: function(event, ui) {
        $currentlySelected3.addClass('ui-selected'); // re-apply ui-selected class to currently selected items
    },
    selected: function(event, ui) {
        selected3.push(ui.selected); 
    }
});



});





  $("#dataTable").handsontable({
    data: jArray,
 colHeaders: jHeaders,
 autoWrapRow:true,
 autoWrapCol:true,
 fixedColumnsLeft: 2,
 minSpareRows: 1,
 selectRowPlugin: true 
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
// });
  $('#dataTable').handsontable('getInstance').addHook('afterSelection', function(r1,c1,r2,c2) {
  
    if(c1==jFields.indexOf("specfeatures") && c2==jFields.indexOf("specfeatures") && r1==r2){
  
  specCell = [r1,c1];
  lightbox();
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
    url: "/resources/php/tableQuery.php",
    data: {"data": handsontable.getData(), "fields": jFields, "rows": changeRows, "table": "projectors"}, //returns all cells' data
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

$(document).bind('cbox_closed', function(){
$currentlySelected3 = $('#selectable3 .ui-selected');
$currentlySelected3.removeClass('ui-selected');
});

function lightbox(){    
  $.colorbox({width:"50%", height:"60%", inline:true, href:"#specfeatpick"});
}


</script>



<div style="display:none">
<div id="specfeatpick" style="padding:20px">
<label for="Q8" class="top">Special features</label>
<br><br>
<ol id="selectable3" name="Q8" style="font-size:75%;" >
<li class="ui-widget-content">LAN (for management only)</li>
<li class="ui-widget-content">LAN (for display and management)</li>
<li class="ui-widget-content">RS232</li>
<li class="ui-widget-content">Screen trigger</li>
<li class="ui-widget-content">Microphone input</li>
<li class="ui-widget-content">3D sync port</li>
<li class="ui-widget-content">Lens Shift</li>
<li class="ui-widget-content">Motorized lens adjustments (focus, zoom, shift)</li>
<!--<li class="ui-widget-content">24/7 operation</li>-->
<li class="ui-widget-content">Interactivity</li>
<!--<li class="ui-widget-content">Wireless display capability (maybe, see below)</li>-->
<li class="ui-widget-content">Internal memory storage</li>
<li class="ui-widget-content">Display from USB drive</li>
<li class="ui-widget-content">3D from PC only</li>
<li class="ui-widget-content">3D from Blu-ray, cable/dish services, and more</li>
</ol>
</div><iframe name="hiddenFrame" ></iframe>
</div>
</section>
</div>

</body>
</html>