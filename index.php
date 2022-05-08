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
        <div class="content container">
            <div class="hero-text">
                <h1 class="header">Bringing class to cuisine with a pinch of passion in every dish.</h1>
                <p class="paragraph">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam vitae obcaecati placeat at voluptate, molestias non dolorum.</p>
                <div class="btns-container">
                    <?php echo ' <a class="btn" href="menu.php" id="order-btn">Order Dilivery</a>' ?>
                    <?php echo '<a class="btn" href="menu.php" id="book-btn">Book a table</a>' ?>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="about">
        <div class="grid-2 container">
            <div class="about-text">
                <h2 class="title">About Us</h2>
                <p class="dark-paragraph">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ducimus minus velit aliquam ea eveniet, expedita recusandae molestiae esse at.
                </p>
                <p class="dark-paragraph">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ducimus minus velit aliquam ea eveniet, expedita recusandae molestiae esse at.
                </p>
            </div>
            <div class="about-gallery">
                <img src="./Assets/resto-pic.jpg" alt="">
                <img class="img-2" src="./Assets/kitchen.jpg" alt="">
            </div>
        </div>
    </section> -->

    <section class="menu">
        <div class="container">
            <h2 class="title">Our Menu</h2>
            <div class="dark-paragraph">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ducimus totam possimus numquam ab quam quisquam mollitia est dolorem iusto reiciendis!
            </div>
            <div class="dishes grid-3">
                <?php for ($i = 0; $i < 6; $i++) { ?>
                    <div class="dish">
                        <div class="img-con">
                            <img src=<?php echo '.' . $dishes[$i]['img_link'] ?> alt="">
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