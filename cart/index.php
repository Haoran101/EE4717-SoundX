<?php
    include_once '../db_connect.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Account</title>
<meta charset="utf-8">
</head>
<body>
    <?php include '../Elements/nav_bar.php';?>
    <?php 
    if (count($_SESSION['cart'])==0){
        echo "No Items In cart, Please keep shopping.";
    } else {
        var_dump($_SESSION);
    }

    ?>
    <?php include '../Elements/footer.php';?>
</body>
</html>
