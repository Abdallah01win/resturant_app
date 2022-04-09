<!DOCTYPE html>
<html lang="en">
<?php include('Components/head.php'); ?>
<!-- include the functions filr here or in the head itself -->
<?php

if (!isset($_SESSION["userid"])) {
    header('location: index.php?error=backfrommenuepage');
    exit();
}


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
$sql2 = "SELECT * FROM whishlist WHERE userId = ?";
$stmt2 = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt2, $sql2)) {
    header('location: menu.php?error=stmtfaild');
    exit();
}
mysqli_stmt_bind_param($stmt2, "i", $_SESSION["userid"]);
mysqli_stmt_execute($stmt2);
$dishes_in_whishlist = array_map(function($params){
    return $params['dishId'];
},mysqli_fetch_all(mysqli_stmt_get_result($stmt2),MYSQLI_ASSOC));

print_r($dishes_in_whishlist) ;


?>

<body>
    <?php include('Components/navigation.php'); ?>
    <section class="menu">
        <div class="container">
            <?php include('Components/menu_fillter.php') ?>
            <div class="dishes grid-3">
                <?php foreach ($dishes as $dish) : ?>
                    <div class="dish">
                        <img src=<?php echo '.' . $dish['img_link'] ?> alt="">
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
                                <?php if(in_array($dish['id'], $dishes_in_whishlist)){
                                    echo "<img src='Assets/icons/heart-filled.svg' alt=''>";  
                                } else{
                                    echo "<a href='app/routes/whishlist.php?dishId=".$dish['id'] . "'" . ">";
                                    echo "<img src='Assets/icons/heart.svg' alt=''>";
                                    echo "</a>";                                  
                                }  
                                ;?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php include('./Components/logout_alert.php'); ?>
    <?php include('./Components/footer.php'); ?>
    <?php include('./Components/scripts.php'); ?>
</body>

</html>