<?php
    // starting a new session
    session_start();

    // Resetting the variables
    unset($_SESSION["ADMIN_LOGIN"]);
    unset($_SESSION["ADMIN_USERNAME"]);

    // Redirecting to login.php
    header("location:login.php");
    die();
?>