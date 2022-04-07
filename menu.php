<!DOCTYPE html>
<html lang="en">
<?php include('Components/head.php'); ?>
<!-- include the functions filr here or in the head itself -->
<?php
$sql = 'SELECT * FROM dishes';
$result = mysqli_query($conn, $sql);
$dishes = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST["login_submit"])) {
    echo ('from loggin form');
    $email = $_POST["login-email"];
    $password = $_POST["password"];
    $c_password = $_POST["c-password"];

    if (emptyInputLogin($email, $password, $c_password) !== false) {
        header('location: index.php?error=emptyinput');
        exit();
    };
    if (pwdMatch($password, $c_password) !== false) {
        header('location: index.php?error=passwordsdontmatch');
        exit();
    };
} else if (isset($_POST["sign_up_submit"])) {
    $user_name = $_POST["name"];
    $sign_up_email = $_POST["sign-up-email"];
    $password = $_POST["password"];
    echo ('from sign up form');

    if (emptyInputSignup($user_name, $sign_up_email, $password) !== false) {
        header('location: index.php?error=emptyinput');
        exit();
    };
    if (invalidUid($user_name) !== false) {
        header('location: index.php?error=invaliduid');
        exit();
    };
    if (invalidEmail($sign_up_email) !== false) {
        header('location: index.php?error=invalidemail');
        exit();
    };
    if (emailExists($conn, $sign_up_email) !== false) {
        header('location: index.php?error=emailtaken');
        exit();
    };

    createUser($conn, $user_name, $sign_up_email, $password);
} else {
    header('location: index.php');
    exit();
};



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
                            <div class="dish-price"><?php echo '$' . $dish['price'] . '.00' ?>
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