<?php


		
			session_start();
			include('database.php');
			$path=$_SESSION[path];
			$_SESSION[investor_id] = $_GET[investor_id];
			
			
			
			header('location:'.$path.'/detail_investor/');











?>