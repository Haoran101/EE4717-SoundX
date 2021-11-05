<?php 
function order_item_table($order_id, $order_details, $order_items){
    $order_id = str_pad($order_id, 8, '0', STR_PAD_LEFT);
    echo "<div class='order-table-main'>
    <div id='order-id-row'>
        <p><strong>Order:</strong> #{$order_id}</p>
    </div>
    <div id='create-time-row'><!-- create time row -->
         <p><strong>Created Time:</strong> {$order_details['create_time']}</p>
    </div>";

    echo "<div class='item-row-container'><!-- items row, contains items table -->
    <table>
        <tr>
            <td colspan='2' id='table-head-item'>Item</td>
            <td id='table-head-qty'>Quantity</td>
            <td id='table-head-price'>Price</td>
            <td id='table-head-subtotal'>Subtotal</td>
        </tr>";
    $total = 0;
    foreach($order_items as $item){
        echo "<tr class='item-row'>";
        echo "<td id='img-container'><a href='../product_details/?product_id={$item['product_id']}'><img src='../img/product-snapshot/{$item['product_id']}.png' id='order-img'></a></td>";//image
        echo "<td id='product-name-container'><p>{$item['product_name']}</p></td>";//product name
        echo "<td id='qty-container'><p>{$item['qty']}</p></td>";//Qty
        $price =  sprintf('%0.2f', $item['price']);
        echo "<td id='price-container'><p>\${$price}</p></td>";//Price
        $subtotal = sprintf('%0.2f', $item['qty'] * $item['price']);
        $total += $item['qty'] * $item['price'];
        echo "<td id='subtotal-container'><p>\${$subtotal}</p></td>";//Subtotal
        echo "</tr>";
    }
    echo "<tr class='total-row'><td colspan='4' id='total'><p>Total</p></td>"; 
    echo "<td id='total-amount'><p>\$";
    echo sprintf('%0.2f', $total);
    echo "</p></td></tr></table></div>";
}
?>