<?php
session_start();
			include ("database.php");
			
			if($_SESSION[login]=='failed' or $_SESSION[login]=='')
			{
			//$user_id = uniqid('U');
			$q_login= "select count(*) from user where first_name='$_GET[user_login]' and password='$_GET[user_password]'";
			$hq_login	= mysql_db_query($DataBase,$q_login);
			$_GET[user_login];
			while(list($count) = mysql_fetch_row($hq_login))
			{
			if($count==1)
			{
			$_SESSION[login]='success';
			$_SESSION[username]=$_GET[user_login];
			header('location:http://127.0.0.1/wordpress2/');
			
			}else
			{
			$_SESSION[login]='failed';
			header('location:http://127.0.0.1/wordpress2/login-page/');

			}
			}
			}
			//header('location:http://yahoo.com');
			//exit;
			
			
			?>