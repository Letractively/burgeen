<?php
include('database.php');


$username = $_GET['username'];

$cek= "SELECT username FROM user";
$hq_cek= mysql_db_query($DataBase,$cek);
while(list($user) = mysql_fetch_row($hq_cek))
{
if($user==$username)
{
$error=1;
}
}
if(mysql_num_rows($hq_cek)==0)
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