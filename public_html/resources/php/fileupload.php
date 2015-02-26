<?php
if(empty($_FILES["file"])){die();}
$allowedExts = array("gif", "jpeg", "jpg", "png", "pdf", "exe", "zip", "doc", "docx", "xls", "xlsx", "txt","PNG");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = strtolower(end($temp));
if (($_FILES["file"]["size"] < 200000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	echo  "<br>";
	$file_folder="/" . $_POST[file_category] . "/";

	$filename=$_FILES["file"]["name"];
	if(!empty($_POST['file_override']))
	{
	$filename=$_POST['file_override']. "." .$extension;
	}

	
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/resources"  .$file_folder. "" .$filename) && isset($_POST['file_overwrite'])== false)
      {
	  echo $_SERVER['DOCUMENT_ROOT'] . "/resources"  .$file_folder. "" .$filename;
?> 
  <script type="text/javascript"> 
    alert("File already exists by that name.");
	
  </script> 
<?php  
      } 
    else
      {

 move_uploaded_file($_FILES["file"]["tmp_name"],$_SERVER['DOCUMENT_ROOT'] . "/resources"  .$file_folder. "" .$filename);
	  echo 'Link: <a href="/resources'  .$file_folder. $filename .'">' . $filename . '</a>';
      }
    }
  }
else
  {
  echo "Invalid file";
  echo "<br/>";
  echo $_FILES["file"]["size"];
  echo "<br/>";
  echo in_array($extension, $allowedExts);
  echo "<br/>";
  echo $extension;
  }
?>