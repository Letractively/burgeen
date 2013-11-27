<?php
session_start();
			include ("database.php");
			
			if($_SESSION[login]=='failed' or $_SESSION[login]=='')
			{
			//$user_id = uniqid('U');
			$enrypt=md5($_POST[user_password]);
			//echo $enrypt;
			$q_login= "select count(*) from user where username='$_POST[username]' and password='$enrypt'";
			$hq_login	= mysql_db_query($DataBase,$q_login);
			//$_POST[user_login];
			//echo $q_login;
			while(list($count) = mysql_fetch_row($hq_login))
			{
			if($count==1)
			{
			$_SESSION[login]='success';
			$_SESSION[username]=$_POST[username];
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