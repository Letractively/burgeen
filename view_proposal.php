<?php


		
			session_start();
			include('database.php');
			$path=$_SESSION[path];
			$_SESSION[proposal_id] = $_GET[proposal_id];
			
			
			//add one viewer when the investor visit the detail proposal
		
		if($_SESSION[user_type]=='investor')
		{
		$q_viewer= "update proposal set viewer=viewer+1 where proposal_id='$_SESSION[proposal_id]'";
		$hq_viewer	= mysql_db_query($DataBase,$q_viewer);
	
		}
			header('location:'.$path.'/detail-proposal/');











?>