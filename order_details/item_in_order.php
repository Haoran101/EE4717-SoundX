<?php 
function order_item_table($order_id, $order_details, $order_items){
    $order_id = str_pad($order_id, 8, '0', STR_PAD_LEFT);
    echo "<table>
    <tr><td><!-- order id row -->
        Order #{$order_id}
    </td></tr>
    <tr><td><!-- create time row -->
         Created Time: {$order_details['create_time']}
    </td></tr>";
    echo "<tr><td><!-- items row, contains items table -->
    Items
    <table>
        <tr>
            <td></td>
            <td></td>
            <td>Qty</td>
            <td>Price</td>
            <td>Subtotal</td>
        </tr>";
    $total = 0;
    foreach($order_items as $item){
        echo "<tr>";
        echo "<td><img src='../img/product-snapshot/{$item['product_id']}.png'></td>";//image
        echo "<td>{$item['product_name']}</td>";//product name
        echo "<td>{$item['qty']}</td>";//Qty
        $price =  sprintf('%0.2f', $item['price']);
        echo "<td>\${$price}</td>";//Price
        $subtotal = sprintf('%0.2f', $item['qty'] * $item['price']);
        $total += $item['qty'] * $item['price'];
        echo "<td>\${$subtotal}</td>";//Subtotal
        echo "</tr>";
    }
    echo "</table>
    </td></tr>
    <tr><td><!-- total row -->
        Total"; 
        echo "\$";
        echo sprintf('%0.2f', $total);
    echo "</td></tr>";
}
?>