<?php
foreach ($orders as $order) : ?>
    <?php $order_dishes = json_decode($order['dishIds_array']);
    $dishes_in_order = getDishesDataFromOrders($conn, $order_dishes); ?>
    <div class="table-row">

        <div class="order-dishes-container">
            <?php if (count($dishes_in_order) <= 3) : ?>
                <?php for ($i = 0; $i < count($dishes_in_order); $i++) : ?>
                    <div class="order-dishes">
                        <img class="meal-img" src=<?php echo '.' . $dishes_in_order[$i][0]['img_link'] ?> alt=<?php echo substr( $dishes_in_order[$i][0]['img_link'],15 , -5) ?>>
                        <div class="qnt">
                            <?php echo json_decode($order['qnt_array'])[$i]; ?>
                        </div>
                    </div>
                <?php endfor ?>
            <?php else : ?>
                <?php for ($i = 0; $i < 2; $i++) : ?>
                    <div class="order-dishes">
                        <img class="meal-img" src=<?php echo '.' . $dishes_in_order[$i][0]['img_link'] ?> alt=<?php echo substr( $dishes_in_order[$i][0]['img_link'],15 , -5) ?>>
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

        <div class="dish-price"><?php echo '$' . $order['g_total'] . '.00' ?>
        </div>
        <ul class="meal-actions">
            <a <?php echo "href='". $_SERVER['PHP_SELF'] . "?orderId=" . $order['id'] . "'" ?>><img src='Assets/icons/chat-centered.svg' alt=''></a>
            <?php if ($_SESSION["type"] === 1) : ?>
                <a <?php echo "href='app/routes/order_status.php?deny=" . $order['id'] . "'" ?>><img src='Assets/icons/close.svg' alt=''></a>
                <a <?php echo "href='app/routes/order_status.php?confirm=" . $order['id'] . "'" ?>><img src='Assets/icons/check.svg' alt=''></a>
            <?php endif; ?>
        </ul>
        <div class="orderStatus <?php echo $order['status']; ?>">
        </div>
    </div>
<?php endforeach ?>