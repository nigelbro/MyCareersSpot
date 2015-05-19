<?php
if (isset($_GET['email'])){
// the message
$msg = "First line of text\nSecond line of text";
$to = $_GET['email'];
// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
$headers = "From: noreply@mycareersspot.com";
// send email
mail($to,"JoB #12345",$msg,$headers);
}

?>
