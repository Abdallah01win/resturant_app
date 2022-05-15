<?php 
    define('DB_HOST', 'eu-cdbr-west-02.cleardb.net');
    define('DB_USER', 'bce25bc37d82a9');
    define('DB_NAME', 'heroku_8bf35fe71107fe2');
    define('DB_PASS', '4695d9c4');

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die('connection failed' . $conn->connect_error);
    }
?>