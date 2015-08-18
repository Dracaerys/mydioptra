<?php
/////Model/////
include_once 'dbconn.php';

function getBooksByCats($catID) {

    $conn = open_database_connection();

    // Query the table
    $sql_command = 'SELECT * FROM vbooks WHERE catID=' . $catID;
    $result = mysqli_query($conn, $sql_command) or die(mysqli_error($conn));

    //Load the resultset into an array
    $booksByCat = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $booksByCat[] = $row;
    }

    close_database_connection($conn);

    return $booksByCat;
}
?>


<?php
//////Controller/////
$booksByCat = getBooksByCats($_GET["catID"]);
?>


<!-----View----->
<?php $counter=0; ?>
 <?php foreach ($booksByCat as $book) { ?>
<div class="Productlist">
    <div><a title="<?php echo $book['Title'];?>" href="bookDetails.php?ID=<?php echo $book["bookID"] ?>"><img src="<?php echo $book["thumbnail"] ?>" alt="<?php echo $book["Title"] ?>"></a></div>
    <div><a title="<?php echo $book['Title'];?>" href="bookDetails.php?ID=<?php echo $book["bookID"] ?>"><?php echo $book["Title"] ?></a></div>
    <div><a style="color: crimson"title="<?php echo $book['authorName'] ?>" href="authorDetails.php?authorID=<?php echo $book['authorID'] ?>"><?php echo $book['authorName'] ?></a></div>
    <div><?php echo substr($book['shortDescription'], 0, 70) . '...';?></div>
    <div>&nbsp</div>

</div>
<?php
$counter++;
if ($counter % 5 ==0) {
    echo '<br class="clearfloat">';
}
         } ?>
