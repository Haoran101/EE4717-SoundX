<?php include '../db_conn.php'; ?>
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
    <script src="product_list.js"></script>
</body>
</html>
