<?php
//session_start();

if (!isset($_SESSION['loginStatus'])) {
    echo 'access denied';
    header('Location: login.php?comefrom=wishlist.php');
}
?>

This is your Wishlist
