<?php 
    session_start();
    include_once '../db_conn.php';
    include_once '../query_utils.php';
    include_once 'send_email.php';
    
    if (!isset($_SESSION['user_id'])){
        //If not login, head in to login page
        header("Location: http://192.168.56.2/f32ee/EE4717-SoundX/login/"); 
        exit();
    }

    $order_id = (int)$_GET['id'];
    $order_details = get_order_details_by_order_id($db, $order_id);
    $order_items = get_order_items_with_product_info_by_order_id($db, $order_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>SoundX</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/elements.css" />
    <link rel="stylesheet" href="../css/order-details.css" />
    <style>

        .index-order-detail-container {
            display: block;
            min-width: 1300px;
        }

        .order-item-table {
            display: block;
            margin-bottom: 80px;
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
            color: white;
        }

        #table-head-item {
            text-align: left;
            padding-left: 30px;
        }

        #table-head-qty,
        #table-head-price,
        #table-head-subtotal {
            text-align: center;
        }

        #order-id-row,
        #create-time-row {
            width: 700px;
            font-size: 18px;
        }

        #total-amount {
            font-size: 20px;
            font-weight: 300;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
        }

        #total {
            font-size: 20px;
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
    <!-- the navigation bar -->
    <?php include '../Elements/nav_bar.php';?>
    <?php 
        if (isset($_GET['from_checkout'])){
            send_email($db, $order_id, $order_items, $order_details);
            echo "<div class='success'>Congrats! Your order has been created successfully! An email has been sent to your mailbox!</div>";
        }
    ?>
    <div class="content">
        <div class="status-bar-container">
            <?php
        $curr_status = (int) $order_details['status'];
        $all_status = select_all_from_table($db, 'status');
        for ($node = 0; $node < count($all_status); $node++){
            echo "<div class='phase'>";
            if ($node < $curr_status){
                echo "<div class='status-dot done'></div>";
                if ($node != 0){
                    echo "<div class='status-line solid'></div>";
                }
            } else {
                echo "<div class='status-dot'></div>";
                echo "<div class='status-line'></div>";
            }
            echo "<div class='status-text'>{$all_status[$node]['status_name']}</div></div>";
        }
    ?>
        </div>
        <div class="order-details-container">
            <h1>Order Details</h1>
            <!-- order items table -->
            <?php include 'item_in_order.php';
        echo '<div class="index-order-detail-container">';
        order_item_table($order_id, $order_details, $order_items);
        echo '</div>';
        ?>
        </div>
        <div class="delivery-info-container">
                    <!-- delivery information row -->
                    <h1>Delivery Information</h1>
                    <?php
                echo "<div class='delivery-info'><div id='personal'><p class='title'>Name</p><p>{$order_details['receiver_name']}</p>";
                echo "<p class='title'>Contact No. </p><p>{$order_details['receiver_contact']}</p></div>";
                echo "<div id='address'><p class='title'>Address</p>";
                echo "{$order_details['delivery_address_line_1']}<br>";
                if (strlen($order_details['delivery_address_line_2'] > 0)){
                    //if delivery address line 2 is set
                    echo "{$order_details['delivery_address_line_2']}";
                }
                echo "{$order_details['zip_code']}</div>";
                $track_number = (strlen($order_details['track_number'])>0)? $order_details['track_number'] : "Not Available Now";
                if ($order_details['track_number'] == NULL){
                    echo "<div id='track'><p class='title'>Track Number</p><p>{$track_number}</p></div></div>";
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>