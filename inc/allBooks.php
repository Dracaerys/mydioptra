<?php
/////Model/////
include_once 'dbconn.php';

function getAllbooks() {

    $conn = open_database_connection();

    // Query the table
    $sql_command = 'SELECT * FROM vBooks limit 10';
    $result = mysqli_query($conn, $sql_command) or die(mysqli_error($conn));

    //Load the resultset into an array
    $books = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $books[] = $row;
    }

    close_database_connection($conn);

    return $books;
}
?>


<?php
//////Controller/////
$books = getAllbooks();
?>


<!-----View----->
<table border='1'>
    <?php foreach ($books as $book) : ?>
        <tr>
            <td class="id"><?php echo $book["bookID"]; ?> </td>
            <td class="title"><a href="bookDetails.php?ID=<?php echo $book["bookID"] ?>"><?php echo $book["Title"]; ?></a></td>
            <td class="author"><?php echo $book["authorName"]; ?> </td>
            <td class="catID"><?php echo $book["catName"]; ?> </td>
            <td class="pubDate"><?php echo $book["pubDate"]; ?> </td>
        </tr>
    <?php endforeach ?>
</table>
