<?php
//session_start();

if (!isset($_SESSION['loginStatus'])) {
    echo 'access denied';
    header('Location: login.php?comefrom=' . $_GET['comefrom']);
}
?>

This is your Wishlist
