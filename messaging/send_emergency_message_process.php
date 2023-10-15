<?php
    session_start();

    require_once '../App/Helpers/Functions.php';
    require_once '../App/Helpers/Database.php';

    $Database = new Database();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo 'Coming Soon...';
    }
?>
