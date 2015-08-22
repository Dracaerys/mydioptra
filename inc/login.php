<?php
/////Model/////
include_once 'dbconn.php';

function login() {

    $conn = open_database_connection();

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the table
    $sql_command = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql_command) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
    $check = mysqli_num_rows($result);
    if ($check == 1) {
        echo "Logged In";
        session_start();
        $_SESSION["loginStatus"] = $row['status'];
        //redirect the user back to where he came from
        $referer = '/mydioptra/' . $_GET['comefrom'];
        header("Location: $referer");
    } elseif ($check == 0) {
        echo "No such user found. Please try again.";
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
<form action="" method="POST">
    <input name="email" placeholder="E-mail">
    <br>
    <input name="password" placeholder="Password">
    <br>
    <input name="submit" type="submit" value="Log In">
</form>
