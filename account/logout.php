<?php 
    session_start();
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();

    header("Location: http://192.168.56.2/f32ee/EE4717-SoundX/login/"); 
?>