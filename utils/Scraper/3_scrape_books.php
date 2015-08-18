<?php

include("../../inc/dbconn.php");
include 'simple_html_dom.php';

$conn = open_database_connection();

// Create DOM from URL or file
$html = file_get_html('https://www.dioptra.gr/Sitemap/');


foreach ($html->find('.ProductListNameOnly a') as $element) {
    $str = $element->href;
    echo $str . '<br>';

    $temparr = explode('/', $str);
    $bid = $temparr[2];
    $cid = $temparr[3];
    $slug = $temparr[4];
    echo $bid . '<br>';
    echo $cid . '<br>';
    echo $slug . '<br>';

    $sql_command = "INSERT INTO scrape_books (bid, cid, slug, url) VALUES ($bid, $cid, '$slug', '$str')";

    echo '<br><br>' . $sql_command . '<br><br>';
    mysqli_query($conn, $sql_command);

    echo 'OK row inserted with id = ' . mysqli_insert_id($conn) . '<br>';
}
?>