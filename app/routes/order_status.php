<?php
include('../config/database.php');
include('../config/functions.php');
session_start();

if (!isset($_SESSION["userid"]) || $_SESSION["type"] !== 1) {
    exit();
} else {
    $userId = $_SESSION["userid"];
    if (isset($_GET['confirm'])) {
        $orderToConfirm = $_GET['confirm'];
        changeOrderStatus($conn, 'confirmed', $orderToConfirm);
    }
    if (isset($_GET['deny'])) {
        $orderToDeny = $_GET['deny'];
        changeOrderStatus($conn, 'denied', $orderToDeny);
    }
}
