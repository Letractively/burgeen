<?php
session_start();
include('database.php');
$path = $_SESSION[path];

if($_GET[status]=='accept')
{
//update status become accept. 
$q_nudge= "update nudge set status='accept', proposal_id='$_GET[proposal_id]' where investor_id='$_GET[investor_id]' and entrepreneur_id='$_GET[entrepreneur_id]'";
$hq_nudge	= mysql_db_query($DataBase,$q_nudge);


//deduct one nudge point
$q_nudge= "update user set nudge=nudge-1 where user_id='$_GET[entrepreneur_id]'";
$hq_nudge	= mysql_db_query($DataBase,$q_nudge);

}else if($_GET[status]=='reject')
{
//update status become reject.
$q_nudge= "update nudge set status='reject' where entrepreneur_id='$_GET[entrepreneur_id]' and investor_id='$_GET[investor_id]'";
$hq_nudge	= mysql_db_query($DataBase,$q_nudge);

}else if($_GET[status]=='delete')
{
//delete the nudge
$q_nudge= "delete from nudge where entrepreneur_id='$_GET[entrepreneur_id]' and investor_id='$_GET[investor_id]'";
$hq_nudge	= mysql_db_query($DataBase,$q_nudge);

}else if(!isset($_GET[status]))
{			//cek whether the entrepreneur still has nudge or not.
			$q_cek= "select nudge from user where user_id='$_SESSION[user_id]'";
			$hq_cek= mysql_db_query($DataBase,$q_cek);
			while(list($temp) = mysql_fetch_row($hq_cek))
			{
			if($temp>0) //number of nudge is more than 0..
			{
			$q_cek= "select count(*) from nudge where investor_id='$_SESSION[user_id]' and investment_id='$_GET[proposal_id]'";
			$hq_cek= mysql_db_query($DataBase,$q_cek);
			
			while(list($nudge_id) = mysql_fetch_row($hq_cek))
			{
			$nudge=$nudge_id;
			}
			if($nudge==1) //if already there.. do nothing.. can't nudge again
			{
			}else if($nudge==0) //if have not nudge.. you can nudge this..
			{
			//get entrepreneur ID first
			$q_get= "select investor_id from investment_criteria where investment_criteria_id='$_GET[investment_id]'";
			$hq_get= mysql_db_query($DataBase,$q_get);
			while(list($investor_id) = mysql_fetch_row($hq_get))
			{
			
			//insert the nudge
$nudge_id = uniqid('NUDGE');
$date = date('Y-m-d G:i:s');
$q_nudge= "insert into nudge values ('$nudge_id','$investor_id','$_SESSION[user_id]','','$_GET[investment_id]','pending','$date','entrepreneur','investor')";
$hq_nudge	= mysql_db_query($DataBase,$q_nudge);
			}
			}
			}else
			{
			//nudge is 0
			$error=1;
			}
			}
}			
			
if($error==1)
{	//redirect to purchase nudge page

header('location:'.$path.'/buy_nudge/?status=nudge_empty');
}else
{			
			
if($_SESSION[user_type]=='entrepreneur')
{
header('location:'.$path.'/entrepreneur_dashboard/');
}else
{						
header('location:'.$path.'/investor_dashboard/');
}

}


?>