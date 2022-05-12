<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<?php include('Components/head.php'); ?>
<?php
if (!isset($_SESSION["userid"])) {
    header('location: index.php?error=notloggedin');
    exit();
}
$userId = $_SESSION["userid"];
$cart_dishes = getDishesFromDbTables($conn, 'cart', $userId);
$cart_dishes_ids = getIdsinDbTable($conn, 'cart', $userId);

$sql = 'SELECT * FROM orders WHERE userId=' . $userId;
$result = mysqli_query($conn, $sql);
$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);; ?>


<body>
    <?php include('Components/navigation.php'); ?>
    <?php include('Components/whishlist_popup.php'); ?>

    <section id="cart" class="container">
        <div class="title">Your Cart</div>
        <?php if (count($cart_dishes) !== 0) : ?>
            <?php include('./Components/cart_form.php'); ?>
        <?php else : ?>
            <h4>Cart is empty for now, try adding dishes from our menu.</h4>
        <?php endif ?>
    </section>

    <section id="orders" class="table container">
        <div class="title">Your Orders</div>
        <p class="dark-paragraph">Orders that have been verified and approved by our managers apear here and a recipit with further details will be sent to your email.</p>
        <?php if (count($orders) !== 0) : ?>
            <?php include('./Components/order_display.php'); ?>
        <?php else : ?>
            <h4>You don't have any orders at the moment.</h4>
        <?php endif ?>
    </section>

    <!-- add a suggestion section basen of the categories in cart in a carossel or grid display but smaller than menue -->





    <script>
        const dishQnt = document.getElementsByClassName('dish-qnt');
        const initialPrice = document.getElementsByClassName('initial-price');
        const dishTotal = document.getElementsByClassName('dish-total');
        const gTotal = document.getElementById('g-total');
        const hidden_gtotal = document.getElementById('hidden_gtotal')

        function totlaDishPrice() {
            let gt = 0;
            for (let i = 0; i < dishQnt.length; i++) {
                qnt = parseInt(dishQnt[i].value);
                dprice = parseInt(initialPrice[i].value);
                dishTotal[i].innerText = `$${qnt * dprice}.00`;
                gt += qnt * dprice;
            }
            gTotal.innerHTML = `<span>Your Total Is: </span><span class="dish-price">$${gt}.00</span>`;
            hidden_gtotal.value = gt
        }
        totlaDishPrice();
    </script>
    <?php include('Components/error_alert.php'); ?>
    <?php include('Components/logout_alert.php'); ?>
    <?php include('./Components/order_info_popup.php'); ?>
    <?php include('Components/footer.php'); ?>
    <?php include('Components/scripts.php'); ?>
</body>

</html>