<?php
    $server_name = 'localhost';
    $username = 'f32ee';
    $password = 'f32ee';
    $database = 'f32ee';
    $db = new mysqli($server_name, $username, $password, $database);
    if ($db->connect_errno) {
        echo 'Error: Could not connect to database.  Please try again later.';
        exit;
    }
?>
