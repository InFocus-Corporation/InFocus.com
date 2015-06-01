<?php
# Create a connection
$url = $_POST['name'];
$ch = curl_init($url);

# Form data string
$postString = http_build_query($_POST, '', '&');

# Setting our options
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);

# Get the response
$response = curl_exec($ch);
curl_close($ch);
$thankyou = $_POST['thankyou'];
if(empty($_POST['thankyou'])){
$thankyou = "Thank you for your submission
<script>$(function(){
    parent.$.colorbox.resize({
        innerWidth:'300px',
        innerHeight:'40px'
    });
});</script>";}
?>


<script src='http://code.jquery.com/jquery-1.9.1.js'></script>
<?= $thankyou; ?>

