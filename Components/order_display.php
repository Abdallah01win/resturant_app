<?php
foreach ($orders as $order) : ?>
    <?php $order_dishes = json_decode($order['dishIds_array']);
    $dishes_in_order = getDishesDataFromOrders($conn, $order_dishes);?>
    <div class="table-row">

        <div class="order-dishes-container">
            <?php if (count($dishes_in_order) <= 3) : ?>
                <?php for ($i = 0; $i < count($dishes_in_order); $i++) : ?>
                    <div class="order-dishes">
                        <img class="meal-img" src=<?php echo '.' . $dishes_in_order[$i][0]['img_link'] ?> alt="">
                        <div class="qnt">
                            <?php echo json_decode($order['qnt_array'])[$i]; ?>
                        </div>
                    </div>
                <?php endfor ?>
            <?php else : ?>
                <?php for ($i = 0; $i < 2; $i++) : ?>
                    <div class="order-dishes">
                        <img class="meal-img" src=<?php echo '.' . $dishes_in_order[$i][0]['img_link'] ?> alt="">
                        <div class="qnt">
                            <?php echo json_decode($order['qnt_array'])[$i]; ?>
                        </div>
                    </div>
                <?php endfor ?>
                <div class="order-dishes">
                    <div class="extra-dishes place-center">
                        <span><?php echo "+" . count($dishes_in_order) - 2 ?></span>
                    </div>
                </div>
            <?php endif ?>

        </div>
        <?php if ($_SESSION["type"] !== 1) : ?>
            <div class="orderDate">
                <?php echo substr($order['order_date'], 5, -3);
                ?>
            </div>
        <?php endif; ?>

        <div class="dish-price"><?php echo '$' . $order['g_total'] . '.00' ?>
        </div>
        <?php if ($_SESSION["type"] === 1) : ?>
            <ul class="meal-actions">
                <a <?php echo "href='admin.php?orderId=" . $order['id'] . "'" ?>><img src='Assets/icons/chat-centered.svg' alt=''></a>
                <a <?php echo "href='app/routes/order_status.php?deny=" . $order['id'] . "'" ?>><img src='Assets/icons/close.svg' alt=''></a>
                <a <?php echo "href='app/routes/order_status.php?confirm=" . $order['id'] . "'" ?>><img src='Assets/icons/check.svg' alt=''></a>
            </ul>
        <?php endif; ?>
        <div class="orderStatus <?php echo $order['status']; ?>">
        </div>
    </div>
<?php endforeach ?>