<!DOCTYPE html>
<html lang="en">
<?php include('Components/head.php'); ?>
<?php
if ($_SESSION["type"] !== 1) {
    header('location: index.php');
    exit();
}
$sql = 'SELECT * FROM dishes';
$result = mysqli_query($conn, $sql);
$dishes = mysqli_fetch_all($result, MYSQLI_ASSOC);; ?>

<body>
    <?php include('Components/navigation.php'); ?>
    <section class="currect-meals container grid-2">
        <?php foreach ($dishes as $dish) : ?>
            <div class="meal">
                <img class="meal-img" src=<?php echo '.' . $dish['img_link'] ?> alt="">
                <div class="meal-info">
                    <div class="meal-title">
                        <?php echo $dish['name'] ?>
                    </div>
                    <div>
                        &#9734; <?php echo $dish['ratting'] ?>
                    </div>
                    <div class="category">
                        <?php echo $dish['category'] ?>
                    </div>
                    <div class="dish-price"><?php echo '$' . $dish['price'] . '.00' ?>
                    </div>
                </div>
                <ul class="meal-actions">
                <li><img src='Assets/icons/pencil.svg' alt=''></li>
                <li><img src='Assets/icons/trash.svg' alt=''></li>
                </ul>
            </div>
        <?php endforeach; ?>
    </section>
    <?php include('./Components/logout_alert.php'); ?>
    <?php include('./Components/scripts.php'); ?>
</body>

</html>