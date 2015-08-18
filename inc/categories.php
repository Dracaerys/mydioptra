<?php
/////Model/////
include_once 'dbconn.php';

function getAllCategories() {

    $conn = open_database_connection();

    // Query the table
    $sql_command = 'SELECT * FROM categories';
    $result = mysqli_query($conn, $sql_command) or die(mysqli_error($conn));

    //Load the resultset into an array
    $categories = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }

    close_database_connection($conn);

    return $categories;
}
?>


<?php
//////Controller/////
$categories = getAllCategories();
?>


<!-----View----->
<div class="boxHeader">
    Κατηγορίες
</div>

<ul>		
    <?php foreach ($categories as $category) : ?>
        <li><a href="category.php?catID=<?php echo $category["catID"] ?>"><?php echo $category["catName"] ?></a></li>
    <?php endforeach ?>
</ul>
