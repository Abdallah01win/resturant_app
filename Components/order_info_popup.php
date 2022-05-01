<?php if (isset($_GET['orderId'])) : ?>
    <?php $orderId = $_GET['orderId']; ?>
    <div class="popup" id="order_info_popup">
        <div class="login-form form">
            <div class="close-form">
                <img src="./Assets/icons/close.svg" alt="">
            </div>
            <div class="logo">Malibu's</div>
            <h3 class="alert-title">Order Info</h3>
            <div class="order-info">
                <?php foreach ($orders as $order) : ?>
                    <?php if ($order['id'] === $orderId) : ?>
                        <?php
                        $order_dishes = json_decode($order['dishIds_array']);
                        $dishes_in_order = getDishesDataFromOrders($conn, $order_dishes);
                        $sql = 'SELECT user_name FROM users WHERE id=' . $order['userId'];
                        $result = mysqli_query($conn, $sql);
                        $user = mysqli_fetch_all($result, MYSQLI_ASSOC); ?>
                        <div class="order-dishes-container">
                            <?php for ($i = 0; $i < count($dishes_in_order); $i++) : ?>
                                <div class="order-dishes">
                                    <img class="meal-img" src=<?php echo '.' . $dishes_in_order[$i][0]['img_link'] ?> alt="">
                                    <div class="qnt">
                                        <?php echo json_decode($order['qnt_array'])[$i]; ?>
                                    </div>
                                </div>
                            <?php endfor ?>
                        </div>
                        <div class="info-item">
                        <img  src="Assets/icons/map-pin-line.svg" alt="">
                            <?php echo $order['adress'] ?>
                        </div>
                        <div class="info-item">
                        <img  src="Assets/icons/currency-dollar.svg" alt="">
                            <?php echo $order['g_total'] . ".00" ?>
                        </div>
                        <div class="info-item">
                            <img  src="Assets/icons/user-dark.svg" alt="">
                            <?php echo $user[0]['user_name'] ?>
                        </div>
                        <div class="info-item">
                        <img  src="Assets/icons/calendar.svg" alt="">
                            <?php echo substr($order['order_date'], 2, -3)  ?>
                        </div>

                        <div class="btns-container">
                            <a class="btn-mid" <?php echo "href='app/routes/order_status.php?confirm=" . $order['id'] . "'" ?>>Confirm</a>
                            <a class="btn-mid" <?php echo "href='app/routes/order_status.php?deny=" . $order['id'] . "'" ?>>Deny</a>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
    </div>
<?php endif ?>