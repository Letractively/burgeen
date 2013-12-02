<?php
 session_start();
 include('database.php');

			date_default_timezone_set('Asia/Singapore');
			
			$path = $_SESSION[path];
			
			$date = date('Y-m-d G:i:s');
			
			
			//update status pakage
			
			$q_update_plan= "update user set pakage='$_POST[plan]', payment_method='visa' where user_id='$_SESSION[user_id]'";
			$hq_update_plan	= mysql_db_query($DataBase,$q_update_plan);
			
			
			//insert the transaction
			$transaction_id = uniqid('T');
			$q_transaction= "select count(*)+1 from transaction";
			$hq_transaction	= mysql_db_query($DataBase,$q_transaction);
			while(list($sum) = mysql_fetch_row($hq_transaction))
			{
			$year = date('Y');
			$no_invoice = $sum.'/'.$year;
			}
			$q_transaction= "insert into transaction values ('$transaction_id','$_SESSION[user_id]','$_POST[plan]','$date','$no_invoice')";
			$hq_transaction	= mysql_db_query($DataBase,$q_transaction);
			
			//set the max viewer.
			if($_POST[plan]=='pro')
			{
			$max_viewer = 15;
			}else if($_POST[plan]=='global pro')
			{
			$max_viewer = 20;
			}
			$q_update_viewer= "update proposal set max_viewer='$max_viewer' where user_id='$_SESSION[user_id]'";
			$hq_update_viewer	= mysql_db_query($DataBase,$q_update_viewer);
			
			//set the proposal that has reached maximal number of viewer, then automatically set to enable again.
			$q_update_proposal= "update proposal set status='active' where user_id='$_SESSION[user_id]' and status='Reach Limit Viewer'";
			$hq_update_proposal	= mysql_db_query($DataBase,$q_update_proposal);
			
			
			
			header('location:'.$path.'/entrepreneur_dashboard/');

?>