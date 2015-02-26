<?php

if(!empty($_POST['mainmenu'])){
file_put_contents($_SERVER['DOCUMENT_ROOT']. "/resources/html/mainmenu-" . $_POST['lang'] . ".html",$_POST['mainmenu']);
header("location: ");
}
$groups_allowed = "admin,editor,saleseditor,marketingeditor";
require($_SERVER['DOCUMENT_ROOT'] . "/login/ublock.php");

require_once($_SERVER['DOCUMENT_ROOT']. "/resources/php/infocusscripts.php");
$localdir = dirname(__FILE__);

require($_SERVER['DOCUMENT_ROOT'] . "/resources/cmsmainmenu.html");
mysqli_set_charset($connection, "utf8");


if(!empty($_GET['lang'])){$lang = $_GET['lang'];}

?>



 <div class="content" >
		<div class="C9" >
		<form  id="formid" style="height:670px;padding:20px;" method="POST" action="">
		<textarea name="mainmenu" style="width:97%;height:600px;margin:auto;">
			<?php 
			$content = file_get_contents($homedir . "/resources/html/mainmenu-" . $lang . ".html");
			echo $content;
			 ?>
			 </textarea>
			 <input type="hidden" name="lang" value="<?php echo $lang; ?>" />
			 <br>
			 <br>
			 <input type="submit" value="submit" />
		</form>

	</div>
	</div>

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