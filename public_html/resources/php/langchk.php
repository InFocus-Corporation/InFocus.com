<?php
if(!empty($_GET['lang'])){$lang=$_GET['lang'];}
else{
    if(substr($_SERVER['DOCUMENT_ROOT'], -4) == "html"){
        $lang = "en";
    }
    else{
        $lang = substr($_SERVER['DOCUMENT_ROOT'], -2);
    }
}
?>
