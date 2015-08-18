<?php

include 'simple_html_dom.php';
include("../../inc/dbconn.php");
header('Content-Type: text/html; charset=utf-8');

$conn = open_database_connection();

for ($i = 169; $i < 230; $i++) {



    $sql_command = "SELECT * from scrape_authors LIMIT 1 OFFSET " . $i;

    echo $sql_command . '<br><br>';

    $result = mysqli_query($conn, $sql_command);

    while ($row = mysqli_fetch_assoc($result)) {

        // Create DOM from URL or file
        $a_url = $row['url'];
        $a_url = 'https://www.dioptra.gr' . $a_url;
        echo $a_url . '<br>';
        $html = file_get_html($a_url);


        foreach ($html->find('span.Name') as $element) {
            $name = $element->innertext;
            $name = addslashes($name);
            echo $name . '<br>';
        }

        foreach ($html->find('.PersonImageLink') as $element) {
            $img = $element->href;
            $img = addslashes($img);
            echo $img . '<br>';
        }

        foreach ($html->find('.PersonText') as $element) {
            $descr = $element->innertext;
            $descr = addslashes($descr);
            echo $descr . '<br>';
        }


        //Insert into db
        include("inc/dbconn.php");
        $aid = $row['aid'];
        $slug = $row['slug'];
        $sql_command = "INSERT INTO authors (authorID, authorName, slug, authorImage, authorDescription)VALUES ('$aid', '$name', '$slug', '$img', '$descr')";

        echo '<br><br>' . $sql_command . '<br><br>';
        mysqli_query($conn, $sql_command);

        echo 'OK row inserted with id = ' . mysqli_insert_id($conn) . '<br>';

        sleep(1);
    }
} //end for
//mysqli_close($conn);
?>