<!DOCTYPE html>
<html lang="en">
<?php include('Components/head.php'); ?>
<?php
$sql = 'SELECT * FROM dishes';
$result = mysqli_query($conn, $sql);
$dishes = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<body>
<?php include('Components/navigation.php'); ?> 
<section class="menu">
        <div class="container">
            <?php  include('Components/menu_fillter.php')?>
            <div class="dishes grid-3">
                <?php foreach ($dishes as $dish): ?>
                    <div class="dish">
                    <img src=<?php echo '.' . $dish['img_link']?> alt="">
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
                    <div class="dish-price"><?php echo '$' . $dish['price'] . '.00'?>
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