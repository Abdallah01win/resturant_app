<?php



foreach ($orders as $order) : ?>
    <?php $order_dishes = json_decode($order['dishIds_array']);
    $dishes_in_order = getDishesDataFromOrders($conn, $order_dishes);
    $sql = 'SELECT * FROM users WHERE id=' . $order['userId'];
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_all($result, MYSQLI_ASSOC); ?>
    <div class="table-row">
        <?php if ($_SESSION["type"] === 1) : ?>
            <div class="orderName">
                <?php echo $user[0]['user_name']; ?>
            </div>
        <?php endif; ?>

        <?php
        for ($i = 0; $i < count($dishes_in_order); $i++) : ?>
            <div class="order-dishes">
                <img class="meal-img" src=<?php echo '.' . $dishes_in_order[$i][0]['img_link'] ?> alt="">
                <div class="qnt">
                    <?php echo json_decode($order['qnt_array'])[$i]; ?>
                </div>
            </div>

        <?php endfor ?>
        <?php //print_r(json_decode($order['qnt_array']));
        ?>


        <div class="deliveryAdress">
            <?php echo $order['adress']; ?>
        </div>
        <div class="orderDate">
            <?php echo $order['order_date']; ?>
        </div>
        <div class="dish-price"><?php echo '$' . $order['g_total'] . '.00' ?>
        </div>
        <?php if ($_SESSION["type"] === 1) : ?>
            <ul class="meal-actions">
                <li><img src='Assets/icons/close.svg' alt=''></li>
                <li><img src='Assets/icons/check.svg' alt=''></li>
            </ul>
        <?php endif; ?>
    </div>
<?php endforeach ?>