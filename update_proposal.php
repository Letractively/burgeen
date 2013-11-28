<?php


		include('database.php');
			session_start();
			if(isset($_GET[proposal_id]))
			{
			$_SESSION[proposal_id] = $_GET[proposal_id];
			
			
			header('location:http://127.0.0.1/wordpress2/edit-proposal/');
			}else
			{
			
			$q_update_proposal= "update proposal set company_name='$_POST[company_name]', website='$_POST[website]', management_location='$_POST[location]' , industry_1='$_POST[industry_1]' ,industry_2='$_POST[industry_2]' ,reason='$_POST[reason]' , stage='$_POST[stage]' , investor_role='$_POST[investor_role]' , previous_raise='$_POST[previous_raise]' , total_raise='$_POST[total_raise]' , total_have_you_raised='$_POST[total_have_you_raised]' , minimum_investment='$_POST[minimum_investment]' , title='$_POST[title_proposal]' , short_summary='$_POST[short_summary]' , the_pitch='$_POST[the_pitch]' , highlight_1='$_POST[highlight_1]' , highlight_2='$_POST[highlight_2]' ,highlight_3='$_POST[highlight_3]' ,highlight_4='$_POST[highlight_4]' , highlight_5='$_POST[highlight_5]' , the_deal='$_POST[the_deal]' , team_role_company='$_POST[the_team]' , team_name='$_POST[personal_name]' , team_linkedin='$_POST[linkedin]' , team_position='$_POST[position]' , status='active'  where proposal_id='$_SESSION[proposal_id]'";
			$hq_update_proposal	= mysql_db_query($DataBase,$q_update_proposal);
			//echo $q_update_proposal;
			
			header('location:http://127.0.0.1/wordpress2/entrepreneur_dashboard/');
			
			}










?>