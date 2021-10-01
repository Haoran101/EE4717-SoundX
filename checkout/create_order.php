<?php

    session_start();
    include_once '../db_conn.php';
    include_once '../query_utils.php';

    var_dump($_POST);
    var_dump($_SESSION);
?>