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
$_SESSION[new_password]=uniqid();
$new_password=md5($_SESSION[new_password]);
while ($row = mysql_fetch_assoc($result)) {
$q_update= "update user set password='$new_password' where contact_email='$_POST[email_address]'";
$hq_update	= mysql_db_query($DataBase,$q_update);
$_SESSION[username_email]=$row['username'];
$_SESSION[firstname_email]=$row['first_name'];
$_SESSION[lastname_email]=$row['last_name'];

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
 $mail->Subject = "RESET PASSWORD (ict1.natawebs.com)";
 
ob_start();
include 'email.php'; 
$message = ob_get_clean();
$mail->MsgHTML($message); 
  
 $mail->AddAddress("$_POST[email_address]","Hendranata");
   
$_SESSION[email_error]=0;
header('location:'.$path.'/forgot_password');

   
 if($mail->Send()){
  $mail->ClearAddresses();  
 }

	}
    }else
	{

$_SESSION[email_error]=1;
header('location:'.$path.'/forgot_password');
	}
}
?>
