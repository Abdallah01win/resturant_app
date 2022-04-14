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
$cart_dishes = getDishesFromDbTables($conn, 'cart', $userId); 
$cart_dishes_ids = getIdsinDbTable($conn, 'cart', $userId);
?>
<body>
    <?php include('Components/navigation.php'); ?>
    <?php include('Components/whishlist_popup.php'); ?>
    <section class="container">
        <form action="<?php echo htmlspecialchars('app/routes/place_order.php');?>" method="post" class="table">
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
                        <div class="">
                            <?php echo "$" . $cartDish['price']  . ".00";; ?>
                            <input type="hidden" value="<?php echo $cartDish['price']; ?>" class="initial-price">
                        </div>
                        <div>
                            <label <?php echo "for'" . $cartDish['id'] . "'"; ?>>Quantity:</label>
                            <input class="dish-qnt" type="number" max="10" min="1" onchange="totlaDishPrice()" <?php echo "name'" . $cartDish['id'] . "'"; ?> value="1">
                        </div>
                        <div class="dish-price dish-total">
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
                <div id="g-total" class="total-Price">
                </div>
                <!-- <button href="" class="btn-dark ">Procced To Checkout</button> -->
            </div>

            <div class="title">Checkout</div>
            <div class="form-input">
                <label for="cc-num">
                    Credit Card Number
                </label>
                <input type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" name="cc-num" required>
            </div>
            <div class="">
            <div class="form-input">
                <label for="name-on-card">
                    Name on Card
                </label>
                <input type="text" name="name-on-card" required>
            </div>
            <div class="form-input">
                <label for="ccv">
                    CCV
                </label>
                <input type="number" name="ccv" required>
            </div>
            </div>
            
            <div class="form-input">
                <label for="adress">
                    Dilivery Address
                </label>
                <input type="adress" name="adress" required>
            </div>
            <div class="form-input">
                <label for="password">
                    Password
                </label>
                <input type="password" name="password" required>
            </div>
            <div class="btns-container">
                <button type="submit" name="sign_up_submit" class="btn-mid">Place Order</button>
                <button class="btn-mid form-toggle">Login</button>
            </div>
            <input name="hidden_gtotal" type="hidden" id="hidden_gtotal">
            <input name="hidden_ids" type="hidden" id="" value="<?php echo json_encode($cart_dishes_ids) ?>">
        </form>
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

    <?php include('Components/logout_alert.php'); ?>
    <?php include('Components/footer.php'); ?>
    <?php include('Components/scripts.php'); ?>
</body>

</html>