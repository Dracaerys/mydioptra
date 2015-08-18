<?php
/////Model/////
include_once 'dbconn.php';

function getAuthor($ID) {

    $conn = open_database_connection();

    // Query the table
    $sql_command = 'SELECT * FROM authors WHERE authorID=' . $ID;
    $result = mysqli_query($conn, $sql_command) or die(mysqli_error($conn));

    //Load the resultset into an array
    $author = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $author[] = $row;
    }

    close_database_connection($conn);

    $author = $author[0];

    return $author;
}
?>


<?php
//////Controller/////
$author = getAuthor($_GET["authorID"]);
?>


<!-----View----->
<div class="authorleft">
    <img src="<?php echo $author['authorImage'] ?>">
</div>
<div class="authorright">
    <h1><?php echo $author['authorName'] ?></h1>
    <hr>
    <p><?php echo $author['authorDescription'] ?></p><br>

    
</div>
<br class="clearfloat">
<div><p>&nbsp;</p></div>
