<?php 
	session_start();
	
	if ($_SESSION["loginStatus"] == 'admin') {
		echo "Access Granted";
	} else {
		echo "Access Denied";
	}	
?>
