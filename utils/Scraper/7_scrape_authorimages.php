<?php

//include 'simple_html_dom.php';
include("../../inc/dbconn.php");
header('Content-Type: text/html; charset=utf-8');

$conn = open_database_connection();

$sql_command = "SELECT * from authors LIMIT 50 OFFSET 200";

echo $sql_command . '<br><br>';

$result = mysqli_query($conn, $sql_command);

while ($row = mysqli_fetch_assoc($result)) {
    $url = 'https://www.dioptra.gr' . $row["authorImage"];
    echo $url . '<br>';
    $dest = $row["authorImage"];
    $dest = explode('/', $dest);
    $dest = $dest[3];
    echo $dest . '<br>';
    if (!@copy($url, $dest)) {
        $errors = error_get_last();
        echo "COPY ERROR: " . $errors['type'];
        echo "<br />\n" . $errors['message'];
    } else {
        echo "File copied from remote!<br>";
    }
    sleep(5);
}
?>