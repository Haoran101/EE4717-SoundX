<!DOCTYPE html>
<html lang="en">

<head>
    <title>Products</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/product-list-style.css"/>
    <link rel="stylesheet" href="../css/elements.css" />
</head>

<body>
    <!--navbar-->
    <?php include '../Elements/nav_bar.php';?>
    <div class="filters-container">
        <div class="filters">
            <form id="all_filters" action="" method="get">
                <?php 
                if (isset($_GET)){
                    $get_variable = json_encode($_GET);
                    echo "<script>var filter_get = {$get_variable};</script>";
                }?>
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
                                <input type="checkbox" name="Wireless" id="Wireless" value="true">
                                <label for="type1">Wireless</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="Wired" id="Wired" value="true">
                                <label for="type2">Wired</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="Earbuds" id="Earbuds" value="true">
                                <label for="type3">Earbuds</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="Gaming" id="Gaming" value="true">
                                <label for="type4">Gaming</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="Sport" id="Sport" value="true">
                                <label for="type5">Sport</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="Bluetooth" id="Bluetooth" value="true">
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
                        <input type="text" name="min_price" onClick="this.select();" id="min_price" size="2" value="0"
                            onchange="validateNumberInput(this);">
                        <label for="max_price">To</label>
                        <input type="text" name="max_price" onClick="this.select();" id="max_price" size="2" value="1000"
                            onchange="validateNumberInput(this);">
                    </div>
                    <div  id="alert-msg" style="margin-right: 400px;"></div>
                </div>
                <input id="filter-button" type="submit" value="Apply Filters">
            </form>
        </div>
    </div>
    <script src="product_list.js"></script>
    <?php
    include_once '../db_conn.php';
    include_once '../query_utils.php';
    
    $query = "SELECT * FROM products ";
    $constrant_set = array();
    $filters = $_GET;
    if (isset($filters["min_price"])){
        if ($filters["min_price"] != ""){
            $constrant_set[] = " price >= {$filters["min_price"]} ";
        }
        unset($filters["min_price"]);
    }

    if (isset($filters["max_price"])){
        if ($filters["max_price"] != ""){
            $constrant_set[] = " price <= {$filters["max_price"]} ";
        }
        unset($filters["max_price"]);
    }

    if (isset($filters["brand"])){
        $brands = $filters["brand"];
        $comma_saparate = implode(",", $brands);
        $constrant_set[] = " brand_id IN ({$comma_saparate})";
        unset($filters["brand"]);
    }

    $type_contraint = array();
    foreach ($filters as $key => $value){
        $type_contraint[] = $key."=".$value;
    }

    if (count($type_contraint) > 0){
        $or_saparate = implode(" or ", $type_contraint);
        $constrant_set[] = "(".$or_saparate.")";
    }
    if (count($constrant_set) > 0){
        $query .= " WHERE ".implode(" and ", $constrant_set);
    }
    //var_dump($query);

    $result_arr = get_product_list_by_query($db, $query);

    echo '<div class="product-result-title">RESULTS</div>'; 
	
	//if no result is available
    if (empty($result_arr)){
        echo '<div id="no_result" style="display: flex; justify-content: center;"><img src="../img/no_result.png" style="width:500px;"></div>';
    }
        
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
            //echo '<hr id="filter-separation">';
            echo '</div></div></a>';
        }
        echo '</div></div>';
    }
    include '../Elements/footer.php';?>
</body>

</html>