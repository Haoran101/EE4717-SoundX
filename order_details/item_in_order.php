<?php 
function order_item_table($order_id, $order_details, $order_items){
    $order_id = str_pad($order_id, 8, '0', STR_PAD_LEFT);
    echo "<table class='order-table-main'>
    <tr><td id='order-id-row'><!-- order id row -->
        <p><strong>Order</strong>#{$order_id}</p>
    </td></tr>
    <tr><td id='create-time-row'><!-- create time row -->
         <p><strong>Created Time:</strong> {$order_details['create_time']}</p>
    </td></tr>";

    echo "<tr><td><!-- items row, contains items table -->
    <div class='item-row-container'>
    <table>
        <tr>
            <td colspan='2' id='table-head-item'>Item</td>
            <td id='table-head-qty'>Quantity</td>
            <td id='table-head-price'>Price</td>
            <td id='table-head-subtotal'>Subtotal</td>
        </tr>";
    $total = 0;
    foreach($order_items as $item){
        echo "<tr><div class='item-row'";
        echo "<td><div id='img-container'><img src='../img/product-snapshot/{$item['product_id']}.png' id='order-img'><div></td>";//image
        echo "<td><div id='product-name-container'><p>{$item['product_name']}</p></div></td>";//product name
        echo "<td><div id='qty-container'><p>{$item['qty']}</p></div></td>";//Qty
        $price =  sprintf('%0.2f', $item['price']);
        echo "<td><div id='price-container'><p>\${$price}</p></div></td>";//Price
        $subtotal = sprintf('%0.2f', $item['qty'] * $item['price']);
        $total += $item['qty'] * $item['price'];
        echo "<td><div id='subtotal-container'><p>\${$subtotal}</p></div></td>";//Subtotal
        echo "</tr>";
    }
    echo "</table>
    </div>
    </td></tr>

    <tr id='total-row'><td id='total'><!-- total row -->
        <p><strong>Total</stromg></p></td>"; 
        echo "<td id='total-amount'>\$";
        echo sprintf('%0.2f', $total);
    echo "</td></tr></table>";
}
?>