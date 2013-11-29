<?php
include ("database.php");
session_start();
$path=$_SESSION[path];
$proposal_id = $_GET[proposal_id];
//echo $proposal_id;

				$q_delete= "delete from proposal where proposal_id='$proposal_id'";
				$hq_delete	= mysql_db_query($DataBase,$q_delete);
			//echo $q_update;
			header('location:'.$path'/entrepreneur_dashboard/');

?>