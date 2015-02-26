<!DOCTYPE html>
<?php
$groups_allowed = "admin,Marketing,editor";
require($_SERVER['DOCUMENT_ROOT'] . "/login/ublock.php");


require($_SERVER['DOCUMENT_ROOT'] . "/login/ubvars.php");
ini_set('default_charset', 'utf-8');
global $localdir;
global $homedir; 
$localdir = dirname(__FILE__);
$homedir = substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"public_html")+11); 
if (in_array('admin',$ub_group_list,TRUE) AND empty($_GET[test])){echo '<script src="/ckeditor/ckeditor.js"></script>';}

$fileName = $homedir."/resources/overviews/ProjectorBlank.src";


?>
<HTML>
<head>
<link href='http://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'><title>InFocus Projectors</title>
<meta charset="UTF-8" />


<script src="/ckeditor/ckeditor.js"></script>
<script type="text/Javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/Javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script type="text/Javascript" src="/resources/global/js/jquery.colorbox.js"></script>
<link rel="stylesheet" href="/resources/global/css/colorbox.css" />
<link type="text/css" rel="stylesheet" href="/resources/global/css/base.css" />
<link type="text/css" rel="stylesheet" href="/resources/global/css/General.css" />
<link rel="stylesheet" href="/resources/global/css/jqueryui.css" />
<script type="text/Javascript" src="/resources/global/js/InFocusCollection.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

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
	

		jQuery.post("/resources/php/savearticle.php",
			{id: "<?php echo $_GET['id'];?>",
			title: document.getElementById("title").innerHTML.replace(/data-cke-saved-/g,""),
			blurb: document.getElementById("blurb").innerHTML.replace(/data-cke-saved-/g,""),
			articlebody: document.getElementById("articlebody").innerHTML.replace(/data-cke-saved-/g,""),
			categories: cat,
			postdate: document.getElementById("date").value.replace(/data-cke-saved-/g,"")
		},
		function(response){
		   alert(response);
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

</style>
</head>

<body>

<div class="section group">
	<div class="col span_2_of_10"  ></div>
	<div class="col span_6_of_10"  >
	
	



		
	<?php
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");
mysqli_set_charset($connection, "utf8");

ini_set('default_charset', 'utf-8');
	if(empty($_GET['id'])){
	$date = date("Y-m-d");
	}
	else{
	$sql = 'SELECT title, teaser, body, postdate, categories FROM articles WHERE id=' . $_GET['id'];
	$result = mysqli_query($connection,$sql);
	echo $sql;
	while($row = mysqli_fetch_array($result))
	{
	$title = $row[0];
	$blurb = $row[1];
	$atext = $row[2];
	$date = $row[3];
	$categories = $row[4];
	}
	}
	echo 'Title of the Article<br>';
		echo '<h2 id="title" contenteditable="true" style="border:dotted;min-height:35px">' . $title . '</h2>';
		echo '<label for="start_date">Date to post article</label>
			<input type="text" name="date" id="date" value="' . $date . '" placeholder="YYYY-MM-DD" /><br>';
echo '<script> cat=' .$categories. ';</script>';
			echo ' <p>Categories</p>
			<ol id="selectable" name="categories" >
<li class="ui-widget-content';
if(strrpos($categories, "1")>0){echo ' ui-selected';}
echo '">Events</li>
<li class="ui-widget-content';
if(strrpos($categories, "2")>0){echo ' ui-selected';}
echo '">News</li>
<li class="ui-widget-content';
if(strrpos($categories, "3")>0){echo ' ui-selected';}
echo '">Job Posting</li>';
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
echo '</ol>
			
	
			<br><br>blurb visible in condensed article view<br>';
			echo '<div id="blurb" contenteditable="true" style="border:dotted;min-height:35px;">' . $blurb . '</div><br>Full Article<br>';
		echo '<div id="articlebody" contenteditable="true" style="border:dotted;min-height:35px;">' . $atext. '</div>';
	
	?>
	<br><br><br><br>
	Article Index:<br>
	<table ><tr><th>Title</th><th>Date</th></tr>
	<?php

	$result = mysqli_query($connection,'SELECT id, title, postdate FROM articles ORDER BY postdate desc');
	
	while($row = mysqli_fetch_array($result))
	{
	echo '<tr><td>';
	echo '<a href="?id=' . $row[0] . '">' . $row[1] . '</a></td><td>' . $row[2] . '</td></tr>';
	}

	?>
		</table>
	</div>
	
	<div style="display:none">
	<div id="inline_content" style="padding:10px; background:#fff;">
	<p><textarea id="HTMLEdit" style="width:100%;height:600px;"></textarea></p>
	<p><a id="click" href="#" style="padding:5px; background:#ccc;">Save HTML Edits</a></p>
	</div>
	
</div>
</div>

	<br><br><br><br>

<form style="position:fixed;left:0;bottom:0;z-index:9999999999;height:20px;width:100%">
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
