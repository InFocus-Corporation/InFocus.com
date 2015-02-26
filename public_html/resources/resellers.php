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
   
    Right clicking a row will bring up a context menu with an option to look up longitude and latitude.  If you do not get an accurate result try <a target="_blank" href="http://stevemorse.org/jcal/latlon.php">This Place</a> and remove the street address<br>
    Once you have updated <a target="_blank" href="/resources/php/resellers.php">Click Here</a> to re-generate the files for the map<br>

<br>Wildcard Search (max 10 results)<br>
<input id="partsearch" type="text" ><button type="button" onclick="window.location = '?pn=' + document.getElementById('partsearch').value;">Search</button><br>
  
   <div id="dataTable"></div>
   
<button type="button" style="position:relative;left:75%;top:30px;" onclick="post_to_url('/resources/php/productcreateupdate', 'post', 'displays');">Submit Changes</button><div id="statusdiv"></div>

<script>

<?php 
$sql = 'SELECT * FROM resellers WHERE name LIKE "%' . $_GET['pn'] . '%" LIMIT 10';

require_once($_SERVER['DOCUMENT_ROOT'] . "/resources/php/tableQuery.php");

?>
var changeRows = [];
var jArray= <?php echo json_encode($javaArray); ?>;
var jHeaders= <?php echo json_encode($colNames); ?>;
var jFields= <?php echo json_encode($fieldNames); ?>;
var srow;
var scol;
var srow2;
var scol2;

  $("#dataTable").handsontable({
    data: jArray,
 colHeaders: jHeaders,
 autoWrapRow:true,
 autoWrapCol:true,
 fixedColumnsLeft: 2,
 minSpareRows: 1,
 selectRowPlugin: true,
 onSelection: function(row, col, row2, col2){
//row,col is the top left corner cell of the selection (because the user might select more than one row)
// row2, col2 is the bottom right corner cell
srow = row;
srow2 = row2;
},
    contextMenu: {
    callback: function (key, options) {
      if (key === 'LatLon') {
        setTimeout(function () {
          //timeout is used to make sure the menu collapsed before alert is shown
    if(srow != srow2){
         alert("This action requires only 1 row is selected");
        }
  else{
  var $container = $("#dataTable");
  var handsontable = $container.data('handsontable');
  var loc = escape(handsontable.getDataAtCell(srow,2).replace(/\s/g,"+")) + ", " + escape(handsontable.getDataAtCell(srow,3).replace(/\s/g,"+")) + ", " + handsontable.getDataAtCell(srow,4) + ", " + handsontable.getDataAtCell(srow,5) + " " + handsontable.getDataAtCell(srow,6);
  console.log(loc);
  Google(loc, 'lat', 'lng', 'latDMS', 'lngDMS');
  }
  }, 100);
      }
	      if (key === 'Logo') {
        setTimeout(function () {
          //timeout is used to make sure the menu collapsed before alert is shown
    if(srow != srow2){
         alert("This action requires only 1 row is selected");
        }
  else{
  var $container = $("#dataTable");
  var handsontable = $container.data('handsontable');
  var logo = handsontable.getDataAtCell(srow,0);
  document.getElementById("file_override").value = "Logo-" + logo;
  $.colorbox({inline:true, width:"95%", maxWidth:"500px", href:$(".upload")});
  }
  }, 100);
      }
  
	  
    },
    items: {
      "LatLon": {name: 'Get Lon/Lat'},
	  "Logo": {name: 'Add Logo'}
    }
  }
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
   
;


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
var $container = $("#dataTable");

var handsontable = $container.data('handsontable');
  window.onbeforeunload = false;

  $.ajax({
    url: "/resources/php/tableQuery.php",
    data: {"data": handsontable.getData(), "fields": jFields, "rows": changeRows, "table": "resellers"}, //returns all cells' data
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



<br><br><script src='http://maps.google.com/maps?file=api&amp;v=2.x&amp;key=ABQIAAAAHeW8jUiddMrHNAbRrrRK4RTKOLsoaIFWPpX56g621QHs4WnpHhQjysmTbtNJXzoKIy6t67N8sHFqjQ' type='text/javascript'></script>
<script >
// see http://www.google.com/apis/maps/
// see also http://perso.orange.fr/universimmedia/geo/loc.htm

function Google(address, lat, lng, latDMS, lngDMS) {
  if (GBrowserIsCompatible()) {
    geocoder = new GClientGeocoder();
  }
  if (geocoder) {
    geocoder.getLatLng(address, function(point) {
      if (!point) {
        document.getElementById(lat).innerHTML = 0;
        document.getElementById(lng).innerHTML = 0;
        document.getElementById(latDMS).innerHTML = 0;
        document.getElementById(lngDMS).innerHTML = 0;
      } else {
        var marker = new GMarker(point, {draggable: true});  
        document.getElementById(lat).innerHTML = point.lat();
        document.getElementById(lng).innerHTML = point.lng();

        var latSign = "";
        var latDecimal2 = point.lat();
        if (latDecimal2 < 0) {
          latSign = "-";
          latDecimal2 = -latDecimal2;
        }
        var latDeg = Math.floor(latDecimal2);
        var latMinDecimal = 60 * (latDecimal2 - latDeg);
        var latMin = Math.floor(latMinDecimal);
        var latSecDecimal = Math.round(10000 * 60 * (latMinDecimal - latMin))/10000;
        var latDegMinSec = latSign+String(latDeg)+"&deg; "+String(latMin)+"' "+String(latSecDecimal)+'"';
//        var latDegMinSec = latSign+String(latDeg)+"° "+String(latMin)+"' "+String(latSecDecimal)+'"';
        document.getElementById(latDMS).innerHTML = latDegMinSec;

        var lngSign = "";
        var lngDecimal2 = point.lng();
        if (lngDecimal2 < 0) {
          lngSign = "-";
          lngDecimal2 = -lngDecimal2;
        }
        var lngDeg = Math.floor(lngDecimal2);
        var lngMinDecimal = 60 * (lngDecimal2 - lngDeg);
        var lngMin = Math.floor(lngMinDecimal);
        var lngSecDecimal = Math.round(10000 * 60 * (lngMinDecimal - lngMin))/10000;
        var lngDegMinSec = lngSign+String(lngDeg)+"&deg; "+String(lngMin)+"' "+String(lngSecDecimal)+'"';
//        var lngDegMinSec = lngSign+String(lngDeg)+"° "+String(lngMin)+"' "+String(lngSecDecimal)+'"';
        document.getElementById(lngDMS).innerHTML = lngDegMinSec;
      }
    });
  }
}

</script>
<table border='1' style="width:100%;max-width:400px;border:1px solid grey;">
  <tr><td >Longitude</td><td>Latitude</td></tr>
  <tr><td id='lng'> </td><td id='lat'> </td></tr>
</table>
<script>

</script>



<div style="display:none">
<form target="uploadFrame" action="/resources/php/fileupload.php" class="upload" method="post" enctype="multipart/form-data" style="padding:10px;">
		<div style="width:300px;display:inline-block">	
			<label class="top">Upload a File</label>
			<input name="file" id="file" type="file"><br>
			<input id="category" name="file_category" value="images" type="hidden"><br>
			<input name="file_override" id="file_override" type="hidden" value="">

			<div style="position:relative"><input class="css-checkbox" id="fileow" name="file_overwrite" style="float:left" type="checkbox"><label for="fileow" class="checkbox-label" style="float:left"></label><label for="fileow">Overwrite if file exists?</label></div>

			<input name="submit" value="Upload" type="submit" onclick="jQuery('.upload').colorbox.close('Logo added succesfully')";>
			</div>
			<iframe style="display:none;right:0;position:absolute;overflow:hidden;" src="#" name="uploadFrame" id="uploadFrame" height="180px" scrolling="no"></iframe>
		</form>
<iframe name="hiddenFrame" ></iframe>
</div>
</section>
</div>

</body>
</html>