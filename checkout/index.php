<?php 
    session_start();
    include_once '../db_conn.php';
    include_once '../query_utils.php';

    $order_query = array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Checkout</title>
<meta charset="utf-8">
</head>
<body>
<div class="order_details_form">
<form>
    <h2>Delivery Address</h2>
    <input type="text" id="delivery_address_line_1" 
        name = "delivery_address_line_1" placeholder="Address Line 1" required>
    <input type="text" id="delivery_address_line_2" 
        name = "delivery_address_line_2" placeholder="Address Line 2" required>
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
    <input type="submit" value="Place Order">
</form>
</div>
<?php   
    //if no item is selected in cart, return to cart
    if (!isset($_POST['selected'])){
        header("Location: http://192.168.56.2/f32ee/EE4717-SoundX/cart/"); 
        exit();
    } else {
        $total = 0;
        echo '<div class="order_confirmation">';
        echo '<h2>Order Details</h2>';
        echo '<table>';
        echo '<tr><th>Items</th><th>Qty</th><th>Price</th><th>Subtotal</th></tr>';
        foreach($_POST['selected'] as $selected_product){
            echo '<tr>';
            $qty = $_POST['items'][$selected_product];
            $info = get_details_by_id($db, $selected_product);
            $product_name = $info['product_name'];
            echo "<td>{$product_name}</td>";
            echo "<td>{$qty}</td>";
            $price = $info['price'];
            echo "<td>{$price}</td>";
            $subtotal = (float) $price * (float) $qty;
            echo "<td>{$subtotal}</td>";
            echo '</tr>';
            $order_query[] = "INSERT INTO order_items (order_id, product_id, qty) VALUES (<placeholder>, {$selected_product}, {$qty})";
            $total += $subtotal;
        }
        echo '<tr>';
        echo '<td colspan="3">Total</td>';
        echo "<td>{$total}</td>";
        echo '</tr>';
        echo '</table>';
        echo '</div>';
    }
?>
</body>
</html>