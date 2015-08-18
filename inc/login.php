<?php
/////Model/////
include_once 'dbconn.php';

function login() {

    $conn = open_database_connection();
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
    // Query the table
    $sql_command = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql_command) or die(mysqli_error($conn));
	
	$check = mysqli_num_rows($result);
	if ($check == 1) {
		echo "Logged In";
		session_start();
		$_SESSION["loginStatus"] = "true";
		$referer = "/mydioptra/index.php";
		header("Location: $referer");
	} elseif ($check == 0) {
		echo "No such user found";
	} else {
		echo "Hacker Detected";
	}
	
    close_database_connection($conn);

	
}
?>


<?php
//////Controller/////
if (isset($_POST["submit"])) {
	login();
}

?>


<!-----View----->
<form action="login.php" method="POST">
	<input name="username" placeholder="Username">
	<br>
	<input name="password" placeholder="Password">
	<br>
	<input name="submit" type="submit" value="Log In">
</form>
