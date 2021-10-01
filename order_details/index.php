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
            <tr>
                <td>Order #<?php echo $order_id; ?></td>
            </tr>
            <tr>
                <td>Created Time: <?php echo $order_details['create_time']; ?></td>
            </tr>
            <tr>
                <td>
                    Items
                    <table>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Qty</td>
                            <td>Total</td>
                            <td>Subtotal</td>
                        </tr>
                        <?php 
                            foreach($order_items as $item){
                                echo "<tr>";
                                echo "</tr>";
                            }
                        ?>
                    </table>
                </td>
            </tr>
        </table>
    </body>
    </html>