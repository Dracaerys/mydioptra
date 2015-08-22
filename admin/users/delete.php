<?php
header('Content-Type: text/html; charset=utf-8');
/////Model/////
include_once("../../inc/dbconn.php");

function delete_form_data($tablename, $where_name, $where_value) {

    $conn = open_database_connection();

    //Formulate the sql command
    $sql_command = "DELETE FROM $tablename WHERE $where_name = $where_value LIMIT 1";
    echo $sql_command . '<br>';

    // Query the table
    $result = mysqli_query($conn, $sql_command) or die(mysqli_error($conn));

    close_database_connection($conn);
}

function get_one_item($tablename, $where_name, $where_value) {

    $conn = open_database_connection();

    // Query the table
    $sql_command = "SELECT * FROM $tablename WHERE $where_name = $where_value";
    //echo $sql_command . '<br>';
    $result = mysqli_query($conn, $sql_command) or die(mysqli_error($conn));

    //Load the resultset into an array
    $item = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $item = $row;
    }

    close_database_connection($conn);

    return $item;
}
?>


<?php
//////Controller/////
$tablename = 'users';
$where_name = 'userID';
$where_value = $_GET["$where_name"];

if (isset($_POST['submit'])) {
    delete_form_data($tablename, $where_name, $where_value);
    header('Location: list.php');
}

$item = get_one_item($tablename, $where_name, $where_value);

$form_title = 'Delete record';
?>

<?php
/////View/////
include 'form.php';
?>