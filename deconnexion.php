<?php
    session_start();
    if(!$_SESSION['password']){
        header('location: connexionAdmin.php');
    }
    session_destroy();
    header('location: index.php');
?>