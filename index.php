<!DOCTYPE html>
<html lang="en">
<?php include('./Components/head.php'); ?>
<?php
/* Get data from dishes table */
$sql = 'SELECT * FROM dishes LIMIT 6';
$result = mysqli_query($conn, $sql);
$dishes = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<body>
    <section class="hero ">
        <?php
        if (isset($_SESSION['userid'])) {
            $userId = $_SESSION["userid"];
            include('./Components/whishlist_popup.php');
        }; ?>
        <?php include('./Components/navigation.php'); ?>
        <div class="about-text container">
            <div class="hero-text">
                <h1 class="title">Bringing class to cuisine.</h1>
                <p class="dark-paragraph">With a pinch of passion in every dish, and we're delivering it right to your home at any time. Order now and get free delivery on your first 3 tackouts.
                </p>
                <div class="btns-container">
                    <?php echo ' <a class="btn" href="menu.php" id="order-btn">Order Takeout</a>' ?>
                    <?php echo '<a class="btn btn-dark" href="about.php" id="book-btn">Learn More</a>' ?>
                </div>
            </div>
        </div>
    </section>

    <section class="menu">
        <div class="container">
            <h2 class="title">Our Menu</h2>
            <div class="dark-paragraph">
                Explore our mouth-watering range of dishes, beuverages, and desserts that is guarenteed to meet your tast and blow your expectations away.
            </div>
            <div class="dishes grid-3">
                <?php for ($i = 0; $i < 6; $i++) { ?>
                    <div class="dish">
                        <div class="img-con">
                            <img src=<?php echo '.' . $dishes[$i]['img_link'] ?> alt=<?php echo substr( $dishes[$i]['img_link'],15 , -5) ?>>
                        </div>

                        <div class="dish-info">
                            <div class="dish-title">
                                <span>
                                    <?php echo $dishes[$i]['name'] ?>
                                </span>
                                <span>
                                    &#9734; <?php echo $dishes[$i]['ratting'] ?>
                                </span>
                            </div>
                            <div class="dish-discription">
                                <?php echo $dishes[$i]['discription'] ?></div>
                            <div class="dish-price">
                                <span>
                                    <?php echo '$' . $dishes[$i]['price'] . '.00' ?>
                                </span>
                                <span>
                                    <img src='Assets/icons/heart.svg' alt=''>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="btns-container">
                <?php echo '<a href="menu.php" class="btn-dark" id="full-menu">View full menu</a>' ?>
            </div>
        </div>
    </section>
    <?php include('Components/sign_up_popup.php'); ?>
    <?php include('Components/login_popup.php'); ?>
    <?php include('Components/error_alert.php'); ?>
    <?php include('Components/logout_alert.php'); ?>
    <?php include('Components/footer.php'); ?>
    <?php include('Components/scripts.php'); ?>
</body>

</html>