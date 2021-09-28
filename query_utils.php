<?php
function get_details_by_id($db, $product_id){
    $query = 'SELECT product_id, product_name, short_description, no_pictures, price, description, specification FROM product
            WHERE product_id ='.$product_id;
    $result = $db -> query($query);
    $row = $result -> fetch_row();
    return $row;
}
?>