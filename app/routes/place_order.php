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

    $qnt_array = json_encode($_POST['qnt']);
    placeOrder($conn, $userId, $dishIds_array, $qnt_array, $g_total, $cc_num, $name_on_card, $delivery_adress);
    
}