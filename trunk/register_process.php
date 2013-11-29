<?php
			include ("database.php");
			session_start();
			$path=$_SESSION[path];
			$user_id = uniqid('U');
			$enrypt=md5($_POST[password_user]);
			$q_registration= "insert into user values ('$user_id','$_POST[account_type]','$_POST[username]','$_POST[first_name]','$_POST[last_name]','$enrypt','$_POST[contact_email]','$_POST[phone_number]','$_POST[plan]','','','')";
			$hq_registration	= mysql_db_query($DataBase,$q_registration);
			//echo $q_registration;
			
			
			//header('location:http://yahoo.com');
			//exit;
			header('location:'.$path.'');
			
			?>