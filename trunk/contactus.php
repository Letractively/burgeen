<?php 
session_start();
$path=$_SESSION[path];
require ("mail/class.phpmailer.php");
include "database.php"; //connects to the database

$_SESSION[name_email]=$_POST[name];
$_SESSION[company_email]=$_POST[company];
$_SESSION[email_email]=$_POST[email];
$_SESSION[website_email]=$_POST[website];
$_SESSION[phone_email]=$_POST[phone];
$_SESSION[country_email]=$_POST[country];
$_SESSION[message_email]=$_POST[message];


 $mail = new PHPMailer();
 $mail->From     = "admin@natawebs.com";
 $mail->FromName = "Burgeen Admin";
  
 $mail->IsSMTP(); 
  
 $mail->SMTPAuth = true;     // turn of SMTP authentication
 $mail->Username = "admin@natawebs.com";  // SMTP username
 $mail->Password = "admin"; // SMTP password

 $mail->Host = "mail.natawebs.com";
 $mail->Port = 25;
  
 $mail->SMTPDebug  = 2; // Enables SMTP debug information (for testing, remove this line on production mode)
 // 1 = errors and messages
 // 2 = messages only
   
 $mail->Sender   =  "admin@natawebs.com";// $bounce_email;
 $mail->ConfirmReadingTo  = "$_POST[email_address]";
  
 $mail->AddReplyTo("admin@natawebs.com","Hendranata");
 $mail->IsHTML(true); //turn on to send html email
 $mail->Subject = "Message from ict1.natawebs.com";
 
ob_start();
include 'contactus_email.php'; 
$message = ob_get_clean();
$mail->MsgHTML($message); 
  
 $mail->AddAddress("admin@natawebs.com","Hendranata");

 header('location:'.$path.'/');
 
 
 if($mail->Send()){
  $mail->ClearAddresses();  
 }





?>
