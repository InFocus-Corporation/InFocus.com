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

<head>


<script src="/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" media="screen" href="/resources/css/core.css">

<script type="text/javascript">
var cat="";

$(function() {
var $currentlySelected = null;
var selected1 = [];

$('#selectable').selectable({
    start: function(event, ui) {
        $currentlySelected = $('#selectable .ui-selected');
    },
    stop: function(event, ui) {
        for (var i = 0; i < selected1.length; i++) {
            if ($.inArray(selected1[i], $currentlySelected) >= 0) {
              $(selected1[i]).removeClass('ui-selected');
            }
        }
        selected1 = [];
    
  cat = "";
  $( ".ui-selected", this ).each(function() {
  var index = $( "#selectable li" ).index( this );
  cat = cat + "," + ( ( index + 1 )  );
  });

 },
    selecting: function(event, ui) {
        $currentlySelected.addClass('ui-selected'); // re-apply ui-selected class to currently selected items
    },
    selected: function(event, ui) {
        selected1.push(ui.selected); 
    }
});
});

$(document).ready(function(){
 $(".inline").colorbox({inline:true, width:"80%",
 onClosed: function () {
  
  
  document.getElementById("articlebody").innerHTML = document.getElementById("HTMLEdit").value

 }});

$( "#date" ).datepicker({ dateFormat: "yy-mm-dd" });
 $(".upload").colorbox({inline:true, width:"35%"});



});

function saveArticle(){

 var data = '<div id="articlebody" contenteditable="true">' + document.getElementById("articlebody").innerHTML.replace(/data-cke-saved-/g,"") +'</div>';

 data = makeReadable(data);

var idnum = <?php if(!empty($_GET['id'])){echo $_GET['id'];}else{echo '""';}?>; 

for(name in CKEDITOR.instances)
{
    CKEDITOR.instances[name].destroy();
}

  jQuery.post("/resources/php/savearticle.php",
   {id: idnum,
   lang: "<?php echo $lang;?>",
   atitle: document.getElementById("atitle").innerHTML,
   blurb: document.getElementById("blurb").innerHTML,
   articlebody: document.getElementById("articlebody").innerHTML,
   categories: cat,
   rating: sRank,
   relatedprod: document.getElementById("relatedprod").value,
   postdate: document.getElementById("date").value
  },
  function(response){
  
  console.log(response.length);
  console.log(idnum);
  if(parseInt(response, 10) > 0 && idnum==""){
  window.location.assign("?action=recordcreated&id=" + response);
  alert("Record Created");
  }
  else if(idnum!=""){alert(response);}
  else{alert("Submission failed.  Please save your entry to a text file and alert the admin of the error.");}
 });
}

function replaceText(){

 var data = document.getElementById("articlebody").innerHTML;

 data = makeReadable(data);
 document.getElementById("HTMLEdit").value = data;
}

function uploadType(category){

document.getElementById("category").value = category;
}


</script>

<style type="text/css">
#feedback { font-size: 1.4em; }
#selectable .ui-selecting { background: #f7f7f7; }
#selectable .ui-selected { background: #fff; color: #565656; }
#selectable { list-style-type: none; margin: 0; padding: 0;  }

#selectable li {
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
 font-size:x-small;
 }
 
 table{width:100%;}

</style>
</head>

<body>

<div class="content">
 <div class="C9">
 
 



  
 <?php
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");
 mysqli_set_charset($connection, "utf8");
ini_set('default_charset', 'utf-8');

 if(empty($_GET['id'])){
 $date = date("Y-m-d");
 }
 else{
 $sql = 'SELECT title, teaser, body, postdate, categories, rating, products FROM articles WHERE id=' . $_GET['id'];
 $result = mysqli_query($connection,$sql);
echo $sql;
 while($row = mysqli_fetch_array($result))
 {
 $title = $row[0];
 $blurb = $row[1];
 $atext = $row[2];
 $date = $row[3];
 $categories = $row[4];
 $rating = $row[5];
 $products = $row[6];
 }
 }
 echo 'Title of the Article\Review<br>';
  echo '<h5 id="atitle" contenteditable="true" style="border:dotted;min-height:35px">' . $title . '</h5>';
  echo '<label for="start_date">Date to post article</label>
   <input type="text" name="date" id="date" value="' . $date . '" placeholder="YYYY-MM-DD" /><br>';
echo '<script> cat="' .$categories. '";</script>';
   echo ' <p>Categories</p>
   <ol id="selectable" name="categories" >
<li class="ui-widget-content';
if(strrpos($categories, "vent")>0){echo ' ui-selected';}
echo '">Event</li>
<li class="ui-widget-content';
if(strrpos($categories, "ews")>0){echo ' ui-selected';}
echo '">News</li>
<li class="ui-widget-content';
if(strrpos($categories, "eview")>0){echo ' ui-selected';}
echo '">Review</li>
<li class="ui-widget-content';
if(strrpos($categories, "ory")>0){echo ' ui-selected';}
echo '">Story</li>';
// <li class="ui-widget-content';
// if(strrpos($categories, "4")>0){echo ' ui-selected';}
// echo '">Technology</li>
// <li class="ui-widget-content';
// if(strrpos($categories, "5")>0){echo ' ui-selected';}
// echo '">Art</li>
// <li class="ui-widget-content';
// if(strrpos($categories, "6")>0){echo ' ui-selected';}
// echo '">Good Works</li>
// <li class="ui-widget-content';
// if(strrpos($categories, "7")>0){echo ' ui-selected';}
// echo '">News</li>
// <li class="ui-widget-content';
// if(strrpos($categories, "8")>0){echo ' ui-selected';}
// echo '">Video Library</li>';
echo '</ol>';
 ?> 
<br><br><br>

<div id="reviewdiv">
<img id="starRating" style="width:220px;" onclick="recordRank(this.src);" onmouseover="this.style.opacity=0.6;" onmousemove="showPosition(event);" onmouseout="exitStar();this.style.opacity=1;" src="/resources/images/<?php if($rating == ""){echo '0';}else{echo $rating;} ?>star.png"/><br>
<label for="relatedprod">Related Products</label><br>
<INPUT type="text" name="relatedprod" id="relatedprod" placeholder="IN10;IN12;IN115;" onkeyup="this.value =  this.value.replace(/[\s]/g,';').replace(';;',';');" onchange="this.value = '' + this.value + ';';this.value = this.value.replace(/[\s]/g,';').replace(/;;/g,';');" value="<?php echo $products; ?>" required/>
</div>
  <script>
 var sRank = <?php if($rating == ""){echo '0';}else{echo $rating;} ?>;
 function recordRank(src){
var n = src.lastIndexOf('/');
sRank = src.substring(n + 1);  
sRank = sRank.replace("star.png","");
  }
function showPosition(evt)
{
	xy = getEventOffsetXY( evt );
	if(xy[0]>=201){$('#starRating').attr("src","/resources/images/50star.png");}
	else if(xy[0]>=179){$('#starRating').attr("src","/resources/images/45star.png");}
	else if(xy[0]>=157){$('#starRating').attr("src","/resources/images/40star.png");}
	else if(xy[0]>=135){$('#starRating').attr("src","/resources/images/35star.png");}
	else if(xy[0]>=113){$('#starRating').attr("src","/resources/images/30star.png");}
	else if(xy[0]>=91){$('#starRating').attr("src","/resources/images/25star.png");}
	else if(xy[0]>=69){$('#starRating').attr("src","/resources/images/20star.png");}
	else if(xy[0]>=47){$('#starRating').attr("src","/resources/images/15star.png");}
	else if(xy[0]>=25){$('#starRating').attr("src","/resources/images/10star.png");}
	else if(xy[0]>=3){$('#starRating').attr("src","/resources/images/5star.png");}
	else if(xy[0]<3){$('#starRating').attr("src","/resources/images/0star.png");}
	
	

};

function getEventOffsetXY( evt )
{
	if ( evt.offsetX != null )
		return [ evt.offsetX , evt.offsetY ];

    var obj = evt.target || evt.srcElement;
   	setPageTopLeft( obj );
    return [ ( evt.clientX - obj.pageLeft ) , ( evt.clientY - obj.pageTop ) ];
};

function setPageTopLeft( o )
{
    var top = 0,
    left = 0,
    obj = o;

    while ( o.offsetParent )
     {
         left += o.offsetLeft ;
         top += o.offsetTop ;
         o = o.offsetParent ;
    };

    obj.pageTop = top;
    obj.pageLeft = left;

};

function exitStar(){

	if(sRank==50){$('#starRating').attr("src","/resources/images/50star.png");}
	else if(sRank==45){$('#starRating').attr("src","/resources/images/45star.png");}
	else if(sRank==40){$('#starRating').attr("src","/resources/images/40star.png");}
	else if(sRank==35){$('#starRating').attr("src","/resources/images/35star.png");}
	else if(sRank==30){$('#starRating').attr("src","/resources/images/30star.png");}
	else if(sRank==25){$('#starRating').attr("src","/resources/images/25star.png");}
	else if(sRank==20){$('#starRating').attr("src","/resources/images/20star.png");}
	else if(sRank==15){$('#starRating').attr("src","/resources/images/15star.png");}
	else if(sRank==10){$('#starRating').attr("src","/resources/images/10star.png");}
	else if(sRank==05){$('#starRating').attr("src","/resources/images/05star.png");}
	else if(sRank==00 || sRank === undefined){$('#starRating').attr("src","/resources/images/00star.png");}

}


	</script>
<br>blurb visible in condensed article view<br>
<div id="blurb" contenteditable="true" style="border:dotted;min-height:35px;"><?php echo $blurb; ?></div>
<br>Full Article<br>
<div id="articlebody" contenteditable="true" style="border:dotted;min-height:35px;padding:1%" ><?php echo $atext; ?></div>
 

 <br>
 *Use the string {{Rate}} to insert the rating into the blurb or the full article.
 
 <br><br><br>

 
 <script src="/resources/plugins/jquery-handsontable/dist/jquery.handsontable.full.js"></script>
<link rel="stylesheet" media="screen" href="/resources/plugins/jquery-handsontable/dist/jquery.handsontable.full.css">

 
   <div style="width:1010px"><div id="dataTable" ></div></div>
    </div>

<script>

<?php 
$sql = 'SELECT id, CONCAT("<a href=?id=' . "'" . '",id,"' . "'" . '>Open Article</a>") as Link, title, date, postdate FROM articles ORDER BY date desc';
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
 colWidths: [65, 85, 550, 150, 150],
height:600,
 autoWrapRow:true,
 autoWrapCol:true,
 cells: function (row, col, prop) {
    var cellProperties = {};
	if(col == 1){
	cellProperties.renderer = "html"; }
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
 
var var1 = container.handsontable('getDataAtRowProp',changes,"id");
			jQuery.post("/resources/php/tableQuery.php",
			{where: "id = "+var1,
			 removerow: "TRUE",
			 table:"articles"},
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
 
 
 
 </script>
 
 
 
 
 <div style="display:none">
 <div id="inline_content" style="padding:10px; background:#fff;">
 <p><textarea id="HTMLEdit" style="width:100%;height:600px;"></textarea></p>
 <p><a id="click" href="#" style="padding:5px; background:#ccc;">Save HTML Edits</a></p>
 </div>
 
</div>
</div>

 <br><br><br><br>

<form style="position:fixed;left:0;bottom:0;z-index:9999999999;height:50px;width:100%">
 <div style="position:fixed;left:0;bottom:0;z-index:9999999999;">
  <button type="button" type="button" onclick="window.location='addarticles.php';" style="float:left">New Record</button>
  <button type="button" class="inline" href="#inline_content" onclick="replaceText()" style="float:left">Edit HTML</button>
  </div>
 <div style="position:fixed;left:40%;bottom:0;z-index:9999999999;">
  Uploads<button type="button" class="upload" href="#upload" onclick="$('#uploadFrame').slideUp(100);uploadType('images')"  style="float:center">Image</button><button type="button" class="upload" href="#upload" onclick="$('#uploadFrame').slideUp(100);uploadType('documents')"  style="float:center">Document</button><button type="button" class="upload" href="#upload" onclick="$('#uploadFrame').slideUp(100);uploadType('video')"  style="float:center">Video</button>
  </div>
 <div style="position:fixed;right:0;bottom:0;z-index:9999999999;">
  <button type="button" onclick="saveArticle()" style="float:right">Save Page Changes</button>
  <iframe src="#" style="display:none;" name="hiddenFrame" id="hiddenFrame"></iframe>
  </div>
</form>


 <div style="display:none">
<div id="upload" style="background-color:transparent;" >
<form Target="uploadFrame" action="/resources/php/fileupload.php"  method="post"
enctype="multipart/form-data">
  <iframe style="display:none;right:0;position:absolute;overflow:hidden;" src="#" name="uploadFrame" id="uploadFrame" height="180px" scrolling="no"></iframe>
<label class="top">Attach a File</label>
<input type="file" name="file" id="file"><br>
<label class="top">File Category</label>
<input type="text" id="category" name="file_category" readonly></br>
<label class="top">Override upload filename</label>
<input type="text" name="file_override"><br><br>
<input type="checkbox" id="fileow" name="file_overwrite" style="float:left"><label for="fileow">Overwrite if file exists?</label>
<br><br>
<input type="submit" name="submit" value="Upload" onclick="$('#uploadFrame').delay(1500).slideDown(1000);">
</form>
  </div>



  </div>
</body>
</html>
