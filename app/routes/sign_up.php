<?php
include('../config/database.php');
include('../config/functions.php');
$user_name = $_POST["name"];
$sign_up_email = $_POST["sign-up-email"];
$password = $_POST["password"];

if (invalidUid($user_name) !== false) {
    header('location: ../../index.php?error=invaliduid');
    exit();
};

if (emailExists($conn, $sign_up_email) !== false) {
    header('location: ../../index.php?error=emailtaken');
    exit();
};

createUser($conn, $user_name, $sign_up_email, $password);
?>