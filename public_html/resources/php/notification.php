<?php
if (isset($_REQUEST['email']))  {
  $admin_email = "noreply@infocus.com";
  $email = $_REQUEST['email'];
  $subject = $_REQUEST['subject'];
  $comment = "You have been notified!";
  mail($email.',daniel.boggs@infocus.com', "$subject", $comment, "From:" . $admin_email);
  }
header("Location: http://".$_REQUEST['redirect']);
?>