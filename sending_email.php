<?php
$to = "webooks321@gmail.com";
$subject = "Contact Us";
$message = "Hello Webooks I'm sending you this email to request the new book lord of the rings.";
$from = $_POST['email'];
$headers = "From:" . $from;

if(mail($to, $subject, $message, $headers))
 echo "Email sent successfully..!!"; 
else
 echo "Email sending failed";
?>