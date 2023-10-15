<!DOCTYPE html>
<html lang="en">

<?php
    session_start();

    require_once '../header.php';

    require_once '../App/Helpers/Functions.php';
    require_once '../App/Helpers/Database.php';
    require_once '../App/Controllers/AuthController.php';

    require_once '../Components/navigations.php';
    require_once '../Components/containers.php';
    require_once '../Components/labels.php';
    require_once '../Components/inputs.php';
    
    set_page_title('Messaging');

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
    <?= NavHeaderStart(title: 'Messaging', class: 'justify-between items-center'); ?>
        <div class='text-sm border-l border-l-gray-300 h-full pl-3 flex items-center'>
            Hello, <?= $user['first_name'] ?>
        </div>
    <?= NavHeaderEnd(); ?>

    <?= NavContentStart(class: 'p-4 flex flex-col gap-3'); ?>
        <form action='send_emergency_message_process.php' method='post' id='emergency-message-form' class='flex flex-col gap-4'>
            <div class='flex gap-5 w-[384px]'>
                <?= FormCategoryStart(); ?>
                    <?= FormInputGroupStart(); ?>
                        <?= Label(name: 'barangay', value: 'Barangay', tag: 'required') ?>
                        <?= Input(type: 'text', id: 'barangay', name: 'barangay', placeholder: 'Barangay', icon: 'house-user', max_length: 32); ?>
                    <?= FormInputGroupEnd(); ?>

                    <?= FormInputGroupStart(); ?>
                        <?= Label(name: 'city', value: 'City', tag: 'required') ?>
                        <?= Input(type: 'text', id: 'city', name: 'city', placeholder: 'City', icon: 'house-user', max_length: 32); ?>
                    <?= FormInputGroupEnd(); ?>

                    <?= FormInputGroupStart(); ?>
                        <?= Label(name: 'message', value: 'Message', tag: 'required') ?>
                        <?= Input(type: 'text', id: 'message', name: 'message', placeholder: 'Message', icon: 'envelope', max_length: 128, value: 'There is an emergency at Barangay {barangay}, City of {city}.'); ?>
                    <?= FormInputGroupEnd(); ?>
                <?= FormCategoryEnd(); ?>
            </div>

            <!-- Behavior must be placed after the target elements -->
            <?= InputBehavior(); ?>

            <div class='flex gap-5 w-[384px]'>
                <div class='flex gap-3'>
                    <?= Button(id: 'sign_in', type:'submit', label: 'Send Message', button_class: 'primary', class: '!w-fit'); ?>
                </div>
            </div>
        </form>
    <?= NavContentEnd(); ?>
</body>
</html>