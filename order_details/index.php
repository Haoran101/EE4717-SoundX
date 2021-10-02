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

    $order_id = $_GET{'id'};
    $order_details = get_order_details_by_order_id($db, $order_id);
    $order_items = get_order_items_with_product_info_by_order_id($db, $order_id);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SoundX</title>
    <meta charset="utf-8" />
	<link rel="stylesheet" href="../css/elements.css" />
  </head>
  <body>
      <!-- the navigation bar -->
    <?php include '../Elements/nav_bar.php';?>
    <?php 
        if (isset($_GET['from_checkout'])){
            send_email($db, $order_id, $order_items, $order_details);
            echo "<div>Congrats! Your order has been created successfully! An email has been sent to your mailbox!</div>";
        }
    ?>
    <div class="status-bar-container">
    <?php
        $curr_status = (int) $order_details['status'];
        $all_status = select_all_from_table($db, 'status');
        for ($node = 0; $node < count($all_status); $node++){
            if ($node < $curr_status){
                if ($node != 0){
                    echo "<div class='status-line solid'>solid</div>";
                }
                echo "<div class='status-dot done'>done</div>";
            } else {
                echo "<div class='status-line dotted'>dotted</div>";
                echo "<div class='status-dot'>not done</div>";
            }
            echo "<div class='status-text'>{$all_status[$node]['status_name']}</div>";
        }
    ?>
    </div>
    <h1>Order Details</h1>
        <!-- order items table -->
        <?php include 'item_in_order.php';
        order_item_table($order_id, $order_details, $order_items);
        ?>
            <tr><td><!-- delivery information row -->
                Delivery Information<br>
                <?php
                echo "Name : {$order_details['receiver_name']}<br>";
                echo "Contact No. : {$order_details['receiver_contact']}<br>";
                echo "Address<br>";
                echo "{$order_details['delivery_address_line_1']}<br>";
                if (strlen($order_details['delivery_address_line_2'] > 0)){
                    //if delivery address line 2 is set
                    echo "{$order_details['delivery_address_line_2']}        ";
                }
                echo "{$order_details['zip_code']}<br>";
                if ($order_details['track_number'] != NULL){
                    echo "Track Number: {$order_details['track_number']}";
                }
                ?>
            </td></tr>
        </table>
    </body>
    </html>