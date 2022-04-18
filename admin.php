<!DOCTYPE html>
<html lang="en">
<?php include('Components/head.php'); ?>
<?php
if ($_SESSION["type"] !== 1) {
    header('location: index.php?error=accessdenied');
    exit();
}
$sql = 'SELECT * FROM dishes';
$result = mysqli_query($conn, $sql);
$dishes = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = 'SELECT * FROM orders';
$result = mysqli_query($conn, $sql);
$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);; ?>

<body>
    <?php include('Components/navigation.php'); ?>
    <section class="table container">
        <div class="title">Dishes in Our Menu</div>
        <?php foreach ($dishes as $dish) : ?>
            <div class="table-row">
                <img class="meal-img" src=<?php echo '.' . $dish['img_link'] ?> alt="">
                <div class="meal-title">
                    <?php echo $dish['name'] ?>
                </div>
                <div class="meal-ratting">
                    <?php
                    echo "<img src='Assets/icons/star.svg'>";
                    echo $dish['ratting'] ?>
                </div>
                <div class="dish-price"><?php echo '$' . $dish['price'] . '.00' ?>
                </div>
                <ul class="meal-actions">
                    <li><img src='Assets/icons/pencil.svg' alt=''></li>
                    <li>
                        <?php
                        echo "<a href='app/routes/delete_from_dishes.php?dishId=";
                        echo $dish['id'];
                        echo "'>";
                        echo "<img src='Assets/icons/trash.svg' alt=''>";
                        echo "</a>";; ?>
                    </li>
                </ul>
            </div>
        <?php endforeach; ?>
        <div class="options-btn" id="add-btn">
            <img src="Assets/icons/plus.svg" alt="">
        </div>
    </section>
    <section id="orders" class="table container">
        <div class="title">Customer Orders</div>
        <?php include('./Components/order_display.php'); ?>
    </section>

    <?php include('Components/error_alert.php'); ?>
    <?php include('./Components/logout_alert.php'); ?>
    <?php include('./Components/creat_dish_form.php'); ?>
    <?php include('./Components/scripts.php'); ?>
</body>

</html>