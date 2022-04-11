<?php
include('../config/database.php');
include('../config/functions.php');
session_start();

if (!isset($_SESSION["userid"]) || $_SESSION["type"] !== 1 || !isset($_GET['dishId'])){
    exit();
} else{
    $userId = $_SESSION["userid"];
    $dishId = intval($_GET['dishId']);
    deleteItemFromdbTable($conn, $dishId);
}