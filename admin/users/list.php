<?php
header('Content-Type: text/html; charset=utf-8');
/////Model/////
include_once("../../inc/dbconn.php");

function get_all_items($tablename, $where_clause = '', $extras = '', $show_sql) {

    $conn = open_database_connection();

    //Formulate the sql command
    $sql_command = "SELECT * FROM $tablename";
    if (!$where_clause == '') {
        $sql_command .= ' ' . $where_clause;
    }
    if (!$extras == '') {
        $sql_command .= ' ' . $extras;
    }
    if ($show_sql == 1) {
        echo $sql_command . '<br>';
    }
    // Query the table
    $result = mysqli_query($conn, $sql_command) or die(mysqli_error($conn));

    //Load the resultset into an array
    $items = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $items[] = $row;
    }

    close_database_connection($conn);

    return $items;
}
?>


<?php
//////Controller/////
$tablename = 'users';
$where_clause = '';    //'WHERE authorID = ' . $_GET['authorID'];
$extras = '';          //'ORDER BY authorName DESC LIMIT 10';
$show_sql = true;

$items = get_all_items($tablename, $where_clause, $extras, $show_sql);

//For the links on the table
$primary_key = 'userID';
?>


<!--View-->
<h2><?php echo $tablename ?></h2>
<style>
    table{
        border: 2px solid black;
        border-collapse: collapse;
    }
    td {
        padding: 5px; border: 1px solid gray;
    }
    th {
        padding: 10px; 
    }
</style>
<?php
echo "<table border='1'>";
//first row
echo "<tr>";
echo "<td><a href='insert.php'>Insert</a></td>";
echo "<td></td>";
foreach ($items[0] as $col => $cell) {
    echo "<th>" . $col . "</th>";
}
echo "</tr>";

//other rows
foreach ($items as $rows => $row) {
    echo "<tr>";
    echo '<td><a href="update.php?' . $primary_key . '=' . $row[$primary_key] . '">Update</a></td>';
    echo '<td><a href="delete.php?' . $primary_key . '=' . $row[$primary_key] . '">Delete</a></td>';
    foreach ($row as $col => $cell) {
        echo "<td>" . substr($cell, 0, 40) . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>