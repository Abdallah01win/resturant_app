<?php
if (isset($_GET['orderId'])) {
    $orderId = $_GET['orderId'];
}
?>
<div class="popup" id="order_info_popup">
    <div class="login-form form">
        <div class="close-form">
            <img src="./Assets/icons/close.svg" alt="">
        </div>
        <div class="logo">Malibu's</div>
        <h3 class="alert-title">Order Info</h3>
        <div class="info">
            <!-- User name -->
            <!-- all dishes in order -->
            <!-- date order placed -->
            <!-- total price -->
            <!-- adress to diliver to -->
            <!-- order actions to confirm or deny -->
            <?php foreach ($orders as $order) : ?>
                <?php if ($order['id'] === $orderId) : ?>
                    <div><?php echo $order["adress"]?></div>
                    <div><?php echo $order["g_total"]?></div>
                <?php endif ?>
            <?php endforeach ?>
        </div>
    </div>
</div>