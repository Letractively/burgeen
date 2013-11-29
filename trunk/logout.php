<?php
session_start();
$path=$_SESSION[path];
$_SESSION[login]='';
header('location:'.$path.'');

?>