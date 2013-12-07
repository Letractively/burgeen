<?php
include('database.php');

if($_GET[status]=='entrepreneur')
{

$country = $_GET['country'];

$q_location= "SELECT state_entrepreneur.state_name FROM state_entrepreneur,country_entrepreneur WHERE country_entrepreneur.country_id=state_entrepreneur.country_id and country_entrepreneur.country_name = '$country'";
$hq_location= mysql_db_query($DataBase,$q_location);
while(list($state) = mysql_fetch_row($hq_location))
{
	echo "<option value='$state'>$state</option>";
}
}else if($_GET[status]=='investor')
{
$country = $_GET['country'];

$q_location= "SELECT state_investor.state_name FROM state_investor,country_investor WHERE country_investor.country_id=state_investor.country_id and country_investor.country_name = '$country'";
$hq_location= mysql_db_query($DataBase,$q_location);
while(list($state) = mysql_fetch_row($hq_location))
{

	echo "<option value='$state'>$state</option>";
}

}




?>