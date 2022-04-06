<?php 
    define('DB_HOST', 'localhost');
    define('DB_USER', 'admin');
    define('DB_NAME', 'resturant_app');
    define('DB_PASS', '123456');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die('connection failed' . $conn->connect_error);
    }
?>