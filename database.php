<?php
	session_start();

		$Hostname 							= "localhost";	
				$DataBase 							= "wordpress2";
				$User 								= "root";
				$Pass 								= "";

			mysql_connect($Hostname,$User,$Pass) or die("connection failed");
			mysql_select_db($DataBase) or die("cannot open database");
			
			$_SESSION[conn]=mysqli_connect("localhost","root","","wordpress2");

?>
