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
<script src="/ckeditor/ckeditor.js"></script>

<script>

function submitCustompage(){

	  var pn = document.getElementById('pagename').value;
	  var lang = document.getElementById('lang').value;

	  if(document.getElementById('titleval').value.length==0){
		alert("Pages MUST have a title attribute");
		return;
		}
	  
var	r=confirm("Confirm changes to "	+	pn	+	" for language " + lang + "\n Be aware this will delete/replace any current page with this name and language.");
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


document.getElementById('custompage').innerHTML = "<title>" + document.getElementById('titleval').value + "</title>" + "<title>" + document.getElementById('titleval').value + "</title>" + '<meta name="description" content="' + document.getElementById('descval').value + '"/>' + document.getElementById('custompage').innerHTML.replace(/<title>.*?<\/title>/g,"").replace(/<meta name="description" .*?\/>/g,"");  

	  		 	jQuery.post("/resources/php/custompagesubmit.php",
			{pn: pn,
			lang: lang,
			html: document.getElementById('custompage').innerHTML
			},
			function(response){
			   document.getElementById("results").innerHTML = response;
			});

}

</script>
<div style="padding-top:87px;">
<div style="width:450px;height:250px;float:left;margin-top:40px;overflow:auto;">
<?php 
$sql = 'SELECT pagename,lang FROM pages';
$results = mysqli_query($connection,$sql);
while($row = mysqli_fetch_array($results)){
echo "<a href='?pagename=$row[0]&lang=$row[1]'>$row[0] $row[1]</a><br>";
}

?>
</div>

<div style="width:450px;height:250px;margin-left:20px;float:left;margin-top:40px;">

<label for="pagename">Page Name</label><br>
<input name="pagename" id="pagename" value="<?php echo $_GET['pagename'];?>"/><br>
<label for="lang">Language</label><br>
<input name="lang" id="lang" value="<?php echo $_GET['lang'];?>"/><br>
<label for="titleval">Page Title Attribute</label><br>
<input name="titleval" id="titleval"/><br>
<label for="titleval">Page Description Attribute</label><br>
<textarea name="descval" id="descval"></textarea><br>
<button type="button" onclick="submitCustompage();">Save Page</button><br>
<span id="results"></span>
</div>
</div>

 <div class="content" style="clear:both;border: 2px solid black;">
		<div id="custompage" class="C9 cmsedit" style="min-height:200px;" contenteditable="true">
		
<?php 
		if(empty($_GET['pagename'])){$_GET['pagename'] = $_SERVER['QUERY_STRING'];}

		$sql = "SELECT pagecontent FROM pages WHERE pagename = '" . $_GET['pagename'] . "' AND lang = '" . $_GET['lang'] . "'";
		$results = mysqli_query($connection,$sql);
		while($row = mysqli_fetch_array($results)){echo $row['pagecontent'];}
echo '		</div>
	</div>';

?>

<div style="display:none">
<iframe name="hiddenFrame" ></iframe>
</div>
<script>

document.getElementById('titleval').value =  document.title.replace("- Mozilla Firefox","");


        var URL = window.location;
        var Title = parent.document.getElementsByTagName("title")[0].innerHTML;
        var MetaDescription = "";
        var metaDesc = $.get(URL, function (data) {
            MetaDescription = $(data).find('meta[name=description]').attr("content");
            console.log(MetaDescription);
			document.getElementById('descval').value = MetaDescription;
			if(document.getElementById('descval').value = "undefined"){document.getElementById('descval').value="";}
        });


</script>
</body>
</html>