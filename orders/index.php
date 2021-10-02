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
</head>

<body>
    <?php include '../Elements/nav_bar.php';?>
    <div class="main-content">
        <div class="left-nav-column">
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
        <div class="right-nav-column">
            <div id="user-info-text">

<?php
    $curr_user = $_SESSION['user_id'];
    $query_orders = "SELECT * FROM orders WHERE user_id = {$curr_user} ORDER BY create_time DESC";
    @$order_result = $db -> query($query_orders);

    while ($row = $order_result -> fetch_assoc()){
        $order_id = $row['order_id'];
        $order_items = get_order_items_with_product_info_by_order_id($db, $order_id);
        order_item_table($order_id, $row, $order_items);
        echo "<a href='../order_details/?id={$order_id}'>View Details >></a>";
    }
?> 
            </div>
        </div>