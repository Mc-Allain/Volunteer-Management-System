<!DOCTYPE html>
<html lang="en">

<?php
    session_start();

    require_once '../header.php';

    require_once '../App/Helpers/Functions.php';
    require_once '../App/Helpers/Database.php';
    require_once '../App/Controllers/AuthController.php';

    require_once '../Components/navigations.php';
    
    set_page_title('About');

    if (!isset($_SESSION['user_id'])) {
        redirect('../sign_in');
        exit;
    }

    $Database = new Database();
    $Auth = new AuthController($Database);

    $user = null;

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $user = $Auth->get_by_id($user_id);
    }
?>

<body>
    <?= Sidebar(); ?>
    <?= NavHeader(title: 'About'); ?>
</body>
</html>