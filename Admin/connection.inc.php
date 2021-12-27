<?php
    // Connection to the database.
    $database_name = "ecommerce";
    $server = "localhost";
    $password = "root";
    $user = "root";
    $con = mysqli_connect($server, $user, $password, $database_name);
    // Starting the session.
    session_start();
    // Specifying the paths
    define("SERVER_PATH", $_SERVER['DOCUMENT_ROOT']. "/Internship/TGH/Ecommerce");
    define("SITE_PATH", 'http://127.0.0.1/Internship/TGH/Ecommerce/');
    define("PRODUCT_IMAGE_SERVER_PATH","../media/product/");
?>