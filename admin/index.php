<?php 
	include_once '../inc/dbconn.php';
	$conn = open_database_connection();
	
	session_start();
	
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	
	$sql_command = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql_command) or die(mysqli_error($conn));
	$usercredentials = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $usercredentials[] = $row;
    }
	print_r($usercredentials);
	
	echo $_SESSION["username"];
	if ($_SESSION["username"] == '') {
		echo "Access Granted";
	} else {
		echo "Access Denied";
	}	
	
	
?>