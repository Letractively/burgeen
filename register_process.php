<?php
			include ("database.php");
			require ("mail/class.phpmailer.php");
			session_start();
			$path=$_SESSION[path];
			date_default_timezone_set('Asia/Singapore');
			$date = date('Y-m-d G:i:s');
			//if you are entrepreneur
			if($_POST[account_type]=='entrepreneur')
			{
			if($_POST[plan]=='novice')
			{
			
			
			$user_id = uniqid('U');
			$enrypt=md5($_POST[password_user]);
			$q_registration= "insert into user values ('$user_id','$_POST[account_type]','$_POST[username]','$_POST[first_name]','$_POST[last_name]','$enrypt','$_POST[contact_email]','$_POST[phone_number]','z_novice','no_payment','','','$date','','0')";
			$hq_registration	= mysql_db_query($DataBase,$q_registration);
			
			}else if($_POST[plan]=='pro' or $_POST[plan]=='global pro')
			{
			
			$user_id = uniqid('U');
			$transaction_id = uniqid('T');
			$enrypt=md5($_POST[password_user]);
			if($_POST[plan]=='pro')
			{
			$q_registration= "insert into user values ('$user_id','$_POST[account_type]','$_POST[username]','$_POST[first_name]','$_POST[last_name]','$enrypt','$_POST[contact_email]','$_POST[phone_number]','$_POST[plan]','visa','','','$date','','25')";
			$hq_registration	= mysql_db_query($DataBase,$q_registration);
			}else if($_POST[plan]=='global pro')
			{	// only get 50 free nudge
			$q_registration= "insert into user values ('$user_id','$_POST[account_type]','$_POST[username]','$_POST[first_name]','$_POST[last_name]','$enrypt','$_POST[contact_email]','$_POST[phone_number]','$_POST[plan]','visa','','','$date','','50')";
			$hq_registration	= mysql_db_query($DataBase,$q_registration);
			}
			
			
			$year = date('Y');
			$q_transaction= "select count(*) from transaction";
			$hq_transaction	= mysql_db_query($DataBase,$q_transaction);
			
			$no=mysql_num_rows($hq_transaction);
			$no=$no+1;
			$no_invoice = $no.'/'.$year;
			$q_transaction= "insert into transaction values ('$transaction_id','$user_id','$_POST[plan]','$date','$no_invoice')";
			$hq_transaction	= mysql_db_query($DataBase,$q_transaction);
			
			}
			}else if($_POST[account_type]=='investor')
			{
			//investor
			$user_id = uniqid('U');
			$enrypt=md5($_POST[password_user]);
			$exp = date('Y-m-d G:i:s', strtotime("$date +12 month"));  // 1 year expired
			$q_registration= "insert into user values ('$user_id','$_POST[account_type]','$_POST[username]','$_POST[first_name]','$_POST[last_name]','$enrypt','$_POST[contact_email]','$_POST[phone_number]','free','no_payment','','','$date','$exp','')";
			$hq_registration	= mysql_db_query($DataBase,$q_registration);
			
			//set investment criteria to empty
			$investment_id = uniqid('IC');
			$language_id = uniqid('L');
			$industry_id = uniqid('I');
			$q_investment= "insert into investment_criteria values ('$investment_id','$user_id','','','','','','','','','','','$industry_id','','$language_id','','','')";
			$hq_investment	= mysql_db_query($DataBase,$q_investment);
			//set empty language
			$q_investment= "insert into language (language_id,investor_id) values ('$language_id','$user_id')";
			$hq_investment	= mysql_db_query($DataBase,$q_investment);
			//set empty industry		
			$q_investment= "insert into industry (industry_id,investor_id) values ('$industry_id','$user_id')";
			$hq_investment	= mysql_db_query($DataBase,$q_investment);
		
			
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
 $mail->ConfirmReadingTo  = "$_POST[contact_email]";
  
 $mail->AddReplyTo("hendranata@natawebs.com","Hendranata");
 $mail->IsHTML(true); //turn on to send html email
 $mail->Subject = "YOUR ACCOUNT HAS BEEN ACTIVATED";
 

$mail->MsgHTML(file_get_contents('registration_email.php'));
  
 $mail->AddAddress("hendranatas@yahoo.com","Hendranata");
 
	
	
			header('location:'.$path.'');
			
	if($mail->Send()){
  $mail->ClearAddresses();  
 }
			
			?>