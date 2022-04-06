<?php 
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
            'img_url' => './Assets/dish-3.jpg',
            'discription' => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem.",
            "price" => 45.00

        ]
    ]
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('./Components/head.php'); ?> 
<body>
    <section class="hero ">
        <?php include('./Components/navigation.php'); ?> 
        <div class="content grid-2 container">
            <div class="hero-text">
                <h1 class="header">Quality food, locally sourced, and baeutifly cooked</h1>
                <p class="paragraph">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam vitae obcaecati placeat at voluptate, molestias non dolorum.</p>
                <div class="btns-container">
                    <a class="btn" href="">Order Dilivery</a>
                    <a class="btn" href="">Book a table</a>
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
            <div class="fillters btns-container">
                <a class="btn-mid" href="">all</a>
                <a class="btn-mid" href="">Breakfast</a>
                <a class="btn-mid" href="">Dinner</a>
                <a class="btn-mid" href="">beuverage</a>
             <a class="btn-mid" href="">desserts</a>
            </div>
            <div class="dishes grid-3">
                <?php foreach ($dishes as $dish): ?>
                    <div class="dish">
                    <img src=<?php echo $dish['img_url']?> alt="">
                    <div class="dish-info">
                    <div class="dish-title">
                        <span>
                            <?php echo $dish['name']?>
                        </span>
                        <span>
                            &#9734; <?php echo $dish['ratting']?>
                        </span>
                    </div>
                    <div class="dish-discription">
                        <?php echo $dish['discription']?></div>
                    <div class="dish-price">$<?php echo $dish['price']?>
                    </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>




    <?php include('./Components/footer.php'); ?> 
    <?php include('./Components/scripts.php'); ?> 
</body>
</html>