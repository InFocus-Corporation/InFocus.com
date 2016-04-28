<?PHP
$groups_allowed = "admin,salespublisher,saleseditor,marketingpublisher,marketingeditor";
require($_SERVER['DOCUMENT_ROOT'] . "/login/ublock.php");
require($_SERVER['DOCUMENT_ROOT'] . "/login/ubvars.php");
$homedir=substr(dirname(__FILE__),0,stripos(dirname(__FILE__),"public_html")+11); 
if(empty($_REQUEST['ptype']) OR $_REQUEST['ptype']=="" or $_REQUEST['ptype']==null){$_REQUEST['ptype']="index";}

 if(!empty($_REQUEST['swiper'])){

$old_homepage = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/" . $_REQUEST['ptype'] . ".php");

file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/tmp/" . $_REQUEST['ptype'] . "-bak.php", $old_homepage);

$old_open = substr($old_homepage,0,strpos($old_homepage,"<!-- SwipeGenerated -->"));
$old_mid = substr($old_homepage,strpos($old_homepage,"<!-- EndSwipeGenerated -->")+26,strpos($old_homepage,"<!-- CTAGenerated -->")-(strpos($old_homepage,"<!-- EndSwipeGenerated -->")+26));
$old_close = substr($old_homepage,strpos($old_homepage,"<!-- EndCTAGenerated -->")+24);


 $new_homepage = $old_open . $_REQUEST['swiper'] . $old_mid . $_REQUEST['CTA'] . $old_close;
file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/" . $_REQUEST['ptype'] . ".php", $new_homepage);

 echo "Homepage has been updated.";
 }
 elseif(!empty($_REQUEST['restore'])){
$current_homepage = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/" . $_REQUEST['ptype'] . ".php");
$backup_homepage = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/tmp/" . $_REQUEST['ptype'] . "-bak.php");

file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/" . $_REQUEST['ptype'] . ".php", $backup_homepage);
file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/tmp/" . $_REQUEST['ptype'] . "-bak.php", $current_homepage);

  echo "Homepage has been restored.";
}


?>