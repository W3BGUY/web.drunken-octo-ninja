<?php
ini_set("SMTP","smtp.gmail.com");
ini_set("smtp_port","587");
ini_set("auth_username","your_address@gmail.com");
ini_set("auth_password","");

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$body  =  "From: $name\n\n Phone: $phone\n\n E-Mail: $email\n\n Message:\n $message";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: $email";

$sendIT=mail('charles_bastian@s2g.net','Message from S2G.net',$body,$headers);
if($sendIT){
  return true;
}else{
  return false;
}

?>
