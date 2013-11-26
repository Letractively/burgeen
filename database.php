<?php
	

		$Hostname 							= "localhost";	
				$DataBase 							= "wordpress2";
				$User 								= "root";
				$Pass 								= "";

			mysql_connect($Hostname,$User,$Pass) or die("connection failed");
			mysql_select_db($DataBase) or die("can't open the database");

?>
