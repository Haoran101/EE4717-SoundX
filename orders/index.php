<?php include_once '../db_conn.php';
include_once '../query_utils.php';
    include_once '../order_details/item_in_order.php';
    session_start();

    if (!isset($_SESSION['user_id'])){
        //If not login, head in to login page
        header("Location: http://192.168.56.2/f32ee/EE4717-SoundX/login/"); 
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Orders</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/account-order.css" />
    <link rel="stylesheet" href="../css/elements.css" />
    <style>
        .status-bar-container {
            display: block;
            min-width: 1300px;
        }

        .index-order-detail-container {
            display: block;
            min-width: 1300px;
        }

        .order-item-table {
            display: block;
            margin-bottom:80px;
        }

        .order-table-main {
            display: block;
            border-collapse: collapse;
            width: 700px;
            margin: auto;
        }

        .item-row-container {
            display: tabld;
            padding: 10px 20px;
        }

        .item-row-container th {
            height: 60px;
        }

        .item-row {
            align-items: center;
        }

        #img-container {
            width: 50px;
            padding: 10px;
            border-bottom: 1px solid rgb(90, 90, 90);
        }

        #order-img {
            height: 70px;
            width: fit-content;
            overflow: hidden;
        }

        #product-name-container {
            margin-left: 50px;
            width: 50px;
            height: fit-content;
            text-align: left;
            border-bottom: 1px solid rgb(90, 90, 90);
        }

        #product-name-container p {
            line-height: 1.5;
            font-family: Gotham, Verdana, sans-serif;
            font-style: normal;
            font-size: 14px;
            font-weight: 800;
        }

        #qty-container,
        #price-container,
        #subtotal-container {
            text-align: center;
            font-size: 18px;
            font-weight: 300;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            border-bottom: 1px solid rgb(90, 90, 90);
        }

        #table-head-item,
        #table-head-qty,
        #table-head-price,
        #table-head-subtotal {
            padding-bottom: 20px;
            padding-top: 20px;
            font-size: 16px;
            font-weight: 600;
            background-color: slategray;
            color:white;
        }

        #table-head-item {
            text-align: left;
            padding-left: 30px;
        }

        #table-head-qty, #table-head-price, #table-head-subtotal {
            text-align: center;
        }

        #order-id-row, #create-time-row{
            width: 700px;
            font-size: 18px;
        }
        
        #total-amount{
            font-size:20px;
            font-weight: 300;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
        }

        #total{
            font-size:20px;
            font-weight: 700;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-left: 20px;
        }


        table {
            table-layout: fixed;
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
        }        
    </style>

</head>

<body>
    <?php include '../Elements/nav_bar.php';?>
    <div class="main-content-order">
        <div class="left-nav-column-order">
            <div id="account">
                <a href="../account/">
                    <span>ACCOUNT</span>
                </a>
            </div>
            <div id="order">
                <a href="">
                    <span>MY ORDER</span>
                </a>
            </div>
        </div>
        <div class="right-nav-column-order">
            <div id="order-content">

                <?php
                    $curr_user = $_SESSION['user_id'];
                    $query_orders = "SELECT * FROM orders WHERE user_id = {$curr_user} ORDER BY create_time DESC";
                    @$order_result = $db -> query($query_orders);
                    echo '<div id="order-item-table">';
                    while ($row = $order_result -> fetch_assoc()){
                        $order_id = $row['order_id'];
                        $order_items = get_order_items_with_product_info_by_order_id($db, $order_id);
                        order_item_table($order_id, $row, $order_items);
                        echo "<div id='order-view-details'>";
                        echo "<a href='../order_details/?id={$order_id}'>View Details >></a></div>";
                    }
                    echo '</div>';
                ?>

            </div>
        </div>