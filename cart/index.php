<?php
    include_once '../db_connect.php';
    include_once '../query_utils.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cart</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/cart.css"/>
    <link rel="stylesheet" href="../css/elements.css"/>
</head>

<body>
    <?php include '../Elements/nav_bar.php';?>
    <div class="item-cart-title">
        <h1>Items</h1>
    </div>
    <?php 
    if (count($_SESSION['cart'])==0){
        echo "No Items In cart, Please keep shopping.";
    } else {
        echo '<div class = "cart-container">';
        echo '<form action="../checkout/" method="post">';
        echo '<table class="cart-table">';
        foreach ($_SESSION['cart'] as $product){
            $info = get_details_by_id($db, $product);
            echo "<tr><td>";
            echo '<div class="cart-item-row">';
            echo "<input type='checkbox' name='selected[]' value='{$product}' id='cart-checkbox'>";
            echo "<img src='../img/product-snapshot/{$product}.png' id='cart-img'>";
            echo '<div id="product_name_quan">';
            echo '<p>'.$info['product_name']'</p>';
            echo '<div id="quan_field">';
            echo "<input type='number' name='items[{$product}]' value='1'>";
            echo '</div></div>';
            echo '<div>';
            echo $info['price'];
            //echo "<input type='number' name='items[{$product}]' value='1'>";
            echo 'M./div></div>';
            echo "</td></tr>";
        }
        echo "</table>";
        echo '<input type="submit" value="Checkout">';
        echo '</form>';
        echo '</div>'
    }
    ?>
    <?php include '../Elements/footer.php';?>
</body>

</html>
