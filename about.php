<!DOCTYPE html>
<html lang="en">
<?php include('Components/head.php'); ?>

<body>
    <?php include('Components/navigation.php'); ?>

    <section class="">
        <div class="about-hero">
            <div class="about-text">
                <div class="title">About Malibu's</div>
                <div class="dark-paragraph">
                    At each and every one of our resturants,
                    our goal is to bring the joy and delicious tast of food into the life of our comunity of costumers.
                </div>
                <div class="dark-paragraph">
                    Our love for the art of cuisine drives us to make sure each dish is made with enough care, love, and creativity inorder to share our passion with the world.
                </div>
            </div>
    </section>
    <section class="container stats">
        <div class="grid-3">
            <div>
                <div class="stat">+15k</div>
                <div class="stat-title">Meals searved</div>
                <div class="dark-paragraph">Over the span of 3 years and 2 contenants, our meals remain our best advertisment.</div>
            </div>
            <div>
                <div class="stat">+3000</div>
                <div class="stat-title">5 Star reviews</div>
                <div class="dark-paragraph">In a place where quality is priority, customer satisfaction is a guarentee.</div>
            </div>
            <div>
                <div class="stat">25</div>
                <div class="stat-title">Cretics' awards</div>
                <div class="dark-paragraph">Including best resturant, service, and creative cusine, our passion won us everyything.</div>
            </div>
        </div>
    </section>
    <section class="chefs">
        <div class="title container">Our world-class Chefs need no introduction.</div>
        <div class="container grid-3">
            <div class="chef">
                <img class="chef-img" src="Assets/chef-1.jpg" alt="">
                <div class="chef-name">Chrestina Cline</div>
            </div>
            <div class="chef">
                <img class="chef-img" src="Assets/chef-2.jpg" alt="">
                <div class="chef-name">Bradlee Franco</div>
            </div>
            <div class="chef">
                <img class="chef-img" src="Assets/chef-3.jpg" alt="">
                <div class="chef-name">Bob Brandt</div>
            </div>
        </div>
    </section>

    <section class="container about-cta">
        <div class="btns-container">
            <?php echo ' <a class="btn-green btn" href="menu.php" id="order-btn">Order Takeout</a>' ?>
            <?php echo '<a class="btn btn-dark" href="menu.php" id="book-btn">View Menu</a>' ?>
        </div>
    </section>

    </div>
    <?php include('./Components/footer.php'); ?>
    <?php include('./Components/sign_up_popup.php'); ?>
    <?php include('./Components/login_popup.php'); ?>
    <?php include('./Components/error_alert.php'); ?>
    <?php include('./Components/logout_alert.php'); ?>
    <?php include('./Components/scripts.php'); ?>
</body>

</html>