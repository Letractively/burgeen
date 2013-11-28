<?php


		
			session_start();
			
			$_SESSION[proposal_id] = $_GET[proposal_id];
			
			
			header('location:http://127.0.0.1/wordpress2/detail-proposal/');











?>