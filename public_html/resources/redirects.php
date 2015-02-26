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
<br>Wildcard Search <br>
<input id="partsearch" type="text" ><button type="button" onclick="window.location = '?pn=' + document.getElementById('partsearch').value;">Search</button><button type="button" style="position:relative;left:25%;" onclick="post_to_test_url('', 'post', 'redirects');">Test Changes</button>
<button type="button" id="posttourl" style="position:relative;left:25%;" onclick="post_to_url('/resources/php/productcreateupdate', 'post', 'displays');" disabled="true">Submit Changes</button><div id="statusdiv"></div><br>
  
   <div id="dataTable"></div>
   


<script>

<?php 
$sql = 'SELECT * FROM redirects WHERE `From` LIKE "%' . $_GET['pn'] . '%"';

require_once($_SERVER['DOCUMENT_ROOT'] . "/resources/php/tableQuery.php");

?>
var changeRows = [];
var jArray= <?php echo json_encode($javaArray); ?>;
var jHeaders= <?php echo json_encode($colNames); ?>;
var jFields= <?php echo json_encode($fieldNames); ?>;
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
	document.getElementById('posttourl').disabled = true;
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
    data: {"data": handsontable.getData(), "fields": jFields, "rows": changeRows, "table": "redirects", "completereplace": "TRUE","htaccess": "TRUE"}, //returns all cells' data
    dataType: 'json',
    type: 'POST',
    success: function (res) {
      if (res === 'success') {
        document.getElementById('statusdiv').innerHTML = 'htaccess file has been updated.  Please test your changes.';
      }
      else {
        document.getElementById('statusdiv').innerHTML = 'Save error.  Report to Admin';
      }
    }
  });

}


function post_to_test_url(path, method, table) {

if(changeRows.length==0){
alert("Must change/add at least one row");
return;
}

  $.ajax({
    url: "/resources/php/htaccesstest.php",
    data: {"data": handsontable.getData(), "fields": jFields, "rows": changeRows, "table": "redirects", "completereplace": "TRUE","htaccess": "TRUE"}, //returns all cells' data
    dataType: 'json',
    type: 'POST',
    success: function (res) {
      if (res === 'success') {
        document.getElementById('posttourl').disabled = false;
        document.getElementById('statusdiv').innerHTML = 'Your changes have been tested and do not cause any site failures.  Be advised this does NOT test their function, only whether they would cause a server error and crash the website.';
      }
      else {
        document.getElementById('statusdiv').innerHTML = 'Your changes did not pass the mustard (aka. they generated a server error).  They were not submitted.';
      }
    }
  });

}


</script>

</section>
</div>

</body>
</html>