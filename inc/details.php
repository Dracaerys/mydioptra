<?php
/////Model/////
include_once 'dbconn.php';

function getBook($ID) {

    $conn = open_database_connection();

    // Query the table
    $sql_command = 'SELECT * FROM vBooks WHERE bookID=' . $ID;
    $result = mysqli_query($conn, $sql_command) or die(mysqli_error($conn));

    //Load the resultset into an array
    $book = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $book[] = $row;
    }

    close_database_connection($conn);

    $book = $book[0];

    return $book;
}
?>


<?php
//////Controller/////
$book = getBook($_GET["ID"]);
?>


<!-----View----->
<div class="bookleft">
    <img src="<?php echo $book['Image'] ?>">
</div>
<div class="bookright">
    <h1><?php echo $book['Title'] ?></h1>
    <hr>
    <p><?php echo $book['shortDescription'] ?></p><br>

    <div class="ProductExtraFields">
        <div class="">
            <div class="bookdetailCaption">ISBN:</div>
            <div class="">978-960-364-911-3</div>
        </div>	
        <div class="FieldSet BookRatingFieldSet">
            <div class="bookdetailCaption">Αξιολόγηση χρηστών:</div>
            <div class="Field BookRatingField">-</div>
        </div>	

        <div class="FieldSet PeopleFieldSet">
            <div class="bookdetailCaption">Συγγραφέας:</div>
            <div class="Field PeopleField"><a title="<?php echo $book['authorName'] ?>" href="authorDetails.php?authorID=<?php echo $book['authorID'] ?>"><?php echo $book['authorName'] ?></a></div>
        </div>	
        <div class="FieldSet EditionFieldSet">
            <div class="bookdetailCaption">Έκδοση:</div>
            <div class="Field EditionField">1<sup>η</sup></div>
        </div>	
        <div class="FieldSet EditionDateFieldSet">
            <div class="bookdetailCaption">Ημερομηνία έκδοσης:</div>
            <div class="Field EditionDateField"></div><?php echo $book['pubDate'] ?>
        </div>	
        <div class="FieldSet PagesFieldSet">
            <div class="bookdetailCaption">Αριθμός σελίδων:</div>
            <div class="Field PagesField">440</div>
        </div>	
        <div class="FieldSet InstanceUnique Instance662 Attribute1FieldSet">
            <div class="bookdetailCaption">Format: </div>
            <div class="Field InstanceUnique Instance662 Attribute1Field">Paperback</div>
        </div>	<div class="FieldSet InstanceUnique Instance662 Attribute2FieldSet">
            <div class="bookdetailCaption">Μέγεθος: </div>
            <div class="Field InstanceUnique Instance662 Attribute2Field">140 x 205</div>
        </div>	<div class="FieldSet InstanceUnique Instance662 Attribute3FieldSet">
            <div class="bookdetailCaption">Χώρα προέλευσης: </div>
            <div class="Field InstanceUnique Instance662 Attribute3Field">Ηνωμένο Βασίλειο</div>
        </div>	<div class="FieldSet InstanceUnique Instance662 Attribute6FieldSet">
            <div class="bookdetailCaption">Θεματολογία: </div>
            <div class="Field InstanceUnique Instance662 Attribute6Field"><?php echo $book['theme'] ?></div>
        </div>	
    </div>

    <?php if ($book["hasEbook"]) { ?>
        <div class="ebook">
            eBook
            <br>
            <br>
            ebook Format:
            ePub
            <br><br>
            <?php echo $book['ebookPrice'] ?> Αγορά
        </div>
    <?php } ?>

    <div class="buy">
        <h1><?php echo $book['price'] ?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"> Αγορά</a></h1>
    </div>

</div>
<br class="clearfloat">
<div><p><?php echo $book['longDescription'] ?></p></div>
