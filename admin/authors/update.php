<?php
header('Content-Type: text/html; charset=utf-8');
/////Model/////
include_once("../../inc/dbconn.php");

function update_form_data($tablename, $arr_post, $where_name, $where_value) {

    $conn = open_database_connection();

    //Remove the last element of the arrays wich is the submit button
    array_pop($arr_post);

    //Separate the keys from the values
    $arr_fields = array_keys($arr_post);
    $arr_values = array_values($arr_post);

    //Formulate the sql command
    $sql_command = "UPDATE $tablename SET ";
    //Formulate the column = 'value'  pairs
    for ($i = 0; $i < count($arr_fields); $i++) {
        $str = "$arr_fields[$i] = '$arr_values[$i]'";
        $arr_pairs[] = $str;
    }
    $sql_command .= implode(', ', $arr_pairs);
    $sql_command .= " WHERE $where_name = $where_value LIMIT 1";
    echo $sql_command . '<br>';

    // Query the table
    $result = mysqli_query($conn, $sql_command) or die(mysqli_error($conn));

    close_database_connection($conn);
}

function get_one_item($tablename, $where_name, $where_value) {

    $conn = open_database_connection();

    // Query the table
    $sql_command = "SELECT * FROM $tablename WHERE $where_name = $where_value LIMIT 1";
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
$tablename = 'authors';
$arr_post = $_POST;
$where_name = 'authorID';
$where_value = $_GET["$where_name"];

if (isset($_POST['submit'])) {
    update_form_data($tablename, $arr_post, $where_name, $where_value);
    header('Location: list.php');
}

$item = get_one_item($tablename, $where_name, $where_value);

$form_title = 'Update record';
?>

<?php
/////View/////
include 'form.php';
?>