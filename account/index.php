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

    $name = ucwords($user_info['first_name']).' '.ucwords($user_info['last_name']);
    $lastname = ucwords($user_info['last_name']);
    $firstname = ucwords($user_info['first_name']);
    $email = strtolower($user_info['email']);
    $contact = strtolower($user_info['contact']);
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
            <button id="update-button" onclick="displayUpdateContent();">Update</button>
                <form id="account-update" action="update_account_info.php" method="post">
                    <h2>Name</h2>
                    <p id="name-display">
                        <?php echo $name; ?>
                    </p>
                    <input required type="text" hidden id="first-name-update" name="first_name" value="<?php echo $firstname;?>" onClick="this.select();" >
                    <input required type="text" hidden id="last-name-update" name="last_name" value="<?php echo $lastname;?>" onClick="this.select();" >
                    <hr>
                    <h2>Email</h2>
                    <p id="email-display">
                        <?php echo $email; ?>
                    </p>
                    <hr>
                    <h2>Contact</h2>
                    <p id="contact-display">
                        <?php echo $contact; ?>
                    </p>
                    <input required type="text" hidden id="contact-update" name="contact" value="<?php echo $contact;?>" onClick="this.select();" >
                    <div id="invalidContactAlert"></div>
                    <hr>
                    <input id="confirm-update-button" type='hidden' value='Update'>
                </form>
            </div>
            <div>
                <form action='logout.php'>
                    <input id="logout-button" type='submit' value='Log Out'>
                </form>
            </div>
        </div>

    </div>
    <?php include '../Elements/footer.php';?>
    <script src="account_update.js"></script>
</body>

</html>