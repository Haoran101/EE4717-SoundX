<?php

    session_start();
    include_once '../db_conn.php';
    include_once '../query_utils.php';

    //POST contains [delivery_address_line_1, delivery_address_line_2, zip_code, receiver_name, receiver_contact, payment_method]
    //SESSION contains [order_id, order_item_query, user_id]

    //Step 1: add order, items into order_items table
    foreach($_SESSION["order_item_query"] as $query){
        $order_item_table_res = $db->query($query);
    }

    //Step 2: add order details into orders table
    $create_time = time();//epoch in seconds
    $order_query = "INSERT INTO orders (order_id, create_time, user_id, status, delivery_address_line_1, ";
    $order_query.= "delivery_address_line_2, zip_code, receiver_name, receiver_contact, payment_method) ";
    $order_query.= "VALUES ({$_SESSION['order_id']}, FROM_UNIXTIME({$create_time}), {$_SESSION['user_id']}, ";
    $order_query.= "1, '{$_POST['delivery_address_line_1']}', '{$_POST['delivery_address_line_2']}', ";
    $order_query.= "'{$_POST['zip_code']}', '{$_POST['receiver_name']}', '{$_POST['receiver_contact']}' ,";
    $order_query.= "'{$_POST['payment_method']}')";

    $orders_table_res = $db -> query($order_query);

    $order_id = $_SESSION['order_id'];
    unset($_SESSION['cart']);
    unset($_SESSION['order_id']);
    unset($_SESSION['order_item_query']);

    header("Location: http://192.168.56.2/f32ee/EE4717-SoundX/order_details/?id={$order_id}&from_checkout=true");
?>