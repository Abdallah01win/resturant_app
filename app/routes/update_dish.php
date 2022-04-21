<?php
include('../config/database.php');
include('../config/functions.php');
$dishId = intval($_POST['id']);
$dish_img_link = '/Assets/dishes/' . $_POST["dish-img-url"];
$dish_name = $_POST["dish-name"];
$ratting = $_POST["dish-ratting"];
$discription =$_POST["dish-discription"];
$dish_price = $_POST["dish-price"];
$dish_category = $_POST["dish-category"];

updateDish($conn, $dish_img_link, $dish_name, $ratting, $discription, $dish_price, $dish_category, $dishId);

;?>