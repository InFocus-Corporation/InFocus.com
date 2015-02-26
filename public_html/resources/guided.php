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
   <section id="content">
   <div id="instructions" style="padding-top:10px;margin:0px 40px;">First step is to enter specifications for each product you plan on creating.  So lets say you are adding all the projectors in the IN120a series, you would enter specs for IN122a, IN124a, and IN126a before moving to the next step.  There are no required fields so fill out as much as you have, it can always be updated later.   
   </div><button id="nextbutton" onclick="nextStep()"  style="margin:5px 40px;">Next Step</button>
   
   <div id="guidedwindow" style="overflow-y:hidden;overflow-x:auto; width:100%;padding-top:30px;">
   <iframe id="guidedframe" scrolling="auto" src="<?php echo $_GET['product'];?>" width="100%" height="730px" style="margin-top:-130px"></iframe>
   </div>
<script>
var currentStep = 1;
$(document).ready(function() {
 $('#guidedwindow').mousewheel(function(e, delta) {
  this.scrollLeft -= (delta * 120);
  e.preventDefault();
 });
});

function nextStep(){

switch(currentStep){

 case 1:
 document.getElementById("instructions").innerHTML = "Next you will want to enter the 'product text' values.  These are text blocks you see in descriptions, features, lists, and searches.  You will also create an additional 'product' for the SERIES.  So as with the first example you would enter IN122/4/6a, and you would also add IN120A-Series.  These entries are CASE SENSITIVE so capitolize all letters in the part number, and the first letter in 'Series'.";
 document.getElementById('guidedframe').width = "100%";
 document.getElementById('guidedframe').height = "1900px";
 document.getElementById('guidedframe').src = "producttext";
 $('#guidedwindow').off('mousewheel');
 if("<?php echo $product;?>" == "accessories"){currentStep = 3;}
 else{currentStep = 2;}
 break;
 
 case 2:
 document.getElementById("instructions").innerHTML = 'On this table you create the association of Product to Product Series.  If you are adding to an already existing product series, find that series name and add additional part numbers and differences.  If you are creating a new series remember INxxx0-Series is the correct format.';
 document.getElementById('guidedframe').src = "series";
 currentStep = 3;
 break;
 
 case 3:
 document.getElementById("instructions").innerHTML = 'This is the section for adding downloads related to the products you are creating.  This is <strong>specifically</strong> items that would end up in the "downloads" tab.  Images and linked documents can be added on the next step.';
 document.getElementById('guidedframe').src = "downloads";
 currentStep = 4;
 break;
 
 case 4:
 document.getElementById("instructions").innerHTML = 'Now you will need to create the "Overview" sections for each product (accessories frequently do not have overviews).  The overview tab on the product page has 3 to 5+ sections each with an image or video, and a highlighted feature of the product.  Below is a "frame" to build this in.  If you need to upload images or edit the html use the buttons in the bar at the bottom of the page.  If you need to add items for download like user guides, data sheets, or software that should have been done on the previous step.  When you are completed with each click "Save As" and enter the part number (remember all caps)';
 document.getElementById('guidedframe').src = "overvieweditor";
 document.getElementById('guidedframe').height = "800px";
 document.getElementById('guidedframe').scrolling = "yes";
 $('#guidedwindow').css({overflow:"auto"});
 currentStep = 5;
 break;
 
 case 5:
 if("<?php echo $product;?>" == "accessories"){
 document.getElementById("instructions").innerHTML = 'The final step is to the new accessory to compatable products.  Type in the accessory part number (as soon as you start typing you can select from the list) and click "get products".  This will bring up a list of all Products.  Check boxes of products that are compatable, and enter a "rank" if applicable.';
 document.getElementById('guidedframe').src = "accessorymatrix";
 }
 else{
 document.getElementById("instructions").innerHTML = 'The final step is to add optional/compatable accessories.  Type in the product name (as soon as you start typing you can select from the list) and click "get products".  This will bring up a list of all accessories.  Check boxes of accessories that are compatable, and enter a "rank" if certain accessories should appear earlier in the list than others.';
 document.getElementById('guidedframe').src = "accessorymatrixp";
 }
 document.getElementById("nextbutton").innerHTML = "Done!";
 currentStep = 6;
 break;
 
 default:
 window.location='maincms';
 
}
}
  </script>   
   </section>
</div>
</html>