<?php
			include ("database.php");
			
			
			$user_id = uniqid('U');
			$q_registration= "insert into user values ('$user_id','$_GET[account_type]','$_GET[first_name]','$_GET[last_name]','$_GET[password_user]','$_GET[contact_email]','$_GET[phone_number]','$_GET[plan]','')";
			$hq_registration	= mysql_db_query($DataBase,$q_registration);
			//echo $q_registration;
			
			
			//header('location:http://yahoo.com');
			//exit;
			header('location:http://127.0.0.1/wordpress2/');
			
			?>