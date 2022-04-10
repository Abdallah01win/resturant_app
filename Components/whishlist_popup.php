<?php
$whishlist_dishes = getDishesFromDbTables($conn, 'whishlist', $userId)
;?>
<div class="alert popup hide-popup" id="whishlist-alert">
    <div class="login-form form">
        <div class="close-form">
            <img src="./Assets/icons/close.svg" alt="">
        </div>
        <div class="logo">Malibu's</div>
        <h3 class="alert-title">Your Wishlist</h3>
        <div class="whishlist">
        <?php for ($x=0; $x < count($whishlist_dishes); $x++) { 
            foreach ($whishlist_dishes[$x] as $wld ){
            echo "<div class='whishlist-item'>";
                /*echo "<img class='item-img'";
                echo "src='." . $wld['img_link'] . "'";
                echo  ">";*/
                echo"<p class='item-title'>";
                    echo $wld['name'] ;
                echo"</p>";
                echo"<p>";
                    echo  '$' . $wld['price'] . '.00';
                echo"</p>";
                echo "<a href='app/routes/add_to_cart.php?dishId=" . $wld['id'] . "'" . ">";
                echo "<img class='wl-action' src='Assets/icons/tote-dark.svg' alt=''>";
                echo "</a>";
                echo "<a href='app/routes/delete_from_wl.php?dishId=" . $wld['id'] . "'" . ">";
                echo "<img class='wl-action' src='Assets/icons/trash.svg' alt=''>";
                echo "</a>";
            echo"</div>";
            }
        } ;?>
        </div>
    </div>
    
   
</div>