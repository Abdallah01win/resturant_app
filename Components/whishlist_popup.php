<div class="alert popup " id="whishlist-alert">
    <div class="login-form form">
        <div class="close-form">
            <img src="./Assets/icons/close.svg" alt="">
        </div>
        <div class="logo">Malibu's</div>
        <h3 class="alert-title">Your Whishlist</h3>
       
        <?php for ($x=0; $x < count($whishlist_dishes); $x++) { 
            foreach ($whishlist_dishes[$x] as $wld ){
            echo "<div class='wishlist-item'>";
                echo"<p>";
                    echo $wld['name'] ;
                echo"</p>";
                echo"<p>";
                    echo $wld['price'];
                echo"</p>";
                echo"<p>";
                    echo $wld['ratting'];
                echo"</p>";
            echo"</div>";
            }
        } ;?>

        
<!-- example -->
<?php 
for ($i=0; $i <count($whishlist_dishes) ; $i++) { 
    foreach($whishlist_dishes[$i] as $wld){
        echo $wld['name'];
        echo $wld['price'];
        echo $wld['ratting'];
    }
} ;?>
        <div class="btns-container">

            <!-- <a class="btn-dark" href='app/routes/log_out.php'>Log Out</a>
            <div class="btn btn-green close-form">cancel</div> -->
        </div>
    </div>
</div>