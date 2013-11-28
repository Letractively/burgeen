<?php


			include ("database.php");
			session_start();
			date_default_timezone_set('Asia/Singapore');
			
			
			$proposal_id = uniqid('P');
			//echo $_POST[company_name];
			$date = date('Y-m-d G:i:s');
			$q_proposal= "insert into proposal values ('$proposal_id','$_SESSION[user_id]','$_POST[company_name]','$_POST[website]','$_POST[location]','$_POST[industry_1]','$_POST[industry_2]','$_POST[reason]','$_POST[stage]','$_POST[investor_role]','$_POST[previous_raise]','$_POST[total_raise]','$_POST[total_have_you_raised]','$_POST[minimum_investment]','$_POST[title_proposal]','$_POST[short_summary]','$_POST[highlight_1]','$_POST[highlight_2]','$_POST[highlight_3]','$_POST[highlight_4]','$_POST[highlight_5]','$_POST[the_deal]','$_POST[the_team]','$_POST[personal_name]','$_POST[linkedin]','$_POST[position]','active','$date')";
			$hq_proposal	= mysql_db_query($DataBase,$q_proposal);
			//echo $q_proposal;
			
			header('location:http://127.0.0.1/wordpress2/entrepreneur_dashboard/');











?>