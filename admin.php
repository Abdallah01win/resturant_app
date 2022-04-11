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
    <section class="currect-meals container">
        <div class="title">Dishes in Our Menu</div>
        <?php foreach ($dishes as $dish) : ?>
            <div class="meal">
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

    <div class="popup hide-popup" id="new-dish-popup">
        <div class="login-form form">
            <div class="close-form">
                <img src="./Assets/icons/close.svg" alt="">
            </div>
            <div class="logo">Malibu's</div>
            <h3 class="title">Creat New Dish</h3>
            <form action="<?php echo htmlspecialchars('app/routes/creat_dish.php'); ?>" method="POST">
                <div class="form-input">
                    <label for="dish-name">
                        Name
                    </label>
                    <input type="text" name="dish-name" id="dish-name" required>
                </div>
                <div class="form-input">
                    <label for="dish-discription">
                        Discription
                    </label>
                    <input type="text" name="dish-discription" id="dish-discription" required>
                </div>
                <div class="form-double">
                    <div class="form-input">
                        <label for="dish-price">
                            Price
                        </label>
                        <input type="number" name="dish-price" id="dish-price" required>
                    </div>
                    <div class="form-input">
                        <label for="dish-ratting">
                            Ratting
                        </label>
                        <input type="number" name="dish-ratting" id="dish-ratting" required min="1">
                    </div>
                </div>

                <div class="form-input">
                    <label for="dish-category">
                        Category
                    </label>
                    <input type="text" name="dish-category" id="dish-category" required>
                </div>
                <div class="form-input">
                    <label for="dish-img-url">
                        Image Path
                    </label>
                    <input type="text" name="dish-img-url" id="dish-img-url" required>
                </div>
                <div class="btns-container">
                    <button type="submit" name="submit-meal" class="btn-mid">Creat dish</button>
                    <button class="btn-mid close-form">cancal</button>
                </div>
            </form>
        </div>
    </div>

    <?php include('./Components/logout_alert.php'); ?>
    <?php include('./Components/scripts.php'); ?>
</body>

</html>