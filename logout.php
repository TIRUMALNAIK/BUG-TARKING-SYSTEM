<?php
session_start();
    $_SESSION['username'] = "";
    $_SESSION['type'] = "";
    $_SESSION['login'] = false;

    unset($_SESSION['username']);
    unset($_SESSION['type']);
    unset($_SESSION['login']);
    header("Location: signin.php");

?>