<?php
header('Content-Type: text/html; charset=utf-8');
/////Model/////
include_once("../../inc/dbconn.php");

function insert_form_data($tablename, $arr_post) {

    $conn = open_database_connection();

    //Remove the last element of the arrays wich is the submit button
    array_pop($arr_post);

    //Separate the keys from the values
    $arr_fields = array_keys($arr_post);
    $arr_values = array_values($arr_post);

    // Query the table
    $sql_command = "INSERT INTO $tablename (" . implode(', ', $arr_fields) . ") VALUES ('" . implode("', '", $arr_values) . "')";
    echo $sql_command . '<br>';
    $result = mysqli_query($conn, $sql_command) or die(mysqli_error($conn));

    close_database_connection($conn);
}
?>


<?php
//////Controller/////
$tablename = 'categories';
$arr_post = $_POST;

if (isset($_POST['submit'])) {
    insert_form_data($tablename, $arr_post);
    header('Location: list.php');
}

$form_title = 'Insert record';
?>

<?php
/////View/////
include 'form.php';
?>