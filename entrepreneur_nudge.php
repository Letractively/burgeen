<?php
session_start();
include('database.php');
$path = $_SESSION[path];

if($_GET[status]=='accept')
{
//update status become accept. so that the investor and entrepreneur can see the detail each other.
$q_nudge= "update nudge set status='accept',investment_id='$_GET[investment_id]' where proposal_id='$_GET[proposal_id]' and investor_id='$_GET[investor_id]'";
$hq_nudge	= mysql_db_query($DataBase,$q_nudge);

//insert investor nudge (in order to make balance) therefore each other can view the detail.


//deduct one nudge point
$q_nudge= "update user set nudge=nudge-1 where user_id='$_SESSION[user_id]'";
$hq_nudge	= mysql_db_query($DataBase,$q_nudge);

}else if($_GET[status]=='reject')
{
//update status become reject.
$q_nudge= "update nudge set status='reject' where proposal_id='$_GET[proposal_id]' and investor_id='$_GET[investor_id]'";
$hq_nudge	= mysql_db_query($DataBase,$q_nudge);

}else if($_GET[status]=='delete')
{
//delete the nudge
$q_nudge= "delete from nudge where proposal_id='$_GET[proposal_id]' and investor_id='$_GET[investor_id]'";
$hq_nudge	= mysql_db_query($DataBase,$q_nudge);

}else if(!isset($_GET[status]))
{
			$q_cek= "select count(*) from nudge where investor_id='$_SESSION[user_id]' and proposal_id='$_GET[proposal_id]'";
			$hq_cek= mysql_db_query($DataBase,$q_cek);
			
			while(list($nudge_id) = mysql_fetch_row($hq_cek))
			{
			$nudge=$nudge_id;
			}
			if($nudge==1)
			{
			}else if($nudge==0)
			{
			//get entrepreneur ID first
			$q_get= "select user_id from proposal where proposal_id='$_GET[proposal_id]'";
			$hq_get= mysql_db_query($DataBase,$q_get);
			
			while(list($entrepreneur_id) = mysql_fetch_row($hq_get))
			{
			
			//insert the nudge
$nudge_id = uniqid('NUDGE');
$date = date('Y-m-d G:i:s');
date_default_timezone_set('Asia/Singapore');
$q_nudge= "insert into nudge values ('$nudge_id','$_SESSION[user_id]','$entrepreneur_id','$_GET[proposal_id]','','pending','$date','investor','entrepreneur')";
$hq_nudge	= mysql_db_query($DataBase,$q_nudge);
			}
			}
			
}			
			
			
			
if($_SESSION[user_type]=='entrepreneur')
{
header('location:'.$path.'/entrepreneur_dashboard/');
}else
{						
header('location:'.$path.'/investor_dashboard/');
}
?>