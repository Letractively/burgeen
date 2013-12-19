<?php
			include ("database.php");
			session_start();
			$path=$_SESSION[path];
			$user_id = uniqid('U');
			$enrypt=md5($_POST[old_password]);
			$q_reset= "select count(*) from user where password='$enrypt' and username='$_SESSION[username]'";
			$hq_reset	= mysql_db_query($DataBase,$q_reset);
			while(list($temp) = mysql_fetch_row($hq_reset))
			{
				
			if($temp == 1)
			{
				$enrypt=md5($_POST[new_password_1]);
				$q_update= "update user set password='$enrypt' where username='$_SESSION[username]'";
				$hq_update	= mysql_db_query($DataBase,$q_update);
				
				header('location:'.$path.'/edit-profile?reset=success');
			}else 
			
			//error
			
			{
				$_SESSION[reset_password]='failed';
			   header('location:'.$path.'/reset-password/');
			}
			}
			
			
			
			?>