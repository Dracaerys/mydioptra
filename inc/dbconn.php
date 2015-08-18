<?php

function open_database_connection() {

    $servername = "localhost";
    $username = "mydioptra_admin";
    $password = "12345";
    $dbname = "mydioptra";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password) or die(mysqli_connect_error());
    //Select database
    mysqli_select_db($conn, $dbname) or die(mysqli_error($conn));
    //Set connection charset
    mysqli_query($conn, "SET CHARACTER SET 'UTF8'");

    return $conn;
}

function close_database_connection($conn) {
    //Close the connection
    mysqli_close($conn);
}

?>