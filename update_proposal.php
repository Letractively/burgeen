<?php


		include('database.php');
			session_start();
			$path=$_SESSION[path];
			if(isset($_GET[proposal_id]))
			{
			$_SESSION[proposal_id] = $_GET[proposal_id];
			
			
			header('location:'.$path.'/edit-proposal/');
			}else
			{
			//update proposal
			$q_update_proposal= "update proposal set state='$_POST[state]' ,company_name='$_POST[company_name]', website='$_POST[website]', management_location='$_POST[location]' , industry_1='$_POST[industry_1]' ,reason='$_POST[reason]' , stage='$_POST[stage]' , investor_role='$_POST[investor_role]' , previous_raise='$_POST[previous_raise]' , total_raise='$_POST[total_raise]' , total_have_you_raised='$_POST[total_have_you_raised]' , minimum_investment='$_POST[minimum_investment]' , title='$_POST[title_proposal]' , short_summary='$_POST[short_summary]' , the_pitch='$_POST[the_pitch]' , highlight_1='$_POST[highlight_1]' , highlight_2='$_POST[highlight_2]' ,highlight_3='$_POST[highlight_3]' ,highlight_4='$_POST[highlight_4]' , highlight_5='$_POST[highlight_5]' , the_deal='$_POST[the_deal]' , team_role_company='$_POST[the_team]' , team_name='$_POST[personal_name]' , team_linkedin='$_POST[linkedin]' , team_position='$_POST[position]' , status='active'  where proposal_id='$_SESSION[proposal_id]'";
			$hq_update_proposal	= mysql_db_query($DataBase,$q_update_proposal);
			//echo $q_update_proposal;
			$finance_id = uniqid('F');
			//update finance as well
			$q_delete_finance= "delete from finance where proposal_id='$_SESSION[proposal_id]'";
			$hq_delete_finance	= mysql_db_query($DataBase,$q_delete_finance);
			
			$q_finance1= "insert into finance values ('$finance_id','$_SESSION[proposal_id]','$_SESSION[user_id]','$_POST[previous_year_1]','$_POST[previous_turnover_1]','$_POST[previous_profit_1]')";
			$hq_finance1	= mysql_db_query($DataBase,$q_finance1);
			
			$q_finance2= "insert into finance values ('$finance_id','$_SESSION[proposal_id]','$_SESSION[user_id]','$_POST[previous_year_2]','$_POST[previous_turnover_2]','$_POST[previous_profit_2]')";
			$hq_finance2	= mysql_db_query($DataBase,$q_finance2);
	
			$q_finance3= "insert into finance values ('$finance_id','$_SESSION[proposal_id]','$_SESSION[user_id]','$_POST[previous_year_3]','$_POST[previous_turnover_3]','$_POST[previous_profit_3]')";
			$hq_finance3	= mysql_db_query($DataBase,$q_finance3);
		
			$q_finance4= "insert into finance values ('$finance_id','$_SESSION[proposal_id]','$_SESSION[user_id]','$_POST[projected_year_1]','$_POST[projected_turnover_1]','$_POST[projected_profit_1]')";
			$hq_finance4	= mysql_db_query($DataBase,$q_finance4);
			$q_finance5= "insert into finance values ('$finance_id','$_SESSION[proposal_id]','$_SESSION[user_id]','$_POST[projected_year_2]','$_POST[projected_turnover_2]','$_POST[projected_profit_2]')";
			$hq_finance5	= mysql_db_query($DataBase,$q_finance5);
			$q_finance6= "insert into finance values ('$finance_id','$_SESSION[proposal_id]','$_SESSION[user_id]','$_POST[projected_year_3]','$_POST[projected_turnover_3]','$_POST[projected_profit_3]')";
			$hq_finance6	= mysql_db_query($DataBase,$q_finance6);
			
			
			
			
			
			
			header('location:'.$path.'/entrepreneur_dashboard/');
			
			}










?>