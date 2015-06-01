<?PHP

$groups_allowed = "admin,editor";
require($_SERVER['DOCUMENT_ROOT'] . "/login/ublock.php");


require($_SERVER['DOCUMENT_ROOT'] . "/login/ubvars.php");

$homedir=substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"public_html")+11); 

$keynum = array(1,2,3,4,5,6);
$valrep = array('Event','News','Press Review','Customer Review','Story');
$_REQUEST['categories'] = str_replace($keynum,$valrep,$_REQUEST['categories']);

require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");
mysqli_set_charset($connection, "utf8");

ini_set('default_charset', 'utf-8');


if(!empty($_REQUEST['id'])){

	$result = mysqli_query($connection,'UPDATE articles SET title = "' . mysqli_real_escape_string($connection,$_REQUEST['atitle']) . '", teaser = "' . mysqli_real_escape_string($connection,$_REQUEST['blurb']) . '" , postdate =  STR_TO_DATE("' .$_REQUEST['postdate']. '","%Y-%m-%d") , body = "' . mysqli_real_escape_string($connection,$_REQUEST['articlebody']) . '", categories = "'. $_REQUEST['categories'] . '", lang = "'. $_REQUEST['lang'] . '", rating = "'. $_REQUEST['rating'] . '", products = "'. $_REQUEST['relatedprod'] . '" WHERE id = "' . $_REQUEST['id'] . '"');
	
	if(mysqli_error($connection)==""){echo "Updated";}
	else{echo mysqli_error($connection);}

}
else{

	$result = mysqli_query($connection,'INSERT INTO articles SET title = "' . mysqli_real_escape_string($connection,$_REQUEST['atitle']) . '", teaser = "' . mysqli_real_escape_string($connection,$_REQUEST['blurb']) . '", postdate = STR_TO_DATE("' .$_REQUEST['postdate']. '","%Y-%m-%d"), body = "' . mysqli_real_escape_string($connection,$_REQUEST['articlebody']) . '", categories = "'. $_REQUEST['categories'] . '", lang = "'. $_REQUEST['lang'] . '", rating = "'. $_REQUEST['rating'] . '", products = "'. $_REQUEST['relatedprod'] . '"');

echo mysqli_insert_id($connection);
}

?>