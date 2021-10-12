<?php 
    session_start();
    include_once '../db_conn.php';
    include_once '../query_utils.php';

    if (!isset($_SESSION['user_id'])){
        //If already login, jump to home page directly
        header("Location: http://192.168.56.2/f32ee/EE4717-SoundX/login/"); 
        exit();
    }
    //generate a random 8 digit order id nubmer
    function generate_random_order_id($db){
        do {
            $rand_number = rand(1, 99999999);
            $check_repeat = "SELECT * FROM orders WHERE order_id=".$rand_number;
            $res = $db->query($check_repeat);
            $num_row = $res->num_rows;
        } while ($num_row > 0);
        $order_id = str_pad($rand_number, 8, '0', STR_PAD_LEFT);
        return $order_id;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout</title>
    <meta charset="utf-8">
</head>

<body>
<div class="order_details_form">
<form name="checkout" action="create_order.php" method="post">
    <h2>Delivery Address</h2>
    <input type="text" id="delivery_address_line_1" 
        name = "delivery_address_line_1" placeholder="Address Line 1" required>
    <input type="text" id="delivery_address_line_2" 
        name = "delivery_address_line_2" placeholder="Address Line 2">
    <h2>Postal Code</h2>
    <input type="text" id="zip_code" name = "zip_code" required>
    <h2>Name</h2>
    <input type="text" id="receiver_name" name = "receiver_name" required>
    <h2>Contact No.</h2>
    <input type="tel" id="receiver_contact" name = "receiver_contact" required>
    <h2>Payment Method</h2>
    <input type="radio" id="payment_visa" name = "payment_method" value="visa">
    <input type="radio" id="payment_mastercard" name = "payment_method" value="mastercard">
    <input type="radio" id="payment_paypal" name = "payment_method" value="paypal">
    <?php
    if (!isset($_POST['selected'])){
        //no items selected in cart
        header("Location: http://192.168.56.2/f32ee/EE4717-SoundX/cart/");
    } else {
        $order_id = generate_random_order_id($db);
        $total = 0;
        $items = array();
        echo '<div class="order_confirmation">';
        echo '<h2>Order Details</h2>';
        echo '<table>';
        echo '<tr><th>Items</th><th>Qty</th><th>Price</th><th>Subtotal</th></tr>';
        foreach($_POST['selected'] as $selected_product){
            echo '<tr>';
            $qty = $_POST['items'][$selected_product];
            $items[$selected_product] = $qty;
            $info = get_details_by_id($db, $selected_product);
            $product_name = $info['product_name'];
            echo "<td style='width=50%'>{$product_name}</td>";
            echo "<td style='width=20%'>{$qty}</td>";
            $price = $info['price'];
            echo "<td style='width=20%'>{$price}</td>";
            $subtotal = (float) $price * (float) $qty;
            echo "<td>{$subtotal}</td>";
            echo '</tr>';
            $total += $subtotal;
        }
        $_SESSION["order_id"] = $order_id;
        $_SESSION["order_item"] = $items;
        echo '<tr>';
        echo '<td colspan="2" id="order-total-amount">Total</td>';
        echo "<td id='order-total-amount-num'>{$total}</td>";
        echo '</tr>';
        echo '</table>';
        echo '</div>';
    }
?>
    <input type="submit" value="Place Order">
</form>
<div>
</body>

</html>