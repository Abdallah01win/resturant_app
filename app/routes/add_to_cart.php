<?php
include('../config/database.php');
include('../config/functions.php');
session_start();

if (!isset($_SESSION["userid"]) || !isset($_GET['dishId'])){
    exit();
} else{
    $userId = $_SESSION["userid"];
    $dishId = intval($_GET['dishId']);
    addToCart($conn, $userId, $dishId);
    //chack if it's in the wishlist
    // add it to cart
    // delete from wishlist
}