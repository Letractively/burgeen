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

echo "This Username is Available                          ";

}
if($error==1)
{

echo "Username is already used, Please change              ";

}else
{

echo "This Username is Available                          ";

}





?>