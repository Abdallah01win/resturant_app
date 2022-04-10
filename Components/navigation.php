<nav class="nav">
    <div class="container">
        <div class="logo"><a href='index.php'>Malibu's</a></div>
        <ul>
            <?php
            if (!isset($_SESSION["type"]) || $_SESSION["type"] !== 1){
                echo "<li><a href='index.php'>Home</a></li>";
                echo "<li>About</li>";
                echo "<li><a href='menu.php'>Menu</a></li>";
                echo "<li>Reviews</li>";
                echo "<li id='nav-wishlist'><img src='Assets/icons/heart-white.svg' alt=''></li>";
                echo "<li><img src='Assets/icons/tote.svg' alt=''></li>";
                echo "<li class='logout'><img src='Assets/icons/user.svg' alt=''></li>";
            } else if ($_SESSION["type"] === 1) {
                echo "<li><a href='index.php'>Home</a></li>";
                echo "<li><a href='menu.php'>Menu</a></li>";
                echo "<li><a href=''>Reviews</a></li>";
                echo "<li><a href=''>Orders</a></li>";
                echo "<li><a href=''>Deliveries</a></li>";
                echo "<li><a href=''>Users</a></li>";
                echo "<li><a class='logout btn-mid btn-green' style='font-size: 1.6rem;'>Log Out</a></li> ";
            }
            ;?>
        </ul>
    </div>
</nav>