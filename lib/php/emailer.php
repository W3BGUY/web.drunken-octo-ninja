<?php
print_r("Sending Email Test");

// --- CONFIG PARAMETERS --- //
//
   $email_recipient = "charles_bastian@s2g.net";
   $email_sender = "S2G Website Contact Form";
   $email_return_to = "info@s2g.net";
   $email_content_type = "text/html; charset=us-ascii";
   $email_client = "PHP/" . phpversion();
//
// ------------------------- //

// --- DEFINE HEADERS --- //
//
   $email_header = "From: " . $email_sender . "\r\n";
   $email_header .= "Reply-To: " . $email_return_to . "\r\n";
   $email_header .= "Return-Path: " . $email_return_to . "\r\n";
   $email_header .= "Content-type: " . $email_content_type . "\r\n";
   $email_header .= "X-Mailer: " . $email_client . "\r\n";
//
// ---------------------- //

// --- SUBJECT AND CONTENTS --- //
//
   $email_subject = "Test email subject";
   $email_contents = "<html>";
   $email_contents .= "<h2>Test Email</h2>";
   $email_contents .= "<br><b>Sender: " . $email_sender;
   $email_contents .= "<br><b>Recipient: " . $email_recipient;
   $email_contents .= "</html>";
//
// ---------------------------- //

$email_result = mail($email_recipient, $email_subject, $email_contents, $email_header);
if ($email_result) print_r("Email has been sent!");
else print_r("Email has failed!");
?>
