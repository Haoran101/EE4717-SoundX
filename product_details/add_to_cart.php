<?php include_once '../db_conn.php';
    session_start();
    $product_id = $_POST["product_id"];
    if (!in_array($product_id, $_SESSION["cart"])){
        $_SESSION["cart"][] = $product_id;
        header("Location: http://192.168.56.2/f32ee/EE4717-SoundX/product_details/index.php?product_id={$product_id}");
    } else {
        header("Location: http://192.168.56.2/f32ee/EE4717-SoundX/cart/");
    }
    exit();
?>