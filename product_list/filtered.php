<!DOCTYPE html>
<html lang="en">

<head>
    <title>Details</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/product-list-style.css">
    <link rel="stylesheet" href="../style.css" />
</head>

<body>
    <!--navbar-->
    <?php include '../Elements/nav_bar.php';?>
    <div class="filters-container">
        <div class="filters">
            <form id="all_filters" action="filtered.php" method="get">
                <div class="brand-filters">
                    <div class="filter-title">BRAND</div>
                    <div class="filter-checkbox-list">
                        <div class="checkbox-item">
                            <input type="checkbox" name="brand[]" id="brand1" value="1">
                            <label for="brand1">Razer</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="brand[]" id="brand2" value="2">
                            <label for="brand2">Beats</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="brand[]" id="brand3" value="3">
                            <label for="brand3">Sony</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="brand[]" id="brand4" value="4">
                            <label for="brand4">SteelSeries</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="brand[]" id="brand5" value="5">
                            <label for="brand5">Bose</label>
                        </div>
                    </div>
                </div>
                <hr id="filter-separation">

                <div class="filters">
                    <div class="type-filters">
                        <div class="filter-title">TYPE</div>
                        <div class="filter-checkbox-list">
                            <div class="checkbox-item">
                                <input type="checkbox" name="Wireless" id="type1" value="true">
                                <label for="type1">Wireless</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="Wired" id="type2" value="true">
                                <label for="type2">Wired</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="Earbuds" id="type3" value="true">
                                <label for="type3">Earbuds</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="Gaming" id="type4" value="true">
                                <label for="type4">Gaming</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="Sport" id="type5" value="true">
                                <label for="type5">Sport</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="Bluetooth" id="type6" value="true">
                                <label for="type6">Bluetooth</label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr id="filter-separation">

                <div class="price-filter">
                    <div class="filter-title">PRICE</div>
                    <div class="filter-price-range">
                        <label for="min_price">From</label>
                        <input type="text" name="min_price" id="min_price" size="2" value="0"
                            onchange="validateNumberInput(this);">
                        <label for="max_price">To</label>
                        <input type="text" name="max_price" id="max_price" size="2" value="1000"
                            onchange="validateNumberInput(this);">
                    </div>
                </div>
                <input type="submit" value="Apply Filters">
            </form>
        </div>
    </div>
    <?php
    include_once '../db_conn.php';
    include_once '../query_utils.php';
    $query = "SELECT * FROM product WHERE ";
    $filters = $_GET;
    if (!isset($filters["min_price"])){
        $filters["min_price"] = "0";
    }

    if (!isset($filters["max_price"])){
        $filters["max_price"] = "1000";
    }
    //var_dump($filters);
    foreach ($filters as $key => $value){
        if ($key == "brand"){;
            $query.= "brand_id IN (";
            foreach ($filters[$key] as $brand_id){
                $query.= $brand_id.", ";
            }
            $query = substr($query, 0, -2);
            $query.= ") and ";
        } else if ($key != "min_price" && $key != "max_price"){
            $query.= $key."= 1 and ";
        } else {
            continue;
        }
    }
    $query.= "price >= ".$filters["min_price"]." and price <=".$filters["max_price"];
    var_dump($query);

    $result_arr = get_product_list_by_query($db, $query);


    echo '<div class="product-result-title">RESULTS</div>'; 

    if (empty($result_arr)){
        echo '<div style="display: flex; justify-content: center;"><img src="../img/no_result.png" style="width:500px;"></div>';
    }

    
    //if no result is available
        
    //echo '<div><img src="../img/no_result.png" style="margin: 50px auto 0; width: 100%; height=auto;"></div>';
    else{
        echo '<div class="filter-result-container">';     

        echo '<div class = "product-result">';
        for ($i=0; $i<count($result_arr); $i++){
            $row = $result_arr[$i];
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $price = $row['price'];
    
            echo '<a class = "product-card-link" href="../product_details/index.php?product_id='.$product_id.'">';
            echo '<div class = "product-card" id="product_id_'.$row['product_id'].'">';
            echo '<div>';
            echo '<img class = "product-small-pic" src="../img/product-snapshot/'.$product_id.'.png" width="150px"></div>';
            echo '<div class = "product-list-info">';
            echo '<div class="product-list-info-title"><p>'.$product_name.'</p></div>';
            echo '<div class="product-list-info-price"><p>$'.$price.'</p></div>';
            echo '<hr id="filter-separation">';
            echo '</div></div></a>';
        }
        echo '</div></div>';

    }
   
    ?>
    <script src="product_list.js"></script>
</body>

</html>