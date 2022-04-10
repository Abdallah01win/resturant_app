<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<?php include('Components/head.php'); ?>
<?php
if (!isset($_SESSION["userid"])) {
    header('location: index.php?error=backfromcartepage');
    exit();
}
$userId = $_SESSION["userid"];
$cart_dishes = getDishesFromDbTables($conn, 'cart', $userId)
;?>
<body>
    <?php include('Components/navigation.php'); ?>
    <?php include('Components/whishlist_popup.php'); ?>

    <?php 
    for ($i=0; $i < count($cart_dishes) ; $i++) { 
        foreach($cart_dishes[$i] as $cartDish){
            echo $cartDish['name'];
        }
    }
;?>








    <?php include('Components/logout_alert.php'); ?>
    <?php include('Components/footer.php'); ?>
    <?php include('Components/scripts.php'); ?>
</body>
</html>