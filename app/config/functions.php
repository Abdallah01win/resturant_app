<?php

function emptyInputSignup($user_name, $sign_up_email, $password)
{
    $result = "";
    if (empty($user_name) || empty($sign_up_email) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
};
function emptyInputLogin($email, $password, $c_password)
{
    $result = "";
    if (empty($email) || empty($c_password) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
};
function invalidUid($user_name)
{
    $result = "";
    if (!preg_match("/^[a-zA-Z0-9]*$/", $user_name)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
};
function invalidEmail($email)
{
    $result = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
};
function pwdMatch($password, $c_password)
{
    $result = "";
    if ($password !== $c_password) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
};
function emailExists($conn, $sign_up_email)
{
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
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
};
function createUser($conn, $user_name, $sign_up_email, $password)
{
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
    header('location: ../../menu.php');
    exit();
    /*Start session when the user is created in db and fetch id and set it to the session*/
};
function addDish($conn, $dish_img_link, $dish_name, $ratting, $discription, $dish_price, $dish_category)
{
    $sql = "INSERT INTO dishes (img_link, name, ratting, discription, price, category) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../../admin.php?error=stmtfaild');
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssisis", $dish_img_link, $dish_name, $ratting, $discription, $dish_price, $dish_category);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../../admin.php');
    exit();
};

function checkIfItemInDbtable($conn, $dbTable, $userId, $dishId)
{

    $sql = "SELECT * FROM " . $dbTable . " WHERE dishId = ? AND userId = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: index.php?error=stmtfaild');
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ii", $dishId, $userId);
    mysqli_stmt_execute($stmt);
    $querry_result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($querry_result) === 1) {
        return true;
    } else {
        return false;
    }
};

function deleteItemFromWl($conn, $userId, $dishId)
{
    $sql2 = "DELETE FROM whishlist WHERE userId = ? AND dishId = ?";
    $stmt2 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt2, $sql2)) {
        header('location: ../../menu.php?error=stmtfaild');
        exit();
    }
    mysqli_stmt_bind_param($stmt2, "ii", $userId, $dishId);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_close($stmt2);
    header('location: ../../menu.php');
    exit();
};

function addToCart($conn, $userId, $dishId)
{
    if (checkIfItemInDbtable($conn, 'cart', $userId, $dishId) === true) {
        header('location: ../../menu.php?error=dishalreadyinwhishlist');
        exit();
    } else {
        $sql = "INSERT INTO cart (userId, dishId) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('location: ../../menu.php?error=stmtfaild');
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ii", $userId, $dishId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            if (checkIfItemInDbtable($conn, 'whishlist', $userId, $dishId) === true) {
                deleteItemFromWl($conn, $userId, $dishId);
            }
            header('location: ../../menu.php');
            exit();
        }
    }
}

function addDishToWhishlist($conn, $userId, $dishId)
{
    if (checkIfItemInDbtable($conn, 'whishlist', $userId, $dishId) === true) {
        header('location: ../../menu.php?error=dishalreadyinwhishlist');
        exit();
    } else {
        $sql2 = "INSERT INTO whishlist (userId, dishId) VALUES (?, ?)";
        $stmt2 = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt2, $sql2)) {
            header('location: ../../menu.php?error=stmtfaild');
            exit();
        }
        mysqli_stmt_bind_param($stmt2, "ii", $userId, $dishId);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);
        header('location: ../../menu.php');
        exit();
    }
};

function loginUser($conn, $email, $password)
{
    $userExists = emailExists($conn, $email);
    if ($userExists === false) {
        header('location: index.php?error=usernotfound');
        exit();
    } else {
        $pwdHashed = $userExists["password"];
        $checkpwd = password_verify($password, $pwdHashed);
        if ($checkpwd === false) {
            header('location: ../../index.php?error=wrongpassword');
            exit();
        } else {
            session_start();
            $_SESSION["userid"] = $userExists["id"];
            $_SESSION["username"] = $userExists["user_name"];
            setcookie('userId', $userExists["id"], time() + 86400 * 1, '/');
            if ($userExists['type'] === 1) {
                $_SESSION["type"] = 1;
                header('location: ../../admin.php');
                exit();
            } else {
                $_SESSION["type"] = 0;
                header('location: ../../menu.php');
                exit();
            }
        }
    }
};

function getDishesFromDbTables($conn, $dbTable, $userId)
{
    // Select The loggedin user's dishes from passedin table
    $sql = "SELECT * FROM " .$dbTable. " WHERE userId = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: index.php?error=stmtfaild');
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $dishes_in_table = array_map(function ($params) {
        return $params['dishId'];
    }, mysqli_fetch_all(mysqli_stmt_get_result($stmt), MYSQLI_ASSOC));

    // Fetch the selected dishes's data from Dishes table
    $dishes = [];
    for ($i = 0; $i < count($dishes_in_table); $i++) {
        $sql2 = "SELECT * FROM dishes WHERE id = ?";
        $stmt2 = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt2, $sql2)) {
            header('location: index.php?error=stmtfaild');
            exit();
        }
        mysqli_stmt_bind_param($stmt2, "i", $dishes_in_table[$i]);
        mysqli_stmt_execute($stmt2);
        $temp_dishes = mysqli_fetch_all(mysqli_stmt_get_result($stmt2), MYSQLI_ASSOC);
        array_push($dishes, $temp_dishes);
    };
    return $dishes;
}
