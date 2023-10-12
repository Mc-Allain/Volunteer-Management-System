<!DOCTYPE html>
<html lang="en">

<?php
    session_start();

    require_once '../header.php';
    
    require_once '../App/Helpers/Functions.php';
    require_once '../App/Helpers/Database.php';
    require_once '../App/Controllers/AuthController.php';
    
    require_once './volunteer_registration_panel.php';
    
    set_page_title('Volunteer Registration');

    if (isset($_SESSION['user_id'])) {
        redirect('../home');
        exit;
    }

    $Database = new Database();
    $Auth = new AuthController($Database);

    // Check if the remember me cookie exists
    if (isset($_COOKIE["remember_me_cookie"])) {
        $cookie_value = $_COOKIE["remember_me_cookie"];

        // Validate the cookie value from the database
        $user = $Auth->get_user_using_cookie($cookie_value);

        if ($user !== null) {
            redirect('../home');
        }
    }
?>

<body>
    <div class='w-full h-[100vh] flex items-center justify-center'>
        <?= VolunteerRegistrationPanel(); ?>
    </div>
</body>
</html>