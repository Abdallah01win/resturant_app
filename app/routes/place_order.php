<?php

use function PHPSTORM_META\type;

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
    echo gettype($userId);
    echo gettype($dishIds_array);
    echo gettype($g_total);
    echo gettype($cc_num);
    echo gettype($ccv);
    echo gettype($name_on_card);
    echo gettype($delivery_adress);
    /*echo  $g_total;
    $decoded = json_decode($dishIds_array);
    print_r($decoded[1])  ;*/
}