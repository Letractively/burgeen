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
		
		$q_cek= "select viewer,max_viewer from proposal where proposal_id = '$_SESSION[proposal_id]'";
		$hq_cek= mysql_db_query($DataBase,$q_cek);
		while(list($viewer,$max_viewer) = mysql_fetch_row($hq_cek))
		{	
		if($viewer==$max_viewer)
		{
			$q_disable= "update proposal set status='Reach Limit Viewer' where proposal_id='$_SESSION[proposal_id]'";
			$hq_disable	= mysql_db_query($DataBase,$q_disable);
		}
		}
		}
			header('location:'.$path.'/detail-proposal/');











?>