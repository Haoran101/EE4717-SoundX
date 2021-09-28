<?php include '../db_conn.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Product List</title>
<meta charset="utf-8">
</head>
<body>
    <!--navbar-->
    <div class="filters">
        <form id="all_filters" action="filtered.php" method="get">
        <div class="brand-filters">
            Brand 
            <input type="checkbox" name="brand[]" id="brand1" value="brand1">
            <label for="brand1">brand1</label>
            <input type="checkbox" name="brand[]" id="brand2" value="brand2">
            <label for="brand2">brand2</label>
            <input type="checkbox" name="brand[]" id="brand3" value="brand3">
            <label for="brand3">brand3</label>
            <input type="checkbox" name="brand[]" id="brand4" value="brand4">
            <label for="brand4">brand4</label>
            <input type="checkbox" name="brand[]" id="brand5" value="brand5">
            <label for="brand5">brand5</label>
        </div>
        <div class="type-filters">
            type 
            <input type="checkbox" name="type[]" id="type1" value="type1">
            <label for="type1">type1</label>
            <input type="checkbox" name="type[]" id="type2" value="type2">
            <label for="type2">type2</label>
            <input type="checkbox" name="type[]" id="type3" value="type3">
            <label for="type3">type3</label>
            <input type="checkbox" name="type[]" id="type4" value="type4">
            <label for="type4">type4</label>
            <input type="checkbox" name="type[]" id="type5" value="type5">
            <label for="type5">type5</label>
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
    <script src="product_list.js"></script>
</body>
</html>
