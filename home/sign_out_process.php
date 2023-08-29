<?php
    session_start();
    
    require_once '../App/Helpers/Functions.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        unset($_SESSION['user_id']);
        
        // Set the cookie's expiration time to a past date
        setcookie('remember_me_cookie', '', time() - 3600, '/');

        redirect('../sign_in/index.php');
        exit;
    }
?>
