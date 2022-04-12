<?php
include('../config/database.php');
include('../config/functions.php');
session_start();

if (!isset($_SESSION["userid"]) || !isset($_GET['dishId'])){
    exit();
} else{
    $userId = $_SESSION["userid"];
    $dishId = intval($_GET['dishId']);
    deleteItemFromDbTable($conn, 'cart', $userId, $dishId, 'cart');
}