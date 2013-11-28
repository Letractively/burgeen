<?php
include ("database.php");
$proposal_id = $_GET[proposal_id];
//echo $proposal_id;

				$q_delete= "delete from proposal where proposal_id='$proposal_id'";
				$hq_delete	= mysql_db_query($DataBase,$q_delete);
			//echo $q_update;
			header('location:http://127.0.0.1/wordpress2/entrepreneur_dashboard/');

?>