<?php
    session_start();

    if($_SESSION['roleID'] == 3){
        unset($_SESSION['adminacc']);
    }

    unset($_SESSION['ingelogd']);
    unset($_SESSION['email']);
    unset($_SESSION['userID']);
    unset($_SESSION['roleID']);
    unset($_SESSION['edituser']);

    header('location:../index.php?page=home');
?>
