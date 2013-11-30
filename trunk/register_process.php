<?php
			include ("database.php");
			session_start();
			$path=$_SESSION[path];
			
			
			if($_POST[plan]=='novice')
			{
			
			$user_id = uniqid('U');
			$enrypt=md5($_POST[password_user]);
			$q_registration= "insert into user values ('$user_id','$_POST[account_type]','$_POST[username]','$_POST[first_name]','$_POST[last_name]','$enrypt','$_POST[contact_email]','$_POST[phone_number]','$_POST[plan]','no_payment','','')";
			$hq_registration	= mysql_db_query($DataBase,$q_registration);
			
			}else if($_POST[plan]=='pro' or $_POST[plan]=='global_pro')
			{
			
			$user_id = uniqid('U');
			$transaction_id = uniqid('T');
			$enrypt=md5($_POST[password_user]);
			$q_registration= "insert into user values ('$user_id','$_POST[account_type]','$_POST[username]','$_POST[first_name]','$_POST[last_name]','$enrypt','$_POST[contact_email]','$_POST[phone_number]','$_POST[plan]','visa','','')";
			$hq_registration	= mysql_db_query($DataBase,$q_registration);
			
			date_default_timezone_set('Asia/Singapore');
			$date = date('Y-m-d G:i:s');
			
			$q_transaction= "insert into transaction values ('$transaction_id','$user_id','$_POST[plan]','$date')";
			$hq_transaction	= mysql_db_query($DataBase,$q_transaction);
			
			}
			
			
			header('location:'.$path.'');
			
			?>