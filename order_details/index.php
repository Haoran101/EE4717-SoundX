<?php 
    session_start();
    include_once '../db_conn.php';
    include_once '../query_utils.php';
    include_once 'send_email.php';
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
    <h1>Order Details</h1>
        <table>
            <tr><td><!-- order id row -->
                Order #<?php echo $order_id; ?>
            </td></tr>
            <tr><td><!-- create time row -->
                 Created Time: <?php echo $order_details['create_time']; ?>
            </td></tr>
            <tr><td><!-- items row, contains items table -->
                    Items
                    <table>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Qty</td>
                            <td>Price</td>
                            <td>Subtotal</td>
                        </tr>
                        <?php 
                            $total = 0;
                            foreach($order_items as $item){
                                echo "<tr>";
                                echo "<td><img src='../img/product-snapshot/{$item['product_id']}.png'></td>";//image
                                echo "<td>{$item['product_name']}</td>";//product name
                                $qty = sprintf('%0.2f', $item['qty']);
                                echo "<td>{$qty}</td>";//Qty
                                $price =  sprintf('%0.2f', $item['price']);
                                echo "<td>\${$price}</td>";//Price
                                $subtotal = sprintf('%0.2f', $item['qty'] * $item['price']);
                                $total += $item['qty'] * $item['price'];
                                echo "<td>\${$subtotal}</td>";//Subtotal
                                echo "</tr>";
                            }
                        ?>
                    </table>
            </td></tr>
            <tr><td><!-- total row -->
                Total <?php 
                echo "\$";
                echo sprintf('%0.2f', $total); ?>
            </td></tr>
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