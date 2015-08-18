<?php 
	session_start();
	//$_SESSION["loginStatus"] = 'false';
	session_destroy();
	
	$referer = "/mydioptra/index.php";
	header("Location: $referer");
?>