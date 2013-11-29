<?php


		
			session_start();
			$path=$_SESSION[path];
			$_SESSION[proposal_id] = $_GET[proposal_id];
			
			
			header('location:'.$path.'/detail-proposal/');











?>