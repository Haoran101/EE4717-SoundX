<?php include_once '../db_conn.php';
include_once '../query_utils.php';
$product_id = $_GET["product_id"];
$row = get_details_by_id($db, $product_id);
//get_columns_from_table($db, 'product');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Details</title>
<meta charset="utf-8">
<link rel="stylesheet" href="productdetails.css">
</head>
<body>
    <!-- navigation bar -->
    <div class="product-title">
        <div class="image-and-selector">
            <img src=<?php echo"../img/product/{$product_id}-1.jpg"?> id="product_big_picture"/><br>
            <div class="image-selector-small">
            <?php $num_of_pictures = (int) $row["no_pictures"];
            for ($pic = 1; $pic <= $num_of_pictures; $pic++){
                $pic_source = "../img/product/".$product_id."-".$pic.".jpg";
                echo '<img class="pic-thumbnail" src='.$pic_source.' id="product_pic_'.$pic.'" width="60px" height="60px" onclick="switchImage(\'product_pic_'.$pic.'\');"/>';
            }?>
            </div>
        </div>
        <div class="text-title-part">
                <h1><?php echo $row["product_name"]; ?></h1>
                <h4><?php echo $row["short_description"]; ?></h4>
                <p class="price"><strong>$<?php echo $row["price"]; ?></strong></p>
                <button id="cart-button">Add to Cart</button>
                <button id="buy-now-button">Buy Now</button>
        </div>
    </div>
    <br>
    <hr class="solid">
    <div class="Description">
        <h1>Description</h1>
        <p><?php echo $row["description"]; ?></p>
    </div>
    <br>
    <hr class="solid">
    <div class="Spec">
        <h1>Specification</h1>
        <table id="spec-table">
        <?php $json_content = json_decode($row["specification"], true);
                foreach($json_content as $key => $value){
                    echo "<tr class='spec-table'>";
                    echo "<td class='spec-table'>".$key."</td>";
                    echo "<td class='spec-table'>".$value."</td>";
                    echo "</tr>";
                }
        ?>
        </table>
    </div>
    <br>
    <hr class="solid">
    <div>
        <h1>See More</h1>
        <a class="product-card-link" href="">
        <div class="product-card" id="product_id_1">
            <div class="centered">
            <img class="product-small-pic" src="../img/product-snapshot/1.png" width="150px">
            <h3>PlaceHolder Product Name</h3>
            <h1>$169.90</h1>
            </div>
        </a>
                
        </div>
    </div>

    <script type="text/javascript" src="productdetails.js"></script>
</body>
</html>
