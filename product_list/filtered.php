<!DOCTYPE html>
<html lang="en">
<head>
<title>Details</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../product_details/productdetails.css">
</head>
<body>
    <!--navbar-->
    <div class="filters">
        <form id="all_filters" action="filtered.php" method="get">
        <div class="brand-filters">
            Brand 
            <input type="checkbox" name="brand[]" id="brand1" value="1">
            <label for="brand1">Razer</label>
            <input type="checkbox" name="brand[]" id="brand2" value="2">
            <label for="brand2">Beats</label>
            <input type="checkbox" name="brand[]" id="brand3" value="3">
            <label for="brand3">Sony</label>
            <input type="checkbox" name="brand[]" id="brand4" value="4">
            <label for="brand4">SteelSeries</label>
            <input type="checkbox" name="brand[]" id="brand5" value="5">
            <label for="brand5">Bose</label>
        </div>
        <div class="type-filters">
            type 
            <input type="checkbox" name="Wireless" id="type1" value="true">
            <label for="type1">Wireless</label>
            <input type="checkbox" name="Wired" id="type2" value="true">
            <label for="type2">Wired</label>
            <input type="checkbox" name="Earbuds" id="type3" value="true">
            <label for="type3">Earbuds</label>
            <input type="checkbox" name="Gaming" id="type4" value="true">
            <label for="type4">Gaming</label>
            <input type="checkbox" name="Sport" id="type5" value="true">
            <label for="type5">Sport</label>
            <input type="checkbox" name="Bluetooth" id="type6" value="true">
            <label for="type5">Bluetooth</label>
        </div>
        <div class="price-filter">
            Price
            $<input type="text" name="min_price" id="min_price" size="2" value="0" onchange="validateNumberInput(this);">~
            $<input type="text" name="max_price" id="max_price" size="2" value="1000" onchange="validateNumberInput(this);">
            <div id="alert-msg"></div>
        </div>
        <input type="submit" value="Apply Filters">
        </form>
    </div>
<?php
    include_once '../db_conn.php';
    include_once '../query_utils.php';
    $query = "SELECT * FROM product WHERE ";
    foreach ($_GET as $key => $value){
        if ($key == "brand"){;
            $query.= "brand_id IN (";
            foreach ($_GET[$key] as $brand_id){
                $query.= $brand_id.", ";
            }
            $query = substr($query, 0, -2);
            $query.=") and ";
        } else if ($key != "min_price" && $key != "max_price"){
            $query.= $key."= 1 and ";
        } else {
            continue;
        }
    }
    $query.= "price >= ".$_GET["min_price"]." and price <=".$_GET["max_price"];
    var_dump($query);

    $result_arr = get_product_list_by_query($db, $query);
    
    for ($i=0; $i<count($result_arr); $i++){
        $row = $result_arr[$i];
        $product_id = $row['product_id'];
        $product_name = $row['product_name'];
        $price = $row['price'];

        echo '<a class="product-card-link" href="../product_details/index.php?product_id='.$product_id.'">';
        echo '<div class="product-card" id="product_id_'.$row['product_id'].'">';
        echo '<div class="centered">';
        echo '<img class="product-small-pic" src="../img/product-snapshot/'.$product_id.'.png" width="150px">';
        echo '<h4>'.$product_name.'</h4>';
        echo '<h2>$'.$price.'</h2>';
        echo '</div></a>';
    }
?>
<script src="product_list.js"></script>
</body>
</html>