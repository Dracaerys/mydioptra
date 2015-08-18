<?php

include 'simple_html_dom.php';
include("../../inc/dbconn.php");
header('Content-Type: text/html; charset=utf-8');

$conn = open_database_connection();

// Create DOM from URL or file
$a_url = 'https://www.dioptra.gr/2/el/Katigories/?ProductsNum=90&OrderBy=date&ProductsPage=1';
echo $a_url . '<br>';
$html = file_get_html($a_url);

foreach ($html->find('div.ProductPhoto img') as $element) {
    $t_url = $element->src;
    //$temparr = explode('/', $authorid);
    //$authorid = $temparr[2];
    $href = $element->alt;
    $href = addslashes($href);
    echo $href . '<br>';
    echo $t_url . '<br>';

    //update thumbnail
    $sql_command = "UPDATE books SET thumbnail = '$t_url' WHERE Title LIKE '$href' LIMIT 1";

    echo '<br><br>' . $sql_command . '<br>';
    mysqli_query($conn, $sql_command);

    echo 'OK row inserted with id = ' . mysqli_insert_id($conn) . '<br><br>';

    //sleep(10);
}

mysqli_close($conn);
?>