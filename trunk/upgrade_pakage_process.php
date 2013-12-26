<?php
 session_start();
 include('database.php');
require ("mail/class.phpmailer.php");
			date_default_timezone_set('Asia/Singapore');
			
			$path = $_SESSION[path];
			
			$date = date('Y-m-d G:i:s');
			
			
			//update status pakage
			if($_POST[plan]=='global pro') // new registration and purchase global pro pakage
			{
			$q_update_plan= "update user set pakage='$_POST[plan]', payment_method='visa',nudge=nudge+50 where user_id='$_SESSION[user_id]'";
			$hq_update_plan	= mysql_db_query($DataBase,$q_update_plan);
			}else if($_POST[plan]=='pro') //new registration and purchase pro pakage
			{
			$q_update_plan= "update user set pakage='$_POST[plan]', payment_method='visa',nudge=nudge+25 where user_id='$_SESSION[user_id]'";
			$hq_update_plan	= mysql_db_query($DataBase,$q_update_plan);
			}else if($_POST[plan]=='global pro extend') //extend the pakage from pro to global pro
			{
			$q_update_plan= "update user set pakage='global pro', payment_method='visa',nudge=nudge+25 where user_id='$_SESSION[user_id]'";
			$hq_update_plan	= mysql_db_query($DataBase,$q_update_plan);
			}
			
			
			//insert the transaction
			$transaction_id = uniqid('T');
			$q_transaction= "select count(*)+1 from transaction";
			$hq_transaction	= mysql_db_query($DataBase,$q_transaction);
			while(list($sum) = mysql_fetch_row($hq_transaction))
			{
			$year = date('Y');
			$no_invoice = $sum.'/'.$year;
			}
			if($_POST[plan]=='global pro extend')
			{
			$q_transaction= "insert into transaction values ('$transaction_id','$_SESSION[user_id]','global pro extended','$date','$no_invoice')";
			$hq_transaction	= mysql_db_query($DataBase,$q_transaction);
			}else
			{
			$q_transaction= "insert into transaction values ('$transaction_id','$_SESSION[user_id]','$_POST[plan]','$date','$no_invoice')";
			$hq_transaction	= mysql_db_query($DataBase,$q_transaction);
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
 $mail->ConfirmReadingTo  = "$_SESSION[contact_email]";
  
 $mail->AddReplyTo("hendranata@natawebs.com","Hendranata");
 $mail->IsHTML(true); //turn on to send html email
 $mail->Subject = "SUCESSFULLY UPGRADE PACKAGE";
 

$mail->MsgHTML(file_get_contents('upgrade_email.php'));
  
 $mail->AddAddress("hendranatas@yahoo.com","Hendranata");		
		
		
		
			header('location:'.$path.'/entrepreneur_dashboard/');
			
			
			if($mail->Send()){
  $mail->ClearAddresses();  
	}
?>