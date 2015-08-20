<?php
//session_start();

if (!isset($_SESSION['loginStatus'])) {
    echo 'access denied';
    header('Location: login.php?comefrom=account.php');
}
?>

This is your Account page
