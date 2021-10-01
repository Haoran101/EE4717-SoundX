<?php
$product_table_column = array("product_id", "product_name", "short_description", "no_pictures", "brand_id" , "price", "wireless", "wired", "earbuds", "gaming", "sport", "bluetooth", "url",  "description", "specification");

function get_details_by_id($db, $product_id){
    $query = 'SELECT * FROM product
            WHERE product_id ='.$product_id;
    $result = $db -> query($query);
    $row = $result -> fetch_assoc();
    return $row;
}

function get_product_list_by_query($db, $query){
    $result = $db -> query($query);
    $result_arr = array();
    while ($row = $result -> fetch_assoc()){
        array_push($result_arr, $row);
    }
    return $result_arr;
}

function get_order_details_by_order_id($db, $order_id){
    $query = 'SELECT * FROM orders
            WHERE order_id ='.$order_id;
    $result = $db -> query($query);
    $row = $result -> fetch_assoc();
    return $row;
}

function get_order_items_by_order_id($db, $order_id){
    $query = 'SELECT * FROM order_items
            WHERE order_id ='.$order_id;
    $result = $db -> query($query);
    $items = array();
    while ($row = $result -> fetch_assoc()){
        $items[] = $row;
    }
    return $items;
}

function get_order_items_with_product_info_by_order_id($db, $order_id){
    $query = "SELECT order_items.order_id, order_items.product_id, order_items.qty, product.product_name, product.price";
    $query.= " FROM order_items LEFT JOIN product ON order_items.product_id = product.product_id";
    $query.= " WHERE order_items.order_id ={$order_id}";
    $result = $db -> query($query);
    while ($row = $result -> fetch_assoc()){
        $items[] = $row;
    }
    return $items;
}

function select_all_from_table($db, $table_name){
    $query = "SELECT * FROM {$table_name} WHERE 1";
    $result = $db -> query($query);
    $rows = array();
    while ($row = $result -> fetch_assoc()){
        $rows[] = $row;
    }
    return $rows;
}

?>