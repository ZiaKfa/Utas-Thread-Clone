<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header("Location: login.php");
        exit;
    }
    echo "kamu mendapatkan nilai sebesar ".$_SESSION['nilai']."<br>";
?>