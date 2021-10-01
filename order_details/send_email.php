<?php 
function send_email($db, $order_id, $order_items, $order_details){
    $to = 'f32ee@localhost';
    $subject = "Your new SoundX order #{$order_id} has been placed!";
    $message = "Order Id : #{$order_id} " . "\r\n";
    $message .= "Order Items: \r\n";
    $total = 0;
    foreach ($order_items as $item){
        $message .= "Product : {$item['product_name']}    ";
        $message .= "Qty : {$item['qty']}    ";
        $message .= "Price : {$item['price']}    \r\n";
        $total += $item['qty'] * $item['price'];
    }
    $message .= "Total : {$total} \r\n\r\n";
    $message .= "Delivery Address: \r\n";
    $message .= "{$order_details['delivery_address_line_1']} \r\n";
    $message .= "{$order_details['delivery_address_line_2']}    ";
    $message .= "{$order_details['zip_code']}    \r\n";
    $headers = 'From: f32ee@localhost' . "\r\n" .'Reply-To: f32ee@localhost' . "\r\n" .'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers,'-ff32ee@localhost');
}

?>