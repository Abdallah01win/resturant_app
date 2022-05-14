<div class="order-stats">
    <div class="order-stat">
        Confirmed Orders:
        <span>
            <?php
            echo count(array_filter($orders, function ($order) {
                return $order['status'] === 'confirmed';
            }));; ?>
        </span>
    </div>

    <div class="order-stat">
        Denied Orders:
        <span>
            <?php
            echo count(array_filter($orders, function ($order) {
                return $order['status'] === 'denied';
            }));; ?>
        </span>
    </div>

    <div class="order-stat">
        Pending Orders:
        <span>
            <?php
            echo count(array_filter($orders, function ($order) {
                return $order['status'] === 'pending';
            }));; ?>
        </span>
    </div>

</div>