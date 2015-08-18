<!DOCTYPE html>
<html>
    <head>
        <title>Εκδόσεις Διόπτρα - Βιβλία με θέα τη ζωή - Dioptra.gr</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/mydioptra.css">
    </head>
    <body>
        <div class="header">
            <?php include 'inc/header.html' ?>
        </div>
        <div class="container">
            <div class="navbar">
                <?php include 'inc/navbar.html' ?>
            </div>
            <div class="breadcrumbs">
                breadcrumbs
            </div>
            <div class="sidebar">
                <?php include 'inc/categories.php' ?>
            </div>
            <div class="content">
                <?php include("inc/allBooks.php") ?>
            </div>
        </div>
        <div class="footer">
            <?php include("inc/footer.html") ?>
        </div>
    </body>
</html>
