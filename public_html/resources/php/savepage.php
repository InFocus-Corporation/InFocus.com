<?PHP
$groups_allowed = "admin,salespublisher,saleseditor,marketingpublisher,marketingeditor";
require($_SERVER['DOCUMENT_ROOT'] . "/login/ublock.php");


require($_SERVER['DOCUMENT_ROOT'] . "/login/ubvars.php");

$homedir=substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"public_html")+11); 

if(!empty($_REQUEST['title'])){
$connection = mysqli_connect('67.43.0.33','Marketing-ISU','UISnIF-0gcnu', 'InFocus',3306);

	$result = mysqli_query($connection,'UPDATE producttext SET title = "' . mysqli_real_escape_string($connection,$_REQUEST['title']) . '", price = "' . mysqli_real_escape_string($connection,$_REQUEST['price']) . '", header = "' . mysqli_real_escape_string($connection,$_REQUEST['header']) . '", blurb = "' . mysqli_real_escape_string($connection,$_REQUEST['blurb']) . '", list = "' . mysqli_real_escape_string($connection,$_REQUEST['list']) . '" WHERE partnumber = "' . $_REQUEST['pn'] . '" AND lang = "' . $_REQUEST['lang'] . '"');

echo "Server has been updated.";
}


?>