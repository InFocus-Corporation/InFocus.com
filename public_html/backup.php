<?php
ini_set("max_execution_time", 0);
 
//By using below code we are creating a directory in which you’re going to stored your zip.
$dir = "site-backup";
if(!(file_exists($dir))) {mkdir($dir, 0755);}
$zip = new ZipArchive();

//Now we have to get current folder name in which our php file is present. This is because when we have to move all folders and files from root directory to our zip.
//get the current folder name-start
$path = dirname($_SERVER['PHP_SELF']);
$position = strrpos($path,'/') + 1;
$folder_name = substr($path,$position);

//Create a name for zip file. I have created it based on today’s date so that we can easily find date of last backup. Also I have append ‘stark-’ to a name of zip file which we use in next procedures.
$zipname = date('Y/m/d');
$str = "sbak-".$zipname.".zip";
$str = str_replace("/", "-", $str);

// open archive
if ($zip->open($str, ZIPARCHIVE::CREATE) !== TRUE) {
die ("Could not open archive");
}
// initialize an iterator
// pass it the directory to be processed
// iterate over the directory
// add each file found to the archive
$folders = array("accessories","displays","peripherals","projectors","support","resources/css","resources/fonts","resources/forms","resources/html","resources/images","resources/js","resources/php");
foreach($folders as $folder){
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("/home/devinfoc/public_html/".$folder));
foreach ($iterator as $key=>$value) {
$zip->addFile(realpath($key), $key) or die ("ERROR: Could not add file: $key");
}
}
$iterator = new RecursiveDirectoryIterator("/home/devinfoc/public_html/resources/");
foreach ($iterator as $key=>$value) {
$zip->addFile(realpath($key), $key) or die ("ERROR: Could not add file: $key");
}
$iterator = new RecursiveDirectoryIterator("/home/devinfoc/public_html/");
foreach ($iterator as $key=>$value) {
$zip->addFile(realpath($key), $key) or die ("ERROR: Could not add file: $key");
}
// close and save archive
$zip->close();
echo "Archive created successfully.";

//Now move a copy of our zip file to a directory.
//get the array of zip files
if(glob("*.zip") != false) {
$arr_zip = glob("*.zip");
}

//copy the backup zip file to backup folder
foreach ($arr_zip as $key => $value) {
if (strstr($value, "sbak")) {
$delete_zip[] = $value;
copy("$value", "$dir/$value");
}
}

//Delete a zip file from root directory as we moved it in another directory.
for ($i=0; $i < count($delete_zip); $i++) {
unlink($delete_zip[$i]);
}