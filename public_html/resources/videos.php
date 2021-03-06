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
.handsontable th,
.handsontable td {
  border-right: 1px solid #CCC;
  border-bottom: 1px solid #CCC;
  height: 22px;
  empty-cells: show;
  line-height: 21px;
  padding: 0 4px 0 4px;
  /* top, bottom padding different than 0 is handled poorly by FF with HTML5 doctype */
  background-color: #FFF;
  vertical-align: top;
  overflow: hidden;
  outline-width: 0;
  white-space:nowrap;
  text-overflow:ellipsis;
  /* preserve new line character in cell */
}
</style>
    <div id="layout" style="padding:40px 50px;">
   <section id="content">
  Vidid is the KEY field in this table.  If you change the video id it will not REPLACE the entry, it will add an additional entry with the new Vidid.  The old entry would then need to be deleted to avoid duplication.
   <div id="dataTable"></div>
   
<button type="button" style="position:relative;left:75%;top:30px;" onclick="post_to_url('/resources/php/productcreateupdate', 'post', 'displays');">Submit Changes</button><div id="statusdiv"></div>

<script>

<?php 
$sql = "SELECT Summary,title,vidid,about,rank,industry,body,lang FROM videos WHERE lang ='$lang'";

require_once($_SERVER['DOCUMENT_ROOT'] . "/resources/php/tableQuery.php");

?>
var changeRows = [];
var jArray= <?php echo json_encode($javaArray); ?>;
var jHeaders= <?php echo json_encode($colNames); ?>;
var jFields= <?php echo json_encode($fieldNames); ?>;
var specCell = [];
var $container;
var handsontable;


var container = $("#dataTable");

  $("#dataTable").handsontable({
    data: jArray,
 colHeaders: jHeaders,
colWidths: [350, 150, 120, 120, 80, 150, 450],
 autoWrapRow:true,
 autoWrapCol:true,
 minSpareRows: 1 ,
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
 
var var1 = container.handsontable('getDataAtRowProp',changes,"vidid");
			jQuery.post("/resources/php/tableQuery.php",
			{where: "vidid = '"+var1+"'",
			 removerow: "TRUE",
			 table:"videos"},
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
  
  $('#dataTable').handsontable('getInstance').addHook('beforeChange', function(changes,source) {

  for (var i=0;i<changes.length;i++)
{  
  if(changes[i][1] == "id"){changes[i] = null;}
  else{
  if(changes[i] !== null && changeRows.indexOf(changes[i][0]) == -1 && changes[i][2] != changes[i][3]){
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

  var changedData = [];
  
  for(i=0;i<changeRows.length;i++){
  changedData.push(handsontable.getDataAtRow(changeRows[i]));    
  }
  
    window.onbeforeunload = false;

  $.ajax({
    url: "/resources/php/tableQuery.php",
    data: {"dataset": changedData, "fields": jFields, "table": "videos"}, //returns all cells' data
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



<div style="display:none">
<iframe name="hiddenFrame" ></iframe>
</div>
</section>
</div>

</body>
</html>