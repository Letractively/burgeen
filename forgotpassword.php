<?php 
session_start();
$path=$_SESSION[path];
require ("mail/class.phpmailer.php");
include "database.php"; //connects to the database
if (isset($_POST['email_address'])){
   
    $query="select * from user where contact_email='$_POST[email_address]'";
    $result   = mysql_query($query);

    $count=mysql_num_rows($result);
    // If the count is equal to one, we will send message other wise display an error message.
    if($count==1)
    {
$new_password=md5('q1w2e3r4');
while ($row = mysql_fetch_assoc($result)) {
$q_update= "update user set password='$new_password' where contact_email='$_POST[email_address]'";
$hq_update	= mysql_db_query($DataBase,$q_update);
}
 $mail = new PHPMailer();
 $mail->From     = "hendranata@natawebs.com";
 $mail->FromName = "Burgeen Admin";
  
 $mail->IsSMTP(); 
  
 $mail->SMTPAuth = true;     // turn of SMTP authentication
 $mail->Username = "hendranata@natawebs.com";  // SMTP username
 $mail->Password = "hendranata"; // SMTP password

 $mail->Host = "mail.natawebs.com";
 $mail->Port = 25;
  
 $mail->SMTPDebug  = 2; // Enables SMTP debug information (for testing, remove this line on production mode)
 // 1 = errors and messages
 // 2 = messages only
   
 $mail->Sender   =  "hendranata@natawebs.com";// $bounce_email;
 $mail->ConfirmReadingTo  = "$_POST[email_address]";
  
 $mail->AddReplyTo("hendranata@natawebs.com","Hendranata");
 $mail->IsHTML(true); //turn on to send html email
 $mail->Subject = "RESET PASSWORD (ict1.natawebs.com)";
 

$mail->MsgHTML(file_get_contents('email.php'));
  
 $mail->AddAddress("hendranatas@yahoo.com","Hendranata");
   
$_SESSION[email_error]=0;
header('location:'.$path.'/forgot_password');

   
 if($mail->Send()){
  $mail->ClearAddresses();  
 }

	
    }else
	{

$_SESSION[email_error]=1;
header('location:'.$path.'/forgot_password');
	}
}
?>
