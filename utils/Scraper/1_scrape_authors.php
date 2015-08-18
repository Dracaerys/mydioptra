<?php

include("../../inc/dbconn.php");
include 'simple_html_dom.php';

$conn = open_database_connection();

// Create DOM from URL or file
$html = file_get_html('https://www.dioptra.gr/Sitemap/');


foreach ($html->find(' .Columns-3 a') as $element) {
    $str = $element->href;
    echo $str . '<br>';

    $temparr = explode('/', $str);
    $aid = $temparr[2];
    $slug = $temparr[3];
    echo $aid . '<br>';
    echo $slug . '<br>';

    $sql_command = "INSERT INTO scrape_authors (aid, slug, url)VALUES ('$aid', '$slug', '$str')";

    echo '<br><br>' . $sql_command . '<br><br>';
    mysqli_query($conn, $sql_command);

    echo 'OK row inserted with id = ' . mysqli_insert_id($conn) . '<br>';
}
?>