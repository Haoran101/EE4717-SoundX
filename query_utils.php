<?php
$product_table_column = array("product_id", "product_name", "short_description", "no_pictures", "brand_id" , "price", "wireless", "wired", "earbuds", "gaming", "sport", "bluetooth", "url",  "description", "specification");

function get_details_by_id($db, $product_id){
    global $product_table_column;
    $query = 'SELECT * FROM product
            WHERE product_id ='.$product_id;
    $result = $db -> query($query);
    $row = $result -> fetch_row();
    $key_arr = array();
    for ($i=0; $i<count($product_table_column); $i++){
        $key = $product_table_column[$i];
        $value = $row[$i];
        $key_arr[$key] = $value;
    }
    return $key_arr;
}

?>