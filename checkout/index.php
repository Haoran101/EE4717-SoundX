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
        <form name="checkout" action="create_order.php" method="post" class="form_content">
            <div class="order_details_left_col">
                <h1>Delivery Information</h1>
                <div class="details_address">
                    <h2>Delivery Address</h2>
                    <input type="text" id="delivery_address_line_1" name="delivery_address_line_1"
                        placeholder="Address Line 1" required>
                    <input type="text" id="delivery_address_line_2" name="delivery_address_line_2"
                        placeholder="Address Line 2">
                </div>
                <div class="details_code">
                    <h2>Postal Code</h2>
                    <input type="text" id="zip_code" name="zip_code" required>
                </div>
                <div class="details_personal">
                    <h2>Name</h2>
                    <input type="text" id="receiver_name" name="receiver_name" required>
                    <h2>Contact No.</h2>
                    <input type="tel" id="receiver_contact" name="receiver_contact" required>
                </div>
            </div>
            <div class="order_details_right_col">
                <div class="order_summary">
                    <?php
    if (!isset($_POST['selected'])){
        //no items selected in cart
        header("Location: http://192.168.56.2/f32ee/EE4717-SoundX/cart/");
    } else {
        $order_id = generate_random_order_id($db);
        $total = 0;
        $items = array();
        echo '<h1>Order Details</h1>';
        echo '<div class="summary_table">';
        echo '<table>';
        echo '<tr><th style="width:200px;">Items</th><th style="width:40px;">Qty</th><th style="width:80px;">Price</th><th width:80px;>Subtotal</th></tr>';
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
        echo '<td colspan="3" id="total_title">Total</td>';
        echo "<td id='total_amount'>{$total}</td>";
        echo '</tr>';
        echo '</table>';
        echo '</div>';
    }
?>
                </div>
                <div class="payment">
                    <h1>Payment Method</h1>
                    <div class="payment_button">
                        <label>
                            <input type="radio" id="payment_visa" name="payment_method" value="visa">
                            <img src="../img/placeholder.png">
                        </label>
                        <label>
                            <input type="radio" id="payment_mastercard" name="payment_method" value="mastercard">
                            <img src="../img/placeholder.png">
                        </label>
                        <label>
                            <input type="radio" id="payment_paypal" name="payment_method" value="paypal">
                            <img src="../img/placeholder.png">
                        </label>
                    </div>
                </div>
                <div id="submit_button">
                    <input type="submit" value="Place Order">
                </div>
            </div>
        </form>
    </div>
</body>

</html>