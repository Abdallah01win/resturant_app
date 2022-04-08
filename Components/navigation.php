<nav class="nav">
    <div class="container">
        <div class="logo">Malibu's</div>
        <ul>
            <?php
            if (!isset($_SESSION["type"]) || $_SESSION["type"] !== 1){
                echo "<li>Home</li>";
                echo "<li>About</li>";
                echo "<li>Menu</li>";
                echo "<li>Reviews</li>";
                echo "<li><img src='Assets/icons/heart-white.svg' alt=''></li>";
                echo "<li><img src='Assets/icons/tote.svg' alt=''></li>";
                echo "<li><img src='Assets/icons/user.svg' alt=''></li>";
            } else if ($_SESSION["type"] === 1) {
                echo "<li>Home</li>";
                echo "<li>Menu</li>";
                echo "<li>Reviews</li>";
                echo "<li>Orders</li>";
                echo "<li>Deliveries</li>";
                echo "<li>Users</li>";
                echo "<li> <a class='btn-mid btn-green' style='font-size: 1.6rem;'>Log Out</a></li> ";
            }
            ;?>
        </ul>
    </div>
</nav>