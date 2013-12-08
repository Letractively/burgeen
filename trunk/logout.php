<?php
session_start();
$path=$_SESSION[path];
$_SESSION[login]='';
session_destroy();
header('location:'.$path.'');

?>