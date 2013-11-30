<?php
			include ("database.php");
			session_start();
			date_default_timezone_set('Asia/Singapore');
			
			$path = $_SESSION[path];
			
			//echo $_POST[company_name];
			$date = date('Y-m-d G:i:s');
			
			if($_GET[status]=='like')
			{
			
			$q_like= "update interested_investor set status='like', date='$date' where  proposal_id='$_SESSION[proposal_id]' and investor_id='$_SESSION[user_id]'";
			$hq_like	= mysql_db_query($DataBase,$q_like);
			}else if($_GET[status]=='dislike')
			{
			$q_like= "update interested_investor set status='dislike', date='$date' where proposal_id='$_SESSION[proposal_id]' and investor_id='$_SESSION[user_id]'";
			$hq_like	= mysql_db_query($DataBase,$q_like);
			}
			//echo $q_proposal;
			
			header('location:'.$path.'/detail-proposal/');



?>