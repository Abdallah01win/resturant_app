<?php
include('../config/database.php');
include('../config/functions.php');
$email = $_POST["login-email"];
$password = $_POST["password"];
$c_password = $_POST["c-password"];

/*if (emptyInputLogin($email, $password, $c_password) !== false) {
    header('location: index.php?error=emptyinput');
    exit();
};*/
if (pwdMatch($password, $c_password) !== false) {
    header('location: index.php?error=passwordsdontmatch');
    exit();
};
loginUser($conn, $email, $password);
?>