<?php

function emptyInputSignup($user_name, $sign_up_email, $password) {
   $result = "";
    if (empty($user_name) || empty($sign_up_email) || empty($password)){
        $result = true;
    } else{
        $result = false;
    }
    return $result;
};
function emptyInputLogin($email, $password, $c_password) {
   $result = "";
    if (empty($email) || empty($c_password) || empty($password)){
        $result = true;
    } else{
        $result = false;
    }
    return $result;
};
function invalidUid($user_name) {
   $result = "";
    if (!preg_match("/^[a-zA-Z0-9]*$/", $user_name)){
        $result = true;
    } else{
        $result = false;
    }
    return $result;
};
function invalidEmail($email) {
   $result = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    } else{
        $result = false;
    }
    return $result;
};
function pwdMatch($password, $c_password) {
   $result = "";
    if ($password !== $c_password){
        $result = true;
    } else{
        $result = false;
    }
    return $result;
};
function emailExists($conn, $sign_up_email) {
    $sql = "SELECT * FROM users WHERE email =?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: index.php?error=stmtfaild');
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $sign_up_email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
};
function createUser($conn, $user_name, $sign_up_email, $password) {
    $sql = "INSERT INTO users (user_name, email, password) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: index.php?error=stmtfaild');
        exit();
    }
    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sss", $user_name, $sign_up_email, $hashedpwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    /*header('location: index.php?error=stmtfaild');
    exit();*/
};
;?>