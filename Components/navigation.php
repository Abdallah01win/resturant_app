<nav class="nav">
    <div class="container">
        <div class="logo">
            <a href='index.php'>Malibu's</a>
        </div>
        <ul id="nav-list" class="nav-links">
            <li><a href='index.php'>Home</a></li>
            <li><a href='menu.php'>Menu</a></li>
            <?php if (!isset($_SESSION["type"]) || $_SESSION["type"] !== 1) : ?>
                <li>About</li>
                <li id='nav-wishlist'><img src='Assets/icons/heart-white.svg' alt=''></li>
                <li><a href='cart.php'><img src='Assets/icons/tote.svg' alt=''></a></li>
                <li class='logout'><img src='Assets/icons/user.svg' alt=''></li>
            <?php else : ?>
                <li><a href='admin.php'>Dashboared</a></li>
                <li><a href=''>Orders</a></li>
                <li><a class='logout btn-mid btn-green' style='font-size: 1.6rem;'>Log Out</a></li>
            <?php endif; ?>
        </ul>
        <li class="place-center" id="nav-open">
            <img src="Assets/icons/list.svg" alt="" >
        </li>
        <li class="nav-switch place-center" id="nav-close">
            <img src="Assets/icons/close-white.svg" alt="" >
        </li>
    </div>
</nav>