<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./Styles/main.css">
    <title>Resturant Website</title>
</head>
<body>
    <section class="hero ">
        <?php include('./Components/navigation.php'); ?> 
        <div class="content grid-2 container">
            <div class="hero-text">
                <h1 class="title">Quality food, locally sourced, and baeutifly cooked</h1>
                <p class="paragraph">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quam vitae obcaecati placeat at voluptate, molestias non dolorum perspiciatis beatae.</p>
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


    <?php include('./Components/scripts.php'); ?> 
</body>
</html>