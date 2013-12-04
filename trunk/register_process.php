<?php
			include ("database.php");
			session_start();
			$path=$_SESSION[path];
			$date = date('Y-m-d G:i:s');
			
			if($_POST[plan]=='novice')
			{
			
			$exp = date('Y-m-d G:i:s', strtotime("$date +1 month"));  // 1 month expired
			$user_id = uniqid('U');
			$enrypt=md5($_POST[password_user]);
			$q_registration= "insert into user values ('$user_id','$_POST[account_type]','$_POST[username]','$_POST[first_name]','$_POST[last_name]','$enrypt','$_POST[contact_email]','$_POST[phone_number]','$_POST[plan]','no_payment','','','$date','$exp')";
			$hq_registration	= mysql_db_query($DataBase,$q_registration);
			
			}else if($_POST[plan]=='pro' or $_POST[plan]=='global pro')
			{
			$exp = date('Y-m-d G:i:s', strtotime("$date +2 month"));  // 2 month expired
			$user_id = uniqid('U');
			$transaction_id = uniqid('T');
			$enrypt=md5($_POST[password_user]);
			$q_registration= "insert into user values ('$user_id','$_POST[account_type]','$_POST[username]','$_POST[first_name]','$_POST[last_name]','$enrypt','$_POST[contact_email]','$_POST[phone_number]','$_POST[plan]','visa','','','$date','$exp')";
			$hq_registration	= mysql_db_query($DataBase,$q_registration);
			
			date_default_timezone_set('Asia/Singapore');
			
			$year = date('Y');
			$q_transaction= "select count(*) from transaction";
			$hq_transaction	= mysql_db_query($DataBase,$q_transaction);
			
			$no=mysql_num_rows($hq_transaction);
			$no=$no+1;
			$no_invoice = $no.'/'.$year;
			$q_transaction= "insert into transaction values ('$transaction_id','$user_id','$_POST[plan]','$date','$no_invoice')";
			$hq_transaction	= mysql_db_query($DataBase,$q_transaction);
			
			}else
			{  //investor
			$user_id = uniqid('U');
			$enrypt=md5($_POST[password_user]);
			$exp = date('Y-m-d G:i:s', strtotime("$date +12 month"));  // 1 year expired
			$q_registration= "insert into user values ('$user_id','$_POST[account_type]','$_POST[username]','$_POST[first_name]','$_POST[last_name]','$enrypt','$_POST[contact_email]','$_POST[phone_number]','free','no_payment','','','$date','$exp')";
			$hq_registration	= mysql_db_query($DataBase,$q_registration);
			}
			
			
			header('location:'.$path.'');
			
			?>