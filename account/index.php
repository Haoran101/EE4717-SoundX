<?php include_once '../db_conn.php'; 
    session_start();

    $account_query = "SELECT * FROM users WHERE user_id={$_SESSION["user_id"]}";
    $user_result = $db -> query($account_query);
    $user_info = $user_result -> fetch_assoc();
    var_dump($user_info);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Account</title>
<meta charset="utf-8">
</head>
<body>
    <p>Name: <?php echo ucwords($user_info['first_name']).' '.ucwords($user_info['last_name']); ?></p>
    <p>Email: <?php echo strtolower($user_info['email']); ?></p>
    <p>Contact: <?php echo strtolower($user_info['contact']); ?></p>

    <form action='logout.php'>
    <input type='submit' value='log out'>
    </form>
</body>
</html>
