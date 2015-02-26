<?php
$value = 'Activate Edit Mode';

if($_SERVER['QUERY_STRING'] == "exit"){
setcookie("cmsedit", "", time()-3600,"/"); 
}
else{
setcookie("cmsedit", $value, time()+(3600*3),"/");  /* expire in 3 hours */
}
  header("Location: " . $_SERVER["HTTP_REFERER"]);
?>