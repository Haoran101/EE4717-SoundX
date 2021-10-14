<?php

    session_start();
    include_once '../db_conn.php';
    include_once '../query_utils.php';

    //POST contains [delivery_address_line_1, delivery_address_line_2, zip_code, receiver_name, receiver_contact, payment_method]
    //SESSION contains [order_id, order_item_query, user_id]

    //Step 1: add order, items into order_items table
    foreach($_SESSION["order_item"] as $product_id => $qty){
        $order_item_query = "INSERT INTO order_items (order_id, product_id, qty) VALUES ({$_SESSION['order_id']}, {$product_id}, {$qty})";
        $order_item_table_res = $db->query($order_item_query);
    }

    //Step 2: add order details into orders table
    $order_query = "INSERT INTO orders (order_id,  user_id, status, delivery_address_line_1, ";
    $order_query.= "delivery_address_line_2, zip_code, receiver_name, receiver_contact, payment_method) ";
    $order_query.= "VALUES ({$_SESSION['order_id']},  {$_SESSION['user_id']}, ";
    $order_query.= "1, '{$_POST['delivery_address_line_1']}', '{$_POST['delivery_address_line_2']}', ";
    $order_query.= "'{$_POST['zip_code']}', '{$_POST['receiver_name']}', '{$_POST['receiver_contact']}' ,";
    $order_query.= "'{$_POST['payment_method']}')";

    $orders_table_res = $db -> query($order_query);

    //Step 3: reduce current stock
    foreach($_SESSION["order_item"] as $product_id => $qty){
        $current_stock_query = "SELECT stock FROM products WHERE product_id={$product_id}";
        $current_stock_res = $db->query($current_stock_query);
        $current_stock_row = $current_stock_res->fetch_row();
        $new_stock = $current_stock_row[0] - $qty;
        $update_stock_query = "UPDATE products SET stock={$new_stock} WHERE product_id={$product_id}";
        $db->query($update_stock_query);
    }
   

    $order_id = $_SESSION['order_id'];
    $new_cart = array();
    foreach($_SESSION["cart"] as $product_id){
        if (!array_key_exists($product_id, $_SESSION['order_item'])){
            $new_cart[] = $product_id;
        }
    }

    $_SESSION['cart'] = $new_cart;
    unset($_SESSION['order_id']);
    unset($_SESSION['order_item']);

    header("Location: http://192.168.56.2/f32ee/EE4717-SoundX/order_details/?id={$order_id}&from_checkout=true");
?>