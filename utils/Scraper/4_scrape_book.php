<?php

include 'simple_html_dom.php';
include("../../inc/dbconn.php");
header('Content-Type: text/html; charset=utf-8');

$conn = open_database_connection();

for ($i = 325; $i < 418; $i++) {



    $sql_command = "SELECT * from scrape_books ORDER by bid LIMIT 1 OFFSET " . $i;

    echo $sql_command . '<br><br>';

    $result = mysqli_query($conn, $sql_command);

    while ($row = mysqli_fetch_assoc($result)) {
        //print_r($row);
        // Create DOM from URL or file
        $a_url = $row['url'];
        $a_url = 'https://www.dioptra.gr' . $a_url;
        echo $a_url . '<br>';
        $html = file_get_html($a_url);

        foreach ($html->find('div.PeopleFieldSet a') as $element) {
            $authorid = $element->href;
            $temparr = explode('/', $authorid);
            $authorid = $temparr[2];
            echo $authorid . '<br>';
        }

        foreach ($html->find('.MainTitle') as $element) {
            $Title = $element->innertext;
            $Title = addslashes($Title);
            echo $Title . '<br>';
        }

        foreach ($html->find('.ShortDescriptionField') as $element) {
            $shortDescription = $element->innertext;
            $shortDescription = addslashes($shortDescription);
            echo $shortDescription . '<br>';
        }

        foreach ($html->find('.DescriptionField') as $element) {
            $longDescription = $element->innertext;
            $longDescription = addslashes($longDescription);
            echo $longDescription . '<br>';
        }

        foreach ($html->find('.EditionDateField') as $element) {
            $pubdate = $element->innertext;
            $temparr = explode('/', $pubdate);
            $pubdate = $temparr[2] . '-' . $temparr[1] . '-' . $temparr[0];
            echo $pubdate . '<br>';
        }

        foreach ($html->find('.fancybox') as $element) {
            $Image = $element->href;
            echo $Image . '<br>';
        }

        foreach ($html->find('.PriceWithVatField') as $element) {
            $price = $element->innertext;
            $price = substr($price, 0, 5);
            echo $price . '<br>';
        }

        $ebookprice = '';
        foreach ($html->find('.EbookPriceField') as $element) {
            $ebookprice = $element->innertext;
            $ebookprice = substr($ebookprice, 0, 5);
            echo $ebookprice . '<br>';
        }
        //Determine if it has ebook
        if ($ebookprice == '') {
            $ebookprice = 0;
            $hasEbook = 0;
        } else {
            $ebookprice = $ebookprice;
            $hasEbook = 1;
        }

        $theme = '';
        foreach ($html->find('.Attribute6Field') as $element) {
            $theme = $element->innertext;
            echo $theme . '<br>';
        }

//Insert into db
        $bookID = $row['bid'];
        $catID = $row['cid'];
        $slug = $row['slug'];

        $thumbnail = 0;

        $sql_command = "INSERT INTO books (bookID, authorID, catID, Title, slug, shortDescription, longDescription, pubdate, Image, thumbnail, price, hasEbook, ebookPrice, theme)VALUES ($bookID, $authorid, $catID, '$Title', '$slug', '$shortDescription', '$longDescription', '$pubdate', '$Image', '$thumbnail', $price, $hasEbook, $ebookprice, '$theme')";

        echo '<br><br>' . $sql_command . '<br><br>';
        mysqli_query($conn, $sql_command);

        echo 'OK row inserted with id = ' . mysqli_insert_id($conn) . '<br>';

        //sleep(10);
    }
} //end for

mysqli_close($conn);
?>