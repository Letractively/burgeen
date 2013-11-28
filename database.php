<?php
	

		$Hostname 							= "localhost";	
				$DataBase 							= "wordpress2";
				$User 								= "root";
				$Pass 								= "";

			mysql_connect($Hostname,$User,$Pass) or die("Koneksi gagal");
			mysql_select_db($DataBase) or die("Database tidak bisa dibuka");

?>
