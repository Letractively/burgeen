<?php
include('database.php');


$username = $_GET['username'];
$email = $_GET['email'];

//cek duplicate username
$cek= "SELECT username FROM user";
$hq_cek= mysql_db_query($DataBase,$cek);
while(list($user) = mysql_fetch_row($hq_cek))
{
if($user==$username)
{
$error=1;
}
}
//cek duplicate email
$cek_email= "SELECT contact_email FROM user";
$hq_cek_email= mysql_db_query($DataBase,$cek_email);
while(list($contact_email) = mysql_fetch_row($hq_cek_email))
{
if($email==$contact_email)
{
$error=1;
}
}



if(mysql_num_rows($hq_cek)==0 and mysql_num_rows($hq_cek_email)==0)
{

echo "block";

}
if($error==1)
{

echo "none";

}else
{

echo "block";

}





?>