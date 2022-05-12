<!DOCTYPE html>
<html lang="en">
<?php include('Components/head.php'); ?>

<?php
if (!isset($_SESSION["userid"])) {
    header('location: index.php?error=notloggedin');
    exit();
}
$userId = $_SESSION["userid"];
if (!isset($_GET['category'])) {
    $sql = "SELECT * FROM dishes";
    $result = mysqli_query($conn, $sql);
    $dishes = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $category = $_GET['category'];
    $sql = "SELECT * FROM dishes WHERE category = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: menu.php?error=stmtfaild');
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $category);
    mysqli_stmt_execute($stmt);
    $dishes = mysqli_stmt_get_result($stmt);
};

$wlids = getIdsinDbTable($conn, 'whishlist', $userId);; ?>

<body>
    <?php include('./Components/whishlist_popup.php'); ?>
    <?php include('Components/navigation.php'); ?>
    <section class="menu">
        <div class="container">
            <?php include('Components/menu_fillter.php') ?>
            <div class="dishes grid-3">
                <?php foreach ($dishes as $dish) : ?>
                    <div class="dish">
                        <div class="img-con">
                            <img class="dish-img" src=<?php echo '.' . $dish['img_link'] ?> alt="">
                            <?php echo "<a class='add-to-cart' href='app/routes/add_to_cart.php?dishId=" . $dish['id'] . "'" . ">";
                            echo "<img src='Assets/icons/tote.svg' alt=''>";
                            echo "</a>";; ?>
                        </div>

                        <div class="dish-info">
                            <div class="dish-title">
                                <span>
                                    <?php echo $dish['name'] ?>
                                </span>
                                <span>
                                    &#9734; <?php echo $dish['ratting'] ?>
                                </span>
                            </div>
                            <div class="dish-discription">
                                <?php echo $dish['discription'] ?></div>
                            <div class="dish-price">
                                <span>
                                    <?php echo '$' . $dish['price'] . '.00' ?>
                                </span>

                                <?php
                                if (in_array($dish['id'], $wlids)) {
                                    echo "<a href='app/routes/delete_from_wl.php?dishId=" . $dish['id'] . "'" . ">";
                                    echo "<img src='Assets/icons/heart-filled.svg' alt=''>";
                                    echo "</a>";
                                } else {
                                    echo "<a href='app/routes/add_to_whishlist.php?dishId=" . $dish['id'] . "'" . ">";
                                    echo "<img src='Assets/icons/heart.svg' alt=''>";
                                    echo "</a>";
                                }; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php include('Components/error_alert.php'); ?>
    <?php include('./Components/logout_alert.php'); ?>
    <?php include('./Components/footer.php'); ?>
    <?php include('./Components/scripts.php'); ?>
</body>

</html>