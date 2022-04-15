<?php

include('../config/database.php');
include('../config/functions.php');
session_start();

if (!isset($_SESSION["userid"])){
    exit();
} else{
    $userId = $_SESSION["userid"];
    $dishIds_array = $_POST['hidden_ids'] ;
    $g_total = intval($_POST['hidden_gtotal']);
    $cc_num = intval($_POST['cc-num']);
    $name_on_card = $_POST['name-on-card'];
    $ccv = intval($_POST['ccv']);
    $delivery_adress = $_POST['adress'];

    print_r( json_decode($dishIds_array));
    $qnt_array = json_encode($_POST['qnt']);
    placeOrder($conn, $userId, $dishIds_array, $qnt_array, $g_total, $cc_num, $name_on_card, $delivery_adress);

    /*$sql2 = "DELETE FROM cart WHERE userId = ?";
    $stmt2 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt2, $sql2)) {
        header('location: ../../menu.php?error=stmtfaild');
        exit();
    }
    mysqli_stmt_bind_param($stmt2, "i", $userId);
    mysqli_stmt_execute($stmt2);
    mysqli_stmt_close($stmt2);*/

    header('location: ../../cart.php?alert=orderplaced');
    exit();
}