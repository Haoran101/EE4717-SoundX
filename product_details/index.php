<?php include_once '../db_conn.php';
include_once '../query_utils.php';
$product_id = $_GET["product_id"];
$row = get_details_by_id($db, $product_id);
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
            <?php $num_of_pictures = (int) $row[3];
            for ($pic = 1; $pic <= $num_of_pictures; $pic++){
                $pic_source = "../img/product/".$product_id."-".$pic.".jpg";
                echo '<img class="pic-thumbnail" src='.$pic_source.' id="product_pic_'.$pic.'" width="60px" height="60px" onclick="switchImage(\'product_pic_'.$pic.'\');"/>';
            }?>
            </div>
        </div>
        <div class="text-title-part">
                <h1><?php echo $row[1]; ?></h1>
                <h4><?php echo $row[2]; ?></h4>
                <p class="price"><strong>$<?php echo $row[4]; ?></strong></p>
                <button id="cart-button">Add to Cart</button>
                <button id="buy-now-button">Buy Now</button>
        </div>
    </div>
    <br>
    <hr class="solid">
    <div class="Description">
        <h1>Description</h1>
        <p><?php echo $row[5]; ?></p>
    </div>
    <br>
    <hr class="solid">
    <div class="Spec">
        <h1>Specification</h1>
        <table id="spec-table">
        <?php $json_content = json_decode($row[6], true);
                foreach($json_content as $key => $value){
                    echo "<tr>";
                    echo "<td>".$key."</td>";
                    echo "<td>".$value."</td>";
                    echo "</tr>";
                }
        ?>
        </table>
    </div>
    <br>
    <hr class="solid">
    <div>
        <h1>See More</h1>
        <div class="product-card" id="product_id_1">
                <div class="product-small-pic">
                    <img src="">
                </div>
                <div class="product-name-card">

                </div>
                <div class="card-price">

                </div>
        </div>
    </div>

    <script type="text/javascript" src="productdetails.js"></script>
</body>
</html>
