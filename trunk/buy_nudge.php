<?php
 session_start();
 include('database.php');

			date_default_timezone_set('Asia/Singapore');
			
			$path = $_SESSION[path];
			
			$date = date('Y-m-d G:i:s');
			
			
			//update status pakage
			if($_POST[plan]=='5_nudge') // buy 5 nudge
			{
			$q_update_plan= "update user set nudge=nudge+5, payment_method='visa' where user_id='$_SESSION[user_id]'";
			$hq_update_plan	= mysql_db_query($DataBase,$q_update_plan);
			}else if($_POST[plan]=='10_nudge') //buy 10 nudge
			{
			$q_update_plan= "update user set nudge=nudge+10, payment_method='visa' where user_id='$_SESSION[user_id]'";
			$hq_update_plan	= mysql_db_query($DataBase,$q_update_plan);
			}else if($_POST[plan]=='20_nudge') //buy 20 nudge
			{
			$q_update_plan= "update user set nudge=nudge+20, payment_method='visa' where user_id='$_SESSION[user_id]'";
			$hq_update_plan	= mysql_db_query($DataBase,$q_update_plan);
			}
			
			
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
			
		
			header('location:'.$path.'/entrepreneur_dashboard/');

?>