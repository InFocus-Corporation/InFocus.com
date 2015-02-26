<?php
require($_SERVER['DOCUMENT_ROOT'] . "/resources/php/connections.php");

mysqli_set_charset($connection, "utf8");

$result = mysqli_query($connection,'REPLACE INTO pages SET pagename="' . $_POST['pn'] . '", lang="' . $_POST['lang'] . '", pagecontent="' .  mysqli_real_escape_string($connection,$_POST['html']) . '"' );

echo "Server Updated";
?>