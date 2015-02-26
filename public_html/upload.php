<?php

 for($i=0; $i<count($_FILES['upload']['name']); $i++) {
  //Get the temp file path
  $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

  //Make sure we have a filepath
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath = "upload/" . $_FILES['upload']['name'][$i];

    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, $newFilePath)) {

      //Handle other code here
	  chmod($newFilePath, 0777); 
	  


    }
  }
}
	  echo "Files Saved <br> <br> Current File List: <br>";

if ($handle = opendir('upload')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
			
			echo "$entry";
			echo "<br>";
        }
    }
    closedir($handle);
}
?> 