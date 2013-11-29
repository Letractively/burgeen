<?php
include ("database.php");
session_start();
$path=$_SESSION[path];
$proposal_id = $_GET[proposal_id];
//echo $proposal_id;

				$q_update= "update proposal set status='active' where proposal_id='$proposal_id'";
				$hq_update	= mysql_db_query($DataBase,$q_update);
			//echo $q_update;
			header('location:'.$path.'/entrepreneur_dashboard/');

?>