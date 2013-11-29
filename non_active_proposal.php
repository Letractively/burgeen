<?php
include ("database.php");
session_start();
$proposal_id = $_GET[proposal_id];
//echo $proposal_id;
$path =$_SESSION[path];
				$q_update= "update proposal set status='non-active' where proposal_id='$proposal_id'";
				$hq_update	= mysql_db_query($DataBase,$q_update);
			//echo $q_update;
			header('location:'.$path.'/entrepreneur_dashboard/');

?>