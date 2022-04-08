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

    <div class="popup hide-popup" id="new-dish-popup">
        <div class="login-form form">
            <div class="close-form">
                <img src="./Assets/icons/close.svg" alt="">
            </div>
            <div class="logo">Malibu's</div>
            <h3 class="title">Creat New Dish</h3>
            <form action="<?php echo htmlspecialchars('app/routes/creat_dish.php');?>" method="POST">
                <div class="form-input">
                    <label for="dish-name">
                        Dish Name
                    </label>
                    <input type="text" name="dish-name" id="dish-name" required>
                </div>
                <div class="form-input">
                    <label for="dish-discription">
                        Dish discription
                    </label>
                    <input type="text" name="dish-discription" id="dish-discription" required>
                </div>
                <div class="form-double">
                <div class="form-input">
                    <label for="dish-price">
                        Dish Price
                    </label>
                    <input type="number" name="dish-price" id="dish-price" required>
                </div>
                <div class="form-input">
                    <label for="dish-ratting">
                        Dish ratting
                    </label>
                    <input type="number" name="dish-ratting" id="dish-ratting" required min="1">
                </div>
                </div>
                
                <div class="form-input">
                    <label for="dish-category">
                        Dish Category
                    </label>
                    <input type="text" name="dish-category" id="dish-category" required>
                </div>
                <div class="form-input">
                    <label for="dish-img-url">
                        Dish Image Path
                    </label>
                    <input type="text" name="dish-img-url" id="dish-img-url" required>
                </div>
                <div class="btns-container">
                    <button type="submit" name="submit-meal"  class="btn-mid">Creat dish</button>
                    <button class="btn-mid close-form">cancal</button>
                </div>
            </form>
        </div>
    </div>

    <div class="options-btn" id="add-btn">
        <img src="Assets/icons/plus.svg" alt="">
    </div>

    <?php include('./Components/logout_alert.php'); ?>
    <?php include('./Components/scripts.php'); ?>
</body>

</html>