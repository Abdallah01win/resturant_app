<?php /*
    $dishes = [
        [
            'name' => 'red steak1',
            'ratting' => 5,
            'img_url' => './Assets/dish-1.jpg',
            'discription' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem.',
            'price' => 20.00

        ],
        [
            'name' => 'red steak2',
            "ratting" => 4,
            'img_url' => './Assets/dish-2.jpg',
            'discription' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem.",
            "price" => 30.00

        ],
        [
            'name' => 'red steak3',
            "ratting" => 4.5,
            'img_url' => './Assets/dishes/seafood_paella.jpg',
            'discription' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem.",
            "price" => 45.00

        ]
    ]*/
?>
<!DOCTYPE html>
<html lang="en">
<?php include('./Components/head.php'); ?>
<?php
/* Get data from dishes table */
$sql = 'SELECT * FROM dishes';
$result = mysqli_query($conn, $sql);
$dishes = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<body>
    <section class="hero ">
        <?php include('./Components/navigation.php'); ?>
        <div class="content grid-2 container">
            <div class="hero-text">
                <h1 class="header">Quality food, locally sourced, and baeutifly cooked</h1>
                <p class="paragraph">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam vitae obcaecati placeat at voluptate, molestias non dolorum.</p>
                <div class="btns-container">
                    <?php echo ' <a class="btn" href="menu.php" id="order-btn">Order Dilivery</a>'?>
                   <?php echo '<a class="btn" href="menu.php" id="book-btn">Book a table</a>'?>
                   <!-- <a class="btn" href="" id="order-btn">Order Dilivery</a>
                   <a class="btn" href="" id="book-btn">Book a table</a> -->
                </div>
            </div>
            <div class="hero-img">
                <div class="img-container">
                    <img src="./Assets/hero-1.jpg" alt="">
                </div>
            </div>
        </div>
    </section>


    <!-- <section class="partners">
    <div id="partners" class="container">
            <h2 class="title">Join our world-class partners</h2>

            <ul class="partner-list">
                <li><img src="./Assets/Partners/Daco_4302912.png" alt="TechCrunch"></li>
                <li> <img src="./Assets/Partners/PngItem_981502.png" alt="Business Insider"> </li>
                <li><img src="./Assets/Partners/Daco_6044851.png" alt="The New Yourk Times"></li>
                <li> <img src="./Assets/Partners/Daco_4638935.png" alt="Forbs"></li>
                <li><img src="./Assets/Partners/PngItem_245292.png" alt="USA Today Network"></li>
            </ul>
        </div>
    </section> -->

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
                        <img src=<?php echo '.' . $dishes[$i]['img_link'] ?> alt="">
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
                            <div class="dish-price"><?php echo '$' . $dishes[$i]['price'] . '.00' ?>
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
    <?php include('Components/sign_up_popup.php');?>
    <?php include('Components/login_popup.php');?>
    <?php include('Components/footer.php'); ?>
    <?php include('Components/scripts.php'); ?>
</body>

</html>