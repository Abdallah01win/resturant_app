<?php
$whishlist_dishes = getDishesFromDbTables($conn, 'whishlist', $userId); ?>
<div class="popup hide-popup" id="whishlist-alert">
    <div class="login-form form">
        <div class="close-form">
            <img src="./Assets/icons/close.svg" alt="">
        </div>
        <div class="logo">Malibu's</div>
        <h3 class="alert-title">Your Wishlist</h3>
        <div class="whishlist">
            <?php if (/*count($whishlist_dishes)*/ 0 === 0) : ?>
                <p class="dark-paragraph">
                    No Items in Wishlist
                </p>
            <?php else : ?>
                <?php for ($x = 0; $x < count($whishlist_dishes); $x++) : ?>
                    <?php foreach ($whishlist_dishes[$x] as $wld) : ?>
                        <div class='whishlist-item'>
                            <p class='item-title'><?php echo $wld['name'] ?></p>
                            <p><?php echo '$' . $wld['price'] . '.00' ?></p>
                            <a href=<?php echo "app/routes/add_to_cart.php?dishId=" . $wld['id']; ?>>
                                <img class='wl-action' src='Assets/icons/tote-dark.svg' alt=''>
                            </a>
                            <a href=<?php echo "app/routes/delete_from_wl.php?dishId=" . $wld['id']; ?>>
                                <img class='wl-action' src='Assets/icons/trash.svg' alt=''>
                            </a>
                        </div>
                    <?php endforeach ?>
                <?php endfor ?>
            <?php endif ?>
        </div>
    </div>
</div>