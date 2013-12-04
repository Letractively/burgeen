<?php


			include ("database.php");
			session_start();
			date_default_timezone_set('Asia/Singapore');
			
			$path = $_SESSION[path];
			$proposal_id = uniqid('P');
			$finance_id = uniqid('F');
			//echo $_POST[company_name];
			$date = date('Y-m-d G:i:s');
			
			$q_pakage= "select pakage from user where user_id='$_SESSION[user_id]'";
			$hq_pakage= mysql_db_query($DataBase,$q_pakage);
			
			while(list($pakage) = mysql_fetch_row($hq_pakage))
			{
			if($pakage=='novice')
			{
				$max_viewer =10;
			}else if($pakage=='pro')
			{
				$max_viewer =15;
			}else if($pakage=='global pro')
			{
				$max_viewer =20;
			}
			}
			
			
			
			$q_proposal= "insert into proposal values ('$proposal_id','$_SESSION[user_id]','$_POST[company_name]','$_POST[website]','$_POST[location]','$_POST[industry_1]','$_POST[industry_2]','$_POST[reason]','$_POST[stage]','$_POST[investor_role]','$_POST[previous_raise]','$_POST[total_raise]','$_POST[total_have_you_raised]','$_POST[minimum_investment]','$_POST[title_proposal]','$_POST[short_summary]','$_POST[the_pitch]','$_POST[highlight_1]','$_POST[highlight_2]','$_POST[highlight_3]','$_POST[highlight_4]','$_POST[highlight_5]','$_POST[the_deal]','$_POST[the_team]','$_POST[personal_name]','$_POST[linkedin]','$_POST[position]','active','$date','0','$max_viewer')";
			$hq_proposal	= mysql_db_query($DataBase,$q_proposal);

			
			$q_finance1= "insert into finance values ('$finance_id','$proposal_id','$_SESSION[user_id]','$_POST[previous_year_1]','$_POST[previous_turnover_1]','$_POST[previous_profit_1]')";
			$hq_finance1	= mysql_db_query($DataBase,$q_finance1);
			
			$q_finance2= "insert into finance values ('$finance_id','$proposal_id','$_SESSION[user_id]','$_POST[previous_year_2]','$_POST[previous_turnover_2]','$_POST[previous_profit_2]')";
			$hq_finance2	= mysql_db_query($DataBase,$q_finance2);
	
			$q_finance3= "insert into finance values ('$finance_id','$proposal_id','$_SESSION[user_id]','$_POST[previous_year_3]','$_POST[previous_turnover_3]','$_POST[previous_profit_3]')";
			$hq_finance3	= mysql_db_query($DataBase,$q_finance3);
		
			$q_finance4= "insert into finance values ('$finance_id','$proposal_id','$_SESSION[user_id]','$_POST[projected_year_1]','$_POST[projected_turnover_1]','$_POST[projected_profit_1]')";
			$hq_finance4	= mysql_db_query($DataBase,$q_finance4);
			$q_finance5= "insert into finance values ('$finance_id','$proposal_id','$_SESSION[user_id]','$_POST[projected_year_2]','$_POST[projected_turnover_2]','$_POST[projected_profit_2]')";
			$hq_finance5	= mysql_db_query($DataBase,$q_finance5);
			$q_finance6= "insert into finance values ('$finance_id','$proposal_id','$_SESSION[user_id]','$_POST[projected_year_3]','$_POST[projected_turnover_3]','$_POST[projected_profit_3]')";
			$hq_finance6	= mysql_db_query($DataBase,$q_finance6);
			
			header('location:'.$path.'/entrepreneur_dashboard/');











?>