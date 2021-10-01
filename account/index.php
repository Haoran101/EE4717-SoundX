<?php include_once '../db_conn.php'; 
    session_start();

    if (!isset($_SESSION['user_id'])){
        //If not login, head in to login page
        header("Location: http://192.168.56.2/f32ee/EE4717-SoundX/login/"); 
        exit();
    }

    $account_query = "SELECT * FROM users WHERE user_id={$_SESSION['user_id']}";
    $user_result = $db -> query($account_query);
    $user_info = $user_result -> fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Account</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/account-order.css" />
    <link rel="stylesheet" href="../css/elements.css" />
</head>

<body>
    <?php include '../Elements/nav_bar.php';?>
    <div class="main-content">
        <div class="left-nav-column">
            <div id="account">
                <a href="index.php">
                    <span>ACCOUNT</span>
                </a>
            </div>
            <div id="order">
                <a href="../orders/index.php">
                    <span>MY ORDER</span>
                </a>
            </div>
        </div>
        <div class="right-nav-column">
            <div id="user-info-text">
                <h2>Name</h2>
                <p>
                <?php echo ucwords($user_info['first_name']).' '.ucwords($user_info['last_name']); ?>
                </p>
                <hr>
                <h2>Email</h2>
                <p>
                <?php echo strtolower($user_info['email']); ?>
</p>
                <hr>
                <h2>Contact</h2>
                <p>
                <?php echo strtolower($user_info['contact']); ?>
</p>
                <hr>
            </div>
            <div>
                <form action='logout.php'>
                    <input type='submit' value='Log Out'>
                </form>
            </div>
        </div>

    </div>
    <?php include '../Elements/footer.php';?>
</body>

</html>