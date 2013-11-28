<?php
include ("database.php");
$proposal_id = $_GET[proposal_id];
//echo $proposal_id;

				$q_update= "update proposal set status='non-active' where proposal_id='$proposal_id'";
				$hq_update	= mysql_db_query($DataBase,$q_update);
			//echo $q_update;
			header('location:http://127.0.0.1/wordpress2/entrepreneur_dashboard/');

?>