<!DOCTYPE html>
<html lang="en">

<?php
    session_start();

    require_once '../header.php';

    require_once '../App/Helpers/Functions.php';
    require_once '../App/Helpers/Database.php';
    require_once '../App/Controllers/AuthController.php';
    require_once '../App/Controllers/VolunteerController.php';
    require_once '../App/Controllers/EmergencyController.php';

    require_once '../Components/navigations.php';
    require_once '../Components/containers.php';
    
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

    $Volunteer = new VolunteerController($Database);
    $volunteer_count = $Volunteer->get_volunteer_count()['value'];
    $average_volunteer_count_per_emergency = $Volunteer->get_average_volunteer_count_per_emergency()['value'];

    $Emergency = new EmergencyController($Database);
    $emergency_count = $Emergency->get_emergency_count()['value'];
    $emergency_count_in_last_seven_days = $Emergency->get_emergency_count_in_last_seven_days()['value'];
?>

<body>
    <?= Sidebar(); ?>
    <?= NavHeaderStart(title: 'Home', class: 'justify-between items-center'); ?>
        <div class='text-sm border-l border-l-gray-300 h-full pl-3 flex items-center'>
            Hello, <?= $user['first_name'] ?>
        </div>
    <?= NavHeaderEnd(); ?>

    <?= NavContentStart(); ?>
        <div class='grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-2'>
            <?= DashboardItem(label: 'Volunteers', value: $volunteer_count); ?>
            <?= DashboardItem(label: 'Emergencies', value: $emergency_count); ?>
            <?= DashboardItem(label: 'Average Volunteers per Emergency', value: $average_volunteer_count_per_emergency); ?>
            <?= DashboardItem(label: 'Emergencies in Last 7 Days', value: $emergency_count_in_last_seven_days); ?>
        </div>
    <?= NavContentEnd(); ?>
</body>
</html>