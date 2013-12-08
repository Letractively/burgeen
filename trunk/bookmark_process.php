<?php
			include ("database.php");
			session_start();
			date_default_timezone_set('Asia/Singapore');
			
			$path = $_SESSION[path];
			if(isset($_GET[proposal_id]))
			{
			$_SESSION[proposal_id]=$_GET[proposal_id];
			}
			//echo $_POST[company_name];
			$date = date('Y-m-d G:i:s');
			
			if($_GET[status]=='bookmark')
			{
			
			$q_like= "update bookmark set status='bookmark', date='$date' where  proposal_id='$_SESSION[proposal_id]' and investor_id='$_SESSION[user_id]'";
			$hq_like	= mysql_db_query($DataBase,$q_like);
			}else if($_GET[status]=='un-bookmark')
			{
			$q_like= "update bookmark set status='un-bookmark', date='$date' where proposal_id='$_SESSION[proposal_id]' and investor_id='$_SESSION[user_id]'";
			$hq_like	= mysql_db_query($DataBase,$q_like);
			}
			//echo $q_proposal;
			
			if(isset($_GET[proposal_id]))
			{
			header('location:'.$path.'/investor_dashboard/');
			}else
			{
			header('location:'.$path.'/detail-proposal/?proposal_id='.$_SESSION[proposal_id]);
			}


?>