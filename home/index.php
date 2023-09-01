<!DOCTYPE html>
<html lang="en">

<?php
    session_start();

    require_once '../header.php';

    require_once '../App/Helpers/Functions.php';
    require_once '../App/Helpers/Database.php';
    require_once '../App/Controllers/AuthController.php';

    require_once '../Components/inputs.php';
    
    set_page_title('Home');

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
    <div class='w-full h-[100vh] flex items-center justify-center'>
        <div class='flex flex-col items-center gap-2'>
            <div>
                Welcome
                <span class='font-medium'><?= $user['last_name'].', '.$user['first_name'] ?></span>
            </div>
            
            <form action='sign_out_process.php' method='post' id='sign-out-form'>
                <?= Button(id: 'sign_out', label: 'Sign out'); ?>
            </form>
        </div>
    </div>
</body>
</html>