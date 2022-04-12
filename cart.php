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
$cart_dishes = getDishesFromDbTables($conn, 'cart', $userId); ?>

<body>
    <?php include('Components/navigation.php'); ?>
    <?php include('Components/whishlist_popup.php'); ?>
    <section class="container">
        <form action="" method="post" class="table">
            <div class="title">Your Cart</div>
            <?php
            for ($i = 0; $i < count($cart_dishes); $i++) : ?>
                <?php foreach ($cart_dishes[$i] as $cartDish) : ?>
                    <div class='table-row'>
                        <img class="meal-img" src=<?php echo '.' . $cartDish['img_link'] ?> alt="">
                        <div class="meal-title">
                            <?php echo $cartDish['name'];; ?>
                        </div>
                        <div class="meal-ratting">
                            <img src='Assets/icons/star.svg'>
                            <?php echo $cartDish['ratting'];; ?>
                        </div>
                        <div>
                            <label for="qnt">Quantity:</label>
                            <input type="number" max="10" min="1" name="qnt" value="1">
                        </div>
                        <div class="dish-price">
                            <?php echo "$" . $cartDish['price'] . ".00";; ?>
                        </div>
                        <div class="meal-actions">
                            <?php
                            echo "<a href='app/routes/delete_from_cart.php?dishId=";
                            echo $cartDish['id'] . "'>";
                            echo "<img src='Assets/icons/trash.svg' alt=''>";
                            echo "</a>";; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endfor; ?>
            <div class="btns-container">
                <button type="submit" href="" class="btn-dark ">Procced To Checkout</button >
                <!-- <a href="" class="btn-dark">Continue Shopping</a> -->
            </div>


        </form>
    </section>

    
    <!-- add a suggestion section basen of the categories in cart in a carossel or grid display but smaller than menue -->







    <?php include('Components/logout_alert.php'); ?>
    <?php include('Components/footer.php'); ?>
    <?php include('Components/scripts.php'); ?>
</body>

</html>