<?php
include('database.php');


$email = $_GET['email'];

$cek= "SELECT contact_email FROM user";
$hq_cek= mysql_db_query($DataBase,$cek);
while(list($contact_email) = mysql_fetch_row($hq_cek))
{
if($email==$contact_email)
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