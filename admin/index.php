<?php

session_start();

if (!isset($_SESSION['loginStatus'])) {
    echo 'access denied';
    header('Location: ../inc/login.php?comefrom=admin');
} elseif ($_SESSION['loginStatus'] == 'user') {
    echo $_SESSION['loginStatus'] . ' , you are in the admin section.<br>';
    echo 'but you are only a ordinary user';
} elseif ($_SESSION['loginStatus'] == 'admin') {
    echo 'yesss... you are my admin!!!';
}
?>