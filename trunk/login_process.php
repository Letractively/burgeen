<?php
session_start();
$path=$_SESSION[path];
			include ("database.php");
			
			if($_SESSION[login]=='failed' or $_SESSION[login]=='')
			{
			//$user_id = uniqid('U');
			$enrypt=md5($_POST[user_password]);
			//echo $enrypt;
			$q_login= "select count(*),user_id,user_type,nudge from user where username='$_POST[username]' and password='$enrypt'";
			$hq_login	= mysql_db_query($DataBase,$q_login);
			//$_POST[user_login];
			//echo $q_login;
			while(list($count,$user_id,$user_type,$nudge) = mysql_fetch_row($hq_login))
			{
			if($count==1)
			{
			$_SESSION[login]='success';
			$_SESSION[username]=$_POST[username];
			$_SESSION[user_id]=$user_id;
			$_SESSION[user_type]=$user_type;
			$_SESSION[nudge]=$nudge;
			if($user_type=='entrepreneur')
			{
			header('location:'.$path.'/entrepreneur_dashboard/');
			}else if($user_type=='investor')
			{
				header('location:'.$path.'/investor_dashboard/');
			}
			
			}else
			{
			$_SESSION[login]='failed';
			
			header('location:'.$path.'/login-page/');
			
			}
			}
			}
			//header('location:http://yahoo.com');
			//exit;
			
			
			?>