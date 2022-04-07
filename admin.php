<!DOCTYPE html>
<html lang="en">
<?php include('Components/head.php'); ?>
<?php 
if ($_SESSION["type"] !== 1) {
    header('location: index.php');
    exit();
}
;?>
<body>
<?php include('Components/navigation.php'); ?>   
</body>
</html>