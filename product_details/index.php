<?php include_once '../db_conn.php';
include_once '../query_utils.php';
session_start();
$product_id = $_GET["product_id"];
$row = get_details_by_id($db, $product_id);
$added_in_cart = in_array($product_id, $_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Details</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/elements.css" />
    <link rel="stylesheet" href="../css/product_detail.css">
</head>

<body>
    <!-- navigation bar -->
    <?php include '../Elements/nav_bar.php';?>
    <div class="product-show">
        <div class="image-and-selector">
            <div class="main-img">
                <img src=<?php echo"../img/product/{$product_id}-1.jpg"?> id="product_big_picture" />
            </div>
            <div class="image-selector-small">
                <?php $num_of_pictures = (int) $row["no_pictures"];
            for ($pic = 1; $pic <= $num_of_pictures; $pic++){
                $pic_source = "../img/product/".$product_id."-".$pic.".jpg";
                echo '<div class="image-selector-small-item">';
                echo '<img class="pic-thumbnail" src='.$pic_source.' id="product_pic_'.$pic.'" width="60px" height="60px" onclick="switchImage(\'product_pic_'.$pic.'\');"/></div>';
            }?>
            </div>
        </div>
        <div class="text-title-part">
            <h1><?php echo $row["product_name"]; ?></h1>
            <h2><?php echo $row["short_description"]; ?></h2>
            <p class="price"><strong>$<?php echo $row["price"]; ?></strong></p>
            <p class="stock">Stock Left: <?php echo $row["stock"]; ?></p>
            <div class="button-group">
                <div id="add-to-cart-button">
                    <form action="add_to_cart.php" method="post">
                        <input type="text" hidden name="product_id" value="<?php echo $product_id; ?>">
                        <button id="cart-button" onclick="this.form.submit();">
                            <?php
                    if ($added_in_cart){
                        echo "View In Cart";
                    } else {echo "Add to Cart";}
                ?>
                        </button>
                    </form>
                </div>
                <div id="buy-now-button">
                <form id="buyNow" action="../checkout/index.php" method="post">
                    <input type="hidden" id="buy-now-select-this" name="selected[]" value="<?php echo $product_id; ?>">
                    <input type="hidden" id="buy-now-qty-one" name="items[<?php echo $product_id; ?>]" value="1">
                    <button id="buy-button" onclick="buyNow.submit();">Buy Now</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="product-detail-info">
        <div class="detail-info-container">
            <h1>Description</h1>
            <hr class="solid">
            <p><?php echo $row["description"]; ?></p>
        </div>

        <div class="detail-info-container">
            <h1>Specification</h1>
            <hr class="solid">
            <table id="spec-table">
                <?php $json_content = json_decode($row["specification"], true);
                foreach($json_content as $key => $value){
                    echo "<tr class='spec-table'>";
                    echo "<td class='spec-table-key'>".$key."</td>";
                    echo "<td class='spec-table-value'>".$value."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
    </div>
    <?php include '../Elements/footer.php'; ?>
    <script type="text/javascript" src="productdetails.js"></script>
    <?php if($row["stock"] == 0){
                echo "<script> noStock(); </script>";
            }
    ?>
</body>

</html>