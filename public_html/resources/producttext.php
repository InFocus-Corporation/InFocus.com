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

    <div id="layout">
   <section id="content" style="margin-left:50px;">
<div style="padding-top:40px;"></div>
Wildcard Search (max 1 result)<br>
<input id="partsearch" type="text" ><button type="button" onclick="window.location = '?pn=' + document.getElementById('partsearch').value;">Search</button>
<?php

require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");
mysqli_set_charset($connection, "utf8");
$pn = mysqli_real_escape_string($connection, strtoupper($_GET["pn"]));
if(!empty($pn)){
$result = mysqli_query($connection,'SELECT * FROM producttext WHERE partnumber = "' . $pn . '" AND lang = "' . $lang . '" LIMIT 1');


while($row = mysqli_fetch_array($result))
{

$partnumber = $row['partnumber'];
$title = $row['title'];
$listtitle = $row['listtitle'];
$active = $row['active'];
$price = $row['price'];
$description = $row['description'];
$header = $row['header'];
$blurb = $row['blurb'];
$list = $row['list'];
$region = $row['region'];
$lang = $row['lang'];
$category = $row['category'];
$firmware = $row['firmware'];
$group = $row['productgroup'];
$addImage = $row['additionalimages'];
$productmeta = $row['productmeta'];

}
}


?>
<br>
<form id="formid" style="width:400px;margin-bottom:200px;float:left;" method="post" action="/resources/php/producttextcreateupdate.php" target="hiddenFrame">

<label class="top" for="partnumber">Part Number</label>
<input type="text" id="partnumber" name="partnumber" value="<?php echo $partnumber; ?>"/>

<label class="top" for="title">Title</label>
<input type="text" id="title" name="title" value="<?php echo $title; ?>"/>

<label class="top" for="listtitle">List Title</label>
<input type="text" id="listtitle" name="listtitle" value="<?php echo $listtitle; ?>"/>

<label class="top" for="active">Active Product</label>
<input type="text" id="active" name="active" value="<?php echo $active; ?>"/>

<label class="top" for="price">Price</label>
<input type="text" id="price" name="price" value="<?php echo $price; ?>"/>

<label class="top" for="description">Description</label>
<input type="text" id="description" name="description" value="<?php echo $description; ?>"/>

<label class="top" for="header">Header</label>
<input type="text" id="header" name="header" value="<?php echo $header; ?>"/>

<label class="top" for="blurb">Blurb</label>
<textarea type="text" id="blurb" name="blurb" rows="10" col="10"><?php echo $blurb; ?></textarea>

<label class="top" for="list">List</label>
<textarea type="text" id="list" name="list" rows="10" col="10"><?php echo $list; ?></textarea>

<label class="top" for="region">Region</label>
<input type="text" id="region" name="region" value="<?php echo $region; ?>"/>

<label class="top" for="lang">Language</label>
<input type="text" id="lang" name="lang" value="<?php echo $lang; ?>"/>

<label class="top" for="category">Category</label> <span style="color:red">Only enter a category if you want this product to SHOW UP in the category.  This is generally only for Family/Series entries or accessories.</span>
<input type="text" id="category" name="category" value="<?php echo $category; ?>"/>

<label class="top" for="productgroup">Product Group</label> 
<Select type="text" id="productgroup" name="productgroup" >
<option value="Projector" <?php if($group == "Projector"){echo "Selected"; }?>>Projector</option>
<option value="Display" <?php if($group == "Display"){echo "Selected"; }?>>Display</option>
<option value="Series" <?php if($group == "Series"){echo "Selected"; }?>>Series</option>
<option value="Accessory" <?php if($group == "Accessory"){echo "Selected"; }?>>Accessory</option>
<option value="Peripheral" <?php if($group == "Peripheral"){echo "Selected"; }?>>Peripheral</option>
</select>
<label class="top" for="additionalimages">Additional Images (comma separated)</label>
<textarea type="text" id="additionalimages" name="additionalimages" rows="10" col="10"><?= $addImage; ?></textarea>
<br>
<label class="top" for="productmeta">Custom Meta (Product Name, Title, Category, and Accessories are already included)</label>
<textarea type="text" id="productmeta" name="productmeta" rows="10" col="10"><?= $productmeta; ?></textarea>
<br>
<label class="top" for="firmware">Firmware</label>
<textarea type="text" id="firmware" name="firmware" rows="10" col="10"><?= $firmware; ?></textarea>
<br><br><br>
<input type="submit" id="submit" name="submit" value="Submit"/>
</form>


<div style="float: left;
height: 420px;
margin-left: 50px;
box-shadow: inset 2px 5px 20px #555;
border-radius: 5px;
padding: 9px;
z-index: 100;
background: transparent;
width: 210px;">
<div style="overflow: auto;
height: 424px;
z-index: 50;
width: 216px;">List of current product text entries<br>

<?php

require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");

$result = mysqli_query($connection,'SELECT * FROM producttext WHERE partnumber LIKE "%' . $pn . '%" ORDER BY partnumber');


while($row = mysqli_fetch_array($result))
{
$partnumber = $row['partnumber'];
$lang = $row['lang'];
echo "<a href='?pn=$partnumber&lang=$lang'>$partnumber - $lang</a><br>";

}



?>
</div>
</div>

<div>
<table class="square" style="float:left;margin-left: 50px;margin-top:20px;">
<tr><td>Active<br>code</td><td></td><td>Buttons</td><td>Price</td></tr>
<tr><td>1</td><td>SKU Sold in Store</td><td>Buy Now, Get a Quote, Find a Reseller</td><td>Yes</td></tr>
<tr><td>2</td><td>SKU NOT sold in store, but still an "Active" product</td><td>Find a Reseller, Get a Quote</td><td>Yes</td></tr>
<tr><td>3</td><td>Mondopad</td><td>Get a Quote, Request a Demo, Find a Reseller (MP)</td><td>No</td></tr>
<tr><td>4</td><td>"Portal" purchasable (ie, ConX)</td><td>Buy Now (portal), Get a Quote, Find a Reseller</td><td>No</td></tr>
<tr><td>5</td><td>Webstore-ONLY</td><td>Buy Now</td><td>Yes</td></tr>
<tr><td>6</td><td>Mondopad in Webstore</td><td>Get a Quote, Request a Demo, Find a Reseller (MP)</td><td>??</td></tr>
<tr><td>7</td><td>Lamps (when launched)</td><td>Buy Now(lampstore), Get a Quote, Find a Reseller</td><td>Yes</td></tr>
<tr><td>8</td><td>Free Software</td><td>Download</td><td>No</td></tr>
<tr><td>9</td><td>Inactive products(EOL), Sold in Outlet Store</td><td>Buy Now(outlet)</td><td>No</td></tr>
<tr><td>0</td><td>Inactive Products (EOL, EOSL)</td><td>None</td><td>No</td></tr>
<tr><td>Null</td><td>Inactive Products (EOL, EOSL)</td><td>None</td><td>No</td></tr>
</table>


</div>

<div style="display:none">

<iframe name="hiddenFrame" ></iframe>
</div>
<script>

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
  $("#specialfeatures")[0].textContent = replacestring;

 },
    selecting: function(event, ui) {
        $currentlySelected3.addClass('ui-selected'); // re-apply ui-selected class to currently selected items
    },
    selected: function(event, ui) {
        selected3.push(ui.selected); 
    }
});



});

var x = document.getElementsByTagName("tr");
 $(document).ready(function() {
$('[contenteditable]').on('paste',function(e) {
    e.preventDefault();
    var text = (e.originalEvent || e).clipboardData.getData('text/plain') || prompt('Paste something..');
    document.execCommand('insertText', false, text);
});
 });
 
function copyRow(r){

var root = document.getElementById('tab').getElementsByTagName('tr')[1].childNodes;
var rfrom = document.getElementById('tab').getElementsByTagName('tr')[r].childNodes;

for (var i = 1, len = rfrom.length; i < len; i++) {
  root[i].innerHTML = rfrom[i].innerHTML;
}
}

function post_to_url(path, method) {

var r=confirm("Please confirm change submission");
if (r==true)
  {
  }
else
  {
 return;
  } 

    method = method || "post"; // Set method to post by default if not specified.
 var headers = document.getElementById('tab').getElementsByTagName('tr')[0].childNodes;
 var root = document.getElementById('tab').getElementsByTagName('tr')[1].childNodes;
 var params = [];
 
 for (var i = 1, len = root.length; i < len; i++) {
 params[headers[i].textContent] = root[i].innerHTML;
 }

 
    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);
 form.setAttribute("target", "hiddenFrame");
 
    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}


	$( "#formid" ).change(function() {
  window.onbeforeunload = function(e) {
  return 'It looks like you may have unsaved changes, are you sure you want to leave the page?';
	};
});
$( "#formid" ).submit(function() {
  window.onbeforeunload = false;
});
</script>
</body>
</html>