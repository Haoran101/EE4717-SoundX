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

?>