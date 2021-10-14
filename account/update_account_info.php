<?php 
    include_once '../db_conn.php';
    session_start();

    if (!isset($_POST["contact"])){
        header("Location: http://192.168.56.2/f32ee/EE4717-SoundX/account/");
    }

    $update_account_info_query = "UPDATE users SET ";
    foreach($_POST as $column => $new_value){
        $update_account_info_query.= $column."='".$new_value."',";
    }

    //remove the last comma
    $update_account_info_query = substr($update_account_info_query, 0, -1);
    $update_account_info_query.= " WHERE user_id = {$_SESSION['user_id']}";

    $db->query($update_account_info_query);

    header("Location: http://192.168.56.2/f32ee/EE4717-SoundX/account/");
?>