<?php
//spam filter
if($_POST['name']!=""){die();}
$headers = 'From: no_reply@infocus.com' . "\r\n" .
    'Reply-To: no_reply@infocus.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
// the message
$msg="";
foreach($_POST as $key=>$value){if($key != "clear" AND$key != "eto" AND $key != "esub"  AND $key != "name"){$msg .= "$key: $value\n";}}
// send email
mail($_POST['eto'],$_POST['esub'],$msg,$headers);
?>