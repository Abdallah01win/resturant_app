<form action="<?php echo htmlspecialchars('app/routes/place_order.php'); ?>" method="post" class="table">
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
                    <input class="dish-qnt" type="number" max="10" min="1" onchange="totlaDishPrice()" name="qnt[]" value="1">
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
    <div id="g-total" class="total-Price">
    </div>
    <div class="btns-container ">
        <a class="btn-dark" id="checkout">Procced To Checkout</a>
    </div>
    <?php include('Components/checkout.php'); ?>
    <input name="hidden_gtotal" type="hidden" id="hidden_gtotal">
    <input name="hidden_ids" type="hidden" id="" value="<?php echo json_encode($cart_dishes_ids) ?>">
</form>